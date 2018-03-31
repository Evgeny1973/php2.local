<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Редактор статьи</title>
</head>
<body>

<h3>Редактировать статью</h3>

<form action="" method="post"><br><br>
    Название:<br> <textarea cols="50" rows="4" name="title"><?php echo $update->title; ?></textarea> <br><br>
    Текст:<br> <textarea cols="50" rows="10" name="content"><?php echo $update->content; ?></textarea><br><br>
    <button type="submit" name="submit">Сохранить</button>
</form>

</body>
</html>