<?php
include('./back_end/reg.php');
include('./back_end/login.php');
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom" id="main-navigation">

    <!--    <button class="rotate sidebar-collapse btn mr-auto" id="menu-toggle">-->
    <!--        <span class="fas fa-chevron-left fa-2x"></span>-->
    <!--    </button>-->

    <div class="navbar-brand">
        <a href="#"><img class="nav-logo" src="./img/logo.png"></a>
    </div>

    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav ml-auto">

            <li class="nav-item">
                <button class="btn" data-toggle="modal" data-target="#login"><i class="fas fa-address-card"></i>
                    Aanmelden
                </button>
            </li>

            <!-- <li class="nav-item">
                <button class="btn" data-toggle="modal" data-target="#register"><i class="fas fa-address-card"></i> Register</button>
            </li> -->

        </ul>

    </div>


    <!-- Login -->
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../back_end/login.php" method="post">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Email" aria-label="Email"
                                   aria-describedby="basic-addon1" name="username">
                        </div>

                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Wachtwoord" aria-label="Password"
                                   aria-describedby="basic-addon1" name="password">
                        </div>
                        <a class="btn" data-dismiss="modal" data-toggle="modal" data-target="#register"><i
                                    class="fas fa-sign-in-alt"></i> Register</a>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-primary">Login</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Register -->
    <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="Register" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Register</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../back_end/reg.php" method="post">
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Email" aria-label="Email"
                                   aria-describedby="basic-addon1" name="email">
                            <span class="error"></span>
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Username" aria-label="Username"
                                   aria-describedby="basic-addon1" name="username">
                            <span class="error"></span>
                        </div>

                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Wachtwoord" aria-label="Password"
                                   aria-describedby="basic-addon1" name="password">
                            <span class="error"></span>
                        </div>
                        <div class="form-group">
                            <!--                            <label for="exampleFormControlSelect1">Rol</label>-->
                            <select class="form-control" id="exampleFormControlSelect1" name="role">
                                <option value="student">Student</option>
                                <option value="docent">Docent</option>

                            </select>
                        </div>
                        <a class="btn" data-dismiss="modal" data-toggle="modal" data-target="#login"><i
                                    class="fas fa-sign-in-alt"></i> Login</a>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="submit" class="btn btn-outline-primary" value="submit">Register</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</nav>
