<?php
// เชื่อมต่อฐานข้อมูล
$conn = mysqli_connect("localhost", "root", "", "RegisterDB");
$conn->query("SET NAMES UTF8");

// ตรวจสอบว่ามีการส่งข้อมูลจากฟอร์มหรือไม่
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];

    // สร้างคำสั่ง SQL เพื่ออัพเดตข้อมูล
    $sql = "UPDATE Register SET FirstName = '$firstName', LastName = '$lastName', Age = '$age', Gender = '$gender' WHERE ID = '$id'";

    // ดำเนินการอัพเดตข้อมูล
    if ($conn->query($sql) === TRUE) {
        echo "Update Successfully!! <br>";
    } else {
        echo "เกิดข้อผิดพลาดในการอัพเดตข้อมูล: " . $conn->error;
    }
}

$conn->close();
?>

<!-- ลิงค์เพื่อกลับไปยังหน้าหลัก -->
<a href="view.php">Go to Home</a>
