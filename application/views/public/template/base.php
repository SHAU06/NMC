<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('/assets/images/apple-icon.png')?>">
        <link rel="icon" type="image/png" href="<?= base_url('/assets/images/plane.png')?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>
            <?= $Page[0]->title ?>
        </title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
            name='viewport' />
        <!--     Fonts and icons     -->
        <link rel="stylesheet" type="text/css"
            href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
        <!-- CSS Files -->
        <link href="<?= base_url('/assets/css/login-register.css') ?>" rel="stylesheet">
        <link href="<?= base_url('/assets/css/style.css') ?>" rel="stylesheet">
        <?php if(basename($_SERVER['PHP_SELF'])=="AboutUs"): ?>
        <link href="<?= base_url('/assets/css/aboutnashik.css') ?>" rel="stylesheet">
        <?php endif?>
        <?php if(basename($_SERVER['PHP_SELF'])=="FoodStuff"): ?>
        <link href="<?= base_url('/assets/css/FoodStuff.css') ?>" rel="stylesheet">
        <?php endif?>
        <script async>
        (function(w, d) {
            w.CollectId = "5e3f04deb2ce7a09e6362b7c";
            var h = d.head || d.getElementsByTagName("head")[0];
            var s = d.createElement("script");
            s.setAttribute("type", "text/javascript");
            s.setAttribute("src", "https://collectcdn.com/launcher.js");
            h.appendChild(s);
        })(window, document);
        </script>
    </head>

    <body>

        <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100"
            id="sectionsNav">
            <div class="navbar-translate">
                <a class="navbar-brand" href="<?= base_url('MainC/')?>">
                    <i class="fa fa-plane"> </i>
                    NASHIK TOURISM </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('MainC/')?>">
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('MainC/AboutUs')?>">
                            About Nashik
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('MainC/Dest')?>">
                            Destination
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('MainC/FoodStuff')?>">
                            Food Stuff
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('MainC/Culture')?>">
                            Culture
                        </a>
                    </li>
                    <li class="nav-item nav-link">
                        <form action="<?= base_url('MainC/Search')?>" method="post" class="form-inline ml-auto ">
                            <?=  form_open('MainC/Search','method="post" class="form-inline ml-auto " '); ?>
                            <button type="submit" class="btn btn-white btn-raised btn-fab btn-round">
                                <i class="material-icons"> search</i>
                            </button>
                            <div class="form-group">
                                <input name="query" type="search" class="form-control" autocomplete="off" placeholder=" Search..">
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
            </div>
        </nav>
        <div class="page-header header-filter responsive" data-parallax="true"
            style="background-image: url(<?= base_url('assets/images/').$Page[0]->img ?>);">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="title">Welcome to Nashik</h1>
                        <h3>
                            Traveling - It leaves you speechless,then turns you into a Storyteller.
                        </h3>
                        <br>
                        <a href="https://www.youtube.com/watch?v=UaoUmEVWeco" target="_blank"
                            class="btn btn-danger btn-raised btn-lg">
                            <i class="fa fa-play"></i> Watch video
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="main main-raised">
            <div class="site-section">

                <?= $Page['data'] ?>
            </div>
            <div class="section section-download" id="download-section" data-background-color="black">
                <div class="container">
                    <br>
                    <div class="sharing-area text-center">
                        <div class="row justify-content-center">
                            <h3 style="font-size: 25px;">Thank you for supporting us!</h3>
                        </div>
                        <a id="twitter" class="btn btn-raised btn-twitter" data-toggle="modal" href="javascript:void(0)"
                            onclick="openLoginModal();">
                            <i class="fa fa-phone"></i> Contact Us
                        </a>
                        <a href="https://www.facebook.com/nashik.tourism.9">
                            <button id="facebook" class="btn btn-raised btn-facebook sharrre">
                                <i class="fa fa-facebook-square"></i> Facebook
                            </button>
                        </a>
                        <a href="https://www.instagram.com/nashik_tourism/?hl=en">
                            <button id="googlePlus" class="btn btn-raised btn-google-plus sharrre">
                                <i class="fa fa-instagram"></i> Instagram
                            </button>
                        </a>
                        <a id="github" class="btn btn-raised btn-github" data-toggle="modal" href="javascript:void(0)"
                            onclick="openRegisterModal();">
                            <i class="fa fa-comments"></i> FeedBack
                        </a>
                        <div class="modal fade login" id="loginModal">
                            <div class="modal-dialog login animated">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true">&times;</button>
                                        <h4 class="modal-title"></h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="box">
                                            <div class="content">
                                                <div class="error"></div>
                                                <div class="form loginBox">
                                                    <form method="post" id="Contact"
                                                        action="<?= base_url('MainC/Contact')?>" accept-charset="UTF-8">
                                                        <?= form_open() ?>
                                                      <input id="name" class="form-control" type="text"  autocomplete="off"
                                                            placeholder="Name" name="name">
                                                        <input id="email" class="form-control"   autocomplete="off" type="text"
                                                            placeholder="Email" name="email">
                                                        <input id="msg" class="form-control" type="text" autocomplete="off"
                                                            placeholder="Message" name="msg">
                                                        <input class="btn btn-login" type="submit" value="Submit">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box">
                                            <div class="content registerBox" style="display:none;">
                                                <div class="form">
                                                    <form method="post" id="Feedback" html="{:multipart=>true}"
                                                        data-remote="true" action="<?= base_url('MainC/Feedback')?>"
                                                        accept-charset="UTF-8">
                                                        <?= form_open() ?>
                                                        <input id="text" class="form-control" type="text"  autocomplete="off"
                                                            placeholder="Name" name="name">
                                                        
                                                        <input id="msg" class="form-control" type="text"  autocomplete="off"
                                                            placeholder="Message" name="msg">
                                                        <input class="btn btn-register" type="submit" value="Submit"
                                                            name="commit" >
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="forgot login-footer">
                                            <span>Looking to
                                                <a href="javascript: showRegisterForm();">send feedback</a>
                                                ?</span>
                                        </div>
                                        <div class="forgot register-footer" style="display:none">
                                            <span>Want's to</span>
                                            <a href="javascript: showLoginForm();">Contact</a> Us ?
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

        <footer class="footer" data-background-color="black">
            <div class="container text-center">
                
                <p><span id="google_translate_element"></span>
                    <script type="text/javascript">
                    function googleTranslateElementInit() {
                        new google.translate.TranslateElement({
                                pageLanguage: 'en',
                                includedLanguages: 'en,jv,pa,mr,te,ta,hi',
                                layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
                                autoDisplay: false
                            },
                            'google_translate_element'
                        );
                    }
                    </script>
                    <script type="text/javascript"
                        src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
                    </script>
                </p>
                <div class="copyright text-center" style="font-family: verdana; font-size: 15px;">
                    © 2019 Nashik Tourism. All rights reserved | Design by GPN Students Team - G S D K D
                </div>
                </nav>
            </div>
        </footer>

        <!--   Core JS Files   -->
        <script src="<?= base_url('/assets/js/core/jquery.min.js') ?>" type="text/javascript"></script>
        <script src="<?= base_url('/assets/js/login-register.js') ?>" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"
            integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>
        <script src="<?= base_url('/assets/js/core/popper.min.js') ?>" type="text/javascript"></script>
        <script src="<?= base_url('/assets/js/core/bootstrap-material-design.min.js') ?>" type="text/javascript">
        </script>
        <script src="<?= base_url('/assets/js/plugins/moment.min.js') ?>"></script>
        <!--  Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
        <script src="<?= base_url('/assets/js/plugins/bootstrap-datetimepicker.js') ?>" type="text/javascript"></script>
        <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
        <script src="<?= base_url('/assets/js/plugins/nouislider.min.js') ?>" type="text/javascript"></script>
        <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
        <script src="<?= base_url('/assets/js/login.js') ?>" type="text/javascript"></script>
        <script type="text/javascript">

        </script>
        <script>
        function scrollToDownload() {
            if ($('.section-download').length != 0) {
                $("html, body").animate({
                    scrollTop: $('.section-download').offset().top
                }, 1000);
            }
        }

        $(document).ready(function() {
            $(".clickable").click(function() {
                window.location = $(this).find("a").attr("href");
                return false;
            });
        });
        </script>
    </body>

</html>