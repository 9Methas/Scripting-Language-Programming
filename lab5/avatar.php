<?php
// รับค่าชื่อเล่นที่ส่งมาใน URL
$nickname = $_GET["nickname"];

// ตรวจสอบค่าชื่อเล่น และส่งกลับชื่อ Avatar ที่ตรงกัน
switch ($nickname) {
    case "1":
        echo "Mr. avatar1";
        break;
    case "2":
        echo "Mrs. avatar2";
        break;
    case "3":
        echo "Mr. avatar3";
        break;
    case "4":
        echo "Mrs. avatar4";
        break;
    case "5":
        echo "Mr. avatar5";
        break;
    default:
        echo "Mrs. avatar6"; 
        break;
}
?>
