<html>    
<head>
        <link rel="stylesheet" href="stlyles.css">
        <title>DETAILS</title>
    <body style="background-color:rgb(137, 182, 212);">   
  
    <div class="topnav" style="background-color:rgb(192, 162, 162)">
        <a class="active" href="detailmain.php"><b>DETAILS</b></a>
        <a href="transfer.php"><b>MONEY TRANSFER</b></a>
        <a href="deposit.php"><b>DEPOSIT</b></a>
        <a href="withdraw.php"><b>WITHDRAW</b></a>
        <a  href="home.php"><b>HOME</b></a>
      </div>
      </br></br>
    <h1>DETAILS OF A PARTICUALR PERSON</h1>
</br>
<form action="detailsingle.php" method="post">
Enter you Account No.<input type="number" name="Ac1" id="accid6" required></br></br>
<td colspan="2" style="text-align:center;"><input type="submit" name="show" id="ids"></td>
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
 //echo "Connected successfully..";
   
if(isset($_POST['show']))
{ 
    $acc_no=$_POST['Ac1'];
    $sql="SELECT * FROM bank_table WHERE Account_No=$acc_no";
    $result = mysqli_query($conn,$sql);

    if ($result->num_rows > 0) {
    echo"</br></br>";
    echo "
    <table border='1' class='center' style='width:fit-content; text-align:center;font-weight: bolder;'>
    <tr>    
        <th>Account Number</th>    
        <th>Name</th>    
        <th>Email Id</th>    
        <th>Phone Number</th> 
        <th>Current Balance</th>    
    </tr>"; 
    $row = $result->fetch_assoc();
    echo "<tr>";
    echo "<td>".$row['Account_No']."</td>";
    echo "<td>".$row['Name']."</td>";
    echo "<td>".$row['Email_Id']."</td>";
    echo "<td>".$row['Phone_No']."</td>";
    echo "<td>".$row['Current_balance']."</td>";
    echo "</tr>";
echo "</table>";
}

else{
    echo "</br>RECORD NOT FOUND!!  </br> PLEASE CHECK YOUR ACCOUNT NO.";
}
}
    
    ?>   
    </br></br>
 </body>    
</html>    