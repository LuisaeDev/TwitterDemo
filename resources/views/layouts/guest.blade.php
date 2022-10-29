<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://kit.fontawesome.com/86cd5efa39.js" crossorigin="anonymous"></script>
    </head>
    <body>

        {{-- Page --}}
        <div class="page">

            {{-- Page Left Side --}}
            <div class="page__left-side">

                {{-- Mainbar --}}
                <header class="mainbar">

                    {{-- Mainbar Content --}}
                    <div class="mainbar__content">

                        {{-- Home --}}
                        <a href="#" class="mainbar__home">
                            <i class="fa-brands fa-twitter"></i>
                        </a>

                        {{-- Nav --}}
                        <nav class="mainbar__nav sm:mb-4 xl:mb-6">
                        
                            <a href="#" class="mainbar__item mainbar__item--active group">
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


                            {{-- <a href="#" class="block">Notificaciones</a>
                            <a href="#" class="block">Mensajes</a>
                            <a href="#" class="block">Guardados</a>
                            <a href="#" class="block">Listas</a>
                            <a href="#" class="block">Perfil</a>
                            <a href="#" class="block">Más opciones</a> --}}
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
                    <a href="#" class="mainbar__bottom">
                        
                        <div class="shrink-0">
                            <img class="mainbar__bottom-image" src="https://www.luisae.dev/wp-content/uploads/2022/10/img_luis-profile.png" alt="User profile image">
                        </div>

                        <div class="mainbar__bottom-captions">
                            <div class="mainbar__bottom-name">Luis Aguilar Espinoza</div>
                            <div class="mainbar__bottom-username">@LuisaeDev</div>
                        </div>

                        <div class="mainbar__bottom-caret">
                            <i class="fa-solid fa-ellipsis"></i>
                        </div>

                    </a>

                </header>

            </div>

            {{-- Page Right Side --}}
            <div class="page__right-side">

                {{-- Feed --}}
                <div class="feed">

                    {{-- Feed Top --}}
                    <div class="feed__top sticky top-0">
                        Inicio
                    </div>

                    {{-- Feed Content --}}
                    <div class="feed__content">

                        <div class="feed__block">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repudiandae, veniam, dolorum ut a libero ipsum similique cum dignissimos rerum, excepturi iure soluta in voluptas. Aperiam enim minima debitis culpa. Id.
                        </div>

                        <div class="feed__block">

                            <div class="tweet">
                                <div class="shrink-0">
                                    <img class="tweet__image" src="https://www.luisae.dev/wp-content/uploads/2022/10/img_luis-profile.png" alt="User profile image">
                                </div>
                                
                                <div class="tweet__content">
                                    <div class="tweet__heading">
                                        <span class="tweet__author-name">Luis Aguilar</span>
                                        <span class="tweet__author-username">@LuisaeDev</span>
                                        <span class="tweet__time">· 17min</span>
                                    </div>
                                    <div class="tweet__message">
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laboriosam quia ad cumque quasi, architecto excepturi? Consequatur nulla officia inventore dolor, laboriosam quasi aliquam, unde cupiditate voluptatibus, cumque eligendi dignissimos natus?
                                    </div>
                                    <div class="tweet__media">
                                        <img src="https://pbs.twimg.com/media/FgQnjYFXkAAQspN?format=jpg&name=medium" alt="">
                                    </div>
                                    <div class="tweet__actions">
                                        <a href="#" class="tweet__action group">
                                            <span class="tweet__action-icon">
                                                <i class="fa-regular fa-comment"></i>
                                            </span>
                                            <span class="tweet__action-caption">
                                                20
                                            </span>
                                        </a>
                                        <a href="#" class="tweet__action group">
                                            <span class="tweet__action-icon">
                                                <i class="fa-solid fa-retweet"></i>
                                            </span>
                                            <span class="tweet__action-caption">
                                                20
                                            </span>
                                        </a>
                                        <a href="#" class="tweet__action group">
                                            <span class="tweet__action-icon">
                                                <i class="fa-regular fa-heart"></i>
                                            </span>
                                            <span class="tweet__action-caption">
                                                20
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

                        </div>

                        <div class="feed__block">
                            {{ $slot }}
                        </div>

                    </div>

                </div>

                {{-- Sidebar --}}
                <div class="sidebar basis-2/5">
                </div>

            </div>

        </div>

    </body>
</html>
