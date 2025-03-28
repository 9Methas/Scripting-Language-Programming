function searchName(str) {
    if (str.length === 0) {
        document.getElementById("nameList").innerHTML = ""; // เคลียร์ข้อมูล
        return;
    }

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var nameList = xhr.responseText.split(";"); // รับค่าจาก name.php
            var datalist = document.getElementById("nameList");

            datalist.innerHTML = ""; // เคลียร์ค่าเดิม

            if (nameList.length === 1 && nameList[0] === "") {
                var option = document.createElement("option");
                option.value = "No results found"; // แจ้งว่าไม่มีข้อมูล
                datalist.appendChild(option);
            } else {
                nameList.forEach(function (name) {
                    if (name.trim() !== "") {
                        var option = document.createElement("option");
                        option.value = name;
                        datalist.appendChild(option);
                    }
                });
            }
        }
    };

    xhr.open("GET", "name.php?name=" + encodeURIComponent(str), true);
    xhr.send();
}
