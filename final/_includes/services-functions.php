<?php

function get_recipes()
{
    global $db_connection;
    $query = 'SELECT * FROM recipes ORDER BY id ASC';
    $result = mysqli_query($db_connection, $query);
    return $result;
}

function get_recipe_by_id($id)
{
    global $db_connection;
    $query = "SELECT * FROM recipes WHERE id = $id";
    $result = mysqli_query($db_connection, $query);
    if ($result->num_rows > 0) {
        $recipe = mysqli_fetch_assoc($result);
        return $recipe;
    } else {
        return false;
    }
}

function get_recipe_by_proteine($proteine)
{
    global $db_connection;
    $query = "SELECT * FROM recipes WHERE Proteine = '$proteine' ORDER BY id DESC";
    $result = mysqli_query($db_connection, $query);
    return $result;
}

function search_recipe($keywords) 
{
    global $db_connection;
    $query = "SELECT Title, Subtitle, `Main IMG`, id 
    FROM recipes 
    WHERE Title LIKE '%$keywords%'
    ORDER BY id DESC";
    $result = mysqli_query($db_connection, $query);

    if (!$result) {
        die("Query failed: ". mysqli_error($db_connection));
    }
    return $result;
}