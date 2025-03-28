<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script src="showAvatar.js"></script>
</head>
<body>
<Table align="center">
    <TR>
        <TD><img src="avatar/avatar1.jpg" width="45" onclick="changeImg(1)"></TD>
        <TD><img src="avatar/avatar2.jpg" width="45" onclick="changeImg(2)"></TD>
        <TD><img src="avatar/avatar3.jpg" width="45" onclick="changeImg(3)"></TD>
        <TD><img src="avatar/avatar4.jpg" width="45" onclick="changeImg(4)"></TD>
        <TD><img src="avatar/avatar5.jpg" width="45" onclick="changeImg(5)"></TD>
        <TD><img src="avatar/avatar6.jpg" width="45" onclick="changeImg(6)"></TD>
    </TR>
</Table><BR><BR>

<Table align="center">
<form name="myForm" action="insert.php" method="post" autocomplete="on" enctype="multipart/form-data">
    <TR>
        <TD><img src="./avatar/avatar1.jpg" id="avatarImage" width="100"></TD> <!-- เพิ่มการแสดงรูป Avatar -->
        <TD><span id="welcomeText">Welcome...</span></TD> <!-- เพิ่ม id สำหรับการเปลี่ยนข้อความ -->
        <TD><input type="hidden" id="hid" name="avatar" value="./avatar/avatar1.jpg"></TD>
    </TR>
    <TR>
        <TD>Nickname:</TD>
        <TD><input type="text" name="nickname" maxlength="10" size="20" onchange="showAvatar(this.value)"></TD>
    </TR>
    <TR>
        <TD>Firstname:</TD>
        <TD><input type="text" name="firstname" maxlength="10" size="20" id="firstName"></TD>
    </TR>
    <TR>
        <TD>Lastname:</TD>
        <TD><input type="text" name="lastname" maxlength="10" size="20" id="lastName"></TD>
    </TR>
    <TR>
        <TD>Age:</TD>
        <TD><input type="number" name="age" min="1" max="100" id="age"></TD>
    </TR>
    <TR>
        <TD>Gender:</TD>
        <TD>
            <select name="gender" id="gender">
                <option value="Female">Female</option>
                <option value="Male">Male</option>
            </select>
        </TD>
    </TR>
    <TR>
        <TD></TD>
        <TD><BR><input type="submit" name="Save" value="Save">
            <input type="reset" name="Cancel" value="Cancel"></TD>
    </TR>
</form>
</Table>
</body>
</html>
