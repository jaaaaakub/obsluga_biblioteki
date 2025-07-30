<div class="main_form_wrapper">
    <form class="main_form" action="index.php">
        <h2>Wypożycz:</h2>

        <label for="id_czytelnika">Id czytelnika:</label>
        <input type="number" id="id_czytelnika" name="id_czytelnika" placeholder="">

        <label for="id_książki">Id książki:</label>
        <input type="number" id="id_książki" name="id_książki" placeholder="">

        <label for="data_wypożyczenia">Data wypożyczenia: </label>
        <input type="date" id="data_wypożyczenia" name="data_wypożyczenia" placeholder="">

        <label for="termin_oddania">Termin oddania: </label>
        <input type="date" id="termin_oddania" name="termin_oddania" placeholder="">

        <input type="submit" value="Wypożycz">
    </form>
</div>
<br>

<?php
require 'functions.php';

$conn = open_db_conn();

check_remove($conn, "wypożyczenia", "id_wypożyczenia");

$rentals_table_to_show_query = "SELECT
    w.id_wypożyczenia,
    c.imię,
    c.nazwisko,
    k.tytuł,
    w.data_wypożyczenia,
    w.termin_oddania,
    w.termin_oddania - CURRENT_DATE AS dni_do_oddania
FROM
    wypożyczenia w
JOIN
    czytelnicy c ON w.id_czytelnika = c.id_czytelnika
JOIN
    książki k ON w.id_książki = k.id_książki
ORDER BY
    w.id_wypożyczenia;
";
$rentals_table_query = "SELECT * FROM wypożyczenia ORDER BY id_wypożyczenia ASC;";

$rentals_table_to_show = get_table($conn, $rentals_table_to_show_query);
$rentals_table = get_table($conn, $rentals_table_query);


if(isset_nonempty(["id_czytelnika", "id_książki", "data_wypożyczenia", "termin_oddania"])) 
{
    insert_into($conn, "wypożyczenia", $rentals_table);
    $rentals_table_to_show = get_table($conn, $rentals_table_to_show_query);
}

print_table($rentals_table_to_show);

pg_close($conn); 
?>