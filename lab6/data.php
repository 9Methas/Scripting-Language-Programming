<?php
header('Content-Type: application/json');

class Data {
    public $firstname = "";
    public $lastname = "";
    public $age = 0;
    public $gender = "";
    public $photo = "";
}

$name = isset($_GET["name"]) ? $_GET["name"] : "";

// เชื่อมต่อฐานข้อมูล
$conn = new mysqli("localhost", "root", "", "RegisterDB");
$conn->set_charset("utf8");

$sql = "SELECT * FROM register WHERE FirstName LIKE '$name%' LIMIT 1";
$result = $conn->query($sql);

$myObj = new Data();
if ($row = $result->fetch_assoc()) {
    $myObj->firstname = $row["FirstName"];
    $myObj->lastname = $row["LastName"];
    $myObj->age = $row["Age"];
    $myObj->gender = $row["Gender"];
    $myObj->photo = $row["Avatar"];
}

echo json_encode($myObj, JSON_UNESCAPED_UNICODE);

$conn->close();
?>
