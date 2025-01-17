@include('layout.head')

@include('layout.navbar')

@include('shared.success-message')
@include('shared.error-message')

<div class="mt-8 w-2/5 mx-auto">
    <div class="bg-gray-800 p-8 rounded-xl shadow-lg">
        <h2 class="text-gray-100 text-3xl mb-8 text-center">Login</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="flex mx-auto justify-center text-gray-100 text-lg mb-2">Email</label>
                <input type="email" name="email" id="email"
                    class="bg-gray-700 text-gray-100 w-2/5 flex mx-auto rounded-2xl px-3 py-2 focus:outline-none focus:ring-4 focus:ring-yellow-500 transition duration-300 ease-in-out">
            </div>
            <div class="mb-4">
                <label for="password" class="flex mx-auto justify-center text-gray-100 text-lg mb-2">Password</label>
                <input type="password" name="password" id="password"
                    class="bg-gray-700 text-gray-100 w-2/5 flex mx-auto rounded-2xl px-3 py-2 focus:outline-none focus:ring-4 focus:ring-red-500 transition duration-300 ease-in-out">
            </div>
            <div class="flex items-center justify-center">
                <button type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white py-2 px-6 rounded-xl shadow-lg transition duration-300 ease-in-out">
                    Login
                </button>
            </div>
            <a href="{{ route('register') }}" class="flex items-center justify-center mt-4 text-white hover:underline">Don't have an account?</a>
        </form>
    </div>
</div>

@include('layout.footer')
