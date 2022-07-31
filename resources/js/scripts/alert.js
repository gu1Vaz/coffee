const colors = {
    success:"#38c172",
    danger:"#e3342f"
}
var snackBar = document.getElementById("snackbar");
const success =(msg)=>{
    snackBar.className = "show";
    snackBar.style.background = colors.success;
    snackBar.innerText = msg;
    setTimeout(function(){ snackBar.className = snackBar.className.replace("show", ""); }, 3000);
}

export {success};