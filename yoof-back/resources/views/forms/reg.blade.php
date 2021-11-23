<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <title>Document</title>
    <style>
        .register-photo {
            background: #f1f7fc;
            padding: 80px 0;
        }

        .register-photo .form-container {
            display: table;
            max-width: 900px;
            width: 90%;
            margin: 0 auto;
        }

        .register-photo form {
            display: table-cell;
            width: 400px;
            background-color: #ffffff;
            padding: 40px 60px;
            color: #505e6c;
        }

        @media (max-width:991px) {
            .image form {
                padding: 40px;
            }
        }

        .register-photo form h2 {
            font-size: 24px;
            line-height: 1.5;
            margin-bottom: 30px;
        }

        .register-photo form .form-control {
            background: #f7f9fc;
            border: none;
            border-bottom: 1px solid #dfe7f1;
            border-radius: 0;
            box-shadow: none;
            outline: none;
            color: inherit;
            text-indent: 6px;
            height: 40px;
        }

        .register-photo form .form-check {
            font-size: 13px;
            line-height: 20px;
        }

        .register-photo form .btn-primary {
            background: #f4476b;
            border: none;
            border-radius: 4px;
            padding: 11px;
            box-shadow: none;
            margin-top: 35px;
            text-shadow: none;
            outline: none !important;
        }

        .register-photo form .btn-primary:hover, .register-photo form .btn-primary:active {
            background: #eb3b60;
        }

        .register-photo form .btn-primary:active {
            transform: translateY(1px);
        }

        .register-photo form .already {
            display: block;
            text-align: center;
            font-size: 12px;
            color: #6f7a85;
            opacity: 0.9;
            text-decoration: none;
        }

        .image {
            display: block;
            width: 80%;
            margin-left: auto;
            margin-right: auto;
            height: 100%;
        }
    </style>
</head>
<body>
<section class="register-photo">
    <div class="form-container"><img class="image" src="{{ asset('img/yoof.png') }}">
        <form id="reg" method="post">
            <h2 class="text-center"><strong>Завершите регистрацию</strong></h2>
            <div class="mb-3">
                <input class="form-control" type="text" name="name" data-bs-toggle="tooltip" data-bss-tooltip="" placeholder="Фамилия" required="" minlength="4" title="Введите фамилию">
            </div>
            <div class="mb-3"><input class="form-control" type="text" name="surname" data-bs-toggle="tooltip" data-bss-tooltip="" placeholder="Имя" required="" title="Введите имя"></div>
            <div class="mb-3"><input class="form-control" type="text" name="patronymic" data-bs-toggle="tooltip" data-bss-tooltip=""  placeholder="Отчество" title="Введите отчество" required=""></div>
            <div class="mb-3"><input class="form-control" type="text" name="phone" data-bs-toggle="tooltip" data-bss-tooltip=""  placeholder="Номер Телефона" required="" title="Введите номер телефона"></div>
            <div class="mb-3"><input class="form-control" type="email" name="email" value="{{ $user['email'] }}" data-bs-toggle="tooltip" data-bss-tooltip=""  placeholder="Email" title="Введите почту" required=""></div>
            <div class="mb-3"><input class="form-control" type="password" name="password" data-bs-toggle="tooltip" data-bss-tooltip=""  placeholder="Пароль" title="Введите пароль" required=""></div>
            <div class="mb-3"><input class="form-control" type="password" name="passwordRepeat" data-bs-toggle="tooltip" data-bss-tooltip=""  placeholder="Повторите пароль" title="Повторите пароль" required=""></div>
            <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit" style="background-color: chartreuse;color: var(--bs-gray-900);">Зарегистрироваться</button></div>
        </form>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        let tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bss-tooltip]'));
        let tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        })
    }, false);
    let form = document.getElementById('reg')
    form.addEventListener('submit', function(e) {
        e.preventDefault()
        let t = e.target
        console.log("SUBMIT")
        t.dispatchEvent(e)
    });
</script>
</body>
</html>
