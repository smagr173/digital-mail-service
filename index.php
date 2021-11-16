<!DOCTYPE html>
<html>
   <head>
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
   </head>
   <body>
     <table style="width:100%" id="layout">
       <tr>
         <th class="title">Mail To Email</th>
      </tr>
      <tr>
    </table>
    <table style="width:100%">
      <tr>
        <td><form name="admin" action="admin.php" method="post" onsubmit="return formALogin()">
          <fieldset>
          <lable><h3>Employee Login</h3></lable><br><br>
          <lable>Username:&nbsp</label><input type="text" name="aUser" value="" required><br><br>
          <lable>Password:&nbsp</label><input type="password" name="apassword" value="" required><br><br>
          <input type="submit" name="alogin" value="Login">
          <input type="reset" name="areset" value="Cancel">
        </fieldset>
        </form></td>
      </tr>

    </table>

   </body>
</html>

