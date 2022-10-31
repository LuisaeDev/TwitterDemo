@foreach ($tweets as $tweet)
    <div class="feed__block">
        @livewire('components.tweet', ['tweet' => $tweet])
    </div>
@endforeach

{{ $tweets->withQueryString()->onEachSide(0)->links() }}