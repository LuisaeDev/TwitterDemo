<header class="mainbar">

    {{-- Mainbar Content --}}
    <div class="mainbar__content">

        {{-- Home --}}
        <a href="{{ route('home') }}" class="mainbar__home">
            <i class="fa-brands fa-twitter"></i>
        </a>

        {{-- Nav --}}
        <nav class="mainbar__nav sm:mb-4 xl:mb-6">
        
            <a href="{{ route('home') }}" class="mainbar__item mainbar__item--active group">
                <div class="mainbar__item-inner">
                    <div class="mainbar__item-icon">
                        <i class="fa-solid fa-house-user"></i>
                        <span class="mainbar__item-dot"></span>
                    </div>
                    <div class="mainbar__item-text">
                        Inicio
                    </div>
                </div>
            </a>

            <a href="#" class="mainbar__item mainbar__nav--hidden-mobile group">
                <div class="mainbar__item-inner">
                    <div class="mainbar__item-icon">
                        <i class="fa-solid fa-hashtag"></i>
                    </div>
                    <div class="mainbar__item-text">
                        Explorar
                    </div>
                </div>
            </a>

            <a href="#" class="mainbar__item mainbar__nav--only-mobile group">
                <div class="mainbar__item-inner">
                    <div class="mainbar__item-icon">
                        <i class="fa-solid fa-search"></i>
                    </div>
                    <div class="mainbar__item-text">
                        Buscar
                    </div>
                </div>
            </a>

            <a href="#" class="mainbar__item group">
                <div class="mainbar__item-inner">
                    <div class="mainbar__item-icon">
                        <i class="fa-regular fa-bell"></i>
                    </div>
                    <div class="mainbar__item-text">
                        Notificaciones
                    </div>
                </div>
            </a>

            <a href="#" class="mainbar__item group">
                <div class="mainbar__item-inner">
                    <div class="mainbar__item-icon">
                        <i class="fa-regular fa-envelope"></i>
                    </div>
                    <div class="mainbar__item-text">
                        Mensajes
                    </div>
                </div>
            </a>

            <a href="#" class="mainbar__item mainbar__nav--hidden-mobile group">
                <div class="mainbar__item-inner">
                    <div class="mainbar__item-icon">
                        <i class="fa-regular fa-bookmark"></i>
                    </div>
                    <div class="mainbar__item-text">
                        Guardados
                    </div>
                </div>
            </a>

            <a href="#" class="mainbar__item mainbar__nav--hidden-mobile group">
                <div class="mainbar__item-inner">
                    <div class="mainbar__item-icon">
                        <i class="fa-regular fa-rectangle-list"></i>
                    </div>
                    <div class="mainbar__item-text">
                        Listas
                    </div>
                </div>
            </a>

            <a href="#" class="mainbar__item mainbar__nav--hidden-mobile group">
                <div class="mainbar__item-inner">
                    <div class="mainbar__item-icon">
                        <i class="fa-regular fa-user"></i>
                    </div>
                    <div class="mainbar__item-text">
                        Perfil
                    </div>
                </div>
            </a>

            <a href="#" class="mainbar__item mainbar__nav--hidden-mobile group">
                <div class="mainbar__item-inner">
                    <div class="mainbar__item-icon">
                        <i class="fa-solid fa-ellipsis"></i>
                    </div>
                    <div class="mainbar__item-text">
                        Más opciones
                    </div>
                </div>
            </a>

        </nav>

        {{-- Tweet --}}
        <a href="#" class="mainbar__tweet">
            <span class="mainbar__tweet-icon">
                <i class="fa-solid fa-pen-nib"></i>
            </span>
            <span class="mainbar__tweet-text">Twittear</span>
        </a>

    </div>

    {{-- Mainbar Bottom --}}
    <a href="{{ $user->profile_url }}" class="mainbar__bottom">
        
        <div class="shrink-0">
            <img class="mainbar__bottom-image" src="{{ $user->profile_photo_path }}" alt="User profile image">
        </div>

        <div class="mainbar__bottom-captions">
            <div class="mainbar__bottom-name">{{ $user->name }}</div>
            <div class="mainbar__bottom-username">{{ $user->at_username }}</div>
        </div>

        <div class="mainbar__bottom-caret">
            <i class="fa-solid fa-ellipsis"></i>
        </div>

    </a>

</header>
