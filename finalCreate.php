<?php
  include 'eCreatePackage.php';

  require_once('PHPMailer/PHPMailerAutoload.php');

  $mail = new PHPMailer();
  $mail->isSMTP();
  $mail->SMTPAuth = true;
  $mail->SMTPSecure = 'tls';
  $mail->Host = 'smtp.gmail.com';
  $mail->Port = 587;
  $mail->isHTML();
  $mail->Username = 'user2123@gmail.com';
  $mail->Password = '234324234324';
  $mail->SetFrom('no-reply@MailToEamil');
  $mail->Subject = 'New Package';


  $resident = $_POST['resident'];
  $perishable = $_POST['perishable'];
  $description = $_POST['description'];
  $pstatus;
  
  $DB_HOST='localhost';
  $DB_USER='cbeau738';
  $DB_PASS='Qu7rutru';
  $DB_NAME='MailSafe';

  $db = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

  $first;
  $last;
  $room;
  $start=0;
  $email;
  $temp;

  for ($i = 0; $i < strlen($resident); $i++)
  {
    if ($resident[$i]==',') //lastname
    {
      $space=False;
      $last = substr($resident,$start,$i);
      $i++;
      $start=$i+1;
    }
    else if ($resident[$i]== ' ')
    {
      $i++;
      if($resident[$i]==' ')
      {
        $first = substr($resident,$start, $i-1-$start);
        $start=$i+1;
        break;
      }
    }

  }
  $room = substr($resident,$start);

  $sql = $db->query("INSERT INTO Package (Fname, Lname, perishable, Claimed, RoomNum, Info)
  VALUES ('$first', '$last', '$perishable', 'n', '$room', '$description')");

  // The following code produces this fatal error: Fatal error: Uncaught Error: Call to a member function fetch_assoc() on bool in /www/MailToEmail/dev/finalCreate.php:64
   $sql2 = $db->query("Select * from Student where Fname = '$first' and Lname = '$last' and RoomNum = '$room'");


   $temp = $sql2->fetch_assoc();
   $email= $temp['Email'];
   //echo $email;
  
  if ($perishable == 'y' or $perishable == 'Y')
  {
    $pstatus = 'perishable';
  }
  else
  {
    $pstatus = 'non-perishable';
  }
   
  if ($sql)
  {
      echo "Package created successfully<br>";

      $mail->Body = "Hello, $first. <br>You have a $pstatus package waiting to be picked up.<br><br>Description: $description. <br><br>Have a nice day.";
      $mail->AddAddress($email);
      $mail->send();
  }
  else
  {
      echo "Error: " . $sql . "<br>";
  }
  if ($sql2)
  {
       echo "<br>Email Sent";
  }
  else
  {
    echo "<br>Email Failed to Send";
  }

  mysqli_close($db);

?>
<html>
  <!--<body>
    <h4>\<?php echo $first ?>\</h4><br>
    <h4>\<?php echo $last ?>\</h4><br>
    <h4>\<?php echo $room ?>\</h4><br>
    <h4>\<?php echo $perishable ?>\</h4><br>
  </body>-->
</html>
