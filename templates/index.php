<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Новости</title>
</head>
<body>

<?php
foreach ($this->articles as $article) : ?>
    <h2><a href="/article.php?id=<?php echo $article->id; ?>"><?php echo $article->title; ?></a></h2>
    <p><?php echo $article->content; ?></p>

    <?php if (!empty($article->author_id)) : ?>
        <strong><?php echo $article->author->name; ?> </strong>
    <?php endif; ?>

<?php endforeach; ?>

</body>
</html>