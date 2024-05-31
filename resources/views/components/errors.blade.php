@if ($errors->any())
    <div>
        <ul class="w-1/2 space-y-5">
            @foreach ($errors->all() as $error)
                <li class="p-8 border-2 border-red-700 text-red-700 bg-red-200 rounded-lg">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
