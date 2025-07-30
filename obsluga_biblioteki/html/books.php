<div class="main_form_wrapper">
    <form class="main_form" action="index.php">
        <h2>Dodaj książkę:</h2>

        <label for="tytuł">Tytuł:</label>
        <input type="text" id="tytuł" name="tytuł" placeholder="">

        <label for="autor">Autor:</label>
        <input type="text" id="autor" name="autor" placeholder="">

        <label for="data_wydania">Data wydania: </label>
        <input type="date" id="data_wydania" name="data_wydania" placeholder="">

        <input type="submit" value="Dodaj">
    </form>
</div>
<br>

<?php
require 'functions.php';

$conn = open_db_conn();

check_remove($conn, "książki", "id_książki");

$books_table_query = "SELECT * FROM książki ORDER BY id_książki ASC;";
$books_table = get_table($conn, $books_table_query);

if(isset_nonempty(["tytuł", "autor", "data_wydania"])) 
{
    insert_into($conn, "książki", $books_table);
    $books_table = get_table($conn, $books_table_query);
}

print_table($books_table);

pg_close($conn); 
?>
