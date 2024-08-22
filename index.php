<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <h1>Try to guess the word</h1>
    <form action="#" method="post">
        <label for="attempt">Your attempt:</label><br>
        <input type="text" id="attempt" name="attempt" required><br><br>
        <input type="submit" value="send">
    </form>
    <?php require_once 'script.php'; ?>
</body>
</html>
