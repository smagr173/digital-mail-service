<?php

  include 'eCheckOut.php';
  if (empty($_POST['eFname']))
  {
    $first = "";
    $last = "";
    $room = "";
  }
  else
  {
    $first = $_POST['eFname'];
    $last = $_POST['eLname'];
    $room = $_POST['eRoomNum'];
  }

  $DB_HOST='localhost';
  $DB_USER='cbeau738';
  $DB_PASS='Qu7rutru';
  $DB_NAME='MailSafe';

  $db = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
  if ($room == "")
  {
    $sql = $db->query("Select * FROM Package where Fname like '%$first%' and Lname like '%$last%' and (Claimed = 'N' or Claimed = 'n')");
  }
  else
  {
    $sql = $db->query("SELECT * FROM Package where Fname like '%$first%' and Lname like '%$last%' and RoomNum like '%$room%' and (Claimed = 'N' or Claimed = 'n')");
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
        <form name="packageInfo" action="eClaimPackage.php" method="post">
          <fieldset>

            <lable><h2>Check-Out Package</h2></lable><br>
            <lable>Select the package:</label>
            <select name="packageInfo" required>
              <option value=""></option>
              <?php
                while ($row = $sql->fetch_assoc()){
                  $info = $row['Lname']. ", ". $row['Fname']. "  " . $row['RoomNum'] . " - " . $row['Info'];
                  echo "<option value=\"" . $info . "\">" . $info . "</option>";
                }
              ?>
            </select><br><br>

            <input type="submit" name="eCheckOut" value="Check-Out Package">
          </fieldset>
        </form>
      </td>
    </table>
  </body>
</html>