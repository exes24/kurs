<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>ХОМЯКИ В БЛЕНДЕРЕ</title>
</head>

<body>
    <x-header />
    <main>
        <section id="hero" class="d-flex justify-content-center align-items-center">
            <h1 class="m-3 text-white bg-dark p-1 opacity-75">
				ХОМЯКИ
            </h1>
        </section>

        <section class="container">
            <ul class="list-group">
                <li class="list-group-item fw-bold">Категории</li>
                @if (isset($all_courses))
                    @foreach ($course as $category)
                        <a href="category_open/{{ $category->id }}">
                            <li class="list-group-item fw-bold">{{ $category->title }}</li>
                        </a>
                    @endforeach
                @endif

            </ul>
        </section>

        <section id="courses">
            <div class="container">
                <h2 class="m-3"> Наши курсы</h2>
                <div class="d-flex">
                    @if (isset($all_courses))
                        @foreach ($all_courses as $item)
                            <div class="card" style="width: 18rem;">
                                <img src="/images/{{ $item->image }}" class="itemimg" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->title }}</h5>
                                    <p class="card-text">{{ $item->description }}</p>
                                    <p class="card-text">Стоимость курса: <b>{{ $item->cost }} ₽ </b></p>
                                    <p class="card-text">Продолжительность: <b>{{ $item->duration }} недель(-и/-я)</b>
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
            <br>
            @if (isset($all_courses))
                <div class="container w-50">{{ $all_courses->withQueryString()->links('pagination::bootstrap-5') }}
                </div>
            @endif
        </section>

        <section id="enroll">
            <div class="container">
                <form class="w-50 my-0 mx-auto" action="/enroll" method="POST">
                    @csrf
                    <h2 class="m-3">Записаться на курс</h2>
                    <div class="mb-3">
                        <label for="email" class="form-label">Введите свой email:</label>
                        <input type="email" class="form-control" id="email" name="email">
                        @error('email')
                            <div class="alert alert-danger mt-1" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Введите свой имя:</label>
                        <input type="text" class="form-control" id="name" name="name">
                        @error('name')
                            <div class="alert alert-danger mt-1" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="m-3">
                        <label for="name" class="form-label">Выберете курс</label>
                        <select class="form-select" name="course">
                            @if (isset($all_courses))
                                @foreach ($all_courses as $item)
                                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Записаться</button>
                </form>
            </div>
        </section>
    </main>

</body>

</html>
