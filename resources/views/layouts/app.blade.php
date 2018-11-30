<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="userId" content="{{ Auth::check() ? Auth::user()->id : 'null' }}">
    <title>Mr. Burns Betterlife AG</title>
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">    
    <link rel="stylesheet" href="{{ URL::asset('assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700">
    <link rel="stylesheet" href="{{ URL::asset('assets/fonts/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/fonts/ionicons.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/Contact-Form-Clean.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/Header-Blue.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/Lightbox-Gallery.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/tenant_font_design.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/Team-Boxed.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/button.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/hr.css')}}">
    
    
    @yield('css')
    
    <!-- Scripts -->
    <script src="{{ URL::asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{ URL::asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/pikaday.min.js"></script>
    <script src="{{ URL::asset('assets/js/theme.js')}}"></script>
        
    
    
</head>

    <body>
        <div id="app">
            <section class="portfolio-block block-intro" style="padding: 50px;">
                <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-white portfolio-navbar gradient">
                   <div class="container"><a class="navbar-brand logo" href="/">Mr Burns Betterlife AG</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                     <div 
                         class="collapse navbar-collapse" id="navbarNav">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item" role="presentation"><a class="nav-link" href="/">Startseite</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="/rentableobjects">Objekte</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="/about">Über uns</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="/contact">Kontakt</a></li>
                            
                            @auth
                           <?php
                            $user = Auth::user();
                            if ($user->usertype_id == 2): ?> 
                         <li class="nav-item" role="presentation"><a class="nav-link" href="/myobject">Mein Objekt</a></li>
                           <?php elseif ($user->usertype_id == 1): ?>   
                         <li class="nav-item" role="presentation"><a class="nav-link" href="/manage">Verwalten</a></li>
                          <?php elseif ($user->usertype_id == 3): ?> 
                         <li class="nav-item" role="presentation"><a class="nav-link" href="/work">Bearbeiten</a></li>
                          <?php endif; ?>
                                    
                            @endauth
                            
                            @guest
                            <li class="nav-item" role="presentation"><a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i>{{ __('    Login') }}</a></li>
                            <li class="nav-item" role="presentation">@if (Route::has('register'))
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                           
                            @else
                                <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                                </li>
                            @endguest
                        </ul>
            </div>
            </div>   
            </nav>
        </section>
            
 
        <main class="py-4">
            @yield('content')
        </main>

    
    @yield('js')
    
    
                            
    <footer class="page-footer">
        <div class="container">
            <div class="links"><a href="about">Über uns</a><a href="contact">Kontakt</a><a href="rentableobjects">Objekte</a></div>
            <div class="social-icons"><a href="https://www.facebook.com" target="_blank"><i class="icon ion-social-facebook"></i></a><a href="https://www.instagram.com" target="_blank"><i class="icon ion-social-instagram-outline"></i></a><a href="https://www.twitter.com" target="_blank"><i class="icon ion-social-twitter"></i></a></div>
        </div>
    </footer>
    
    </body>
    
    
</html>