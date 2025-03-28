<?php
// เชื่อมต่อฐานข้อมูล
$conn = mysqli_connect("localhost", "root", "", "RegisterDB");
$conn->query("SET NAMES UTF8");

// ตรวจสอบว่า ID ถูกส่งมาหรือไม่
if(isset($_GET['id'])){
    $id = $_GET['id'];

    // ดึงข้อมูลที่ต้องการแก้ไขจากฐานข้อมูล
    $sql = "SELECT * FROM Register WHERE ID = '$id'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        // ดึงข้อมูลจากฐานข้อมูล
        $row = $result->fetch_assoc();
    } else {
        echo "ไม่พบข้อมูลที่ต้องการแก้ไข";
        exit;
    }
} else {
    echo "ไม่พบรหัส ID";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Record</title>

</head>
<body>

<h2>Edit Record</h2>

<form action="edit.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $row['ID']; ?>">

    <label for="firstName">First Name:</label>
    <input type="text" name="firstName" id="firstName" value="<?php echo $row['FirstName']; ?>" required><br><br>

    <label for="lastName">Last Name:</label>
    <input type="text" name="lastName" id="lastName" value="<?php echo $row['LastName']; ?>" required><br><br>

    <label for="age">Age:</label>
    <input type="number" name="age" id="age" value="<?php echo $row['Age']; ?>" required><br><br>

    <label for="gender">Gender:</label>
    <select name="gender" id="gender" required>
        <option value="Male" <?php if($row['Gender'] == 'Male') echo 'selected'; ?>>Male</option>
        <option value="Female" <?php if($row['Gender'] == 'Female') echo 'selected'; ?>>Female</option>
    </select><br><br>

    <input type="submit" value="Save">
    <input type="reset" value="Cancel">
</form>

</body>
</html>
