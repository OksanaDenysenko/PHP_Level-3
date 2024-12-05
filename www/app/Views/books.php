<!DOCTYPE html>
<!-- saved from url=(0054)file:///home/andy/Desktop/books-page/shpp-library.html -->
<html lang="ru">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>shpp-library</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="library Sh++">
    <link rel="stylesheet" href="./assets/css/libs.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
          crossorigin="anonymous"/>

    <link rel="shortcut icon" href="http://localhost:3000/favicon.ico">
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
                <div class="logo"><a href="http://localhost:3000/" class="navbar-brand"><span class="sh">Ш</span><span
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

                                <div class="loader"><img src="./assets/images/loading.gif"></div>
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
<section id="main" class="main-wrapper">
    <div class="container">
        <div id="content" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div data-book-id="1" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">
                <div class="book">
                    <a href="http://localhost/book"><img src="./assets/images/1.jpg"
                                                                 alt="СИ++ И КОМПЬЮТЕРНАЯ ГРАФИКА">
                        <div data-title="СИ++ И КОМПЬЮТЕРНАЯ ГРАФИКА" class="blockI" style="height: 46px;">
                            <div data-book-title="СИ++ И КОМПЬЮТЕРНАЯ ГРАФИКА" class="title size_text">СИ++ И
                                КОМПЬЮТЕРНАЯ ГРАФИКА
                            </div>
                            <div data-book-author="Андрей Богуславский" class="author">Андрей Богуславский</div>
                        </div>
                    </a>
                    <a href="http://localhost:3000/book/1">
                        <button type="button" class="details btn btn-success">Читать</button>
                    </a>
                </div>
            </div>
            <div data-book-id="2" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">
                <div class="book">
                    <a href="http://localhost:3000/book/2"><img src="./assets/images/2.jpg"
                                                                 alt="Программирование на языке Go!">
                        <div data-title="Программирование на языке Go!" class="blockI" style="height: 46px;">
                            <div data-book-title="Программирование на языке Go!" class="title size_text">
                                Программирование на языке Go!
                            </div>
                            <div data-book-author="Марк Саммерфильд" class="author">Марк Саммерфильд</div>
                        </div>
                    </a>
                    <a href="http://localhost:3000/book/2">
                        <button type="button" class="details btn btn-success">Читать</button>
                    </a>
                </div>
            </div>
            <div data-book-id="3" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">
                <div class="book">
                    <a href="http://localhost:3000/book/3"><img src="./assets/images/3.jpg"
                                                                 alt="Толковый словарь сетевых терминов и аббревиатур">
                        <div data-title="Толковый словарь сетевых терминов и аббревиатур" class="blockI"
                             style="height: 46px;">
                            <div data-book-title="Толковый словарь сетевых терминов и аббревиатур"
                                 class="title size_text">Толковый словарь сетевых терминов и аббревиатур
                            </div>
                            <div data-book-author="М., Вильямс" class="author">М., Вильямс</div>
                        </div>
                    </a>
                    <a href="http://localhost:3000/book/3">
                        <button type="button" class="details btn btn-success">Читать</button>
                    </a>
                </div>
            </div>
            <div data-book-id="26" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">
                <div class="book">
                    <a href="http://localhost:3000/book/4"><img src="./assets/images/4.jpg"
                                                                 alt="Python for Data Analysis">
                        <div data-title="Python for Data Analysis" class="blockI" style="height: 46px;">
                            <div data-book-title="Python for Data Analysis" class="title size_text">Python for Data
                                Analysis
                            </div>
                            <div data-book-author="Уэс Маккинни" class="author">Уэс Маккинни</div>
                        </div>
                    </a>
                    <a href="http://localhost:3000/book/4">
                        <button type="button" class="details btn btn-success">Читать</button>
                    </a>
                </div>
            </div>
            <div data-book-id="5" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">
                <div class="book">
                    <a href="http://localhost:3000/book/5"><img src="./assets/images/5.jpg"
                                                                 alt="Thinking in Java (4th Edition)">
                        <div data-title="Thinking in Java (4th Edition)" class="blockI" style="height: 46px;">
                            <div data-book-title="Thinking in Java (4th Edition)" class="title size_text">Thinking in
                                Java (4th Edition)
                            </div>
                            <div data-book-author="Брюс Эккель" class="author">Брюс Эккель</div>
                        </div>
                    </a>
                    <a href="http://localhost:3000/book/5">
                        <button type="button" class="details btn btn-success">Читать</button>
                    </a>
                </div>
            </div>
            <div data-book-id="6" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">
                <div class="book">
                    <a href="http://localhost:3000/book/6"><img src="./assets/images/6.jpg"
                                                                 alt="Introduction to Algorithms">
                        <div data-title="Introduction to Algorithms" class="blockI" style="height: 46px;">
                            <div data-book-title="Introduction to Algorithms" class="title size_text">Introduction to
                                Algorithms
                            </div>
                            <div data-book-author=" 	Томас Кормен, Чарльз Лейзерсон, Рональд Ривест, Клиффорд Штайн"
                                 class="author"> Томас Кормен, Чарльз Лейзерсон, Рональд Ривест, Клиффорд Штайн
                            </div>
                        </div>
                    </a>
                    <a href="http://localhost:3000/book/6">
                        <button type="button" class="details btn btn-success">Читать</button>
                    </a>
                </div>
            </div>
            <div data-book-id="7" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">
                <div class="book">
                    <a href="http://localhost:3000/book/7"><img src="./assets/images/7.jpg"
                                                                 alt="JavaScript Pocket Reference">
                        <div data-title="JavaScript Pocket Reference" class="blockI" style="height: 46px;">
                            <div data-book-title="JavaScript Pocket Reference" class="title size_text">JavaScript Pocket
                                Reference
                            </div>
                            <div data-book-author="Дэвид Флэнаган" class="author">Дэвид Флэнаган</div>
                        </div>
                    </a>
                    <a href="http://localhost:3000/book/7">
                        <button type="button" class="details btn btn-success">Читать</button>
                    </a>
                </div>
            </div>
            <div data-book-id="8" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">
                <div class="book">
                    <a href="http://localhost:3000/book/8"><img src="./assets/images/8.jpg"
                                                                 alt="Adaptive Code via C#: Class and Interface Design, Design Patterns, and SOLID Principles">
                        <div data-title="Adaptive Code via C#: Class and Interface Design, Design Patterns, and SOLID Principles"
                             class="blockI" style="height: 46px;">
                            <div data-book-title="Adaptive Code via C#: Class and Interface Design, Design Patterns, and SOLID Principles"
                                 class="title size_text">Adaptive Code via C#: Class and Interface Design, Design
                                Patterns, and SOLID Principles
                            </div>
                            <div data-book-author="Гэри Маклин Холл" class="author">Гэри Маклин Холл</div>
                        </div>
                    </a>
                    <a href="http://localhost:3000/book/8">
                        <button type="button" class="details btn btn-success">Читать</button>
                    </a>
                </div>
            </div>
            <div data-book-id="9" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">
                <div class="book">
                    <a href="http://localhost:3000/book/9"><img src="./assets/images/9.jpg"
                                                                 alt="SQL: The Complete Referenc">
                        <div data-title="SQL: The Complete Referenc" class="blockI" style="height: 46px;">
                            <div data-book-title="SQL: The Complete Referenc" class="title size_text">SQL: The Complete
                                Referenc
                            </div>
                            <div data-book-author=" 	Джеймс Р. Грофф" class="author"> Джеймс Р. Грофф</div>
                        </div>
                    </a>
                    <a href="http://localhost:3000/book/9">
                        <button type="button" class="details btn btn-success">Читать</button>
                    </a>
                </div>
            </div>
            <div data-book-id="10" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">
                <div class="book">
                    <a href="http://localhost:3000/book/10"><img src="./assets/images/10.jpg"
                                                                 alt="PHP and MySQL Web Development">
                        <div data-title="PHP and MySQL Web Development" class="blockI" style="height: 46px;">
                            <div data-book-title="PHP and MySQL Web Development" class="title size_text">PHP and MySQL
                                Web Development
                            </div>
                            <div data-book-author="Люк Веллинг" class="author">Люк Веллинг</div>
                        </div>
                    </a>
                    <a href="http://localhost:3000/book/10">
                        <button type="button" class="details btn btn-success">Читать</button>
                    </a>
                </div>
            </div>
            <div data-book-id="11" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">
                <div class="book">
                    <a href="http://localhost:3000/book/11"><img src="./assets/images/11.jpg"
                                                                 alt="Статистический анализ и визуализация данных с помощью R">
                        <div data-title="Статистический анализ и визуализация данных с помощью R" class="blockI"
                             style="height: 46px;">
                            <div data-book-title="Статистический анализ и визуализация данных с помощью R"
                                 class="title size_text">Статистический анализ и визуализация данных с помощью R
                            </div>
                            <div data-book-author="Сергей Мастицкий" class="author">Сергей Мастицкий</div>
                        </div>
                    </a>
                    <a href="http://localhost:3000/book/11">
                        <button type="button" class="details btn btn-success">Читать</button>
                    </a>
                </div>
            </div>
            <div data-book-id="12" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">
                <div class="book">
                    <a href="http://localhost:3000/book/12"><img src="./assets/images/12.jpg"
                                                                 alt="Computer Coding for Kid">
                        <div data-title="Computer Coding for Kid" class="blockI" style="height: 46px;">
                            <div data-book-title="Computer Coding for Kid" class="title size_text">Computer Coding for
                                Kid
                            </div>
                            <div data-book-author="Джон Вудкок" class="author">Джон Вудкок</div>
                        </div>
                    </a>
                    <a href="http://localhost:3000/book/12">
                        <button type="button" class="details btn btn-success">Читать</button>
                    </a>
                </div>
            </div>
            <div data-book-id="13" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">
                <div class="book">
                    <a href="http://localhost:3000/book/13"><img src="./assets/images/13.jpg"
                                                                 alt="Exploring Arduino: Tools and Techniques for Engineering Wizardry">
                        <div data-title="Exploring Arduino: Tools and Techniques for Engineering Wizardry"
                             class="blockI" style="height: 46px;">
                            <div data-book-title="Exploring Arduino: Tools and Techniques for Engineering Wizardry"
                                 class="title size_text">Exploring Arduino: Tools and Techniques for Engineering
                                Wizardry
                            </div>
                            <div data-book-author="Джереми Блум" class="author">Джереми Блум</div>
                        </div>
                    </a>
                    <a href="http://localhost:3000/book/13">
                        <button type="button" class="details btn btn-success">Читать</button>
                    </a>
                </div>
            </div>
            <div data-book-id="14" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">
                <div class="book">
                    <a href="http://localhost:3000/book/14"><img src="./assets/images/14.jpg"
                                                                 alt="Программирование микроконтроллеров для начинающих и не только">
                        <div data-title="Программирование микроконтроллеров для начинающих и не только" class="blockI"
                             style="height: 46px;">
                            <div data-book-title="Программирование микроконтроллеров для начинающих и не только"
                                 class="title size_text">Программирование микроконтроллеров для начинающих и не только
                            </div>
                            <div data-book-author="А. Белов" class="author">А. Белов</div>
                        </div>
                    </a>
                    <a href="http://localhost:3000/book/14">
                        <button type="button" class="details btn btn-success">Читать</button>
                    </a>
                </div>
            </div>
            <div data-book-id="15" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">
                <div class="book">
                    <a href="http://localhost:3000/book/15"><img src="./assets/images/15.jpg"
                                                                 alt="The Internet of Things">
                        <div data-title="The Internet of Things" class="blockI" style="height: 46px;">
                            <div data-book-title="The Internet of Things" class="title size_text">The Internet of
                                Things
                            </div>
                            <div data-book-author="Сэмюэл Грингард" class="author">Сэмюэл Грингард</div>
                        </div>
                    </a>
                    <a href="http://localhost:3000/book/15">
                        <button type="button" class="details btn btn-success">Читать</button>
                    </a>
                </div>
            </div>
            <div data-book-id="16" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">
                <div class="book">
                    <a href="http://localhost:3000/book/16"><img src="./assets/images/16.jpg"
                                                                 alt="Sketching User Experiences: The Workbook">
                        <div data-title="Sketching User Experiences: The Workbook" class="blockI" style="height: 46px;">
                            <div data-book-title="Sketching User Experiences: The Workbook" class="title size_text">
                                Sketching User Experiences: The Workbook
                            </div>
                            <div data-book-author="Сет Гринберг" class="author">Сет Гринберг</div>
                        </div>
                    </a>
                    <a href="http://localhost:3000/book/16">
                        <button type="button" class="details btn btn-success">Читать</button>
                    </a>
                </div>
            </div>
            <div data-book-id="17" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">
                <div class="book">
                    <a href="http://localhost:3000/book/17"><img src="./assets/images/17.jpg" alt="InDesign CS6">
                        <div data-title="InDesign CS6" class="blockI" style="height: 46px;">
                            <div data-book-title="InDesign CS6" class="title size_text">InDesign CS6</div>
                            <div data-book-author="Александр Сераков" class="author">Александр Сераков</div>
                        </div>
                    </a>
                    <a href="http://localhost:3000/book/17">
                        <button type="button" class="details btn btn-success">Читать</button>
                    </a>
                </div>
            </div>
            <div data-book-id="18" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">
                <div class="book">
                    <a href="http://localhost:3000/book/18"><img src="./assets/images/18.jpg"
                                                                 alt="Адаптивный дизайн. Делаем сайты для любых устройств">
                        <div data-title="Адаптивный дизайн. Делаем сайты для любых устройств" class="blockI"
                             style="height: 46px;">
                            <div data-book-title="Адаптивный дизайн. Делаем сайты для любых устройств"
                                 class="title size_text">Адаптивный дизайн. Делаем сайты для любых устройств
                            </div>
                            <div data-book-author="Тим Кедлек" class="author">Тим Кедлек</div>
                        </div>
                    </a>
                    <a href="http://localhost:3000/book/18">
                        <button type="button" class="details btn btn-success">Читать</button>
                    </a>
                </div>
            </div>
            <div data-book-id="19" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">
                <div class="book">
                    <a href="http://localhost:3000/book/19"><img src="./assets/images/19.jpg"
                                                                 alt="Android для разработчиков">
                        <div data-title="Android для разработчиков" class="blockI" style="height: 46px;">
                            <div data-book-title="Android для разработчиков" class="title size_text">Android для
                                разработчиков
                            </div>
                            <div data-book-author="Пол Дейтел, Харви Дейтел" class="author">Пол Дейтел, Харви Дейтел
                            </div>
                        </div>
                    </a>
                    <a href="http://localhost:3000/book/19">
                        <button type="button" class="details btn btn-success">Читать</button>
                    </a>
                </div>
            </div>
            <div data-book-id="20" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">
                <div class="book">
                    <a href="http://localhost:3000/book/20"><img src="./assets/images/20.jpg"
                                                                 alt="Clean Code: A Handbook of Agile Software Craftsmanship">
                        <div data-title="Clean Code: A Handbook of Agile Software Craftsmanship" class="blockI"
                             style="height: 46px;">
                            <div data-book-title="Clean Code: A Handbook of Agile Software Craftsmanship"
                                 class="title size_text">Clean Code: A Handbook of Agile Software Craftsmanship
                            </div>
                            <div data-book-author="Роберт Мартин" class="author">Роберт Мартин</div>
                        </div>
                    </a>
                    <a href="http://localhost:3000/book/20">
                        <button type="button" class="details btn btn-success">Читать</button>
                    </a>
                </div>
            </div>
            <div data-book-id="21" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">
                <div class="book">
                    <a href="http://localhost:3000/book/21"><img src="./assets/images/21.jpg"
                                                                 alt="Swift Pocket Reference: Programming for iOS and OS X">
                        <div data-title="Swift Pocket Reference: Programming for iOS and OS X" class="blockI"
                             style="height: 46px;">
                            <div data-book-title="Swift Pocket Reference: Programming for iOS and OS X"
                                 class="title size_text">Swift Pocket Reference: Programming for iOS and OS X
                            </div>
                            <div data-book-author="Энтони Грей" class="author">Энтони Грей</div>
                        </div>
                    </a>
                    <a href="http://localhost:3000/book/21">
                        <button type="button" class="details btn btn-success">Читать</button>
                    </a>
                </div>
            </div>
            <div data-book-id="22" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">
                <div class="book">
                    <a href="http://localhost:3000/book/22"><img src="./assets/images/22.jpg"
                                                                 alt="NoSQL Distilled: A Brief Guide to the Emerging World of Polyglot Persistence">
                        <div data-title="NoSQL Distilled: A Brief Guide to the Emerging World of Polyglot Persistence"
                             class="blockI" style="height: 46px;">
                            <div data-book-title="NoSQL Distilled: A Brief Guide to the Emerging World of Polyglot Persistence"
                                 class="title size_text">NoSQL Distilled: A Brief Guide to the Emerging World of
                                Polyglot Persistence
                            </div>
                            <div data-book-author="Мартин Фаулер, Прамодкумар Дж. Садаладж" class="author">Мартин
                                Фаулер, Прамодкумар Дж. Садаладж
                            </div>
                        </div>
                    </a>
                    <a href="http://localhost:3000/book/22">
                        <button type="button" class="details btn btn-success">Читать</button>
                    </a>
                </div>
            </div>
            <div data-book-id="23" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">
                <div class="book">
                    <a href="http://localhost:3000/book/23"><img src="./assets/images/23.jpg" alt="Head First Ruby">
                        <div data-title="Head First Ruby" class="blockI" style="height: 46px;">
                            <div data-book-title="Head First Ruby" class="title size_text">Head First Ruby</div>
                            <div data-book-author="Джей Макгаврен" class="author">Джей Макгаврен</div>
                        </div>
                    </a>
                    <a href="http://localhost:3000/book/23">
                        <button type="button" class="details btn btn-success">Читать</button>
                    </a>
                </div>
            </div>
            <div data-book-id="24" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">
                <div class="book">
                    <a href="http://localhost:3000/book/24"><img src="./assets/images/24.jpg" alt="Practical Vim">
                        <div data-title="Practical Vim" class="blockI" style="height: 46px;">
                            <div data-book-title="Practical Vim" class="title size_text">Practical Vim</div>
                            <div data-book-author="Дрю Нейл" class="author">Дрю Нейл</div>
                        </div>
                    </a>
                    <a href="http://localhost:3000/book/24">
                        <button type="button" class="details btn btn-success">Читать</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <center>оопс... в этом хтмл не реализованы кнопки "вперед" и "назад", а книг на странице должно быть не больше 20
    </center>

</section>
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
</div>
</body>

</html>