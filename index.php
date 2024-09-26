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