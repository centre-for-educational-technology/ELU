@if (count($errors) > 0)
    <!-- Form Error List -->
    <div class="alert alert-danger">
        <strong>Whoops! Something went wrong!</strong>

        <br><br>
        
        <ul>
            @foreach ($errors->all() as $error)
                
                @if (strpos($error, 'All fields are required') !== false)
                    <li>{{ $error }}</li>
                @break
                @endif

                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
