<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Добавить новость</title>
</head>
<body>

<form action="/create.php" method="post"><br><br>
    Название: <input type="text" name="title"><br><br>
    Текст:<br> <textarea cols="30" rows="10" name="content"></textarea><br><br>
    <button type="submit" name="submit">Сохранить</button>
</form>

</body>
</html>
