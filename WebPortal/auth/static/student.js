let enrolField = document.getElementById("enrol");
let passField = document.getElementById("pass");

function checkBlankFields() {
  if (enrolField.value == "" || passField.value == "") {
    alert("Field cannot be blank.");
  }
}
