<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\InvestorIdeaService;
use App\Services\BannerService;
use App\Http\Requests\StoreInvestorIdeaRequest;
use App\DTOs\InvestorIdeaDTO;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Investor Idea Controller
 *
 * Handles investor idea submission and display
 * Implements SRP - only handles HTTP layer for investor ideas
 */
class InvestorIdeaController extends Controller
{
    /**
     * @var InvestorIdeaService
     */
    protected InvestorIdeaService $investorIdeaService;

    /**
     * InvestorIdeaController constructor
     *
     * @param InvestorIdeaService $investorIdeaService
     */
    public function __construct(InvestorIdeaService $investorIdeaService)
    {
        $this->investorIdeaService = $investorIdeaService;
    }

    /**
     * Display investor idea submission form
     *
     * @return View
     */
    public function create(): View
    {
        return view('pages.frontend.investor_ideas.create');
    }

    /**
     * Store investor idea submission
     *
     * @param StoreInvestorIdeaRequest $request
     * @return RedirectResponse
     */
    public function store(StoreInvestorIdeaRequest $request): RedirectResponse
    {
        try {
            $dto = InvestorIdeaDTO::fromArray($request->validated());
            $ideaId = $this->investorIdeaService->create($dto);

            return redirect()
                ->route('frontend.investor_ideas.success')
                ->with('success', __('Your investment proposal has been submitted successfully! Our team will review it and contact you soon.'))
                ->with('idea_id', $ideaId);

        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', __('An error occurred while submitting your proposal. Please try again.'));
        }
    }

    /**
     * Display success page after submission
     *
     * @return View
     */
    public function success(): View
    {
        if (!session('success')) {
            return redirect()->route('frontend.investor_ideas.create');
        }

        return view('pages.frontend.investor_ideas.success');
    }

    /**
     * Display approved/public investor ideas
     *
     * @return View
     */
    public function index(): View
    {
        $ideas = $this->investorIdeaService->getByStatus('approved', 12);

        return view('pages.frontend.investor_ideas.index', compact('ideas'));
    }

    /**
     * Display single investor idea
     *
     * @param int $id
     * @return View
     */
    public function show(int $id): View
    {
        $idea = $this->investorIdeaService->getByStatus('approved', 1000)
            ->where('id', $id)
            ->first();

        if (!$idea) {
            abort(404);
        }

        return view('pages.frontend.investor_ideas.show', compact('idea'));
    }
}
