<?php
/** @var \App\View\View $this */
?>


<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Админка</title>
</head>
<body>

<?php

foreach ($this->articles as $article) : ?>
    <a href="/article/oneArticle/?id=<?php echo $article->id; ?>"><h2><?php echo $article->title ?></h2></a>
    <p><?php echo $article->content ?></p>
    <?php if (!empty($article->author)) : ?>
        <p><?php echo $article->author->name ?></p>
    <?php endif; ?>

    <a href="/admin/edit/?id=<?php echo $article->id; ?>">Редактировать новость</a><br>

    <hr>
<?php endforeach; ?>

</body>
</html>