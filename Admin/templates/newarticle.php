<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Добавление новости</title>
</head>
<body>

<h3>Добавить новость</h3>

<form action="/admin/newArticle" method="post">

    <p>Заголовок (не больше 40 знаков): </p> <textarea cols="50" rows="4" name="title"></textarea> <br><br>
    <p>Текст новости (не больше 1000 знаков): </p> <textarea cols="50" rows="20" name="content"></textarea> <br><br>
    <button type="submit" name="submit">Сохранить</button>

</form>

</body>
</html>