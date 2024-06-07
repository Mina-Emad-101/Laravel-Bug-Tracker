@if ($errors->any())
    <div>
        <ul class="w-1/2 space-y-3">
            @foreach ($errors->all() as $error)
                <li class="text-red-700">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
