@section('title', 'Inicio')
 
@section('content')
    @livewire('components.feed', [ 'user' => $user ])
@endsection

@section('sidebar')
    <livewire:components.sidebar />
@endsection
 