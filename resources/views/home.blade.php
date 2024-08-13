@include('layout.head')

@include('layout.navbar')

<div class="flex items-center justify-center mt-8">
    <h2 class="text-gray-100 text-3xl">To Do List</h2>
</div>

<hr class="mt-2 w-2/5 flex items-center justify-center mx-auto border-2 rounded-full border-green-700">

@include('shared.success-message')
@include('shared.error-message')

@auth
    <div class="mt-8">
        <div class="w-3/4 mx-auto">
            <form action=" {{ route('tasks.store') }} " method="POST">
                @csrf
                <div class="flex items-center justify-center mt-10">
                    <textarea name="task" id="task" cols="60" rows="1" placeholder="Add Task..."
                        class="bg-gray-800 resize-none w-3/5 rounded-2xl px-3 py-2 text-gray-100"></textarea>
                    <button type="submit" class="text-white ml-4 py-2 px-2 rounded-xl bg-green-700">Add task</button>
                </div>
                <div class="w-3/4 mx-auto mt-8 relative">
                    <div class="relative">
                        <select name="priority" id="priority"
                            class="bg-gradient-to-r from-green-500 to-gray-600 text-white w-1/5 py-3 px-4 rounded-lg shadow-lg focus:outline-none focus:ring-4 focus:ring-green-300 transition duration-300 ease-in-out">
                            <div class="absolute w-1/5 mt-1 rounded-lg bg-gray-800 shadow-lg hidden">
                                <option value="1" class="bg-green-500 focus:outline-none appearance-none border-none">
                                    Low</option>
                                <option value="2" class="bg-yellow-500">Medium</option>
                                <option value="3" class="bg-red-500">High</option>
                            </div>
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endauth
@guest
    <h2 class="text-white flex items-center justify-center mt-10 text-3xl">Login to add tasks</h2>
@endguest
@include('todos.todo-card')

@include('layout.footer')
