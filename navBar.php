<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation Bar</title>
    
    
    <style>
        /* Add your custom styles here */
        .navbar {
            <style type="text/css">
        @font-face {
            font-family: 'Libre Baskerville';
            src: url('fonts/Libre_Baskerville.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
        }
        body {
            font-family: 'Libre Baskerville', serif;
        }
        .label-text {
            color: #fff;
            font-size: 15px;
            letter-spacing: 1px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="defaultNavbar1">
                <ul class="nav navbar-nav navbar-right ">
                    <li><a href="index.php">Home</a></li>
                    <?php 
                    // Start session if not already started
                    if (session_status() == PHP_SESSION_NONE) {
                        session_start();
                    }

                    // Check if logged in as user
                    if (isset($_SESSION['login_user'])) {
                        $myusername = $_SESSION['login_user'];
                        echo '<li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">' . $myusername . '<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="seekerAccount.php">My Profile</a></li>
                                    <li><a href="AppliedJobs.php">Jobs Applied</a></li>
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                              </li>';
                    } elseif (isset($_SESSION['login_admin'])) {
                        // Logged in as admin
                        $myusername = $_SESSION['login_admin'];
                        echo '<li><a href="widget/cute.php">Post a blog</a></li>
                              <li><a href="seoinf.php">SEO</a></li>
                              <li><a href="products/cute.php">Post a product</a></li>
                              <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">' . $myusername . '<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="adminAccount.php">My Account</a></li>
                                    <li><a href="ViewApplicantsAdmin.php">View All Applications</a></li>
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                              </li>';
                    } elseif (isset($_SESSION['login_employer'])) {
                        // Logged in as employer
                        $myusername = $_SESSION['login_employer'];
                        echo '<li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">' . $myusername . '<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="employerAccount.php">My Account</a></li>
                                    <li><a href="postjob.php">Post a Job</a></li>
                                    <li><a href="ViewApplicants.php">View Applications</a></li>
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                              </li>';
                    } else {
                        // Not logged in
                        echo '<li><a id="loginAnchor" href="#" data-toggle="modal" data-target="#myEmployerModal"> SignIn/SignUp </a></li>';
                    }
                    ?>
                    <li><a href="#contactus">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Include your modal and other content here if needed -->
    
    <!-- Bootstrap JS and dependencies -->
    
</body>
</html>
