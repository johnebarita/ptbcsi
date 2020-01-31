<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Login</title>

 <?php include 'includes/css.php'?>

</head>

<body class="bg-gradient-primary" style="margin-top: 20rem">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-11 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                    <div id="error_div"></div>
                  </div>
                  <form action="login" method="post" class="user" >
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="inputUsername"  name="username" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="inputPassword" name="password" placeholder="Password" required>
                    </div>
                    <hr>
                      <button type="submit" class="btn btn-primary btn-user btn-block " >Login</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <?php include 'includes/scripts.php'?>
  <script>
      error();
      function error() {
          $("#error").appendTo("#error_div").prop('hidden', false);
      }
  </script>
</body>

</html>
