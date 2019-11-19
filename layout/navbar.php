<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">

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
                <button class="btn" data-toggle="modal" data-target="#login"><i class="fas fa-sign-in-alt"></i> Login</button>
            </li>

            <li class="nav-item">
                <button class="btn" data-toggle="modal" data-target="#register"><i class="fas fa-address-card"></i> Register</button>
            </li>

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
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline-primary">Login</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Logout -->
    <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="Register" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">register</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline-primary">Register</button>
                </div>
            </div>
        </div>
    </div>
</nav>