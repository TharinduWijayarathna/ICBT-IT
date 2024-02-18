@if ($errors->any())
    <div class="alert alert-warning" role="alert">
        <div class="font-medium text-danger">{{ __('Whoops! Something went wrong.') }}</div>

        <ul >
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
