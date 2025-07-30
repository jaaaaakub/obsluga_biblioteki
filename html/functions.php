<?php
function open_db_conn()
{
    $host = 'localhost';
    $dbname = 'biblioteka';
    $user = 'administrator_biblioteki';
    $password = 'test';

    $conn = pg_connect("host=$host dbname=$dbname user=$user password=$password");
    if (!$conn) die("Błąd połączenia z bazą danych.");

    return $conn;
}

function send_query($connection, $query)
{
    $response = pg_query($connection, $query);

    if (!$response) print("Błąd zapytania: " . pg_last_error($connection));

    return $response;
}

function get_table($connection, $query)
{
    $response = send_query($connection, $query);

    $table = [];
    $table["columns"] = get_table_columns($response);
    $i = 0;
    while ($row = pg_fetch_assoc($response))
    {
        $table["rows"][$i] = $row;
        $i++;
    }
    return $table;
}

function get_table_columns($table_sql)
{
    $columns = [];
    $num_fields = pg_num_fields($table_sql);
    for ($i = 0; $i < $num_fields; $i++) {
        $columns[$i] = pg_field_name($table_sql, $i);
    }
    return $columns;
}

function print_table($table)
{
    $id_type = $table["columns"][0];
    print("<table class='table1'>");
    print("<tr>");
    foreach ($table["columns"] as $title)
    {
        print("<th>$title</th>");
    }
    print("<th>usuń</th>");
    print("</tr>");

    foreach ($table["rows"] as $row)
    {
        print("<tr>");
        foreach ($row as $element)
        {
            print("<td>$element</td>");
        }
        print("<td><a href='index.php?del_id=" . $row[$id_type] . "'>❌</a></td>");
        print("</tr>");
    }
    print("</table>");
}

function insert_into($connection, $table_name, $table)
{
    $values = [];
    $column_name_string = "";
    $is_id = true;
    foreach ($table["columns"] as $column_name)
    {
        if ($is_id) {$is_id = false; continue;}
        $column_name_string = $column_name_string . $column_name . ", ";
        $values[] = $_GET[$column_name];
    }
    $column_name_string = substr($column_name_string, 0, -2);

    $values_string = "";
    foreach ($values as $value)
    {
        if (is_int($value)) $values_string = $values_string . $value . ", ";
        else $values_string = $values_string . "'" . $value . "', ";
    }
    $values_string = substr($values_string, 0, -2);

    $insert_into_query = "INSERT INTO $table_name ($column_name_string) VALUES ($values_string);";
    
    send_query($connection, $insert_into_query);
    header("Location: index.php");
}

function isset_nonempty($vars)
{
    foreach ($vars as $var)
    {
        if(!isset($_GET[$var]) || $_GET[$var] == "") return false;
    }
    return true;
}

function check_remove($connection, $table_name, $id_name)
{
    if (isset($_GET['del_id'])) 
    {
        $id = intval($_GET['del_id']);
        $q = "DELETE FROM $table_name WHERE $id_name = $id";
        send_query($connection, $q);
    }
}

?>
