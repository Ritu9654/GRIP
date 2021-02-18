<html>
<head>
<title>Deposit Money</title>
<link rel="stylesheet" href="stlyles.css">
</head>
<body style="background:url('depositimg.jpg');background-repeat:no-repeat; background-color:black;background-size:100%">

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
<form action="firstDeposit.php" method="post">
<input type="submit" value="FIRST TIME DEPOSIT" name="FIRST_DEPOSIT" id="fd" required></br>
</br>
</form>
<form action="regularDeposit.php" method="post">
<input type="submit" value="REGULAR DEPOSIT" name="DEPOSIT" id="fd" required>
</form>
</body>
</html>