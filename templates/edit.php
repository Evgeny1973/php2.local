<?php
/** @var \App\View\View $this */
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Редактор новости</title>
</head>
<body>

<h3>Редактировать новость</h3>

<form action="/update.php" method="post"><br><br>
    Название:<br> <textarea cols="50" rows="4" name="title"><?php echo $this->article->title; ?></textarea> <br><br>
    Текст:<br> <textarea cols="50" rows="10" name="content"><?php echo $this->article->content; ?></textarea><br><br>
    <input type="hidden" name="id" value="<?php echo $this->article->id; ?>">
    <input type="hidden" name="author_id" value="<?php echo $this->article->author_id; ?>">
    <button type="submit" name="submit">Сохранить</button>
</form>

</body>
</html>