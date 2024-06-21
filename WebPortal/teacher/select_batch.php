<?php
include "../partials/session.php";
include "../partials/messages.php";
include "../partials/faculty_login_required.php";
include "../partials/navbarTeacher.php";
include "../partials/sql_connect.php";
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $batch = $_POST["batch"];
    $_SESSION["batch"] = $batch;
    header("location: grades.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="teacher.css">
    <title>Grades | KioskMeet</title>
    <link rel="shortcut icon" href="../KioskMeet_Favicon.png" type="image/x-icon">
</head>

<body>
    <?php
    $id = $_SESSION["id"];
    $res = mysqli_query($conn,"select batch from faculty, faculty_subjects where id = $id and id = f_id"); 
    $batches = array();
    while($temp = mysqli_fetch_assoc($res))
    {
        array_push($batches,$temp['batch']);
    }
    ?>

    <div id="form-wrapper">
        <form action="select_batch.php" method="POST">
            <h2 style="color: black;">Select Batch</h2><br> <div id="batch">
            <select name="batch" id="">
                <?php
                foreach ($batches as $batch) {
                    echo "<option value='$batch'>$batch</option>";
                }
                ?>

            </select> </div><br> <div class="btn">
            <input type="submit" value="Select" style="background-color: white;"> </div>
        </form>
    </div>
</body>

</html>