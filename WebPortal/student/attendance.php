<?php
include "../partials/session.php";
include "../partials/messages.php";
include "../partials/student_login_required.php";
include "../partials/sql_connect.php";
?>
<?php
$id = $_SESSION["id"];
$subjects = mysqli_query(
  $conn,
  "select distinct(subject) as subject from attendance where s_id = $id"
);
$attendance = array();
while ($temp = mysqli_fetch_assoc($subjects)) {
  $temp = $temp["subject"];
  $tot = mysqli_fetch_assoc(
    mysqli_query(
      $conn,
      "select count(*) as ct from attendance where s_id = $id and subject = '$temp'"
    )
  )["ct"];
  $present = mysqli_fetch_assoc(
    mysqli_query(
      $conn,
      "select count(*) as ct from attendance where s_id = $id and status = '1' and subject = '$temp'"
    )
  )["ct"];
  $percent = ($present/$tot) * 100;
  array_push($attendance, array($temp, $percent));
}

?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="student.css">
  <link rel="shortcut icon" href="../KioskMeet_Favicon.png" type="image/x-icon">
  <title>Attendance | KioskMeet</title>
</head>
<style>
  body {
      background-image: url(../media/bg_png.png);
      background-repeat: no-repeat;
      background-color: #f8f8f8;
      background-position-y: bottom;
      background-position-x: center;
      background-size: 70%;
  }

  #container {
    margin-left: auto;
    margin-right: auto;
    margin-top: 100px;
    padding: 40px;
    background: #e6e6e6;
    max-width: 1000px;
    box-shadow: 0px 5px 30px -3px rgb(37, 37, 37);
    background-color: rgb(255,255,255);
    border-radius: 12px;
  }

  .heading {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -1550%);
  }

  table {
    border-collapse: separate;
    border-spacing: 0 1rem;

  }

  th,
  td {
    text-align: center;
  }

  tr:nth-child(odd) {
        background-color: rgb(255,255,255,0.8);
        color: black;
    }

    tr:nth-child(even) {
        background-color: rgba(0, 0, 0, 0.8);
        color: white;
    }
    
  tr {
    box-shadow: 0px 5px 20px -15px rgba(37, 37, 37);
  }
</style>

<body>
  <?php include "../partials/navbarStudent.php"  ?>
  <div class="heading">
    <h3 style="color: white;">ATTENDANCE</h3>
  </div>
  <div id="container">
    <table style="width:100%">
      <tr style="height:60px">
        <th style="width:10%" ;>S. NO.</th>
        <th>SUBJECT</th>
        <th style="width:18%">ATTENDANCE %</th>
      </tr>
      <?php
      $ct = 1;
      foreach ($attendance as $res) {
        echo '<tr style="height:50px">';
        echo "<td>$ct.</td>";
        $ct = $ct + 1;
        $subject = $res[0];
        $percent = round($res[1],2);
        echo "<td>$subject</td>";
        echo "<td>$percent</td>";
        echo "</tr>";
      }
      ?>

    </table>
  </div>
</body>

</html>