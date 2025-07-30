<!DOCTYPE html>
<html lang="ua">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>shpp-library</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<br>
<div class="header d-flex align-items-center justify-content-between px-3">
    <div style="font-size: 2rem; font-weight: bold; color: #bc1313; margin-left: 20px;">Admin page</div>
    <div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-outline-danger me-md-2" type="button">Вийти</button>

        </div>
    </div>
</div>

<hr style="border: 3px solid #073903;">

<div class="container">
    <div class="header d-flex align-items-center justify-content-between">
        <div style="font-size: 1.5rem; font-weight: bold; color: #154ec8; margin-left: 20px;">Бібліотека ++</div>
        <div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-link btn-lg me-md-2" type="button" data-bs-toggle="modal" data-bs-target="#addBookModal">
                    Додати книгу
                </button>
            </div>
        </div>
    </div>

    <br>
    <?= $this->content; ?>
</div>
<div class="modal fade" id="addBookModal" tabindex="-1" aria-labelledby="addBookModalLabel" aria-hidden="true">
    <?php
    require 'add_book.php';
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
