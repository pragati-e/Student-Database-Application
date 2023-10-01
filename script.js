// This function is called when the form is submitted.
function addStudent() {
  // Get the values from the form.
  var name = document.getElementById("name").value;
  var dateOfBirth = document.getElementById("date_of_birth").value;
  var gradeLevel = document.getElementById("grade_level").value;
  var phoneNumber = document.getElementById("phone_number").value;
  var email = document.getElementById("email").value;
  var address = document.getElementById("address").value;

  // Send an AJAX request to the add_student.php file.
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "add_student.php");
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onload = function() {
    if (xhr.status === 200) {
      // The request was successful.
      var response = JSON.parse(xhr.responseText);
      if (response.success) {
        // The student was added successfully.
        alert("Student added successfully!");
      } else {
        // There was an error adding the student.
        alert("Error adding student: " + response.message);
      }
    } else {
      // The request failed.
      alert("Request failed: " + xhr.status);
    }
  };
  xhr.send("name=" + name + "&date_of_birth=" + dateOfBirth + "&grade_level=" + gradeLevel + "&phone_number=" + phoneNumber + "&email=" + email + "&address=" + address);
}

// Add event listener to the submit button.
document.getElementById("submit").addEventListener("click", addStudent);
