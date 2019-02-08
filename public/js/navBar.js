/* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
function burgerNav() {
    let nav = document.getElementById("navBar");
    if (nav.className === "navigation") {
        nav.className += " responsive";
    } else {
        nav.className = "navigation";
    }
}