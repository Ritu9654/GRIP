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
<form action="regularDeposit.php" method="post"> 
<tr>
<td>Enter your Account No.</td><td><input type="number" name="Account_no" id="acc" required></td></tr>
<tr>
<td>Enter Amount to be Deposited:</td><td> <input type="number" name="Amount" id="amount" required></td></tr>
<td colspan="2" style="text-align:center;"><input type="submit" name="deposit2"></td>
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
//echo "Connected successfully\n..";


if(isset($_POST['deposit2']))
{   
  $account1 = $_POST['Account_no'];
     $amount=$_POST['Amount'];
   
     $sql2="SELECT * from bank_table WHERE Account_No='$account1'";
     $result = mysqli_query($conn,$sql2);
     if ($result->num_rows > 0) 
     {

     $sql = "UPDATE bank_table 
     SET Current_balance=Current_balance+$amount
      WHERE Account_No=$account1";

if ($conn->query($sql) === TRUE) {
  echo "</br>Money Depositted successfully!!";
} 
else {
  echo "INVALID ACCOUNT NO.!!! </br>PLEASE CHECK YOUR ACCOUNT NO.";
}
     }
     else {
       echo "INVALID ACCOUNT NO.!!! </br>PLEASE CHECK YOUR ACCOUNT NO.";
     }
}
?>
</body>
</html>