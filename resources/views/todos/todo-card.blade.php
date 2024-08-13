<div class="mt-8 w-3/5 mx-auto">
    @foreach ($tasks as $task)
        @if (auth()->id() == $task->user_id)
            <div class="bg-gray-800 mt-4 p-4 rounded-xl shadow-lg flex items-center">
                <span class="text-green-700 text-2xl mr-4">⦿</span>
                <div class="flex-grow max-w-3xl">
                    @if (($editing ?? false) && isset($taskBeingEdited) && $taskBeingEdited->id == $task->id)
                        <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="w-3/4 mx-auto mt-8">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <textarea name="task" id="edit_task" cols="30" rows="1" placeholder="Edit Task..."
                                    class="bg-gray-800 resize-none w-full rounded-2xl px-3 py-2 text-gray-100 text-xl">{{ $task->task }}</textarea>
                            </div>
                            <div class="mb-4 flex items-center">
                                <select name="priority" id="priority"
                                    class="bg-gradient-to-r from-yellow-500 to-gray-600 text-white py-3 px-4 rounded-lg shadow-lg focus:outline-none focus:ring-4 focus:ring-yellow-300 transition duration-300 ease-in-out cursor-pointer w-1/3 mr-4">
                                    <option value="1" class="bg-green-500">Low</option>
                                    <option value="2" class="bg-yellow-500">Medium</option>
                                    <option value="3" class="bg-red-500">High</option>
                                </select>
                                <button type="submit"
                                    class="text-white py-2 px-6 rounded-xl bg-yellow-500 hover:bg-yellow-600 flex items-center justify-center">
                                    Update Task
                                </button>
                            </div>
                        </form>
                    @else
                        <form action="{{ route('tasks.check', $task->id) }}" method="POST" style="display: inline;">
                            @csrf
                            <input type="checkbox" onChange="this.form.submit()" {{ $task->check ? 'checked' : '' }}
                                class="hidden">
                            <h2 class="text-gray-100 text-xl {{ $task->check ? 'line-through' : '' }}">
                                {{ $task->task }}
                            </h2>
                            @switch($task->priority)
                                @case(1)
                                    <h2 class="text-green-300 text-xl">Low</h2>
                                @break

                                @case(2)
                                    <h2 class="text-yellow-300 text-xl">Medium</h2>
                                @break

                                @case(3)
                                    <h2 class="text-red-300 text-xl">High</h2>
                                @break

                                @default
                                    <h2 class="text-gray-300 text-xl">Unknown</h2>
                            @endswitch
                        </form>
                    @endif
                </div>
                <div class="ml-auto flex space-x-2 flex-shrink-0">
                    <form action="{{ route('tasks.check', $task->id) }}" method="POST">
                        @csrf
                        <button
                            class="bg-green-600 hover:bg-green-700 text-white py-1 px-2 rounded-lg transition duration-150 flex items-center justify-center">
                            <img src="{{ asset('images/check-mark.png') }}" alt="Check" class="w-7 h-7">
                        </button>
                    </form>
                    <a href="{{ route('tasks.edit', $task->id) }}"
                        class="bg-yellow-600 hover:bg-yellow-700 text-white py-1 px-2 rounded-lg transition duration-150 flex items-center justify-center">
                        <img src="{{ asset('images/editing.png') }}" alt="Edit" class="w-7 h-7">
                    </a>
                    <form method="POST" action="{{ route('tasks.destroy', $task->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" value="Delete"
                            class="bg-red-600 hover:bg-red-700 text-white py-1 px-2 rounded-lg transition duration-150 flex items-center justify-center">
                            <img src="{{ asset('images/delete.png') }}" alt="Delete" class="w-7 h-7">
                        </button>
                    </form>
                </div>
            </div>
        @endif
    @endforeach
</div>
