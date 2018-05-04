<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Добавление новости</title>
</head>
<body>

<form action="/admin/newarticle" method="post">

    <p>Заголовок: </p> <br> <input type="text" name="title"> <br><br>
    <p>Текст новости: </p> <br> <textarea cols="20" rows="20" name="context"></textarea> <br><br>
<button type="submit" name="submit">Сохранить</button>

</form>



</body>
</html>