<?php
define('__ROOT__', 'C:\xampp\htdocs\CT46607_NguyenPhatDat_B1910360\Houseware_Store');
include_once __ROOT__ . '\Database.php';
$conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
function renderSingleRecord($sql): mixed
{
    global $conn;
    $result = $conn->query($sql);
    return $result;
}
function renderMultipleRecord($sql): mixed
{
    global $conn;
    $result = $conn->query($sql);
    $data   = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    return $data;
}
function validData($data)
{
    global $conn;
    $data = mysqli_real_escape_string($conn, $data);
    $data = trim($data);
    $data = strip_tags($data);
    $data = htmlspecialchars($data);
    return $data;
}
