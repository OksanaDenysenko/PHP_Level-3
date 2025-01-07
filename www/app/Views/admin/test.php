<!doctype html>
<html lang="ua">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1 class="page-header">Hello, world! <small>Secondary text</small></h1>
    <p class="lead">Бібліотека ++</p>
    <p>Тут буде початкова сторінка
        <mark>адміна</mark>
        <del>бла-бла</del>
        <u>бла-бла</u>бла-бла
    </p>

    <hr>

    <p class="text-start text-lowercase">бла-бла</p>
    <p class="text-center text-uppercase">бла-бла</p>
    <p class="text-end text-capitalize">бла-бла</p>
    <p class="text-justify">Розтянути текст на всю ширину, зараз відсутній</p>
    <p class="text-nowrap">Не переносить текст на новий рядок (для заголовків, написах на кнопках)</p>

    <div class="clearfix">
        <div class="float-start">Лівий блок</div>
        <div class="float-end">Правий блок</div>
    </div>

    <hr>

    <blockquote class="blockquote">
        <p> Want to learn Twitter Bootstrap? In this video we will cover the Twitter Bootstrap framework in depth from
            installation to
            all of the HTML/CSS components and features.</p>
        <footer> llkjhjhg <cite title="Jghgh">jhghgh</cite></footer>
    </blockquote>

    <blockquote class="blockquote text-end">
        <p> Want to learn Twitter Bootstrap? In this video we will cover the Twitter Bootstrap framework in depth from
            installation to
            all of the HTML/CSS components and features.</p>
        <footer> llkjhjhg <cite title="Jghgh">jhghgh</cite></footer>
    </blockquote>

    <hr>

    <ul>
        <li>Список</li>
        <li>Список</li>
    </ul>

    <ul class="list-unstyled">
        <li>Список</li>
        <li>Список</li>
    </ul>

    <code>Текст відображається як код</code>

    <br>
    Позначення для кнопок чи команд <kbd>cd</kbd>
    Press <kbd><kbd>ctrl</kbd> + <kbd>,</kbd></kbd>

    <hr>

    <p class="text-primary">Hello</p>
    <p class="text-success">Hello</p>
    <p class="text-info">Hello</p>
    <p class="text-warning">Hello</p>
    <p class="text-danger">Hello</p>
    <p class="text-muted">Hello</p>

    <p class="bg-primary">Hello</p>
    <p class="bg-success">Hello</p>
    <p class="bg-info">Hello</p>
    <p class="bg-warning">Hello</p>
    <p class="bg-danger">Hello</p>
    <p class="bg-muted">Hello</p>
</div>

<hr>

<div class="container">
    <button class="btn btn-secondary">Default</button>
    <button class="btn btn-primary">Default</button>
    <button class="btn btn-info">Default</button>
    <button class="btn btn-danger">Default</button>
    <button class="btn btn-link">Default</button>

    <br>
    <button class="btn btn-secondary">Default</button>
    <a href="#" class="btn btn-secondary" role="button">Link</a>
    <input type="submit" class="btn btn-secondary" value="Submit">

    <br>
    <button class="btn btn-secondary btn-lg">Default</button>
    <button class="btn btn-secondary">Default</button>
    <button class="btn btn-secondary btn-sm">Default</button>
    <button class="btn btn-secondary btn-xs">Default</button>
</div>

<hr>

<!--forms-->
<div class="container">
    <form class="form-check-inline">
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" placeholder="Add Name">
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" placeholder="Add Email">
        </div>

        <div class="form-group">
            <label>Message</label>
            <textarea class="form-control" placeholder="Add Message"></textarea>
        </div>

        <div class="form-group">
            <label>Gender</label>
            <select class="form-control">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
        </div>

        <div class="form-group">
            <label for="fileInput">Upload File</label>
            <input type="file" class="form-control" id="fileInput">
            <small id="fileHelp" class="form-text text-muted">Only png and jpg files are allowed.</small>
        </div>

        <div class="checkbox">
            <label>
                <input type="checkbox"> Check me out
            </label>
        </div>

        <button type="submit" class="btn-secondary">Submit</button>

    </form>
</div>

<hr>

<div class="container">
    <table class="table table-bordered table-hover table-condensed">
        <thead>
        <tr class="border-success">
            <th>Назва книги</th>
            <th>Автори</th>
            <th>Рік</th>
            <th>Дія</th>
            <th>Кліків</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Джава</td>
            <td>Джек</td>
            <td>2021</td>
            <td>Видалити</td>
            <td>5</td>
        </tr>
        <tr>
            <td>Все про PHP</td>
            <td>Олівер</td>
            <td>2021</td>
            <td>Видалити</td>
            <td>21</td>
        </tr>
        </tbody>
    </table>
</div>

<hr>

<div class="container">
    <ul class="list-group">
        <li class="list-group-item">Item One</li>
        <li class="list-group-item">Item Two</li>
        <li class="list-group-item">Item Three</li>
        <li class="list-group-item">Item Four</li>
    </ul>

    <div class="list-group">
        <a href="#" class="list-group-item active">Item One</a>
        <a href="#" class="list-group-item">Item Two</a>
        <a href="#" class="list-group-item list-group-item-success">Item Three</a>
        <a href="#" class="list-group-item disabled">Item Four</a>
    </div>
</div>

<hr>

<!--Попередження-->
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    You should check in on some of those fields below.
</div>

<div class="progress">
    <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
        50%
    </div>
</div>

<hr>

<span class="badge bg-secondary">Default</span>
<h1>Hello <span class="badge bg-primary">Primary</span> </h1>
<span class="badge bg-success">Success</span>
<span class="badge bg-info">Info</span>
<span class="badge bg-warning">Warning</span>
<span class="badge bg-danger">Danger</span>

<br>
<a href="#">Inbox <span class="badge bg-secondary">50</span></a>

<button class="btn btn-primary" type="button">
    Messages <span class="badge bg-secondary">2</span>
</button>


<div style="height: 400px"></div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>



