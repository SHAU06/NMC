// Validating Empty Field
function check_empty() {
/*if (document.getElementById('name').value == "" || document.getElementById('email').value == "" || document.getElementById('msg').value == "") {
alert("Fill All Fields !");
} else {
document.getElementById('form').submit();
alert("Form Submitted Successfully...");
}*/
var name =document.forms["form"]["name"].value;

if(x=="")
{
    alert("name required");
}
else{
    alert("successful");
}
}
//Function To Display Popup
function div_show() {
document.getElementById('abc').style.display = "block";
}
//Function to Hide Popup
function div_hide(){
document.getElementById('abc').style.display = "none";
}
function div_show1() {
    document.getElementById('abc1').style.display = "block";
    }
    //Function to Hide Popup
    function div_hide1(){
    document.getElementById('abc1').style.display = "none";
    }