<div class='menu'>
    <ul>
        <li><a href="?site=readers">Czytelnicy</a></li>
        <li><a href="?site=books">Książki</a></li>
        <li><a href="?site=rentals">Wypożyczenia</a></li>
    </ul>
</div>


<?php
if (!isset($_SESSION["site"]) || ($_GET["site"] != "" && $_SESSION["site"] != $_GET["site"])) 
{
    if ($_GET["site"] == "readers") $_SESSION["site"] = "readers";
    else if ($_GET["site"] == "books") $_SESSION["site"] = "books";
    else if ($_GET["site"] == "rentals") $_SESSION["site"] = "rentals";
    else $_SESSION["site"] = "readers";
}
?>