<?php
function generateUniversities(){
   try {
         $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $sql = "SELECT Name, UniversityID FROM Universities ORDER BY Name ASC LIMIT 20";
         $result = $pdo->query($sql);
         $unistr = "";
         while ($row = $result->fetch()) {
            $unistr .= '<li>';
            $unistr .= '<a href="browse-universities.php?university=' . $row ['UniversityID'] . '">';
            $unistr .= $row ['Name'];
            $unistr .= '</a></li>';
         }
         return $unistr;
         $pdo = null;
   }
   catch (PDOException $e) {
      $unistr = "No Universities could be found, try again.";
      return $unistr;
   }
}

function generateUniversityInfo(){
    try {
         $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $sql = "SELECT * FROM Universities WHERE UniversityID = :universityid";
         $statement = $pdo->prepare($sql);
         $statement->bindValue(":universityid", $_GET['university']);
         $statement->execute();
         $unistr = "";
         while ($row = $statement->fetch()) {
            $unistr .= '<p>';
            $unistr .= '<h2>';
            $unistr .= $row ['Name'];
            $unistr .= '</h2>';
            $unistr .= $row ['Address'] . '</br>';
            $unistr .= $row ['City'] . ', ' . $row ['State'] . ", " .  $row ['Zip'] . '</br>';
            $unistr .= $row ['Longitude'] . ', ' . $row ['Latitude'] . '</br>';
            $unistr .= $row ['Website'] . '</br>';
            $unistr .= '</p>';
         }
         return $unistr;
         $pdo = null;
   }
   catch (PDOException $e) {
        $unistr = "No matching university, please try clicking a name on the list.";
        return $unistr;
   }
}

function generateStates(){
    try {
         $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $sql = "SELECT StateName FROM States ORDER BY StateName ASC";
         $result = $pdo->query($sql);
         $unistr = "";
         while ($row = $result->fetch()) {
            $unistr .= '<option>';
            $unistr .= $row ['StateName'];
            $unistr .= '</option>';
         }
         return $unistr;
         $pdo = null;
   }
   catch (PDOException $e) {
        $unistr = "No matching states, please try clicking a name on the list.";
        return $unistr;
   }
}

function filterUniversities(){
    try {
         $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $sql = "SELECT Name, UniversityID FROM Universities WHERE State = :state ORDER BY Name ASC LIMIT 20";
         $statement = $pdo->prepare($sql);
         $statement->bindValue(":state", $_GET['state']);
         $statement->execute();
         $unistr = "";
         while ($row = $statement->fetch()) {
            $unistr .= '<p>';
            $unistr .= '<li>';
            $unistr .= '<a href="browse-universities.php?university=' . $row ['UniversityID'] . '">';
            $unistr .= $row ['Name'];
            $unistr .= '</a></li>';
         }
         return $unistr;
         $pdo = null;
   }
   catch (PDOException $e) {
      $unistr = "No matching employees, please try clicking a name on the list.";
      return $unistr;
   }
}
?>