<html>
<head>
<title>Withdraw Money</title>
<link rel="stylesheet" href="stlyles.css">
</head>
<body style="background:url('withdrawimg.jpg');background-repeat:no-repeat; background-color:black;background-size:100%">

<div class="topnav">
        <a href="detailmain.php"><b>DETAILS</b></a>
        <a href="transfer.php"><b>MONEY TRANSFER</b></a>
        <a href="deposit.php"><b>DEPOSIT</b></a>
        <a class="active" href="withdraw.php"><b>WITHDRAW</b></a>
        <a href="home.php"><b>HOME</b></a>
      </div>
      </br></br>
<h1>WHITHDRAW MONEY!!!</h1>
</br></br>
<table class='center' style='width:fit-content; width:fit-content;font-weight: bolder;'>
<form action="withdraw.php" method="post">
<tr><td>Enter you Account No.</td><td><input type="number" name="Accno1" id="acc" required></td></tr>
<tr><td>Enter Amount to be withdrawn:</td><td><input type="number" name="Amount1" id="amount" required></td></tr>
<td colspan="2" style="text-align:center;"><input type="submit" name="withdraw"></td>
</table>
</form>

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
//echo "\nConnected successfully..\r\n";


if(isset($_POST['withdraw']))
{   
  $account1 = $_POST['Accno1'];
     $amount=$_POST['Amount1'];
   
$sql2="SELECT * from bank_table WHERE Account_No='$account1'";
$result = mysqli_query($conn,$sql2);

$sql3="SELECT * from bank_table WHERE Account_No='$account1'";
$rel = mysqli_query($conn,$sql3);
$result1=mysqli_fetch_array($rel);


if ($result->num_rows==1 && $result1['Current_balance']>=$amount) 
     {
$sql = "UPDATE bank_table 
SET Current_balance=Current_balance-$amount
 WHERE Account_No=$account1";

if ($conn->query($sql) === TRUE) {
  echo "</br><br> RS $amount withdrawn successfully!!";
} 
else {
  echo "</br></br>Error: " . $sql . "<br>" . $conn->error;
  echo "</br></br>Invalid Account  no. or Insufficient Money!!";
}
}
else{
  echo "</br></br>MONEY TRANSFER FAILED!!!";
  if($result->num_rows!=1){
echo "</br>INVALID ACCOUNT NO.!!!</br>PLEASE CHECK YOUR ACCOUNT NO.";
  }
if($result1['Current_balance']<$amount){
 echo "</br>INSUFFICIENT MONEY TO TRANSFER!!!";
}
}
}
?>
</form>
</body>
</html>