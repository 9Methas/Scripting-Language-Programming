<?php
if (!isset($_GET['name']) || empty($_GET['name'])) {
    exit;
}

$name = $_GET['name'];
$searchWords = explode(" ", $name); // แยกคำออกจากช่องค้นหาหลายคำ

// เชื่อมต่อฐานข้อมูล
$conn = new mysqli("localhost", "root", "", "RegisterDB");
$conn->set_charset("utf8");

// สร้างเงื่อนไขการค้นหาหลายคำ (OR สำหรับคำค้นหาหลายคำ)
$sqlConditions = [];
foreach ($searchWords as $word) {
    $sqlConditions[] = "FirstName LIKE CONCAT(?, '%')";
}

$sqlQuery = "SELECT DISTINCT FirstName FROM Register WHERE " . implode(" OR ", $sqlConditions);

// ใช้ Prepared Statements ป้องกัน SQL Injection
$stmt = $conn->prepare($sqlQuery);

// ผูกพารามิเตอร์
$params = array_merge([], array_fill(0, count($searchWords), 's'));
$stmt->bind_param(implode('', $params), ...$searchWords);
$stmt->execute();
$result = $stmt->get_result();

// สร้างอาร์เรย์เก็บชื่อ
$nameList = [];
while ($row = $result->fetch_assoc()) {
    $nameList[] = $row['FirstName'];
}

// ส่งข้อมูลกลับในรูปแบบที่ JavaScript ใช้งานได้
echo implode(";", $nameList);

$stmt->close();
$conn->close();
?>
