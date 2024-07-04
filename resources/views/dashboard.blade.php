@foreach ($users as $user)
        
        
        @if ($user['age'] > 18)
            <h1> {{ $user['name']}} </h1>
            <h2> {{ $user['age']}} </h2>
            <hr>
        @endif

@endforeach

@copyright {{ date('Y') }}