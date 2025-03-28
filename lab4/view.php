<html>
<head>
<title>View Register Database</title>
<script type="text/javascript">
    // ฟังก์ชันยืนยันการลบ
    function confirmDelete(id) {
        var confirmDelete = confirm("Are you sure to delete ID " + id + " ?");
        if (confirmDelete) {
            window.location.href = "delete.php?id=" + id; // Redirect to delete.php if OK
        }
    }
</script>
</head>
<body>
<p><a href="insertForm.htm">Add a new record</a></p>
<?php
// เชื่อมต่อฐานข้อมูล
$conn = mysqli_connect("localhost", "root", "", "RegisterDB");
$conn->query("SET NAMES UTF8");

// ดึงข้อมูลจากฐานข้อมูล
$sql = "SELECT * FROM Register";
$rs = $conn->query($sql);

// แสดงหัวตาราง
echo "<table border='1' cellpadding='10' width=80%>"; // open table
echo "<tr>
<th>ID</th>
<th>First Name</th>
<th>Last Name</th>
<th>Age</th>
<th>Gender</th>
<th>Avatar</th>
<th></th>
 </tr>";

// แสดงผลข้อมูลจากฐานข้อมูล
while ($row = $rs->fetch_assoc()) {
    echo "<tr>";
    echo '<td>' . $row['ID'] . '</td>';
    echo '<td>' . $row['FirstName'] . '</td>';
    echo '<td>' . $row['LastName'] . '</td>';
    echo '<td>' . $row['Age'] . '</td>';
    echo '<td>' . $row['Gender'] . '</td>';
    echo '<td><img src="' . $row['Avatar'] . '" width="50"></td>'; // แสดง avatar
    echo '<td><a href="editForm.php?id=' . $row['ID'] . '">Edit</a> ';
    echo '<a href="javascript:void(0);" onclick="confirmDelete(' . $row['ID'] . ')">Delete</a></td>';
    echo "</tr>";
}
echo "</table>"; // close table

$conn->close(); // ปิดการเชื่อมต่อฐานข้อมูล
?>
</body>
</html>