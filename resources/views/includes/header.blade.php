<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="{{ route('home') }}" class="nav-link px-2 text-secondary">Главная</a></li>
                <li><a href="{{ route('articles.create') }}" class="nav-link px-2 text-white">Создать статью</a></li>
                <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
                <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
                <li><a href="#" class="nav-link px-2 text-white">About</a></li>
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
            </form>

            <div class="text-end">
                @auth
                    <a href="{{ route('user.logout') }}"><button type="button" class="btn btn-warning">Выйти</button></a>
                    @if(Route::current()->getName() != 'user.admin')
                        <a href="{{ route('user.admin') }}"><button type="button" class="btn btn-primary">Админка</button></a>
                    @endif
                @endauth
                @guest
                <a href="{{ route('user.login') }}"><button type="button" class="btn btn-outline-light me-2">Вход</button></a>
                <a href="{{ route('user.registration') }}"><button type="button" class="btn btn-warning">Регестрация</button></a>
                @endguest
            </div>
        </div>
    </div>
</header>
