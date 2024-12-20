<?php
$message = ""; 
if($_SERVER["REQUEST_METHOD"] === "POST") {
    $day = isset($_POST['day']) ? (int)$_POST['day'] : 0;
    $month = isset($_POST['month']) ? (int)$_POST['month'] : 0;
    $year = isset($_POST['year']) ? (int)$_POST['year'] : 0;

    if(checkdate($month, $day, $year)) {
        $message = "Дата рождения указана верно: $day/$month/$year.";
    } else {
        $message = "Ошибка: введена некорректная дата. Попробуйте снова.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>>Введите дату своего рождения</h1>
        <form  action="" method="post">
         <label for="day">День:</label>
         <input type="number" id="day" name="day" min="1" max="31" required>
            <label for="month">Месяц:</label>
            <input type="number" id="month" name="month" min="1" max="12" required>
            <label for="year">Год:</label>
            <input type="number" id="year" name="year" min="1900" max="<?php echo date('Y'); ?>" required>
            <button type="submit">Проверить</button>
        </form>
        <?php if (!empty($message)): ?>
            <p class="<?php echo strpos($message, 'Ошибка') === false ? 'success' : 'error'; ?>">
                <?php echo $message; ?>
            </p>
        <?php endif; ?>
    </div>
</body>
</html>