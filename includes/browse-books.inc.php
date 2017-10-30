<?php
function generateBookList(){
   try {
         $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $sql = "select Title, SubcategoryID, CoverImage, CopyrightYear, ImprintID, ISBN10 from Books ORDER BY Title ASC LIMIT 20";
         $result = $pdo->query($sql);
         $bookstr = "";
         while ($row = $result->fetch()) {
            $bookstr .= "<tr>";
            $bookstr .= "<td><a href='single-page.php?ISBN10=" . $row['ISBN10'] . "'><img src='book-images/thumb/" . $row['ISBN10'] . ".jpg'></a></td>";
            $bookstr .= "<td><a href='single-page.php?ISBN10=" . $row['ISBN10'] . "'>" .  $row['Title'] . "</td>";
            $bookstr .= "<td>" . $row['CopyrightYear'] . "</td>";
            $bookstr .= "<td>" . $row['SubcategoryID'] . "</td>";
            $bookstr .= "<td>" . $row['ImprintID'] . "</td>";
            $bookstr .= "</tr>";
         }
         return $bookstr;
         $pdo = null;
   }
   catch (PDOException $e) {
      $bookstr = "No books could be found, try again.";
      return $bookstr;
   }
}

function generateSubcategoryID(){
        try {
         $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $sql = "SELECT DISTINCT SubcategoryName from Subcategories";
         $result = $pdo->query($sql);
         $subcategorystr = "";
         while ($row = $result->fetch()) {
            $subcategorystr .= '<option>';
            $subcategorystr .= $row ['SubcategoryName'];
            $subcategorystr .= '</option>';
         }
         return $subcategorystr;
         $pdo = null;
   }
   catch (PDOException $e) {
        $subcategorystr = "No matching states, please try clicking a name on the list.";
        return $subcategorystr;
   }
}

function generateImprintID(){
        try {
         $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $sql = "SELECT DISTINCT Imprint from Imprints ORDER BY Imprint ASC";
         $result = $pdo->query($sql);
         $imprintstr = "";
         while ($row = $result->fetch()) {
            $imprintstr .= '<option>';
            $imprintstr .= $row ['Imprint'];
            $imprintstr .= '</option>';
         }
         return $imprintstr;
         $pdo = null;
   }
   catch (PDOException $e) {
        $imprintstr = "No matching states, please try clicking a name on the list.";
        return $imprintstr();
   }
}

function filterBySubcategory(){
    try {
         $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $sql = "select Title, Subcategories.SubcategoryName, CoverImage, CopyrightYear, Imprints.Imprint, ISBN10 from Books INNER JOIN Subcategories ON Subcategories.SubcategoryID = Books.SubcategoryID INNER JOIN Imprints on Imprints.ImprintID = Books.ImprintID WHERE SubcategoryName = :subcategoryid ORDER BY Title ASC LIMIT 20";
         $statement = $pdo->prepare($sql);
         $statement->bindValue(":subcategoryid", $_GET['subcategoryid']);
         $statement->execute();
         $subcategorystr = "";
         while ($row = $statement->fetch()) {
            $subcategorystr .= "<tr>";
            $subcategorystr .= "<td><a href='single-page.php?ISBN10=" . $row['ISBN10'] . "'><img src='book-images/thumb/" . $row['ISBN10'] . ".jpg'></a></td>";
            $subcategorystr .= "<td><a href='single-page.php?ISBN10=" . $row['ISBN10'] . "'>" .  $row['Title'] . "</td>";
            $subcategorystr .= "<td>" . $row['CopyrightYear'] . "</td>";
            $subcategorystr .= "<td>" . $row['SubcategoryName'] . "</td>";
            $subcategorystr .= "<td>" . $row['Imprint'] . "</td>";
            $subcategorystr .= "</tr>";
         }
         return $subcategorystr;
         $pdo = null;
   }
   catch (PDOException $e) {
      $subcategorystr = "No matching employees, please try clicking a name on the list.";
      return $subcategorystr();
   }
}

function filterByImprint(){
    try {
         $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $sql = "select Title, SubcategoryName, CoverImage, CopyrightYear, Imprints.Imprint, ISBN10 from Books INNER JOIN Imprints on Books.ImprintID = Imprints.ImprintID INNER JOIN Subcategories on Subcategories.SubcategoryID = Books.SubcategoryID WHERE Imprints.Imprint = :imprintid ORDER BY Title ASC LIMIT 20";
         $statement = $pdo->prepare($sql);
         $statement->bindValue(":imprintid", $_GET['imprintid']);
         $statement->execute();
         $imprintstr = "";
         while ($row = $statement->fetch()) {
            $imprintstr .= "<tr>";
            $imprintstr .= "<td><a href='single-page.php?ISBN10=" . $row['ISBN10'] . "'><img src='book-images/thumb/" . $row['ISBN10'] . ".jpg'></a></td>";
            $imprintstr .= "<td><a href='single-page.php?ISBN10=" . $row['ISBN10'] . "'>" .  $row['Title'] . "</td>";
            $imprintstr .= "<td>" . $row['CopyrightYear'] . "</td>";
            $imprintstr .= "<td>" . $row['SubcategoryName'] . "</td>";
            $imprintstr .= "<td>" . $row['Imprint'] . "</td>";
            $imprintstr .= "</tr>";
         }
         return $imprintstr;
         $pdo = null;
   }
   catch (PDOException $e) {
      $imprintstr = "No matching employees, please try clicking a name on the list.";
      return $imprintstr;
   }
}
?>