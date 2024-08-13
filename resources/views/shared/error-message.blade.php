@if ($errors->any())
    <div id="validation-errors"
        class="flex items-center bg-red-600 text-white p-4 rounded-lg shadow-md mt-10 w-1/4 mx-auto">
        <ul class="mx-auto">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('error'))
    <div class="flex items-center bg-red-600 text-white p-4 rounded-lg shadow-md mt-10 w-1/4 mx-auto">
        <div class="mx-auto">
            {{ session('error') }}
        </div>
    </div>
@endif
