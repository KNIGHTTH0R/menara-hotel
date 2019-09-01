function order_button() {
    document.getElementById("order_modals").style.display = "block";
}

function close_model() {
    document.getElementById("order_modals").style.display = "none";
}

function tabclick(tabname) {
    document.getElementById("tab1").style.display = "none";
    document.getElementById("tab2").style.display = "none";
    document.getElementById(tabname).style.display = "block";

}