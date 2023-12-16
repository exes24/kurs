<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ХОМЯКИ В БЛЕНДЕРЕ</title>
    <link rel="stylesheet" href="css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</head>

<body>
    <x-header />
    <main>

        <section id="courses">
            <div class="container">
                <h2 class="m-3"> Наши курсы по категории - {{ $category->title }}</h2>
                <div class="d-flex              ">
                    @foreach ($courses as $item)
                        <div class="card" style="width: 18rem;">
                            <img src="/images/{{ $item->image }}" class="itemimg" alt="ИЗОБРАЖЕНИЯ НЕТ">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->title }}</h5>
                                <p class="card-text">{{ $item->description }}</p>
                                <p class="card-text">Стоимость курса: <b>{{ $item->cost }} ₽ </b></p>
                                <p class="card-text">Продолжительность: <b>{{ $item->duration }} недель(-и/-я)</b></p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <br>
            <div class="container w-50"> {{ $courses->withQueryString()->links('pagination::bootstrap-5') }}</div>

        </section>
