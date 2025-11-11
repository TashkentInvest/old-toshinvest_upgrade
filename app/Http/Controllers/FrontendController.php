<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\Project;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $news = News::orderBy('published_at', 'desc')->get();
        $subcategory = Category::where('slug', 'stroitelnye-investicionnye-proekty')->first();
        return view('pages.frontend.home', compact('news', 'subcategory'));
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

        return view('pages.frontend.media-detail', compact('news', 'relatedNews'));
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
}
