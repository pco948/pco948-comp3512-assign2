<?php
require_once('includes/config.php'); 
include('includes/browse-books.inc.php');
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
    <link rel='stylesheet prefetch' href='https://cdn.rawgit.com/kybarg/mdl-selectfield/mdl-menu-implementation/mdl-selectfield.min.css'>
    <link rel="stylesheet" href="css/styles.css">
    
    
    <script src="https://code.jquery.com/jquery-1.7.2.min.js" ></script>
    <script src="https://code.getmdl.io/1.1.3/material.min.js"></script>
    <script src='https://storage.googleapis.com/code.getmdl.io/1.0.6/material.min.js'></script>
    <script src='https://cdn.rawgit.com/kybarg/mdl-selectfield/mdl-menu-implementation/mdl-selectfield.min.js'></script>
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
                <!-- mdl-cell + mdl-card -->
              <div class="mdl-cell mdl-cell--10-col card-lesson mdl-card  mdl-shadow--2dp">
                <div class="mdl-card__title mdl-color--orange">
                  <h2 class="mdl-card__title-text">Books</h2>
                </div>
                <div class="mdl-grid">
                    <div class="mdl-selectfield mdl-js-selectfield"> 
                    <form method="GET" action="browse-books.php">
                    <select class="mdl-selectfield__select" id="subcategory" name="subcategoryid">
                        <option value='reset'>All Subcategories</option>
                        <?php echo generateSubcategoryID(); ?>
                    </select>
                    </div>
                    <button class="mdl-button mdl-js-button mdl-button--accent" type="submit"> Filter </button> 
                    </form>
                    
                    <div class="mdl-selectfield mdl-js-selectfield">
                    <form method="GET" action="browse-books.php">
                    <select class="mdl-selectfield__select" id="imprint" name="imprintid">
                         <option value='reset'>All Imprints</option>
                        <?php echo generateImprintID(); ?>
                    </select>
                    </div>
                    <button class="mdl-button mdl-js-button mdl-button--accent" type="submit"> Filter </button> 
                    </form>  
                </div>    
                    <table>
                       <thead>
                          <tr>
                             <th>Cover</th>
                             <th>Title</th>
                             <th>Year</th>
                             <th>Subcategory</th>
                             <th>Imprint</th>
                          </tr>
                          </tr>
                       </thead>
                       <tbody>
                           <?php
                              if(isset($_GET['subcategoryid'])){
                                  if ($_GET['subcategoryid'] == "reset"){
                                      echo generateBookList();
                                  }
                                  else{
                                      echo filterBySubcategory();
                                  }
                                  
                              }
                              elseif(isset($_GET['imprintid'])){
                                  if($_GET['imprintid'] == "reset"){
                                      echo generateBookList();
                                  }
                                  else{
                                      echo filterByImprint();
                                  }
                              }
                              else{
                                  echo generateBookList();    
                              }
                           ?>
                       </tbody>
                    </table>          
                
                </div>
              </div>  <!-- / mdl-cell + mdl-card -->
            </div><!-- / mdl-grid -->
         </section>
      </main>
   </div>
</body>
</html>