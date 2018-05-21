<?php


// Comment this lines in production
// Uncoment them to see the errors
// ini_set('display_startup_errors', 1);
// ini_set('display_errors', 1);
// error_reporting(-1);

$servername = "localhost";
$username = "root";
$password = "toor";
$database = "gdrp_rifttime";
$redirect_url = "https://www.rifttime.com/";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//if the form was submited, and there is an email field
if (isset($_POST['SubmitButton']) && isset($_GET['email'])) {

  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  } else {
    $ip = $_SERVER['REMOTE_ADDR'];
  }

  //create the statement
  $stmt = $conn->prepare("INSERT INTO users (email, ip, time, accepted)
    VALUES (?, ?, '" . date('Y-m-d H:i:s', time()) . "', 1)");

  // add the values to the statemnet
  $stmt->bind_param("ss", $_GET['email'], $ip);
  //execute the stmt
  $stmt->execute();
  $stmt->close();
  $conn->close();

  //redirect
  header("Location: ". $redirect_url);
  die();

}  
?>

<html>
	<head>
		<title>Hi</title>
	</head>
	<body>
    <?php if(!isset($_GET['email'])) { ?>
      Invalid url (no email)!
    <?php } ?>
		<form action="" method="POST">
			<input type="submit" value="Accept" name="SubmitButton" />
		</form>
	</body>
</html>
