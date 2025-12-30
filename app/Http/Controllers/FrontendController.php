<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\VacancyApplication;
use App\Models\News;
use App\Models\Project;
use App\Services\InvestorIdeaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class FrontendController extends Controller
{
    protected InvestorIdeaService $investorIdeaService;

    public function __construct(InvestorIdeaService $investorIdeaService)
    {
        $this->investorIdeaService = $investorIdeaService;
    }

    public function index()
    {
        $news = News::orderBy('published_at', 'desc')->get();
        $subcategory = Category::where('slug', 'stroitelnye-investicionnye-proekty')->first();

        // Get recent investor ideas (approved only)
        $recentIdeas = $this->investorIdeaService->getRecentForHomepage(3);

        // SEO Meta Tags
        $seoTitle = __('frontend.seo.default_title');
        $seoDescription = __('frontend.seo.default_description');
        $seoKeywords = __('frontend.seo.default_keywords');
        $canonicalUrl = url('/');
        $ogImage = asset('assets/users_img/bg.webp');

        // Breadcrumbs for homepage
        $breadcrumbs = [
            ['name' => __('frontend.nav.home'), 'url' => url('/')]
        ];

        return view('pages.frontend.home', compact(
            'news',
            'subcategory',
            'recentIdeas',
            'seoTitle',
            'seoDescription',
            'seoKeywords',
            'canonicalUrl',
            'ogImage',
            'breadcrumbs'
        ));
    }


    public function about()
    {
        return view('pages.frontend.about');
    }
    public function rukavodstva()
    {
        return view('pages.frontend.rukavodstva');
    }
    public function search()
    {
        return view('pages.frontend.search');
    }
    public function investoram(Request $request)
    {
        // Get search parameters
        $objectNumber = $request->get('object_number');
        $name = $request->get('name');
        $status = $request->get('status'); // No default - let user choose
        $district = $request->get('district');
        $perPage = $request->get('per_page', 10);

        // Validate per_page value
        $allowedPerPage = [10, 25, 50, 100];
        if (!in_array($perPage, $allowedPerPage)) {
            $perPage = 10;
        }

        // Get ALL projects for statistics (unfiltered)
        $allProjectsQuery = Project::query();
        $allProjects = $allProjectsQuery->get();

        // Calculate overall statistics from ALL projects
        $allStatusCounts = [
            '1_step' => $allProjects->where('status', '1_step')->count(),
            '2_step' => $allProjects->where('status', '2_step')->count(),
            'completed' => $allProjects->where('status', 'completed')->count(),
            'archive' => $allProjects->where('status', 'archive')->count()
        ];
        $allTotal = $allProjects->count();

        // Build filtered query for actual display
        $query = Project::query();

        // Apply filters
        if (!empty($objectNumber)) {
            $query->where('id', $objectNumber);
        }

        if (!empty($name)) {
            $query->where(function ($q) use ($name) {
                $q->where('district', 'like', '%' . $name . '%')
                    ->orWhere('mahalla', 'like', '%' . $name . '%');
            });
        }

        // Only apply status filter if explicitly provided
        if (!empty($status)) {
            $query->where('status', $status);
        }

        if (!empty($district)) {
            $query->where('district', 'like', '%' . $district . '%');
        }

        // Order by latest first
        $query->orderBy('created_at', 'desc');

        // Get filtered projects for statistics
        $filteredProjects = $query->get();
        $filteredStatusCounts = [
            '1_step' => $filteredProjects->where('status', '1_step')->count(),
            '2_step' => $filteredProjects->where('status', '2_step')->count(),
            'completed' => $filteredProjects->where('status', 'completed')->count(),
            'archive' => $filteredProjects->where('status', 'archive')->count()
        ];
        $filteredTotal = $filteredProjects->count();

        // Paginate the filtered query
        $projects = $query->paginate($perPage);

        // Preserve ALL current query parameters in pagination links
        $projects->appends($request->query());

        // Prepare all variables for the blade template
        $paginatedProjects = $projects->items();
        $totalPages = $projects->lastPage();
        $currentPage = $projects->currentPage();
        $totalItems = $projects->total();
        $startItem = $totalItems > 0 ? ($currentPage - 1) * $perPage + 1 : 0;
        $endItem = min($currentPage * $perPage, $totalItems);
        $currentStatus = $status ?? 'all'; // Show 'all' when no status selected

        // Determine which counts to show (filtered or all)
        $showingFiltered = !empty($objectNumber) || !empty($name) || !empty($district);
        $displayStatusCounts = $showingFiltered ? $filteredStatusCounts : $allStatusCounts;
        $displayTotal = $showingFiltered ? $filteredTotal : $allTotal;

        $statusLabelsUz = [
            '1_step' => '1-босқич',
            '2_step' => '2-босқич',
            'completed' => 'Тугалланган',
            'archive' => 'Архив',
            'all' => 'Барча ҳолатлар',
            '' => 'Барча ҳолатлар'
        ];

        // Helper function for pagination URLs that preserves all current parameters
        $getPaginationUrl = function ($page) use ($request) {
            $params = $request->query();
            $params['page'] = $page;
            return $request->url() . '?' . http_build_query($params);
        };

        return view('pages.frontend.investoram', compact(
            'projects',
            'paginatedProjects',
            'totalPages',
            'currentPage',
            'totalItems',
            'startItem',
            'endItem',
            'currentStatus',
            'statusLabelsUz',
            'getPaginationUrl',
            'displayStatusCounts',
            'displayTotal',
            'allStatusCounts',
            'allTotal'
        ));
    }
 public function media(Request $request)
    {
        $query = News::query();

        // Search functionality
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('content', 'like', '%' . $request->search . '%');
            });
        }

        // Date filters
        if ($request->filled('date_from')) {
            $query->whereDate('published_at', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->whereDate('published_at', '<=', $request->date_to);
        }

        // Order by published date (newest first)
        $query->orderBy('published_at', 'desc');

        // Paginate results (9 items per page to match 3x3 grid)
        $news = $query->paginate(9)->withQueryString();

        // Get subcategory if needed
        $subcategory = Category::where('slug', 'stroitelnye-investicionnye-proekty')->first();

        return view('pages.frontend.media', compact('news', 'subcategory'));
    }

    /**
     * Display individual news detail page
     * URL: /media/news/{id}
     */
    public function mediaDetail($id)
    {
        // Find the news item or fail with 404
        $news = News::findOrFail($id);

        // Get related news (exclude current news, limit to 3)
        $relatedNews = News::where('id', '!=', $id)
                          ->orderBy('published_at', 'desc')
                          ->limit(3)
                          ->get();

        // SEO Meta Tags for News Article
        $seoTitle = $news->title . ' - ' . __('frontend.seo.site_name');
        $seoDescription = Str::limit(strip_tags($news->content ?? ''), 155);
        $seoKeywords = $news->title . ', ' . __('frontend.seo.default_keywords');
        $canonicalUrl = route('frontend.media.detail', $id);
        $ogImage = $news->getPrimaryImage() ?? asset('assets/frontend/images/og-default.jpg');
        $ogType = 'article';

        // Breadcrumbs
        $breadcrumbs = [
            ['name' => __('frontend.nav.home'), 'url' => url('/')],
            ['name' => __('frontend.nav.media'), 'url' => route('frontend.media')],
            ['name' => Str::limit($news->title, 50), 'url' => route('frontend.media.detail', $id)]
        ];

        // Article Schema Data
        $articleSchema = [
            'headline' => $news->title,
            'datePublished' => $news->published_at ? $news->published_at->toIso8601String() : now()->toIso8601String(),
            'dateModified' => $news->updated_at->toIso8601String(),
            'image' => $ogImage,
            'author' => __('frontend.seo.author'),
        ];

        return view('pages.frontend.media-detail', compact(
            'news',
            'relatedNews',
            'seoTitle',
            'seoDescription',
            'seoKeywords',
            'canonicalUrl',
            'ogImage',
            'ogType',
            'breadcrumbs',
            'articleSchema'
        ));
    }

    public function contact()
    {
        return view('pages.frontend.contact');
    }
    public function ustav()
    {
        return view('pages.frontend.ustav');
    }
    public function struktura()
    {
        return view('pages.frontend.struktura');
    }
 public function about_us()
    {
        return view('pages.frontend.about_us');
    }
 public function investoram_slayd()
    {
        return view('pages.frontend.investoram_slayd');
    }
    public function supervisory_board()
    {
        return view('pages.frontend.supervisory-board');
    }
    public function board()
    {
        return view('pages.frontend.board');
    }

    public function supervisory_board_committees()
    {
        return view('pages.frontend.supervisory-board-committees');
    }

    public function decision()
    {
        return view('pages.frontend.decision-on-the-initial-issue');
    }
    public function reports()
    {
        return view('pages.frontend.reports');
    }
    public function balance()
    {
        return view('pages.frontend.balance');
    }
    public function income()
    {
        return view('pages.frontend.income');
    }
    public function spisok()
    {
        return view('pages.frontend.spisok');
    }
    public function share_struktura()
    {
        return view('pages.frontend.share-sturukture');
    }
    public function zakupki()
    {
        return view('pages.frontend.zakupki');
    }
    public function kodeks()
    {
        return view('pages.frontend.kodeks');
    }
    public function vacancies()
    {
        return view('pages.frontend.vacancies');
    }

    public function development_strategies()
    {
        return view('pages.frontend.development_strategies');
    }
    // public function business_plan()
    // {

    //     return view('pages.frontend.business_plan');
    // }
