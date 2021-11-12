<!DOCTYPE html>
<html>


<head>
<style>

*{box-sizing: border-box}

/* Full-width input fields */
  input[type=text], input[type=password], input[type=mail] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus , input[type=mail]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
    width: 100%;
  }
}	

</style>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</head>


<body>

<form action="http://localhost/Bil372_Grup4_Etunet/index.php/enterence/real_sign/2" method="post" style="border:1px solid #ccc">
  <div class="container">
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="mail"><b>Email</b></label>
    <input type="mail" placeholder="Enter User Name" name="mail" required>

    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter User Name" name="name" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <div class="clearfix">
      <button type="button" class="cancelbtn" onclick="myFunction()">Cancel</button>
      <button type="submit" class="signupbtn">Sign Up</button>
    </div>
  </div>
</form>

<script>
function myFunction() {
  location.replace("http://localhost/Bil372_Grup4_Etunet/index.php/enterence/")
}
</script>

</body>


</html>