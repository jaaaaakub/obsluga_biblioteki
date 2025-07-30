<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="text/html; charset=utf-8">
        <title>Obsługa biblioteki</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <div class='main'>
            <?php session_start(); include 'menu.php'; ?>
            <br>
            
            <?php
            if ($_SESSION["site"] == "readers") include 'readers.php';
            else if ($_SESSION["site"] == "books") include 'books.php';
            else if ($_SESSION["site"] == "rentals") include 'rentals.php';
            else include 'readers.php';
            ?>

        </div>

        <script src="script.js"></script>
    </body>
</html>
