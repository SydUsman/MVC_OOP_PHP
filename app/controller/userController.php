<?php
include '../models/model.php';

$obj = new Model();

// Insert Data
if(isset($_POST['submit'])){
    $obj->insertRecord($_POST);
}

// Update Data
if(isset($_POST['update'])){
    $obj->updateRecord($_POST);
}

// Delete Data
if(isset($_GET['deleteid'])){
    $delid = $_GET['deleteid'];
    $obj->deleteRecord($delid);
}




$data = $obj->displayRecord();
?>

