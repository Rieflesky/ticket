<div class="top-header-area " id="sticker">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 text-center">
                <div class="main-menu-wrap">
                    <!-- logo -->
                    <div class="site-logo">
                        <a href={{ route("index") }}>
                            <img src="img/Logo1.png" alt="" style="width: 250px; height: 170px; auto;">
                        </a>
                    </div>
                    <!-- logo -->

                    <!-- menu start -->
                    <nav class="main-menu">
                        <ul>
                            <br>
                            <br>
                            <li class="current-list-item"><a href="{{ route("index") }}" style="font-size: 20px;">Home</a>
                            </li>
                            <li><a href={{ route("index") }} style="font-size: 20px;">About</a></li>
                            <li><a href={{ route("index") }} style="font-size: 20px;">Contact</a></li>

                            @if (Route::has('login'))

                            @auth
                            
                            <li>
                                <div class="header-icons">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="logout-button">Logout</button>
                                </form>
                                </div>
                            </li>
                            
                            @else

                            <li>
                                <div class="header-icons">
                                    <a href="{{ route('login') }}">Login</a>
                                    <a href="{{ route('register') }}">Register</a>
                                </div>
                            </li>

                            @endauth

                            @endif
                        </ul>
                    </nav>
                    <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                    <div class="mobile-menu"></div>
                    <!-- menu end -->
                </div>
            </div>
        </div>
    </div>
</div>