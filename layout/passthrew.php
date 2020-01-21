<?php

include("back_end/db_config.php");


if (!isset($_SESSION['username'])) {
    echo('<ul class="navbar-nav ml-auto">

            <li class="nav-item">
                <button class="btn" data-toggle="modal" data-target="#login"><i class="fas fa-address-card"></i>
                    Aanmelden
                </button>
            </li>

            </ul>');
} else {
    $_SESSION['role'];
    if (isset($_POST['role'])) {
        $role = $_POST['role'];
  var_dump($role);
         switch ($role) {
            case "student":
                echo('<a class="btn btn-primary" href="../index.php?content=dashboard_student" role="button">Profiel</a>');
                echo('<a class="btn btn-primary" href="../back_end/logout.php" role="button">Log uit</a>');
                break;
            case "docent":
                echo('<a class="btn btn-primary" href="../index.php?content=dashboard_docent" role="button">Profiel</a>');
                echo('<a class="btn btn-primary" href="../back_end/logout.php" role="button">Log uit</a>');
                break;
            case "admin":
                echo('<a class="btn btn-primary" href="../index.php?content=dashboard_admin" role="button">Profiel</a>');
                echo('<a class="btn btn-primary" href="../back_end/logout.php" role="button">Log uit</a>');
                break;
        }
    }
//    session_destroy();

}
?>