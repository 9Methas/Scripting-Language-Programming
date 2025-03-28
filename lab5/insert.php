<?php
// เชื่อมต่อฐานข้อมูล
$conn = mysqli_connect("localhost", "root", "", "RegisterDB");
$conn->query("SET NAMES UTF8");

// ตรวจสอบว่ามีข้อมูลจากฟอร์มหรือไม่
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];

    // ดึง ID ล่าสุดจากฐานข้อมูล
    $sql = "SELECT MAX(ID) AS max_id FROM Register";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    // ถ้ามีข้อมูลในตาราง ให้เพิ่ม ID ใหม่เป็น ID ล่าสุด + 1
    if ($row['max_id'] !== NULL) {
        $newID = $row['max_id'] + 1;
    } else {
        // ถ้ายังไม่มีข้อมูลในตาราง ให้เริ่มต้นที่ ID = 1
        $newID = 1;
    }
    $avatar = $_POST['avatar']; // รับค่ารูปภาพ avatar ที่เลือก
    // สร้างคำสั่ง SQL เพื่อเพิ่มข้อมูล
    $sql_insert = "INSERT INTO Register (ID, FirstName, LastName, Age, Gender, Avatar) 
                   VALUES ('$newID', '$firstName', '$lastName', '$age', '$gender', '$avatar')";

    // ดำเนินการเพิ่มข้อมูล
    if ($conn->query($sql_insert) === TRUE) {
        echo "Insertion Successfully!! <br>";
    } else {
        echo "เกิดข้อผิดพลาดในการเพิ่มข้อมูล: " . $conn->error;
    }
}

$conn->close();
?>

<!-- ลิงค์เพื่อกลับไปยังหน้าหลัก -->
<a href="view.php">Go to Home</a>
