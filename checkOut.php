<?php
  include 'employeeHomePage.php';
  if (empty($_POST['eFname']))
  {
    $first = "";
    $last = "";
    $room = "";
  }
  else {

      $first = $_POST['eFname'];
      $last = $_POST['eLname'];
      $room = $_POST['eRoomNum'];

  }
 ?>
 <html>
   <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Mail To Email</title>
  </head>
  <body>
    <table style="width:100%">
      <tr></tr>
      <tr>
        <td style="width:100%"><form name="resident" action="eFindPackages.php" method="post">
          <fieldset>
            <lable><h2>Package Search</h2></lable><br>
            <lable><h4>Search for the owner of the package</h4></lable><br>
            <lable>First Name:&nbsp</label><input type="text" name="eFname" value='<?php echo $first ?>'>
            <lable>Last Name:&nbsp</label><input type="text" name="eLname" value='<?php echo $last ?>'>
            <lable>Room Number:&nbsp</label><input type="text" name="eRoomNum" value='<?php echo $room ?>'><br><br>

            <input type="submit" name="eResSearch" value="Search">

          </fieldset>
        </form></td>

      </tr>
    </table>
  </body>
 </html>
