<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Table</title>
</head>
<body>

<a href="/">На главную</a>
<h3>
    <a href="/Admin/newArticle">Создать новость</a>
</h3>
<hr>

<h1>Список новостей</h1>

<table border="1">
    <tr style="background-color: azure">
        <th>№</th>
        <th>Заголовок</th>
        <th>Содержимое</th>
        <th>Автор</th>
        <th>Action</th>
    </tr>
    <?php foreach ($this->articles as $article): ; ?>
        <tr>
            <td><?php echo $article['id']; ?></td>
            <td><?php echo $article['title']; ?></td>
            <td><?php echo $article['content']; ?></td>
            <td><?php echo $article['author_id']->name ?? null; ?></td>
            <td>
                <a href="/Admin/edit/?id=<?php echo $article['id']; ?>">Редактировать</a>
                <a href="/Admin/delete/?id=<?php echo $article['id']; ?>">Удалить</a>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>

