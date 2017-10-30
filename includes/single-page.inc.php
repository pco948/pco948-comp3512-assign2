<?php
function generateBookDetails(){
    try {
         $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $sql = "SELECT ISBN10, ISBN13, Title, CopyrightYear, SubcategoryName, Status, BindingType, TrimSize, PageCountsEditorialEst, Description From Books 
         INNER JOIN Subcategories ON Books.SubcategoryID = Subcategories.SubcategoryID INNER JOIN BindingTypes ON Books.BindingTypeID = BindingTypes.BindingTypeID INNER JOIN Statuses ON Books.ProductionStatusID = 
         Statuses.StatusID WHERE ISBN10 = :ISBN10";
         $statement = $pdo->prepare($sql);
         $statement->bindValue(':ISBN10', $_GET['ISBN10']);
         $statement->execute();
         $bookstr = "";
         while ($row = $statement->fetch()) {
         $bookstr .= "<img src='book-images/medium/" . $row['ISBN10'] . ".jpg'>";
         $bookstr .= "<h2> <strong>". $row['Title'] . "</strong></h2>";
         $bookstr .= "<h4>".$row['SubcategoryName'] . " (" . $row['CopyrightYear'] . ") </h4>";
         $bookstr .= "<p><strong>ISBN10: </strong>". $row['ISBN10'] . "</br>";
         $bookstr .= "<strong> ISBN13: </strong>" . $row['ISBN13'] . "</br>";
         $bookstr .= "<strong> Imprint: </strong>" . $row['Imprint']   . "</br>";
         $bookstr .= "<strong> Production Status: </strong>" . $row['Status'] . "</br>";
         $bookstr .= "<strong> Binding Type: </strong>" . $row['BindingType'] . "</br>";
         $bookstr .= "<strong> Trim Size: </strong>" . $row['TrimSize'] . "</br>";
         $bookstr .= "<strong> Page Count: </strong>" . $row['PageCountsEditorialEst'] . "</br></p>";
         $bookstr .= "<p><strong> Description: </strong>" . $row['Description'] . "</p>";
         }
         return $bookstr;
         $pdo = null;
   }
   catch (PDOException $e) {
      $bookstr =  "No books could be found, try again.";
      return $bookstr;
   }
}
   
   function generateAuthor(){
      try {
         $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $sql = "SELECT FirstName, LastName From Authors INNER JOIN BookAuthors ON Authors.AuthorId = BookAuthors.AuthorId INNER JOIN Books on Books.BookId = BookAuthors.BookId WHERE Books.ISBN10 = :ISBN10";
         $statement = $pdo->prepare($sql);
         $statement->bindValue(':ISBN10', $_GET['ISBN10']);
         $statement->execute();
         $authorstr = "";
         while ($row = $statement->fetch()) {
            $authorstr .= '<li>';
            $authorstr .= $row ['FirstName'] . " " . $row ['LastName'];
            $authorstr .= '</li>';
         }
         return $authorstr;
         $pdo = null;
      }
   catch (PDOException $e) {
      $authorstr =  "No authors could be found, try again.";
      return $authorstr;
   }
   }
   
   function generateUniversity(){
      try {
         $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $sql = "SELECT Name from Universities INNER JOIN Adoptions ON Universities.UniversityID = Adoptions.UniversityID INNER JOIN AdoptionBooks ON 
         AdoptionBooks.AdoptionID = Adoptions.AdoptionID INNER JOIN Books ON Books.BookID = AdoptionBooks.BookID WHERE Books.ISBN10 = :ISBN10";
         $statement = $pdo->prepare($sql);
         $statement->bindValue(':ISBN10', $_GET['ISBN10']);
         $statement->execute();
         $unistr = "";
         while ($row = $statement->fetch()) {
            $unistr .= '<li>';
            $unistr .= $row ['Name'];
            $unistr .= '</li>';
         }
         return $unistr;
         $pdo = null;
      }
   catch (PDOException $e) {
      $unistr =  "No authors could be found, try again.";
      return $unistr;
   }
   }
?>