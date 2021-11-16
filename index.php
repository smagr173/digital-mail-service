<!DOCTYPE html>
<html>
    <title>Mail To Email</title>
	  <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script type="text/javascript">
    function formALogin()
    {
      //get data from form
      var name=document.getElementById("aUser").value;
      var password=document.getElementById("apassword").value;
      return true;
    }
    </script>
   <body>
    <table style="width:100%">
      <tr>
        <td><form name="admin" action="admin.php" method="post" onsubmit="return formALogin()">
          <h3>Employee Login</h3>
          <input type="text" name="aUser" value="" required><br><br>
          <input type="password" name="apassword" value="" required><br><br>
          <input type="submit" name="alogin" value="Login">
          <input type="reset" name="areset" value="Cancel">


