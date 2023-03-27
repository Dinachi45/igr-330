<?php
class User {
    private $userid;
    private $username;
    private $city;
     
   
}
if(isset($_POST["call"]))
call();
function call(){
    
    echo "<table>";
    echo "<tr>";
     echo "<th>UserID</th>";
     echo "<th>username</th>";
     echo "<th>City</th>";
     echo "<th>EDIT</th>";
    echo "<th>DELETE</th>";
    echo "</tr>";
     try{
         $conn = new PDO("mysql:host=localhost;dbname=assign", "root","Howfarguy23");
         $conn-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
         $stmt= $conn->prepare("SELECT  UserID, Username,City  FROM user");
         $stmt->execute();
         //set the resulting array to associative
         //$result =$stml->setFetchMode(PDO::FETCH_ASSOC);
         foreach($stmt->fetchAll() as $user){
             echo "<tr>";
             echo "<td>". $user['UserID']."</td>";
             echo "<td>". $user['Username']."</td>";
             echo "<td>". $user['City']."</td>";
             
 echo "<td><a href='User.html'>EDIT</a></td>";
             echo "<td> <a href='https://www.example.com'>DELETE</a></td>";
 
             echo "<tr>";
         
         }        
      echo "</table>";  
        
     }catch(PDOException $e){
             echo "Connection failed:".$e->getMessage();
         }
     
 
        if(isset($_POST["add"]))
        add();
        function add(){
try{
  $userid= $_POST["UserID"];
  $username = $_POST["Username"];
 $city = $_POST["City"];
  $conn = new PDO("mysql:host=localhost;dbname=assign", "root","Howfarguy23");
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
   $sql= "INSERT INTO User (UserID, Username, City) VALUES ('$userid', '$username','$city')";
   $conn->exec($sql);
   echo "record inserted";
}

catch(PDOException $e){
   echo "Connection failed:".$e->getMessage();
}
$conn= null;
}




?>
