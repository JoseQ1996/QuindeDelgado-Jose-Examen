function buscarLibro() {
    var libro = document.getElementById("nombre").value;
    if (libro == "") {
        document.getElementById("nomLib").innerHTML = "";
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                //alert("llegue");
                document.getElementById("nomLib").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "../public/controladores/buscarLibro.php?libro=" + libro, true);
        xmlhttp.send();
    }
    return false;
}