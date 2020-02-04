<?php
header_remove();
//session_start();
//include("back_end/db_config.php");
//echo $_SESSION['username'];
if (!isset($_SESSION['username'])) {
    echo('<ul class="navbar-nav ml-auto">

            <li class="nav-item">
                <button class="btn" data-toggle="modal" data-target="#login"><i class="fas fa-address-card"></i>
                    Aanmelden
                </button>
            </li>

            </ul>');
} else {
    if (isset($_SESSION['role'])) {
        $role = $_SESSION['role'];
        switch ($role) {
            case "student":
                echo('<div>
                      <a class="btn btn-light" id="profile_button" href="../index.php?content=dashboard_student" role="button">Profile</a>
                      <a class="btn btn-light" id="question_button" href="../index.php?content=question" role="button">Stel vraag</a>
                      <a class="btn btn-light" id="logout_button" href="../back_end/logout.php" role="button">Log out</a>
                      </div>');
                break;
            case "docent":
                echo('<div>
                      <a class="btn btn-light" id="profile_button" href="../index.php?content=dashboard_docent" role="button">Profile</a>
                      <a class="btn btn-light" id="logout_button" href="../back_end/logout.php" role="button">Log out</a>
                      </div>');
                break;
            case "admin":
                echo('<div>
                      <a class="btn btn-light" id="profile_button" href="../index.php?content=dashboard_admin" role="button">Profile</a>
                      <a class="btn btn-light" id="logout_button" href="../back_end/logout.php" role="button">Log out</a>
                      </div>');
                break;
        }
    }
}