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
    <h1>DETAILS of All Account Holders</h1>
</br>
      <?php    
    
    include "connection.php";  
    $sql="SELECT * FROM bank_table";
    $result = mysqli_query($conn,$sql);
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

if ($result->num_rows > 0) {
   
while($row = $result->fetch_assoc())
{
    echo "<tr>";
    echo "<td>".$row['Account_No']."</td>";
    echo "<td>".$row['Name']."</td>";
    echo "<td>".$row['Email_Id']."</td>";
    echo "<td>".$row['Phone_No']."</td>";
    echo "<td>".$row['Current_balance']."</td>";
    echo "</tr>";
 }
  
echo "</table>";

}
    ?>   
    </br></br>
 </body>    
</html>    