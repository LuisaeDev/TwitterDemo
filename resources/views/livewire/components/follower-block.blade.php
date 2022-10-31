<div class="followers_item">


    <div class="shrink-0">
        <img class="followers_item-image" src="{{ $user->profile_photo_path }}" alt="">
    </div>
    
    <div class="followers_item-captions">
        <a href="{{ $user->profile_url }}">
            <div class="followers_item-name">{{ $user->name }}</div>
            <div class="followers_item-username">{{ $user->at_username }}</div>
        </a>
    </div>
    
    <div class="followers_item-action">
        @if ($following)
            <a href="#" wire:click.prevent="unfollow">Dejar de seguir</a>
        @else
            <a href="#" wire:click.prevent="follow">Seguir</a>
        @endif
    </div>

</div>