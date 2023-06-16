var form = document.getElementById("myForm")
form.addEventListener('submit',validateForm)

function validateForm(e) {
  e.preventDefault()
  // Retrieve form inputs
  var model = document.getElementById("model").value;
  var color = document.getElementById("color").value;
  var rent = document.getElementById("rent").value;

  // Check if inputs are empty
  if (model === "" || color === "" || rent === "") {
    alert("Please fill in all fields.");
    return false;
  }

  // Check if rent is a positive number
  if (rent <= 0) {
    alert("Rent price must be a positive number.");
    return false;
  }

  form.submit();
  return true;
}



