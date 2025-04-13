<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStoreRequest;
use App\Models\Task;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        /** @var User $currentUser */
        $currentUser = auth()->user();
        $tasks = $currentUser->tasks()
            ->orderBy('created_at', 'desc')
            ->paginate(5)
            ->withQueryString();

        return view('task.index', compact('tasks'));
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskStoreRequest $request)
    {
        $validated = $request->validated();
        $request->user()->tasks()->create($validated);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('task.edit', compact('task'));
    }

    /**
     * @param TaskStoreRequest $request
     * @param Task $task
     * @return RedirectResponse
     */
    public function update(TaskStoreRequest $request, Task $task): RedirectResponse
    {
        $validated = $request->validated();
        $task->update($validated);

        return back()->with('success', 'Task updated successfully');
    }

    /**
     * @param Task $task
     * @return RedirectResponse
     */
    public function destroy(Task $task): RedirectResponse
    {
        $task->delete();
        return back()->with('success', 'Task deleted successfully');
    }

    /**
     * @param Task $task
     * @return RedirectResponse
     */
    public function complete(Task $task): RedirectResponse
    {
        $task->setAttribute('is_completed', 1);
        $task->save();

        return back()->with('success', 'Task completed successfully');
    }
}
