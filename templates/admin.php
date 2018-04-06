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

<a href="/templates/create.php">Добавить новость</a>

<?php

foreach ($this->articles as $article) : ?>
    <a href="/article.php?id=<?php echo $article->id; ?>"><h2><?php echo $article->title ?></h2></a>
    <p><?php echo $article->content ?></p>
    <?php if (!empty($article->author)) : ?>
        <p><?php echo $article->author->name ?></p>
    <?php endif; ?>

    <a href="/edit.php?id=<?php echo $article->id; ?>">Редактировать статью</a><br>
    <a href="/delete.php?id=<?php echo $article->id; ?>">Удалить статью</a>

    <hr>
<?php endforeach; ?>

</body>
</html>