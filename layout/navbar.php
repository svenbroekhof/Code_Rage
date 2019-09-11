<nav class="navbar navbar-expand-lg navbar-dark" id="navbar">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="nav">

        <!-- Home nav-item aan rechter kant. -->
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-text nav-link" href="./index.php?content=homepage">
                    <img src="./img/icon/logo.png" width="200px" height="40px">Home</a>
            </li>
        </ul>

        <!-- Aanmelden en Inloggen aan de linkerkant. -->
        <ul class="navbar-nav ml-auto">

            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>

            <li class="nav-item active">
                <a class="nav-text nav-link" href="./index.php?content=register"><i class="fas fa-file-signature"></i> Register</a>
            </li>

            <li class="nav-item active">
                <a class="nav-text nav-link" href="./index.php?content=login"><i class="fas fa-sign-in-alt"></i> Login</a>
            </li>


        </ul>

    </div>
</nav>