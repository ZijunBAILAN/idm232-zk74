<?php

function get_recipes()
{
    global $db_connection;
    $query = 'SELECT * FROM recipes ORDER BY id ASC';
    $result = mysqli_query($db_connection, $query);
    return $result;
}