<!DOCTYPE html>
<!-- saved from url=(0054)file:///home/andy/Desktop/books-page/shpp-library.html -->
<html lang="ru">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>shpp-library</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="library Sh++">
    <link rel="stylesheet" href="/assets/css/libs.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
          crossorigin="anonymous"/>

    <link rel="shortcut icon" href="http://localhost/favicon.ico">
    <style>
        .details {
            display: none;
        }

    </style>
</head>

<body data-gr-c-s-loaded="true" class="">
<section id="header" class="header-wrapper">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="col-xs-5 col-sm-2 col-md-2 col-lg-2">
                <div class="logo"><a href="http://localhost/" class="navbar-brand"><span class="sh">Ш</span><span
                            class="plus">++</span></a></div>
            </div>
            <div class="col-xs-12 col-sm-7 col-md-8 col-lg-8">
                <div class="main-menu">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <form class="navbar-form navbar-right">
                            <div class="form-group">
                                <input id="search" type="text" placeholder="Найти книгу" class="form-control">
                                <script>
                                    $("#search").bind("keypress", function (e) {
                                        if (e.keyCode == 13) {
                                            e.preventDefault();
                                            alert("а вот это придется сделать самому. Ваш @rshmelev");
                                        }
                                    })
                                </script>

                                <div class="loader"><img src="/assets/images/loading.gif"></div>
                                <div id="list" size="" class="bAutoComplete mSearchAutoComplete"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xs-2 col-sm-3 col-md-2 col-lg-2 hidden-xs">
                <div class="social"><a href="https://www.facebook.com/shpp.kr/" target="_blank"><span
                            class="fa-stack fa-sm"><i class="fa fa-facebook fa-stack-1x"></i></span></a><a
                        href="http://programming.kr.ua/ru/courses#faq" target="_blank"><span class="fa-stack fa-sm"><i
                                class="fa fa-book fa-stack-1x"></i></span></a></div>
            </div>
        </div>
    </nav>
</section>

<?=$this->content; ?>

<section id="footer" class="footer-wrapper">
    <div class="navbar-bottom row-fluid">
        <div class="navbar-inner">
            <div class="container-fuild">
                <div class="content_footer"> Made with<a href="http://programming.kr.ua/" class="heart"><i
                                aria-hidden="true" class="fa fa-heart"></i></a>by HolaTeam
                </div>
            </div>
        </div>
    </div>
</section>
<div class="sweet-overlay" tabindex="-1" style="opacity: -0.02; display: none;"></div>
<div class="sweet-alert hideSweetAlert" data-custom-class="" data-has-cancel-button="false"
     data-has-confirm-button="true" data-allow-outside-click="false" data-has-done-function="false" data-animation="pop"
     data-timer="null" style="display: none; margin-top: -169px; opacity: -0.03;">
    <div class="sa-icon sa-error" style="display: block;">
            <span class="sa-x-mark">
        <span class="sa-line sa-left"></span>
            <span class="sa-line sa-right"></span>
            </span>
    </div>
    <div class="sa-icon sa-warning" style="display: none;">
        <span class="sa-body"></span>
        <span class="sa-dot"></span>
    </div>
    <div class="sa-icon sa-info" style="display: none;"></div>
    <div class="sa-icon sa-success" style="display: none;">
        <span class="sa-line sa-tip"></span>
        <span class="sa-line sa-long"></span>

        <div class="sa-placeholder"></div>
        <div class="sa-fix"></div>
    </div>
    <div class="sa-icon sa-custom" style="display: none;"></div>
    <h2>Ооопс!</h2>
    <p style="display: block;">Ошибка error</p>
    <fieldset>
        <input type="text" tabindex="3" placeholder="">
        <div class="sa-input-error"></div>
    </fieldset>
    <div class="sa-error-container">
        <div class="icon">!</div>
        <p>Not valid!</p>
    </div>
    <div class="sa-button-container">
        <button class="cancel" tabindex="2" style="display: none; box-shadow: none;">Cancel</button>
        <div class="sa-confirm-button-container">
            <button class="confirm" tabindex="1" style="display: inline-block; background-color: rgb(140, 212, 245); box-shadow: rgba(140, 212, 245, 0.8) 0px 0px 2px, rgba(0, 0, 0, 0.05) 0px 0px 0px 1px inset;">OK</button>
            <div class="la-ball-fall">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
</div>
</body>

</html>

