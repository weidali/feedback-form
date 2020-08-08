<?php 
    session_start();
    require_once 'vendor/connect.php'; 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Обратная связь</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>

<!--    Блок вывода задачи    -->
<div class="task">
    <?php require_once 'task.html'; ?>
</div>

<!--    Блок вывода контента    -->
<div class="content">
    <?php
        // если есть сообщение в глобальной переменной $_SESSION, выводим сообщение
        if ($_SESSION['alert']) {
            echo '<p class="msg">' . $_SESSION['alert'] . '</p>';
            echo '<br><a class="btn" href="' . $_SERVER['PHP_SELF'] . '">Обновить</a>';
        }
        // если нет сообщения в глобальной переменной $_SESSION, выводим формму
        else {
            require_once 'form.php';
        }
        // уничтожаем сообщение в глобальной переменной $_SESSION
        unset($_SESSION['alert']);
    ?>
</div>

<footer>
    @CopyLeft <a href="https://github.com/weidali/feedback-form.git" target="_blank" >src на GitHub</a>
</footer>
<hr>
<!--    Блок вывода данных из БД    -->
<table>
    <p>Отображение данных в БД</p>
    <tr>
        <th>ID</th>
        <th>Имя</th>
        <th>Email</th>
        <th>Текст сообщения</th>
        <th>Дата сообщения &#9660;</th>
    </tr>
    <?php
        /* Формируем sql-запрос */
        $sql = "SELECT * FROM `feedback` ORDER BY `date` DESC";
        $data = mysqli_query($connect, $sql);
        // преобразовываем данные в масив и перебираем значения по ключам
        while ($row = mysqli_fetch_assoc($data)) {
            ?>
            <tr>
                <td><?= $row["id"]; ?></td>
                <td><?= $row["name"]; ?></td>
                <td><?= $row["email"]; ?></td>
                <td><?= $row["message"]; ?></td>
                <td><?= $row["date"]; ?></td>
            </tr>
            <?php
        }
        /* удаление выборки */
        mysqli_free_result($result);
    ?>
</table>
</body>
</html>