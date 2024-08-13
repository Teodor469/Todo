<nav class="relative flex justify-between items-center mt-4 p-2">
    <div
        class="absolute left-1/2 transform -translate-x-1/2 w-52 py-2 border-2 border-gray-700 rounded-3xl flex items-center justify-center space-x-14">
        <a href="/" class="text-green-500 transition-all duration-150 ease-in hover:text-green-700 text-xl">Home</a>
        <a href="#" class="text-gray-100 transition-all duration-150 ease-in hover:text-gray-300 text-xl">About</a>
    </div>

    <div class="flex items-center space-x-4">
        @auth
            <div class="flex items-center space-x-6">
                <a href="/profile" class="w-10 h-10 bg-green-700 rounded-full py-2 px-2">
                    <img src="{{ asset('images/user.png') }}" alt="user" class="rounded-full">
                </a>
                <span class="text-white text-m">Welcome, {{ Auth::user()->name }}</span>
            </div>
            <form action="{{ route('logout') }}" method="POST" class="ml-4">
                @csrf
                <button type="submit" class="bg-red-600 text-white py-1 px-3 rounded-lg hover:bg-red-700 transition duration-150 ease-in">
                    Logout
                </button>
            </form>
        @endauth

        @guest
            <a href="{{ route('login') }}" class="w-10 h-10 bg-green-700 rounded-full py-2 px-2">
                <img src="{{ asset('images/user.png') }}" alt="user" class="rounded-full">
            </a>
        @endguest
    </div>
</nav>


