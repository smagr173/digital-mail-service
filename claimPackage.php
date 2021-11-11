<?php
  include 'eCheckOut.php';

  $packageInfo = $_POST['packageInfo'];

  $DB_HOST='localhost';
  $DB_USER='cbeau738';
  $DB_PASS='Qu7rutru';
  $DB_NAME='MailSafe';

  $db = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

  $first;
  $last;
  $room;
  $description;
  $start=0;

  for ($i = 0; $i < strlen($packageInfo); $i++)
  {

    if ($packageInfo[$i]==',') //lastname
    {
      $space=False;
      $last = substr($packageInfo,$start,$i);
      $i++;
      $start=$i+1;
    }
    else if ($packageInfo[$i]== ' ')
    {
      $i++;
      if($packageInfo[$i]==' ')
      {
        $first = substr($packageInfo,$start, $i-1-$start);
        $start=$i+1;
      }
      else if ($packageInfo[$i]=='-')
      {
        $room = substr($packageInfo,$start, $i-1-$start);
        $start=$i+2;
      }
    }

  }
  $description =substr($packageInfo,$start);

  $sql = $db->query("Update Package set Claimed = 'Y' Where Fname = '$first' and Lname = '$last' and RoomNum = '$room' and Info= '$description'");


  if ($sql) {
      echo "Package checked out<br>";
  }
  else {
      echo "Error: " . $sql . "<br>";
  }

  mysqli_close($db);

?>
<html>
  <!--<body>
    <h4>\<?php echo $first ?>\</h4><br>
    <h4>\<?php echo $last ?>\</h4><br>
    <h4>\<?php echo $room ?>\</h4><br>
    <h4>\<?php echo $description ?>\</h4><br>
  </body>-->
</html>