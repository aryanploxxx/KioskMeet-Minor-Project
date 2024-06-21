let id = document.getElementById("id");
let nameField = document.getElementById("name");
let dob = document.getElementById("dob");
let sem = document.getElementById("semester");
let batch = document.getElementById("batch");
let course = document.getElementById("course");
let pass = document.getElementById("password");

function checkBlankFields() {
  if (
    id.value == "" ||
    nameField.value == "" ||
    dob.value == "" ||
    sem.value == "" ||
    batch.value == "" ||
    course.value == "" ||
    pass.value == ""
  ) {
    alert("Please fill in all the details!");
  }
}

function checkBlankFields2() {
  if (
    id.value == "" ||
    nameField.value == "" ||
    dob.value == "" ||
    sem.value == "" ||
    batch.value == "" ||
    course.value == "" ||
    pass.value == ""
  ) {
    alert("Please fill in all the details!");
  }
}

