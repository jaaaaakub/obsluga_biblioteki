<div class="main_form_wrapper">
    <form class="main_form" action="index.php">
        <h2>Czytelnik:</h2>

        <label for="imię">Imię:</label>
        <input type="text" id="imię" name="imię" placeholder="">

        <label for="nazwisko">Nazwisko:</label>
        <input type="text" id="nazwisko" name="nazwisko" placeholder="">

        <label for="data_urodzenia">Data urodzenia: </label>
        <input type="date" id="data_urodzenia" name="data_urodzenia" placeholder="">

        <input class="readers_submit" type="submit" name="action" value="Dodaj">
        <input class="readers_submit" type="submit" name="action" value="Wyszukaj">
    </form>
</div>
<br>

<?php
require 'functions.php';

$conn = open_db_conn();

check_remove($conn, "czytelnicy", "id_czytelnika");

$readers_table_query = "SELECT * FROM czytelnicy ORDER BY id_czytelnika ASC;";
$readers_table = get_table($conn, $readers_table_query);

if($_GET["action"] == "Dodaj")
{
    if(isset_nonempty(["imię", "nazwisko", "data_urodzenia"])) 
    {
        insert_into($conn, "czytelnicy", $readers_table);
        $readers_table = get_table($conn, $readers_table_query);
    }
}
else if ($_GET["action"] == "Wyszukaj")
{
    $first_name = $_GET["imię"];
    $last_name = $_GET["nazwisko"];
    $date_of_birth = $_GET["data_urodzenia"];

    if ($date_of_birth == "") $select_query = "SELECT * FROM czytelnicy WHERE imię='$first_name' OR nazwisko='$last_name' ORDER BY id_czytelnika ASC;";
    else $select_query = "SELECT * FROM czytelnicy WHERE imię='$first_name' OR nazwisko='$last_name' OR data_urodzenia='$date_of_birth' ORDER BY id_czytelnika ASC;";

    $readers_table = get_table($conn, $select_query);
}

print_table($readers_table);

pg_close($conn); 
?>