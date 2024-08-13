@if (session()->has('success'))
    <div class="flex items-center bg-green-600 text-white p-4 rounded-lg shadow-md mt-10 w-1/4 mx-auto">
        <p class=" mx-auto"> {{ session('success') }} </p>
    </div>
@endif
