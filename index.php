<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <style>
        p, button {
            margin-bottom: 10px;
            margin-top: 10px;
        }
        .form {
            width: 420px;
            padding: 20px;
            margin: 40px auto;
            -webkit-box-shadow: 0px 0px 25px 0px rgba(34, 60, 80, 0.15);
            -moz-box-shadow: 0px 0px 25px 0px rgba(34, 60, 80, 0.15);
            box-shadow: 0px 0px 25px 0px rgba(34, 60, 80, 0.15);
        }
    </style>
    <?php 
    if (isset($_POST['submit'])) {
        echo "<style>.form {display: none;}</style>";
        echo "<h5>Переданные анкетные данные</h5>";
        $login = htmlentities($_POST['login']);
        echo "<p>Логин: $login</p>";
        $email = htmlentities($_POST['email']);
        echo "<p>Адрес электронной почты: $email</p>";
        $password = htmlentities($_POST['password']);
        echo "<p>Пароль: $password</p>";
        $numbers = $_POST['numbers'];
        echo "<p>Количество изученных языков программирования - $numbers:</p>";
        $langs = $_POST['langs'];
        foreach ($langs as $lang) {
            echo "<p>$lang;</p>";
        }
        if (isset($_POST['framework'])) {
            $framework = $_POST['framework'];
            echo "<p>Предпочитаемый фреймворк: $framework</p>";
        } else echo "<p>Фреймворк не выбран!</p>";

        if ($_FILES['file']['error'] == UPLOAD_ERR_OK) {
            if (!is_dir('downloads')) {
                mkdir('downloads');
            }
            if (is_writable('downloads')) {
                $name = $_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'], "downloads/$name");
                echo "Файл $name загружен";
            }
        } else {
            echo 'Файл не загружен';
        }    

    }
    ?>
    <div class="container">
        <div class="form">
            <h3>Анкета пользователя</h3>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="login" class="form-label">Логин</label>
                    <input type="text" name="login" class="form-control" required minlength="3">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Электронная почта</label>
                    <input type="email" name="email" class="form-control" aria-describedby="emailHelp" required minlength="3">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password" name="password" class="form-control" required minlength="3">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="">Загрузить файл (фото или резюме)</label>
                    <input class="form-input" type="file" name="file" size="10">
                </div>
                <p>Сколько языков программирования вы изучили?</p>
                <select name="numbers" class="form-select form-select-sm" aria-label="Small select example">
                    <option selected value="1">Один</option>
                    <option value="2">Два</option>
                    <option value="3">Три</option>
                </select>
                <p>Какие языки программирования вы изучили?</p>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="langs[]" value="JavaScript" checked>
                    <label class="form-check-label" for="langs[]">
                        JavaScript
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="langs[]" value="PHP">
                    <label class="form-check-label" for="langs[]">
                        PHP
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="langs[]" value="Python">
                    <label class="form-check-label" for="langs[]">
                        Python
                    </label>
                </div>
                <p>Какой фреймворк вы предпочитаете?</p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="framework" value="Angular">
                    <label class="form-check-label" for="framework">
                        Angular
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="framework" value="React">
                    <label class="form-check-label" for="framework">
                        React
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="framework" value="VUE">
                    <label class="form-check-label" for="framework">
                        VUE
                    </label>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Отправить</button>
            </form>
        </div>
    </div>
</body>
</html>