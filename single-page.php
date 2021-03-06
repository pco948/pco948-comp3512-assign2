<?php
require_once('includes/config.php'); 
include('includes/single-page.inc.php');
?>
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
      <main class="mdl-layout__content mdl-color--grey-50">
         <section class="page-content">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--6-col card-lesson mdl-card  mdl-shadow--2dp">
                <div class="mdl-card__title mdl-color--orange">
                  <h2 class="mdl-card__title-text">Information</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <?php echo generateBookDetails(); ?>
                </div>
                </div>
                <div class="mdl-cell mdl-cell--3-col card-lesson mdl-card  mdl-shadow--2dp" id="card-height">
                <div class="mdl-card__title mdl-color--orange">
                  <h2 class="mdl-card__title-text">Author(s)</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <ul>
                    <?php echo generateAuthor(); ?>
                    </ul>
                </div>
                </div>
                <div class="mdl-cell mdl-cell--3-col card-lesson mdl-card  mdl-shadow--2dp">
                <div class="mdl-card__title mdl-color--orange">
                  <h2 class="mdl-card__title-text">Universities</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <ul>
                    <?php echo generateUniversity(); ?>
                    </ul>
                </div>
                </div>
            </div><!-- / mdl-grid -->
         </section>
      </main>
   </div>
</body>
</html>