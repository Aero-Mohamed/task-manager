@csrf
<div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
    <div class="sm:col-span-2">
        <label for="message" class="block text-sm/6 font-semibold text-gray-900">Task Description</label>
        <div class="mt-2.5">

            <textarea name="description" id="message" rows="4" class="block w-full rounded-md text-gray-900">{{isset($task)? $task->description: ''}}</textarea>
        </div>
    </div>

    <div class="sm:col-span-2">
        <div class="flex items-center">
            <input type="checkbox" name="is_completed" id="completed" value="1"
                   class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600" {{ isset($task) && $task->is_completed ? 'checked' : '' }}>
            <label for="completed" class="ml-2 block text-sm/6 font-semibold text-gray-900">Mark as completed</label>
        </div>
    </div>

</div>
<div class="mt-3">
    <button type="submit" class="block w-full rounded-md bg-white px-3.5 py-2.5 text-center text-sm font-semibold text-indigo-600 border border-indigo-600 hover:bg-gray-100">Submit</button>
</div>
