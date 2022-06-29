<?php
session_start();
if (!isset($_SESSION['login'])) {
//echo($_SESSION['login']);
    ?>
<!DOCTYPE html>
<html lang="en">
<!-- =======================================================
  * UI framework bootstrap
  * php programming language
  * System developed by anemos.id web & application developer team
  * contact us +62 812-3342-2006 / +62 878-4686-7493
  * License: https://anemos.id/license/
  * Version control : Github
  ======================================================== -->

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>UD.Tri L | Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <link href="img/logo1.png" rel="icon">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-success">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
              <img class="col-lg-6 d-none d-lg-block " src="img/logo.JPEG">
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">


                    <?php
//pesan login gagal

    @session_start();
    if (isset($_SESSION["info"])) {
        ?>

                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <?php echo $_SESSION["info"]; ?>

                    </div>

                    <?php
unset($_SESSION["info"]);
    }

    ?>
                    <h1 class="h4 text-gray-900 mb-4">Sistem Distribusi Pupuk <br> UD. Tri L</h1>
                  </div>
                  <form class="user" action="isValidLogin.php" method="POST">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="user" name="user"
                        aria-describedby="emailHelp" placeholder="Masukkan Username">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password"
                        placeholder="Masukkan Password">
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Login</button>
                  </form>
                  <hr>
                  <!-- <div class="text-center">
                                        <a class="small" href="forgot-password.html">Lupa Password?</a>
                                    </div> -->

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="content">
        <center class="text-black-50">
          <h6>Designed & Developed by : <a class="text-black-50" href="https://anemos.id/">Anemos.id</a></h6>
        </center>
      </div>
    </div>


  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
<?php
} else {
    header("Location: index.php?m=1&n=1");
    exit();
}
?>