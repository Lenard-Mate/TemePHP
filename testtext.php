<!DOCTYPE HTML>  
<html>
<head>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>  

<?php

//Conection to database
$servername = "remotemysql.com";
$username = "o8LxL7h9xu";
$password = "8iqIEQbEUZ";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $password = "";
$numberId;
$editid=null ;
$name2=null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["password"])) {
    $password = "";
  } else {
    $password = test_input($_POST["password"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$password)) {
      $websiteErr = "Invalid URL";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


if ($password !=null){
$sql = "INSERT INTO o8LxL7h9xu.form_table (name, email, password)
    VALUES ('$name', '$email', '$password')";
if ($conn->query($sql) === TRUE) {
 // echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}

?>


<form class="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
    <h2>Log in  ca sa am datele!</h2>
      Name: <input type="text" name="name" value="<?php echo $name;?>">
      E-mail: <input type="text" name="email" value="<?php echo $email;?>">
      Password: <input type="password" name="password" value="<?php echo $password;?>">
      <input type="submit" name="submit" value="Submit">  
</form>


<form class="delete" action="" method="post">
      id: <input type="number" name="name" value="<?php echo $numberId;?>">
      <button type="submit" name="sub" value="">Delete</button>

 <?php


if (isset($_POST['name'])){


  $sql = "DELETE FROM o8LxL7h9xu.form_table WHERE idnew_table=".$_POST['name'];
  if ($conn->query($sql) === TRUE) {
    //echo "Record deleted successfully";
  } else {
    //echo "Error deleting record: " . $conn->error;
  }
}

?>
</form>

  
<br>
<div class="form2">
<form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 

    <h2>Aici editezi numele</h2>
    
      id: <input type="text" name="id2" value="<?php echo $editid;?>">
      Name: <input type="text" name="name2" value="<?php echo $name2;?>">
    
      <input type="submit" name="sub2" value="Edit">  


      <?php 



if (isset($_POST['id2'])){
  echo $_POST['id2'];
  echo $_POST['name2'];
  $varoable = $_POST['name2'];
  $sql = "UPDATE o8LxL7h9xu.form_table SET name = '$varoable' WHERE idnew_table =".$_POST['id2'];

  if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . $conn->error;
  }
}


?>
</form>
</div>

<?php

$sql = "SELECT idnew_table,name, email, password FROM o8LxL7h9xu.form_table";
$result = $conn->query($sql);
echo "<br><h2>Your Input:</h2>";
echo '<table><tr>';
echo '<th>'."id ".'</th>';
echo '<th>'."Nume ".'</th>';
echo '<th>'."Email".'</th>';
echo '<th>'."Parola".'</th>';

echo '</tr><tbody>';
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
      echo '<tr>';
      echo "<td>". $row["idnew_table"].'</td>'."<td>". $row["name"].'</td>'. "<td>". $row["email"].'</td>'. "<td>" . $row["password"] .'</td>';
      echo '</tr>';
  }
} else {
  echo "0 results";
}
?>

</body>
</html>