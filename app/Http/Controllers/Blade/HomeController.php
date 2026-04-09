<?php

namespace App\Http\Controllers\Blade;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Client;
use App\Models\Message;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;


class HomeController extends Controller
{
    public function index()
    {
        $userId = auth()->id();

        $hasRoles = DB::table('model_has_roles')
            ->where('model_id', $userId)
            ->exists();

        if ($hasRoles) {
            return view('pages.dashboard');
        } else {
            return view('welcome');
        }
    }

    public function statistics()
    {
        $categoryCounts = collect([]);

        try {
            $categories = ['Ruxsatnoma', 'Apz', 'Kengash'];
            $categoryCounts = Category::whereIn('name', $categories)
                ->withCount('clients')
                ->get();
        } catch (\Exception $e) {
            // Categories table may not exist or be empty
        }

        return view('pages.statistics', compact('categoryCounts'));
    }

    public function optimize()
    {
        Artisan::call('cache:clear-optimize');
        return redirect()->back()->with('success', 'Optimized cache cleared successfully');
    }
}
