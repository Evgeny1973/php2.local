<?php
/** @var \App\View\View $this */
?>


<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Админка</title>
</head>
<body>

<h3>Добавить статью</h3>

<form action="/create.php" method="post"><br><br>
    Название: <input type="text" name="title"><br><br>
    Текст:<br> <textarea cols="30" rows="10" name="content"></textarea><br><br>
    <button type="submit" name="submit">Сохранить</button>
</form>

<?php

foreach ($this->articles as $article) : ?>
    <h2><?php echo $article->title ?></h2>
    <p><?php echo $article->content ?></p>

    <a href="/update.php?id=<?php echo $article->id ?>">Редактировать статью</a><br>
    <a href="/delete.php?id=<?php echo $article->id ?>">Удалить статью</a>

    <hr>
<?php endforeach; ?>

</body>
</html>