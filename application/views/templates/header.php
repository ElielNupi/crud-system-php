<html>

<head>
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="<?php base_url("") ?> assets/css/app.css">

    <!-- MATERIALIZE CSS JS -->
    <link rel="stylesheet" href="./assets/node_modules/materialize-css/dist/css/materialize.min.css">
    <script src="./assets/node_modules/materialize-css/dist/js/materialize.min.js"></script>
    <link rel="stylesheet" href="./assets/node_modules/materialize-css/dist/css/materialize.min.css">
    <script src="./assets/node_modules/materialize-css/dist/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<nav class="nav-extended navbar-color navbar-dark #33691e light-green darken-4">
    <div class="nav-wrapper">
        <a href="<?php base_url("Home") ?>" class="brand-logo center">
            <img src="./assets/img/logo-titulo.png" />
        </a>
        <a href="#" data-target="slide-out" class="sidenav-trigger show-on-large button-menu">
            <i class="material-icons">menu</i>
        </a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="<?= base_url("") ?>"><i class="material-icons">add</i></a></li>
            <li><a href="<?= base_url("") ?>"><i class="material-icons">question_answer</i></a></li>
            <li><a href="<?= base_url("") ?> "><i class="material-icons">important_devices</i></a></li>
            <li><a href="<?= base_url("") ?> "><i class="material-icons">notifications_none</i></a></li>
        </ul>
    </div>
</nav>
