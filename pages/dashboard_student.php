<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard <?php if (isset($_SESSION['username'])) {echo "van: " . $_SESSION ["username"];}?></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6"></div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-lg-6">
                        <div class="card">
                          <div class="card-header">
                              <h5 class="m-0">Mijn vragen</h5>
                          </div>
                            <div class="card-body">
                                <a href="#" class="card-link">php echo not working</a> <br>
                                <a href="#" class="card-link">javascript alert() error</a>
                            </div>
                        </div>

                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>

                                <p class="card-text">
                                    Some quick example text to build on the card title and make up the bulk of the card's
                                    content.
                                </p>
                                <a href="#" class="card-link">Card link</a>
                                <a href="#" class="card-link">Another link</a>
                            </div>
                        </div><!-- /.card -->
                    </div>
                    <!-- /.col-md-6 -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="m-0">Meest gebruikte tags</h5>
                            </div>
                            <div class="card-body">
                                <p class="card-text">Php: 5 posts</p>
                                <p class="card-text">Python: 2 posts</p>
                                <p class="card-text">Javascript: 1 posts</p>
                            </div>
                        </div>

                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h5 class="m-0">Openstaande vragen</h5>
                            </div>
                            <div class="card-body">
                              <div class="row">
                                <div class="col-sm">
                                  <p class="card-text">PHP undefined error</p>
                                </div>

                                <div class="col-sm">
                                  <a href="#" class="btn btn-success" style="float: right;">Open</a>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer" id="footer">
        <!-- Default to the left -->
        <strong>Copyright &copy; 2019-2020 <a href="#">CodeRage</a>.</strong> All rights reserved.
    </footer>
</div>
<!-- ./wrapper -->
