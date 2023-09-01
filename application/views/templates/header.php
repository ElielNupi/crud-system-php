<html>

<head>
    <?php $random = '?'. strval(rand(10000000, 90000000)); ?>
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="<?php base_url("") ?> assets/css/styles.css<?php $random ?>">

    <!-- MATERIALIZE CSS JS -->
    <link rel="stylesheet" href="./assets/node_modules/materialize-css/dist/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<nav role="navigation" class="bg-primaria">
    <div class="nav-wrapper">
        <a id="logo-container" href="<?php base_url("") ?> Home" class="brand-logo center">
            <img src="./assets/img/logo-titulo.png" />
        </a>
        <a href="#" data-target="slide-out" class="sidenav-trigger show-on-large button-menu">
            <i class="material-icons">menu</i>
        </a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li>
                <div class="switch">
                    <label>
                        <i class="material-icons left">brightness_high</i>
                        Off
                        <input type="checkbox"  onclick="mudarTema()">
                        <span class="lever"></span>
                        <i class="material-icons right">brightness_4</i>
                        On
                    </label>
                </div>
            </li>
            <li><a href="<?= base_url("") ?>"><i class="material-icons">add</i></a></li>
            <li><a href="<?= base_url("") ?>"><i class="material-icons">question_answer</i></a></li>
            <li><a href="<?= base_url("") ?> "><i class="material-icons">important_devices</i></a></li>
            <li><a href="<?= base_url("") ?> "><i class="material-icons">notifications_none</i></a></li>
        </ul>
    </div>
</nav>

<!-- Start Page Loading -->
<div class="loader" id="carregando">
    <span class="text-center">
        <div id="circuloCarregando" class="preloader-wrapper active">
            <div class="spinner-layer spinner-green-only">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
    </span>
</div>