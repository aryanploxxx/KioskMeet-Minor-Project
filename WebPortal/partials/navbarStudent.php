<?php
$navbar = '
    <nav>
        <div class="left_nav">
            <img src="../media/KioskMeet_Logo.png" class="logo_nav">
        </div>
        <div class="right_nav">
            <a href="studentProfile.php"><button>Profile</button></a>
            <a href="attendance.php"><button>Attendance</button></a>
            <a href="results.php"><button>Result</button></a>
            <a href="/webportal/auth/logout.php"><button id="logout">Logout</button></a>
        </div>
    </nav>
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
';
echo $navbar;
