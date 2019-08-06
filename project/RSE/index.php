<?php
define('DIR', '');
require_once DIR . 'config.php';
$control = new Controller();  
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Home</title>
	<?php $control->getCSS(DIR); 
    $link_to_instagram = "https://www.instagram.com/yenepoya_instituteoftechnology";
    $link_to_twitter = "https://twitter.com/Yen_Institute";
    $link_to_facebook ="https://www.facebook.com/YITENGINEERING";
    $link_to_web="http://www.yit.edu.in";
    ?>
</head>
<body>
    <div class="loading-part">
        <div class="loader-home">Loading...</div>
    </div>
    <div id="wrapper">
        <div class="lines-overlay"></div>
        <div id="main">
            <ul class="social-icons">
                <li>
                    <a href='<?php echo $link_to_twitter; ?>' target='_blank'>
                        <i class="fa fa-twitter"></i>
                    </a>
                </li>
                <li>
                    <a href='<?php echo $link_to_facebook; ?>' target='_blank'>
                        <i class="fa fa-facebook"></i>
                    </a>
                </li>
                <li>
                    <a href='<?php echo $link_to_instagram; ?>' target='_blank'>
                        <i class="fa fa-instagram"></i>
                    </a>
                </li>
                <li>
                    <a href='<?php echo $link_to_web; ?>' target='_blank'>
                        <i class="fa fa-globe"></i>
                    </a>
                </li>
            </ul>
            <header id="header">
                <img src="<?= BASE_URL; ?>assets/user_login_home/logo.png" alt="" class="logo" />
                <h1>Welcome to RSE</h1>
                <nav style="width: fit-content;margin: auto;">
                	<?php $control->sessionMessage(); ?>
                </nav>
                <nav>
                    <ul>
                        <li>
                            <a href="#" class="messages icon-popup icon ion-person-stalker"></a> 
                            <p class="name">Admin</p>
                        </li>
                        <li>
                            <a href="#" class="about icon-popup icon ion-person-stalker"></a>
                            <p class="name">Faculty</p>
                        </li>
                        <li>
                            <a href="#" class="photos icon-popup icon ion-person-stalker"></a>
                            <p class="name">Student</p>
                        </li>
                    </ul>
                </nav>
            </header>
        </div>
    </div>
    <div class="global-content">
        <div class="slider-nav">
            <a href="#" class="prev-button">
                <i class="fa fa-hand-o-left"></i>
            </a>
            <a href="#" class="close-content">
                <i class="icon ion-close-round"></i>
            </a>
            <a href="#" class="next-button">
                <i class="fa fa-hand-o-right"></i>
            </a>
        </div>
        <section class="content-message slide first">
            <div class="content-in ">
                <div class="content-table">
                    <div class="content-cell">
                        <div class="content-inner">
                            <div class="container">
                                <h1>Admin Login</h1>
                                <span class="border"></span>
                                <div id="countdown_dashboard"></div>
                                <form action="admin_login_validation.php" id="notifyMee" method="POST" class="news-form col-lg-4 col-lg-offset-4">
                                    <div class="form-group">
                                        <div class="controls form-group">
                                            <input type="text"  name="name" required="" placeholder="Write your name"   class="form-control ">
                                            <br>
                                            <input type="password"  name="password" required="" placeholder="Write your password"   class="form-control ">
                                            <br>
                                            <button type="submit" name="admin" class="btn btn-lg btn-block btn-danger submit">Login</button>
                                        </div>
                                    </div>
                                </form>
                                <div class="block-message">
                                    <div class="message">
                                        <p class="notify-valid"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="content-about slide">
            <div class="content-in ">
                <div class="content-table">
                    <div class="content-cell">
                        <div class="content-inner">
                            <h1>Faculty Login</h1>
                            <span class="border"></span>
                            <div class="row contact-info"></div>
                            <form action="faculty_login_validation.php" id="notifyMee" method="POST" class="news-form col-lg-4 col-lg-offset-4">
                                <div class="form-group">
                                    <div class="controls form-group">
                                        <input type="text"  name="name" required="" placeholder="Write your name"   class="form-control ">
                                        <br>
                                        <input type="password"  name="password" required="" placeholder="Write your password"   class="form-control ">
                                        <br>
                                        <button type="submit" name="faculty" class="btn btn-lg btn-block btn-danger submit">Login</button>
                                    </div>
                                </div>
                            </form>
                            <div id="answer"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="content-photos slide last">
            <div class="content-in ">
                <div class="content-table">
                    <div class="content-cell">
                        <div class="content-inner">
                            <div class="container">
                                <h1>Student Login</h1>
                                <span class="border"></span>
                                <div class="photo-collection row"></div>
                                <form action="student_login_validation.php" id="notifyMee" method="POST" class="news-form col-lg-4 col-lg-offset-4">
                                    <div class="form-group">
                                        <div class="controls form-group">
                                            <input type="text"  name="name" required="" placeholder="Write your name"   class="form-control ">
                                            <br>
                                            <input type="password"  name="password" required="" placeholder="Write your password"   class="form-control ">
                                            <br>
                                            <button type="submit" name="student" class="btn btn-lg btn-block btn-danger submit">Login</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <footer id="footer">
        <span class="copyright">&copy; RSE 2019 - Made for awesome people</span>
    </footer>
    <?php $control->getJS(DIR); ?>
</body>
</html>