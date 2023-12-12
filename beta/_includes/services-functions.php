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