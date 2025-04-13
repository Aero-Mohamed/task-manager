<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        /** @var User $currentUser */
        $currentUser = auth()->user();
        $tasks = $currentUser->tasks()
            ->selectRaw('COUNT(*) as total_count, SUM(is_completed = 1) as completed_count')
            ->first();

        return view('dashboard')->with([
            'totalTasks' => $tasks['total_count'],
            'completedTasks' => $tasks['completed_count'],
            'pendingTasks' => $tasks['total_count'] - $tasks['completed_count']
        ]);
    }
}
