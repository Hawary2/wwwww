<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Modal SignIn/Registration</title>
<style type="text/css">
  body {
    font-family: 'Libre Baskerville', serif;
    background-color: #fff;
    color: #fff;
  }
  .modal-content {
    border-radius: 15px;
    overflow: hidden;
  }
  .modal-header, .modal-footer {
    border: none;
    background-color: #FFF;
    color: #000;
    text-align: center;
    padding: 15px;
  }
  .modal-header h4, .modal-footer span {
    margin: 0;
  }
  .modal-body {
    padding: 20px;
    background-color: #fff;
    color: #000;
  }
  .modal-body h3 {
    color: #000;
    font-weight: bold;
    margin-bottom: 15px;
  }
  .modal-body form {
    margin: 0;
  }
  .modal-body form .fieldset {
    margin-bottom: 15px;
  }
  .modal-body form .label-text {
    display: block;
    margin-bottom: 5px;
    color: #000;
  }
  .modal-body form input[type="text"], 
  .modal-body form input[type="email"], 
  .modal-body form input[type="password"], 
  .modal-body form input[type="tel"], 
  .modal-body form input[type="date"], 
  .modal-body form input[type="file"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #000;
    border-radius: 5px;
    background-color: #fff;
    color: #000;
    box-shadow: inset 0 1px 3px rgba(0,0,0,0.1);
  }
  .modal-body form input[type="submit"] {
    background-color: #6f42c1;
    color: #fff;
    border: none;
    padding: 10px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }
  .modal-body form input[type="submit"]:hover {
    background-color: #000;
  }
  .nav-tabs {
    margin-bottom: 15px;
  }
  .nav-tabs li a {
    color: #000;
    background-color: #ddd;
    border-radius: 5px 5px 0 0;
    padding: 10px 15px;
  }
  .nav-tabs li.active a {
    background-color: #000;
    border-bottom: none;
    color: #FFF;
  }
  .nav-tabs li a:hover {
    background-color: #ccc;
  }
  .tab-content {
    border: 1px solid #FFF;
    border-radius: 0 0 5px 5px;
    padding: 15px;
    background-color: #FFF;
    color: #FFF;
  }
  .cd-form-bottom-message {
    text-align: center;
    margin-top: 20px;
  }
  .btn-default {
    background-color: #6f42c1;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }
  .btn-default:hover {
    background-color: #000;
  }
  .hide-password {
    float: right;
    margin-top: -30px;
    margin-right: 10px;
    cursor: pointer;
    color: #6f42c1;
  }
</style>
<script src='https://www.google.com/recaptcha/api.js'></script>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</head>
<body>

<!-- SignIn Modal -->
<div class="modal fade" id="myEmployerModal" tabindex="-1" role="dialog" aria-labelledby="myEmployerModalLabel" style="background-image:url('img/siginBack.jpg'); background-size: cover; background-repeat: no-repeat;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myEmployerModalLabel">Sign In</h4>
		<button id="empSignInCloseBtn" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <form class="cd-form" method="post" action="your_login_endpoint.php">
          <p class="fieldset">
            <label class="label-text" for="email">E-mail</label>
            <input class="full-width has-padding has-border" id="email" name="email" type="email" placeholder="E-mail" required>
          </p>
          <p class="fieldset">
            <label class="label-text" for="password">Password</label>
            <input class="full-width has-padding has-border" id="password" name="password" type="password" placeholder="Password" required>
            <a href="#0" class="hide-password">Show</a>
            <div id="loginresult" style="display:none;">Error message here!</div>
          </p>
          <p class="fieldset">
            <input id="loginsubmit" class="full-width" type="submit" name="loginsubmit" value="Login">
          </p>
        </form>
        <p class="cd-form-bottom-message">
          <button id="regNowBtn" class="btn btn-default" data-toggle="modal" data-target="#empsignup">Register Now</button>
        </p>
        <button id="regEmpModalBtn" style="display:none;" data-toggle="modal" data-target="#empsignup"></button>
      </div>
      <div class="modal-footer">
        <span>Need help? Contact support.</span>
      </div>
    </div>
  </div>
</div>

<!-- SignUp Modal -->
<div class="modal fade" id="empsignup" tabindex="-1" role="dialog" aria-labelledby="myEmployerModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myEmployerModalLabel">New Account</h4>
		<button id="signUpCloseBtn" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#employerRegister">Employer Register</a></li>
          <li><a data-toggle="tab" href="#jobseekerRegister">Jobseeker Register</a></li>
        </ul>
        <div class="tab-content">
          <div id="employerRegister" class="tab-pane fade in active">
            <h3>Register as Employer</h3>
            <form class="cd-form" method="post" action="registerEmployer.php" enctype="multipart/form-data">
              <p class="fieldset">
                <label class="label-text" for="name">Company Name</label>
                <input class="full-width has-padding has-border" id="name" name="name" type="text" placeholder="RFL, DATASOFT..." required>
              </p>
              <p class="fieldset">
                <label class="label-text" for="email">E-mail</label>
                <input class="full-width has-padding has-border" id="email" name="email" type="email" placeholder="example@gmail.com" required>
              </p>
              <p class="fieldset">
                <label class="label-text" for="password">Password</label>
                <input class="full-width has-padding has-border" id="password" name="password" type="password" placeholder="Password" required>
                <a href="#0" class="hide-password">Show</a>
              </p>
              <p class="fieldset">
                <label class="label-text" for="phone">Phone</label>
                <input class="full-width has-padding has-border" id="phone" name="phone" type="tel" placeholder="019122344555" required>
              </p>
              <p class="fieldset">
                <label class="label-text" for="address">Address</label>
                <input class="full-width has-padding has-border" id="address" name="address" type="text" placeholder="H#12, R#5, DIT Project, Dhaka-1212" required>
              </p>
              <p class="fieldset">
                <<label class="label-text" for="logo">Company Logo (Max 10MB)</label>
<input class="full-width has-padding has-border" id="logo" name="logo" type="file" accept="image/*" max-file-size="10485760" required>
              </p>
              <p class="form-group">
                <button id="regsubmit" class="full-width has-padding btn-success" type="submit">Create Account</button>
              </p>
            </form>
          </div>
          <div id="jobseekerRegister" class="tab-pane fade">
            <h3>Register as Jobseeker</h3>
            <form class="cd-form" method="post" action="registerJobseeker.php" enctype="multipart/form-data">
              <p class="fieldset">
                <label class="label-text" for="name">Username</label>
                <input class="full-width has-padding has-border" id="name" name="name" type="text" placeholder="Username" required>
              </p>
              <p class="fieldset">
                <label class="label-text" for="email">E-mail</label>
                <input class="full-width has-padding has-border" id="email" name="email" type="email" placeholder="E-mail" required>
              </p>
              <p class="fieldset">
                <label class="label-text" for="password">Password</label>
                <input class="full-width has-padding has-border" id="password" name="password" type="password" placeholder="Password" required>
                <a href="#0" class="hide-password">Show</a>
              </p>
              <p class="fieldset">
                <label class="label-text" for="dob">Date of Birth</label>
                <input class="full-width has-padding has-border" id="dob" name="dob" type="date" required>
              </p>
              <p class="fieldset">
                <label class="label-text" for="skills">Skills</label>
                <input class="full-width has-padding has-border" id="skills" name="skills" type="text" placeholder="Skills" required>
              </p>
              <p class="fieldset">
                <label class="label-text" for="resume">Upload CV (Max 20MB)</label>
<input class="full-width has-padding has-border" id="resume" name="resume" type="file" accept=".pdf,.doc,.docx,.txt" max-file-size="20971520" required>
              </p>
              <p class="form-group">
                <button id="regsubmit" class="full-width has-padding btn-success" type="submit">Create Account</button>
              </p>
            </form>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <span>Welcome to our community!</span>
      </div>
    </div>
  </div>
</div>

<!-- Registration Success Modal -->
<div class="modal fade" id="regEmpSuccess" tabindex="-1" role="dialog" aria-labelledby="myEmployerModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button id="empSignInCloseBtn" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myEmployerModalLabel">Registration Successful!</h4>
      </div>
      <div class="modal-body">
        <span>Login to continue</span>
        <div class="center-block">
          <button id="cancelEmpregModal" type="button" class="btn btn-default" data-dismiss="modal">Done</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="js/registerUser.js"></script>

</body>
</html>
	