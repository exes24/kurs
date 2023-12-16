<header>
    <link rel="stylesheet" href="css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="/">ХОМЯКИ В БЛЕНДЕРЕ</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">О нас</a>
                    </li>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('register') }}">Регистрация</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/login">Вход</a>
                        </li>
                    @endguest
                    @auth
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="logout">Выход</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Курсы</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Записаться</a>
                        </li>
                        <li class="nav-item">
                            <p class="nav-link">{{ Auth::user()->name }}</p>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</header>
