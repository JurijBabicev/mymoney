<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login to MyMoney</title>
    <link rel="stylesheet" href="css/index.css"> 
    <link rel="stylesheet" href="bootstrap-5.3.3/css/bootstrap.css">
    <script src="bootstrap-5.3.3/js/bootstrap.js"></script>
    <script src="js/jquery_3_7.js"></script>
    <script src="js/login_registration.js"></script>
</head>
<body>
  <div class="container-sm custom_container">
    <div class="container-sm menu_container">
      <div id="content_box">
        <div class="fun_ico_piggy mb-3"></div>

        <div class="success_msg">
          <div class="card">
            <h5 class="card-header">Wrong login information</h5>
            <div class="card-body" style="text-align: center;\">
              <h5 class="card-title">User not found</h5>
              <p class="card-text">Wrong Email address or user password.<br />Please try again.</p>
              <a href="#" class="btn btn-success" onClick="closeBox('success_msg'); reloadPage();">Ok</a>
            </div>
          </div>
        </div>

        <div class="form-floating mb-3">
          <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating mb-4">
          <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">Password</label>
        </div>
        <div class="d-grid gap-3">
          <input class="btn btn-primary btn-lg fw-bold" type="submit" value="Submit" onClick="userLogin();">
          <input class="btn btn-outline-secondary btn-lg fw-bold" type="submit" value="Registration" onClick="newUser();">
        </div>
      </div>
    </div>
  </div>

</body>
</html>