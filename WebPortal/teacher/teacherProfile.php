<?php
include "../partials/session.php";
include "../partials/messages.php";
include "../partials/faculty_login_required.php";
include "../partials/sql_connect.php";
?>
<?php
    $id = $_SESSION['id'];
    $faculty_res = mysqli_query($conn, "select name,dept,phno from faculty where id = $id");
    $faculty = mysqli_fetch_assoc($faculty_res);
?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./teacher.css">
    <title>Faculty Dashboard | KioskMeet</title>
    <link rel="shortcut icon" href="../KioskMeet_Favicon.png" type="image/x-icon">
    <style>
        a {
            text-decoration: none;  
            color: black;
        }

        a:visited {
            color: black;
        }

        button {
            border: 2px solid black;
            background-color: transparent;
            color: black;
        }
        
        #logout {
            border: none;
            background-color: red;
            color: white;
        }
    </style>
</head>

<body>
    <!-- <?php include "../partials/navbarTeacher.php"  ?> -->
    <nav>
        <div class="left_nav">
            <img src="../media/KioskMeet_Logo.png" class="logo_nav">
        </div>
        <div class="right_nav">
            <a href="teacherProfile.php"><button>Profile</button></a>
            <a href="attendance.php"><button>Attendance</button></a>
            <a href="grades.php"><button>Grades</button></a>
            <a href="/webportal/auth/logout.php"><button id="logout">Logout</button></a>
        </div>
    </nav>
    <div id="container">
        <div id="profile-wrapper">
            <small>Status: Logged in</small>
            <table>
                <?php
                foreach ($faculty as $key => $val) {
                    echo "<tr>
                    <th> $key</th>
                    <td>$val</td>
                    </tr>";
                }
                ?>
            </table>
        </div>
        
    </div>
</body>