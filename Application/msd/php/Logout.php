<?php
    session_start();
    if(isset($_SESSION['type'])) {
        if($_SESSION['type'] == 'donor') {
            session_destroy();
            header("Location: ../ContinueAsDonor.php");
        } elseif ($_SESSION['type'] == 'student') {
            session_destroy();
            header("Location: ../ContinueAsStudent.php");
        }
    }


