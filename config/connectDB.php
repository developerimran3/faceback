<?php

/**
 * connection db
 */

function connect()
{
    try {
        $connection = new PDO("mysql:host=localhost;dbname=faceback", "akj", "asdfg123");
        return $connection;
    } catch (PDOException $error) {
        echo $error->getMessage();
    }
}
