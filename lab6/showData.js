var xmlHttp;

function createXMLHttpRequest() {
    if (window.ActiveXObject) {
        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
    } else { 
        xmlHttp = new XMLHttpRequest();
    }
}

function stateChange() {
    if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
        var response = xmlHttp.responseText;
        alert(response);

        var data = JSON.parse(response);
        if (data.firstname) {
            document.getElementById("firstname").value = data.firstname;
            document.getElementById("lastname").value = data.lastname;
            document.getElementById("age").value = data.age;
            document.getElementById("gender").value = data.gender;
            document.getElementById("pic").innerHTML = '<img src="' + data.photo + '">';
            document.getElementById("hid").value = data.photo;
        }
    }
}

function searchName(name) {
    if (name.trim() === "") return; 

    createXMLHttpRequest();
    xmlHttp.onreadystatechange = stateChange;
    var url = "data.php?name=" + encodeURIComponent(name);
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}
