let enrolField = document.getElementById("admin");
let passField = document.getElementById("pass");

function checkBlankFields() {
  if (enrolField.value == "" || passField.value == "") {
    alert("Field cannot be blank.");
  }
}