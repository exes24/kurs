<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ХОМЯКИ В БЛЕНДЕРЕ</title>
    <link rel="stylesheet" href="css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <style>
        #hero {
            width: 100%;
            height: 80vh;
            overflow: hidden;
            background-image: url(/images/hero.jpeg);
            background-position: 50% 20%;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .card-block {
            height: 150px;
            overflow: hidden;
        }

        a>img {
            width: 25px;
        }

        .form_ride {
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .form_ride input {
            width: 90%;
            margin: 5%;
            background-color: rgba(255, 255, 255);
            border: none;
            border-bottom: 2px solid #000000;
            color: #000000;
            font-size: 15px;
            padding-top: 2%;
        }

        .wrap {
            width: 40%;
        }

        .wr_container {
            width: 90%;
            display: flex;
            justify-content: space-evenly;
        }
    </style>
</head>

<body>
    <x-header />
    <main>
        <section>
            <div class="container">
                <h2 class=""m-3> Список заявок</h2>
                <table class=table>
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Email</th>
                            <th scope="col">Имя клиента</th>
                            <th scope="col">Курс</th>
                            <th scope="col">Дата заявки</th>
                            <th scope="col">Статус заявки</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($applications as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->course_id }}</td>
                                <td>{{ $item->created_at }}</td>

                                <td>{{ $item->is_confirm == 0 ? 'Неподтверждена' : 'Подтверждена' }}</td>
                                @if ($item->is_confirm == 0)
                                    <td><a href="/application/{{ $item->id }}/confirm"><img
                                                src="/images/free-icon-check-1828640.png" alt=""></a></td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="wr_container">
                    <div class="wrap">
                        <form action="/add_courses" method="POST" class="form_ride">
                            @csrf
                            <input type="text" name="title" placeholder="Название курса">
                            @error('title')
                                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                            @enderror
                            <input type="text" name="description" placeholder="Описание">
                            @error('description')
                                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                            @enderror
                            <input type="text" name="cost" placeholder="Стоимость">
                            @error('cost')
                                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                            @enderror
                            <input type="text" name="duration" placeholder="Продолжительность">
                            @error('duration')
                                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                            @enderror
                            <input type="file" name="image">
                            <select name="category_id">
                                @foreach ($categories as $ite)
                                    <option value="{{ $ite->id }}">{{ $ite->title }}</option>
                                @endforeach
                            </select>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Закрыть</button>
                                <button type="submit" class="btn btn-primary">Подтвердить</button>
                            </div>
                        </form>
                    </div>

                    <div class="wrap">
                        <button class="btn-sigin" type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal"> Добавить категорию </button>
                        <!-- Модальное окно -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Бронирование тура</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Закрыть"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="add_category" method="POST" class="form_ride">
                                            @csrf
                                            <input type="text" name="title" placeholder="Название категории">
                                            @error('title')
                                                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                            @enderror
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Закрыть</button>
                                                <button type="submit" class="btn btn-primary">Подтвердить</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </main>
</body>

</html>