public function business_plan()
{
    // abort(404);
        return view('pages.frontend.business_plan');

}
public function xaridlar()
{
    // abort(404);
        return view('pages.frontend.xaridlar');

}


    public function offers()
    {
        return view('pages.frontend.offers');
    }

    public function internal_documents_of_the_company()
    {
        return view('pages.frontend.internal_documents_of_the_company');
    }

public function essential_facts()
    {
        return view('pages.frontend.essential_facts');
    }
    public function assessment_system()
    {
        return view('pages.frontend.assessment_system');
    }

    public function essential_facts_show($number)
    {
        // Validate number parameter
        if (!preg_match('/^\d{2}$/', $number)) {
            abort(404);
        }

        // Get files from the folder
        $folderPath = public_path('assets/frontend/muhim_faktlar');
        $files = [];

        if (is_dir($folderPath)) {
            $allFiles = scandir($folderPath);
            foreach ($allFiles as $file) {
                if ($file !== '.' && $file !== '..' && is_file($folderPath . '/' . $file)) {
                    // Only include files that match the requested number
                    if (preg_match('/' . $number . '/', $file)) {
                        $files[] = $file;
                    }
                }
            }
        }

        // Sort files alphabetically
        sort($files);

        // If no files found, return 404
        if (empty($files)) {
            abort(404);
        }

        return view('pages.frontend.essential_facts_show', compact('files', 'number'));
    }

