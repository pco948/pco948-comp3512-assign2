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
      <main class="mdl-layout__content mdl-color--grey-50">
         <section class="page-content">
            <div class="mdl-grid">
               <div class="mdl-cell mdl-cell--3-col card-lesson mdl-card mdl-shadow--2dp">
                  <div class="mdl-card__title mdl-card--expand" id="indeximage"><img src="images/browse-books.jpg"></div>
                  <div class="mdl-card__actions mdl-card--border">
                     <span class="demo-card-image__filename"><a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="browse-books.php">Browse Books</a></span>
                  </div><span class="demo-card-image__filename"></span>
               </div>
               <div class="mdl-cell mdl-cell--3-col card-lesson mdl-card mdl-shadow--2dp">
                  <div class="mdl-card__title mdl-card--expand" id="indeximage"><img src="images/browse-university.jpg"></div>
                  <div class="mdl-card__actions mdl-card--border">
                     <span class="demo-card-image__filename"><a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="browse-universities.php">Browse Universities</a></span>
                  </div><span class="demo-card-image__filename"></span>
               </div>
               <div class="mdl-cell mdl-cell--3-col card-lesson mdl-card mdl-shadow--2dp">
                  <div class="mdl-card__title mdl-card--expand" id="indeximage"><img src="images/browse-employees.jpg"></div>
                  <div class="mdl-card__actions mdl-card--border">
                     <span class="demo-card-image__filename"><a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="browse-employees.php">Browse Employees</a></span>
                  </div><span class="demo-card-image__filename"></span>
               </div>
               <div class="mdl-cell mdl-cell--3-col card-lesson mdl-card mdl-shadow--2dp">
                  <div class="mdl-card__title mdl-card--expand" id="indeximage"><img src="images/aboutus.jpg"></div>
                  <div class="mdl-card__actions mdl-card--border">
                     <span class="demo-card-image__filename"><a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="aboutus.php">About Us</a></span>
                  </div><span class="demo-card-image__filename"></span>
               </div>
            </div>
         </section>
      </main>
   </div><!-- / mdl-grid -->
</body>
</html>