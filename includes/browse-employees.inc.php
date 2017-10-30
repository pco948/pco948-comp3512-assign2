<?php
function generateEmployees(){
   try {
         $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $sql = "select EmployeeID, FirstName, LastName from Employees ORDER BY LastName ASC LIMIT 20";
         $result = $pdo->query($sql);
         $emplstr = "";
         while ($row = $result->fetch()) {
            $emplstr .= '<li>';
            $emplstr .= '<a href="browse-employees.php?employee=' . $row ['EmployeeID'] . '">';
            $emplstr .= $row ['FirstName'] . " " . $row ['LastName'];
            $emplstr .= '</a></li>';
         }
         return $emplstr;
         $pdo = null;
   }
   catch (PDOException $e) {
      $emplstr = "No employees could be found, try again.";
      return $emplstr;
   }
}

function generateEmployeeInfo(){
    try {
         $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $sql = "select * from Employees where EmployeeID = :employeeid";
         $statement = $pdo->prepare($sql);
         $statement->bindValue(":employeeid", $_GET['employee']);
         $statement->execute();
         while ($row = $statement->fetch()) {
            $emplstr .= '<p>';
            $emplstr .= '<h2>';
            $emplstr .= $row ['FirstName'] . " " . $row ['LastName'];
            $emplstr .= '</h2>';
            $emplstr .= $row ['Address'] . '</br>';
            $emplstr .= $row ['City'] . ', ' . $row ['Region'] .'</br>';
            $emplstr .= $row ['Country'] . ', ' . $row ['Postal'] . '</br>';
            $emplstr .= $row ['Email'] . '</br>';
            $emplstr .= '</p>';
         }
         return $emplstr;
         $pdo = null;
   }
   catch (PDOException $e) {
        $emplstr = "No matching employees, please try clicking a name on the list.";
        return $emplstr;
   }
}

function generateEmployeeToDo(){
    try {
         $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $sql = "select Status, Priority, DateBy, Description from EmployeeToDo where EmployeeID = :employeeid ORDER BY DateBy ASC";
         $statement = $pdo->prepare($sql);
         $statement->bindValue(":employeeid", $_GET['employee']);
         $statement->execute();
         $emplstr = "";
         while ($row = $statement->fetch()) {
            $emplstr .= '<tr>'; 
            $emplstr .= '<td>' . $row ['DateBy'] . '</td>';
            $emplstr .= '<td>' . $row ['Status'] . '</td>';
            $emplstr .= '<td>' . $row ['Priority'] . '</td>';
            $emplstr .= '<td>' . $row ['Description'] . '</td>';
            $emplstr .= '</tr>';
         }
         return $emplstr;
         $pdo = null;
   }
   catch (PDOException $e) {
      $emplstr = "No matching employees, please try clicking a name on the list.";
      return $emplstr;
   }
    
}

function generateEmployeeMessages(){
    try {
         $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $sql = "SELECT B.MessageDate, A.FirstName, A.LastName, B.Category, LEFT (B.Content, 40) FROM Employees A INNER JOIN EmployeeMessages B ON A.EmployeeID = B.ContactID WHERE B.EmployeeID = :employeeid";
         $statement = $pdo->prepare($sql);
         $statement->bindValue(":employeeid", $_GET['employee']);
         $statement->execute();
         $emplstr = "";
         while ($row = $statement->fetch()) {
            $emplstr .= '<tr>'; 
            $emplstr .= '<td>' . $row ['MessageDate'] . '</td>';
            $emplstr .= '<td>' . $row ['Category'] . '</td>';
            $emplstr .= '<td>' . $row ['FirstName'] . ' ' . $row ['LastName'] . '</td>';
            $emplstr .= '<td>' . trim($row ['Content']) . '</td>';
            $emplstr .= '</tr>';
         }
         return $emplstr;
         $pdo = null;
   }
   catch (PDOException $e) {
      $emplstr = "No matching employees, please try clicking a name on the list.";
      return $emplstr;
   }
}
?>