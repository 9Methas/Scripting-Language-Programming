var xmlHttp;

function createXMLHttpRequest() {
    if (window.ActiveXObject) {
        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
    } else {
        xmlHttp = new XMLHttpRequest();
    }
}

function stateChange() {
    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
        // Step 1: แจ้งเตือนชื่อที่ได้รับจาก avatar.php
        var avatarName = xmlHttp.responseText;
        alert(avatarName);

        // Step 2: ตัดคำ "Mr." หรือ "Mrs." ออก และแจ้งเตือนชื่อที่ไม่มีคำหน้า
        var avatarOnlyName = avatarName.replace(/^(Mr\.|Mrs\.)\s*/i, "").trim();
        alert(avatarOnlyName);

        // Step 3: สร้าง URL ของรูป Avatar และแจ้งเตือน
        var avatarImage = "./avatar/" + avatarOnlyName.toLowerCase().replace(" ", "") + ".jpg";
        alert('img src="' + avatarImage + '"');

        // อัพเดตหน้าเว็บ
        document.getElementById("avatarImage").src = avatarImage; // เปลี่ยนรูป Avatar
        document.getElementById("hid").value = avatarImage; // อัพเดตค่าใน hidden field
        document.getElementById("welcomeText").innerHTML = "Welcome... " + avatarName; // แสดงข้อความ Welcome
    }
}

function showAvatar(str) {
    createXMLHttpRequest();
    xmlHttp.onreadystatechange = stateChange;
    var url = "avatar.php?nickname=" + str; // ส่งค่า nickname ไปหา avatar.php
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}
