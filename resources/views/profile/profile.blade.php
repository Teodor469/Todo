@include('layout.head')

@include('layout.navbar')

<div class="flex items-center justify-center mt-8">
    <h2 class="text-gray-100 text-3xl">Profile Page</h2>
</div>

<hr class="mt-2 w-2/5 flex items-center justify-center mx-auto border-2 rounded-full border-green-700">

@include('shared.success-message')
@include('shared.error-message')

<div class="mt-8">
    <div class="w-3/4 mx-auto bg-gray-800 rounded-2xl p-6">
        <div class="flex items-center justify-center mb-6">
            <img src="{{ Auth::user()->profile_picture }}" alt="Profile Picture" class="w-32 h-32 rounded-full shadow-lg">
        </div>
        <div class="text-center text-gray-100 mb-4">
            <h3 class="text-2xl font-semibold">{{ Auth::user()->name }}</h3>
            <p class="text-gray-400">{{ Auth::user()->email }}</p>
        </div>
        <div class="flex items-center justify-center">
            <a href="#" class="text-white py-2 px-4 rounded-xl bg-green-700">Edit Profile</a>
        </div>
    </div>
</div>

@include('layout.footer')
