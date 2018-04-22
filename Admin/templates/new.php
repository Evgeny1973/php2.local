<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Добавить новость</title>
</head>
<body>


<form action="/Admin/newArticle" method="post"><br><br>
    Название: <input type="text" name="title"><br><br>
    Текст:<br> <textarea cols="30" rows="10" name="content"></textarea><br><br>
    <button type="submit" name="submit">Сохранить</button>
</form>

</body>
</html>
