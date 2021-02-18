<html>
    <head>
<title>Transfer Money</title>
<link rel="stylesheet" href="stlyles.css">
</head>

<body style="background:url('transferimg.jpg');background-repeat:no-repeat; background-color:black;background-size:100%">

<div class="topnav">
        <a href="detailmain.php"><b>DETAILS</b></a>
        <a class="active" href="transfer.php"><b>MONEY TRANSFER</b></a>
        <a href="deposit.php"><b>DEPOSIT</b></a>
        <a  href="withdraw.php"><b>WITHDRAW</b></a>
        <a href="home.php"><b>HOME</b></a>
      </div>
      </br></br>
<h1>MONEY TRANSFER </h1>
</br></br>
<table class='center' style='width:fit-content; width:fit-content;  font-weight: bolder;'>
<form action="transfer.php" method="post"> 
<tr><td>Enter your Account No.:</td><td><input type="number" name="Account_no1" id="acc1" required></td></tr>
<tr><td>Enter your Account No. in which money is to be transfered :</td><td><input type="number" name="Account_no2" id="acc2" required></td></tr>
<tr><td>Enter Amount to be to be transfered :</td><td><input type="number" name="Amountt" id="amt" required></td></tr>
<td colspan="2" style="text-align:center;"><input type="submit" name="transfer"></td>
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
//echo "Connected successfully.";

if(isset($_POST['transfer']))
{    
     $account1 = $_POST['Account_no1'];
     $account2 = $_POST['Account_no2'];
     $amount=$_POST['Amountt'];

     $sql2="SELECT * from bank_table WHERE Account_No='$account1' OR Account_No='$account2'";
     $result = mysqli_query($conn,$sql2);

     $sql3="SELECT * from bank_table WHERE Account_No='$account1'";
     $rel = mysqli_query($conn,$sql3);
     $result1=mysqli_fetch_array($rel);

     if ($result->num_rows=='2' && $result1['Current_balance']>=$amount) 
     {

     $sql = "UPDATE bank_table 
     SET Current_balance=Current_balance-$amount
     where Account_no=$account1";
    
    $sql1 = "UPDATE bank_table 
    SET Current_balance=Current_balance+$amount
    where Account_no=$account2";

     if (mysqli_query($conn, $sql)) 
     {
        echo "</br>Rs $amount is Debited from Account no. $account1 to Account no. $account2. ";
        $c=1;
     } else 
     {
        echo "Error: " . $sql. ":-" . mysqli_error($conn);
     }

     if (mysqli_query($conn, $sql1)) 
     {
       // echo "Rs $amount is creditted from Account no. $account1 to Account no. $account2.";
        $c1=1;
     } else 
     {
        echo "Error: " . $sql1. ":-" . mysqli_error($conn);
     }
     if($c==1 && $c1==1)
     {
         echo "</br></br>Money Transffered successfully !!";
     }
     }
   else{
      echo "</br>MONEY TRANSFER FAILED!!";
         if($result->num_rows!=2)
      {
         echo "</br>INVALID ACCOUNT NO.!!!</br>PLEASE CHECK YOUR ACCOUNT NO.";
      }
      if($result1['Current_balance']<$amount){
        echo "</br>INSUFFICIENT MONEY TO TRANSFER!!!";
      }
      }
}
?>
</body>
    </html>