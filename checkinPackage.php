<?php

  include 'eCreatePackage.php';
  $first = $_POST['eFname'];
  $last = $_POST['eLname'];
  $room = $_POST['eRoomNum'];

  $DB_HOST='localhost';
  $DB_USER='cbeau738';
  $DB_PASS='Qu7rutru';
  $DB_NAME='MailSafe';

  $db = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
  if ($room == "")
  {
      $sql = $db->query("SELECT Lname, Fname, RoomNum FROM Student Where (Fname like '%$first%' or NickName like '%$first%') and Lname like '%$last%';");
  }
  else
  {
    $sql = $db->query("SELECT Lname, Fname, RoomNum FROM Student where (Fname like '%$first%' or NickName like '%$first%')  and Lname like '%$last%' and RoomNum like '%$room%'");
  }
  mysqli_close($db);
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
      <td>
        <form name="resident" action="finalCreate.php" method="post">
          <fieldset>

            <lable><h2>Check-In Package</h2></lable><br>
            <lable>Select the package owner:</label>
            <select name="resident" required>
              <option value=""></option>
              <?php
                while ($row = $sql->fetch_assoc()){
                  $info = $row['Lname']. ", ". $row['Fname']. "  " . $row['RoomNum'];
                  echo "<option value=\"" . $info . "\">" . $info . "</option>";
                }
              ?>
            </select><br><br>
            <textarea rows = "3" cols="50" name="description" placeholder="Description" required></textarea><br><br>
            <lable>Perishable:&nbsp</label>
            <input type="radio" name="perishable" value='y' required> Yes
            <input type="radio" name="perishable" value='n'> No <br><br>

            <input type="submit" name="eCreate" value="Create Package">
          </fieldset>
        </form>
      </td>

  </table>
</body>
</html>