public function npa()
    {
        return view('pages.frontend.npa');
    }

public function nizomlar()
    {
        return view('pages.frontend.nizomlar');
    }
    public function key_performance_indicators()
    {
        return view('pages.frontend.key_performance_indicators');
    }

    public function risk_takers()
    {
        return view('pages.frontend.risk_takers');
    }
    public function information_on_the_purchase_of_shares_by_the_company()
    {
        return view('pages.frontend.information_on_the_purchase_of_shares_by_the_company');
    }

    public function dividends()
    {
        return view('pages.frontend.dividends');
    }

    public function charter_capital()
    {
        return view('pages.frontend.charter_capital');
    }

    public function open_tender_notice()
    {
        $notices = \App\Models\ProcurementNotice::with('documents')
            ->active()
            ->ordered()
            ->get();

        $locale = app()->getLocale();

        return view('pages.frontend.open_tender_notice', compact('notices', 'locale'));
    }

    public function open_tender_notice_show($slug)
    {
        $notice = \App\Models\ProcurementNotice::with('documents')
            ->where('slug', $slug)
            ->firstOrFail();

        $locale = app()->getLocale();

        return view('pages.frontend.open_tender_notice_show', compact('notice', 'locale'));
    }

    private function getProcurementsData()
    {
        return [
            [
                'id' => 1,
                'slug' => 'new-brt-project',
                'title_uz' => "Toshkent shahri ko'chalarida avtobuslar uchun alohida ajratilgan yo'laklarni tashkil etish maqsadida avtomobil yo'llari va yo'l bo'yi infratuzilmasini loyihalash, rekonstruksiya qilish va ta'mirlash bo'yicha bosh pudratchi va loyihachini tanlab olish",
                'title_ru' => 'Отбор генерального подрядчика и проектировщика по проектированию, реконструкции и ремонту автомобильных дорог и придорожной инфраструктуры на улицах города Ташкента, с целью организации отдельных выделенных полос для автобусов',
                'deadline' => '5 yanvar 2026 yil, 18:00',
                'deadline_ru' => '5 января 2026 года, 18:00',
                'announcement_date' => '25 dekabr 2025 yil',
                'announcement_date_ru' => '25 декабря 2025 года',
                'status' => 'active',
                'docs_count' => 5,
                'folder' => 'assets/eng_yaxshi_takliflarni_tanlab_olish/new_brt',
                'announcement_pdf' => 'assets/eng_yaxshi_takliflarni_tanlab_olish/new_brt/Эълон _new_brt (РУС).pdf',
                'documents' => [
                    ['name' => "E'lon (Ruscha)", 'file' => 'Эълон _new_brt (РУС).pdf'],
                    ['name' => "Ariza (Ruscha)", 'file' => 'Ариза _new_brt(РУС).pdf'],
                    ['name' => "Texnik hujjat (Ruscha)", 'file' => 'Тех_Хужжат_new_brt_(РУС).pdf'],
                    ['name' => "Texnik topshiriq", 'file' => 'ТЕХНИЧЕСКОЕ_ЗАДАНИЕ_new_brt.pdf'],
                    ['name' => 'FIDIC kontrakt shablon', 'file' => 'FIDIC контракт шаблон 22.10.2025 (3).pdf'],
                ],
            ],
            [
                'id' => 2,
                'slug' => 'qorasaroy-tunnel-project',
                'title_uz' => "Islom sivilizatsiyasi markazi tunnel loyihasi bo'yicha ekspert hisobini tayyorlash xizmatlari",
                'title_ru' => 'Услуги по подготовке экспертной сметы по проекту туннеля Центра Исламской Цивилизации',
                'deadline' => '6 yanvar 2026 yil, 18:00',
                'deadline_ru' => '6 января 2026 года, 18:00',
                'status' => 'active',
                'docs_count' => 8,
                'folder' => 'assets/eng_yaxshi_takliflarni_tanlab_olish/Qorasaroy',
                'announcement_pdf' => 'assets/eng_yaxshi_takliflarni_tanlab_olish/Qorasaroy/Эълон _(ЎЗБ).pdf',
                'documents' => [
                    ['name' => "E'lon (O'zbekcha)", 'file' => 'Эълон _(ЎЗБ).pdf'],
                    ['name' => "E'lon (Ruscha)", 'file' => 'Эълон _(РУС).pdf'],
                    ['name' => "Ariza (O'zbekcha)", 'file' => 'Ариза _(ЎЗБ).pdf'],
                    ['name' => "Ariza (Ruscha)", 'file' => 'Ариза _(РУС).pdf'],
                    ['name' => "Texnik hujjat (O'zbekcha)", 'file' => 'Тех_Хужжат_экс_шота_Ислом_Цивилизацияси_маркази_Туннел_ЎЗБ.pdf'],
                    ['name' => "Texnik hujjat (Ruscha)", 'file' => 'Тех_Хужжат_экс_шота_Ислом_Цивилизацияси_маркази_Туннел_РУС.pdf'],
                    ['name' => "Texnik topshiriq (O'zbekcha)", 'file' => 'ТЕХНИЧЕСКОЕ_ЗАДАНИЕ_Ислом_Цивилизацияси_маркази_Туннел_ЎЗБ.pdf'],
                    ['name' => "Texnik topshiriq (Ruscha)", 'file' => 'ТЕХНИЧЕСКОЕ_ЗАДАНИЕ_Ислом_Цивилизацияси_маркази_Туннел_РУС.pdf'],
                    ['name' => 'Shartnoma shakli', 'file' => 'шартнома шакли12.pdf'],
                ],
            ],
        ];
    }

    /**
     * Handle language switching
     */
    public function changeLanguage($lang)
    {
        $lang = strtolower($lang);
        if (in_array($lang, ['ru', 'uz', 'en'])) {
            session(['locale' => $lang]);
        }
        return redirect()->back();
    }

    /**
     * Show investment projects page
     */
    public function investmentProjects()
    {
        $projects = \App\Models\InvestmentProject::ordered()->get();
        $locale = app()->getLocale();

        return view('pages.frontend.investment-projects', compact('projects', 'locale'));
    }

    /**
     * Show JAC projects page
     */
    public function jacProjects()
    {
        return view('pages.frontend.jac-projects');
    }

    /**
     * Redirect old bidding URL
     */
    public function redirectBidding()
    {
        return redirect()->route('frontend.investoram');
    }

    /**
     * Handle vacancy application submission
     */
    public function submitVacancyApplication(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'position' => 'required|string|max:255',
            'message' => 'nullable|string|max:2000',
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
        ], [
            'full_name.required' => __('frontend.vacancies.validation.full_name_required'),
            'email.required' => __('frontend.vacancies.validation.email_required'),
            'email.email' => __('frontend.vacancies.validation.email_invalid'),
            'phone.required' => __('frontend.vacancies.validation.phone_required'),
            'position.required' => __('frontend.vacancies.validation.position_required'),
            'resume.mimes' => __('frontend.vacancies.validation.resume_format'),
            'resume.max' => __('frontend.vacancies.validation.resume_size'),
        ]);

        try {
            $resumePath = null;
            if ($request->hasFile('resume')) {
                $resumePath = $request->file('resume')->store('vacancy-resumes', 'public');
            }

            VacancyApplication::create([
                'full_name' => $validated['full_name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'position' => $validated['position'],
                'message' => $validated['message'] ?? null,
                'resume_path' => $resumePath,
                'ip_address' => $request->ip(),
            ]);

            return back()->with('success', __('frontend.vacancies.application_sent'));
        } catch (\Exception $e) {
            Log::error('Vacancy application failed: ' . $e->getMessage());
            return back()->with('error', __('frontend.vacancies.application_error'))->withInput();
        }
    }
}
