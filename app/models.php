<?php

/**
 * Data Store System (DataBase a  create function)
 */
function store(string $tableName, array $data)
{
    //Get All Cols
    $colsList = array_keys($data);
    $calsName = implode(',', $colsList);

    //Get Data value
    $dataValue = array_values($data);

    //options manage
    $options = "";

    for ($i = 0; $i < count($dataValue); $i++) {
        $options .= "?, ";
        $optionsNumber = substr($options, 0, -2);
    }
    $sql = "INSERT INTO $tableName($calsName) VALUES ($optionsNumber)";
    $statement = connect()->prepare($sql);
    $statement->execute($dataValue);
}


/**
 * Data Get Fatch  all (All Data Database thake Dore Ana)
 */

function all(string $tableName)
{
    $sql = "SELECT * FROM $tableName";
    $statement = connect()->prepare($sql);
    $statement->execute();
    $data =  $statement->fetchAll(PDO::FETCH_OBJ);
    return $data;
}


/**
 * Show Signal Data ( data base thake signal data dore niya aser)
 */

function find(string $tableName, int $id)
{
    $sql = "SELECT * FROM $tableName WHERE id=?";
    $statement = connect()->prepare($sql);
    $statement->execute([$id]);
    $data =  $statement->fetch(PDO::FETCH_OBJ);
    return $data;
}


/**
 * Edit Data (Data Update/Edit korer function)
 */

function update(string $tableName, int $id, array $data)
{
    //Update Data set
    $updateData = "";
    foreach ($data as $key => $value) {
        $updateData .= "{$key} = '$value', ";
    }
    $updateSetData =  substr($updateData, 0, -2);

    $sql = "UPDATE $tableName SET $updateSetData WHERE id='$id'";
    $statement = connect()->prepare($sql);
    $statement->execute();
}



/**
 * Edit Data (Data Delete korer function)
 */

function delete(string $tableName, int $id)
{
    $sql = "DELETE * FROM $tableName WHERE id=?";
    $statement = connect()->prepare($sql);
    $statement->execute([$id]);
}
