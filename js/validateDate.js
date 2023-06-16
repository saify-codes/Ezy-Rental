function validateDate() {

  var selectedDate = new Date(document.getElementById("date").value);
  var currentDate = new Date();

  // Compare selected date with current date
  if (
    selectedDate < currentDate ||
    selectedDate.toDateString() === currentDate.toDateString()
  ) {
    alert("Please select a future date.");
    return false;
  }
  return true;
}
