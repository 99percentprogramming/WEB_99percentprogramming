<?php
// define variables and set to empty values
$nameErr = $emailErr = $roleErr = $goalsErr "";
$name = $email =  $comment = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
    
  }
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
  if (empty($_POST["role"])) {
    $roleErr = "Select a programming";
  } else {
    $role = test_input($_POST["role"]);
  }
  if (empty($_POST["goals"])) {
    $goalsErr = "Select at least one goal";
  } else {
    $goals = test_input($_POST["goals"]);
  }
  $comment = test_input($_POST["comment"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<?php 
if(isset($_POST['submit'])){
    $to = "titoalonso2001@gmail.com"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $subject = "Pre registration";
    $subject2 = "99 percent Pre registration  ";
    $message = $name . "signed up for " . $role . "with this goals: " . $goals . /n . $comment
    $message2 =  $name . ", thank you for your pre-registration, stay tunned on our instagram @The99percents for more info";

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    // mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";
    //header('Location: /index.html'); //redirect to another page
    }
    if (mail($to,$subject,$message,$headers)){
      echo <h1> "Pre-registered succesfully," . $name . "Check your mail box" </h1>
    }
    else{
      echo "Something went wrong :("
    }
?>