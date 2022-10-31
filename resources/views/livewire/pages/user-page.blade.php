@section('title', $user->name . ' (' . $user->at_username . ')')
 
@section('content')
    @livewire('components.tweets', [ 'user' => $user ])
@endsection

@section('sidebar')
    <livewire:components.sidebar />
@endsection