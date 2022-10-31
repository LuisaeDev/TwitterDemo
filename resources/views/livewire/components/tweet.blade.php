<div class="tweet">
    <a class="shrink-0" href="{{ $tweet->user->profile_url }}">
        <img class="tweet__image" src="{{ $tweet->user->profile_photo_path }}" alt="User profile image">
    </a>
    
    <div class="tweet__content">
        <a class="tweet__heading group" href="{{ $tweet->user->profile_url }}">
            <span class="tweet__author-name">{{ $tweet->user->name }}</span>
            <span class="tweet__author-username">{{ $tweet->user->at_username }}</span>
            <span class="tweet__time">· {{ $tweet->created_at->diffForHumans() }}</span>
        </a>
        <div class="tweet__message">
            {{ $tweet->message }}
        </div>
        @if ($tweet->type == 'img')
            <div class="tweet__media">
                <img src="{{ $tweet->ref }}" alt="">
            </div>
        @endif
        @if ($tweet->type == 'vid')
            <div class="tweet__media">

                <iframe width="560" height="315" src="{{ $tweet->ref }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>


            </div>
        @endif
        <div class="tweet__actions">
            <a href="#" class="tweet__action group">
                <span class="tweet__action-icon">
                    <i class="fa-regular fa-comment"></i>
                </span>
                <span class="tweet__action-caption">
                    {{ $tweet->n_comments }}
                </span>
            </a>
            <a href="#" class="tweet__action group">
                <span class="tweet__action-icon">
                    <i class="fa-solid fa-retweet"></i>
                </span>
                <span class="tweet__action-caption">
                    {{ $tweet->n_retweets }}
                </span>
            </a>
            <a href="#" class="tweet__action group">
                <span class="tweet__action-icon">
                    <i class="fa-regular fa-heart"></i>
                </span>
                <span class="tweet__action-caption">
                    {{ $tweet->n_likes }}
                </span>
            </a>
            <a href="#" class="tweet__action group">
                <span class="tweet__action-icon">
                    <i class="fa-solid fa-arrow-up-from-bracket"></i>
                </span>
            </a>
        </div>
    </div>

    <div class="tweet__caret">
        <a href="#" class="tweet__options">
            <i class="fa-solid fa-ellipsis"></i>
        </a>
    </div>
</div>