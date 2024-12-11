<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Noa – Bootstrap 5 Admin & Dashboard Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
        content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit.">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="../assets/images/brand/favicon.ico" />

    <!-- TITLE -->
    <title>Fogot Password </title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="../assets/css/loginstyle.css" rel="stylesheet" />
    <link href="../assets/css/skin-modes.css" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="../assets/css/icons.css" rel="stylesheet" />

</head>

<body class="ltr login-img">

    <!-- GLOABAL LOADER -->
    <div id="global-loader">
        <img src="../assets/images/loader.svg" class="loader-img" alt="Loader">
    </div>
    <!-- End GLOABAL LOADER -->

    <!-- PAGE -->
    <div class="page">
        <div>
            <!-- CONTAINER OPEN -->
            <div class="col-12 container-login100">
                <div class="row">
                    <div class="col col-login mx-auto">
                        <form class="card shadow-none" method="post">
                            <div class="card-body">
                                <div class="text-center">
                                    <span class="login100-form-title">
                                        Forgot Password
                                    </span>
                                    <p class="text-muted">Enter the email address registered on your account</p>
                                </div>
                                <div class="pt-3" id="forgot">
                                    <div class="form-group">
                                        <label class="form-label" for="eMail">E-Mail:</label>
                                        <input class="form-control" id="eMail" placeholder="Enter Your Email"
                                            type="email">
                                    </div>
                                    <div class="submit">
                                        <a class="btn btn-primary d-grid" href="index.html">Submit</a>
                                    </div>
                                    <div class="text-center mt-4">
                                        <p class="text-dark mb-0">Forgot It?<a class="text-primary ms-1"
                                                href="{{route('user.login_user')}}">Send
                                                me Back</a></p>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <div class="d-flex justify-content-center my-3">
                                    <a href="javascript:void(0)" class="social-login  text-center me-4">
                                        <i class="fa fa-google"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="social-login  text-center me-4">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="social-login  text-center">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- CONTAINER CLOSED -->
        </div>
    </div>
    <!--END PAGE -->

    <!-- JQUERY JS -->
    <script src="../assets/js/jquery.min.js"></script>

    <!-- BOOTSTRAP JS -->
    <script src="../assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="../assets/plugins/p-scroll/perfect-scrollbar.js"></script>

    <!-- STICKY JS -->
    <script src="../assets/js/sticky.js"></script>

    <!-- COLOR THEME JS -->
    <script src="../assets/js/themeColors.js"></script>

    <!-- CUSTOM JS -->
    <script src="../assets/js/custom.js"></script>

</body>

</html>