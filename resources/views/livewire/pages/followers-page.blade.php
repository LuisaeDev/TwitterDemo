@section('title', 'Followers')
 
@section('content')


    <div class="feed__block">

        <h3>Followers</h3>

        @foreach ($user->following as $follower)
        
            @livewire('components.follower-block', ['user' => $follower])

        @endforeach

    </div>

@endsection

@section('sidebar')
    <livewire:components.sidebar />
@endsection