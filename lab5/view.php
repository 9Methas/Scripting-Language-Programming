<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>View Register Database</title>
    <script src="showName.js"></script>
</head>
<body>
    <p><a href="insertForm.php">Add a new record</a></p>

    <!-- ฟอร์มค้นหาชื่อ -->
    <form action="view.php" method="get">
        <input type="text" id="searchInput" name="search" list="nameList" oninput="searchName(this.value)" required>
        
        <!-- ใช้ datalist แสดงรายชื่อที่ดึงจากฐานข้อมูล -->
        <datalist id="nameList">
            <!-- ตัวเลือกจะถูกเพิ่มแบบอัตโนมัติผ่าน JavaScript -->
        </datalist>

        <input type="submit" value="Search">
    </form>

    <?php
    // เชื่อมต่อฐานข้อมูล
    $conn = new mysqli("localhost", "root", "", "RegisterDB");
    $conn->set_charset("utf8");

    // ตรวจสอบค่าค้นหา
    $search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';

    // ค้นหาข้อมูล
    $sql = "SELECT * FROM Register WHERE FirstName LIKE '%$search%'";
    $result = $conn->query($sql);

    // แสดงตาราง
    echo "<table border='1' cellpadding='10' width='80%'>";
    echo "<tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Photo</th>
            <th>Actions</th>
          </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['ID']}</td>";
        echo "<td>{$row['FirstName']}</td>";
        echo "<td>{$row['LastName']}</td>";
        echo "<td>{$row['Age']}</td>";
        echo "<td>{$row['Gender']}</td>";
        echo "<td><img src='{$row['Avatar']}' width='50'></td>";
        echo "<td><a href='editForm.php?id={$row['ID']}'>Edit</a> | 
                  <a href='delete.php?id={$row['ID']}'>Delete</a></td>";
        echo "</tr>";
    }

    echo "</table>";
    $conn->close();
    ?>
</body>
</html>
