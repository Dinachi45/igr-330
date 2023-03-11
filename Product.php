<?php
class Product {
    private $productid;
    private $productname;
    private $category;
   
}
if(isset($_POST["call"]))
call();
function call(){
    
    echo "<table>";
    echo "<tr>";
     echo "<th>ProductID</th>";
     echo "<th>Productname</th>";
     echo "<th>Category</th>";
     echo "<th>EDIT</th>";
    echo "<th>DELETE</th>";
    echo "</tr>";
     try{
         $conn = new PDO("mysql:host=localhost;dbname=assign", "root","Howfarguy23");
         $conn-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
         $stmt= $conn->prepare("SELECT  ProductID, Productname,Category  FROM Product");
         $stmt->execute();
         //set the resulting array to associative
         //$result =$stml->setFetchMode(PDO::FETCH_ASSOC);
         foreach($stmt->fetchAll() as $product){
             echo "<tr>";
             echo "<td>". $product['ProductID']."</td>";
             echo "<td>". $product['Productname']."</td>";
             echo "<td>". $product['Category']."</td>";
              echo "<td><a href='Product.html'>EDIT</a></td>";
 echo "<td> <a href='https://www.example.com'>DELETE</a></td>";
 
             echo "<tr>";
         
         }        
      echo "</table>";  
        
     }catch(PDOException $e){
             echo "Connection failed:".$e->getMessage();
         }
     
 
}
?>