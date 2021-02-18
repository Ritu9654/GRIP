<html>
<head>
<title>Deposit Money</title>
<link rel="stylesheet" href="stlyles.css">
</head>
<body style="background:url('depositimg.jpg');background-repeat:no-repeat; background-color:black;background-size:100%;font-weight: bolder;">

<div class="topnav">
        <a href="detailmain.php"><b>DETAILS</b></a>
        <a href="transfer.php"><b>MONEY TRANSFER</b></a>
        <a class="active" href="deposit.php"><b>DEPOSIT</b></a>
        <a href="withdraw.php"><b>WITHDRAW</b></a>
        <a  href="home.php"><b>HOME</b></a>
      </div>
</br></br>
<h1>DEPOSIT MONEY!!!</h1>
</br></br>
<table class='center' style='width:fit-content; width:fit-content;font-weight: bolder;'>
<form action="firstDeposit.php" method="post"> 
<tr><td>Enter your Account No.</td><td><input type="number" name="Account_no2" id="acc" required></td></tr>
<yr><td>Enter your Name:</td><td><input type="text" name="name2" id="name2" required></td></tr>
<tr><td>Enter your Email Id:</td><td><input type="email" name="email2" id="email2" required></td></tr>
<tr><td>Enter your Phone No.:</td><td><input type="number" name="phone2" id="phone2" required></td></tr>
<tr><td>Enter Amount to be Deposited:</td><td><input type="number" name="Amount2" id="amount2" required></td></tr>
<td colspan="2" style="text-align:center;"><input type="submit" name="fdeposit"></td>
</form>
</table>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$db="banking_data";
// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully...</br>";

if(isset($_POST['fdeposit']))
{   
  $accountf = $_POST['Account_no2'];
  $namef=$_POST['name2'];
  $emailf=$_POST['email2'];
  $phonef=$_POST['phone2'];
  $amountf=$_POST['Amount2'];
   
  $sql2="SELECT * from bank_table WHERE Account_No='$accountf'";
  $result = mysqli_query($conn,$sql2);
  if ($result->num_rows<=0 ) 
  {
$sql = "INSERT INTO bank_table (Account_No,Name,Email_Id,Phone_No,Current_balance)
VALUES ('$accountf','$namef','$emailf','$phonef','$amountf');";

if ($conn->query($sql) === TRUE) {
  echo "</br></br>Money Deposited successfully!!";
} 
else {
  echo "</br>DUPLICATE ENTRY!!!</br>THIS ACCOUNT IS ALREADY CREATED!!!";
}
  }
  else {
    echo "</br>DUPLICATE ENTRY!!!</br>THIS ACCOUNT IS ALREADY CREATED!!!";
  }
}
?>
</body>
</html>