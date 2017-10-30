<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Chapter 14</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.blue_grey-orange.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://code.jquery.com/jquery-1.7.2.min.js" ></script>
    <script src="https://code.getmdl.io/1.1.3/material.min.js"></script>
</head>

<body>
   <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
      <?php 
          include 'includes/header.inc.php'; 
          include 'includes/left-nav.inc.php';
      ?>        
        <main class="mdl-layout__content">
            <div class="mdl-grid portfolio-max-width">

                <div class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--4dp">
                    <div class="mdl-card__title">
                        <h2 class="mdl-card__title-text">About us</h2>
                    </div>
                    <div class="mdl-card__media">
                        <img class="article-image" src="" border="0" alt="">
                    </div>
                    <div>
                        <h3 class="mdl-cell mdl-cell--12-col mdl-typography--headline">COMP-3512 Assignment 1</h3>
                        <div class="about-us-info">
                            <ul>
                                <li>Instructor: Randy Connolly</li>
                                <li>Author: Peter Co</li>
                                <li>Project started: 10/9/2017</li>
                            </ul>
                        </div>




                        <h3 class="mdl-cell mdl-cell--12-col mdl-typography--headline">Resources Used</h3>

                        <div class="about-us-info">
                            <ul>
                                <li><a href="https://getmdl.io/">Material Design Light</a></li>
                                <li><span class="mdl-list__item-text-body">MDL, Royalty-Free images used in about-us page and images provided by Randy Connolly</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </main>
   </div>
</body>
</html>