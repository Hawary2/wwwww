<!-- mainmainNavbar.php -->

<nav class="navbar navbar-expand-lg navbar-dark bg-black shadow sticky-top p-0 navbar-custom">
    <div class="container-fluid">
        <a href="index.php" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
            <img src="img/22222.png" style="width:30px;" alt="">
           <h1 style="text-transform: lowercase; color: #6610f2;">brouva</h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ms-auto p-4 p-lg-0">
                <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="index.php#category" class="nav-link">Category</a></li>
				<li class="nav-item"><a href="products-index.php" class="nav-link">products</a></li>
                <li class="nav-item"><a href="index.php#about" class="nav-link">About</a></li>
                <li class="nav-item"><a href="contact.php" class="nav-link">Contact Us</a></li>
                <li class="nav-item"><a href="blog-index.php" class="nav-link">Blog</a></li>
                <?php
                session_start();
                if (isset($_SESSION['login_admin'])) {
                    $myusername = $_SESSION['login_admin'];
                    echo '<li class="nav-item"><a href="adminAccount.php" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">VIEW ACCOUNT<i class="fa fa-arrow-right ms-3"></i></a></li>';
                } elseif (isset($_SESSION['login_user'])) {
                    $myusername = $_SESSION['login_user'];
                    echo '<li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">'.$myusername.'<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="seekerAccount.php">My Profile</a></li>
                            <li><a href="AppliedJobs.php">Jobs Applied</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </li>';
                    echo '<li class="nav-item"><a href="jobs.php" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">VIEW JOBS<i class="fa fa-arrow-right ms-3"></i></a></li>';
                } elseif (isset($_SESSION['login_employer'])) {
                    $myusername = $_SESSION['login_employer'];
                    echo '<li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">'.$myusername.'<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="employerAccount.php">My Account</a></li>
                            <li><a href="postjob.php">Post a Job</a></li>
                            <li><a href="ViewApplicants.php">View Applications</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </li>';
                } else {
                    echo '<li class="nav-item"><a id="loginAnchor" class="nav-link" href="#" data-toggle="modal" data-target="#myEmployerModal">Sign In/Sign Up</a></li>';
                    echo '<li class="nav-item"><a href="jobs.php" class="btn btn-go-to-portal rounded-0 py-2 px-lg-4 d-none d-lg-block">GO TO PORTAL <i class="fa fa-arrow-right ms-2"></i></a></li>';
                }
                ?>
            </ul>
            <!-- Google Translate Widget -->
            <div id="google_translate_element"></div>
        </div>
    </div>
</nav>

<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({ pageLanguage: 'en', includedLanguages: 'ar,en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE }, 'google_translate_element');
    }
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
