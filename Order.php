<?php
class Order {
    private $orderid;
    private $userid;
    private $productid;
   private $orderdate;
   private $orderstatus;
   private $quantity;
}
if(isset($_POST["call"]))
call();
function call(){
    
    echo "<table>";
    echo "<tr>";
     echo "<th>OrderID</th>";
     echo "<th>UserID</th>";
     echo "<th>ProductID</th>";
     echo "<th>Orderdate</th>";
     echo "<th>Orderstatus</th>";
     echo "<th>Quantity</th>";
     echo "<th>EDIT</th>";
    echo "<th>DELETE</th>";
    echo "</tr>";
     try{
         $conn = new PDO("mysql:host=localhost;dbname=assign", "root","Howfarguy23");
         $conn-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
         $stmt= $conn->prepare("SELECT  OrderID, UserID,ProductID, Orderdate, Orderstatus, Quantity  FROM Order");
         $stmt->execute();
         //set the resulting array to associative
         //$result =$stml->setFetchMode(PDO::FETCH_ASSOC);
         foreach($stmt->fetchAll() as $order){
             echo "<tr>";
             echo "<td>". $order['OrderID']."</td>";
             echo "<td>". $order['UserID']."</td>";
             echo "<td>". $order['ProductID']."</td>";
             echo "<td>". $order['Orderdate']."</td>";
             echo "<td>". $order['Orderstatus']."</td>";
             echo "<td>". $order['Quantity']."</td>";
              echo "<td><a href='Product.html'>EDIT</a></td>";
              echo "<td> <a href='https://www.example.com'>DELETE</a></td>";
 
             echo "<tr>";
         
         }        
      echo "</table>";  
        
     }
     catch(PDOException $e){
             echo "Connection failed:".$e->getMessage();
         }
        }
     
         if(isset($_POST["add"]))
         add();
         function add(){
try{
    $conn = new PDO("mysql:host=localhost;dbname=assign", "root","Howfarguy23");
    $conn-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $stmt= $conn->prepare("INSERT INTO Order (OrderID, UserID, ProductID, Orderdate, Orderstatus, Quantity) VALUES 
    (".$_POST["OrderID"].", ".$_POST["UserID"].",".$_POST["ProductID"].",".$_POST["Orderdate"].",".$_POST["Orderstatus"].",
    ".$_POST["Quantity"]."  )");
  $res =   $stmt->execute();
echo $res
}
catch(PDOException $e){
    echo "Connection failed:".$e->getMessage();
}
if(isset($_POST["add"]))
         add();
         function add(){
 try{
   $orderid= $_POST["OrderID"];
   $userid = $_POST["UserID"];
  $productid = $_POST["ProductID"];
  $orderdate=$_POST["Orderdate"];
  $orderstatus=$_POST["Orderstatus"];
  $quantity=$_POST["Quantity"];
   $conn = new PDO("mysql:host=localhost;dbname=assign", "root","Howfarguy23");
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $sql= "INSERT INTO Order (OrderID, UserID, ProductID, Orderdate, Orderstatus, Quantity) VALUES ('$orderid', '$userid','$productid','$orderdate'
    ,'$orderstatus', '$quantity')";
    $conn->exec($sql);
    echo "record inserted";
 }
 
 catch(PDOException $e){
    echo "Connection failed:".$e->getMessage();
 }
 $conn= null;
        
        
        
        
        }
     



         








}
         








?>
