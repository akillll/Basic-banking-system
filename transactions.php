<html>
    <head>
        <link href="transaction.css?v=<?php echo time(); ?>" rel="stylesheet">
        <link href="css/all.min.css" rel="stylesheet">
    </head>
    <body>
    <form method="get" action="customers.php">
    <button type="submit"><i class="fas fa-2x fa-long-arrow-alt-left"></i></button>
</form>


<?php 
    $user = 'root';
    $pass = '';
    $db = 'customerdb';
    
    $db = new mysqli('localhost', $user ,$pass,$db) or die("unable to connect");
    $sql = "SELECT name FROM customer";
    $result = $db-> query($sql);

    if (isset($_POST['send']))
    {
        $sender=$_POST['name'];
        $receiveer=$_POST['receive'];
        $amount=$_POST['amount'];


        
    }
    if(!isset($amount)){
        $amount = 'Variable name is not set';
        }
        if(!isset($sender)){
            $sender = 'Variable name is not set';
            }
            if(!isset($receiveer)){
                $receiveer = 'Variable name is not set';
                }
    
    $sql2 = "UPDATE customer SET balance=(balance+'$amount') WHERE name='$receiveer'";
        $result2 = $db->query($sql2); 
        

    
         $sql3 = "UPDATE customer SET balance=(balance-'$amount') WHERE name='$sender'";
         $result3 = $db->query($sql3); 
         /*if($result3){
             echo '<script>alert("Transaction successful")</script>';       
          }
          else{
            echo '<script>alert("Transaction unsussessful")</script>';
          }*/
        

    

    
?>
<form method="post">
<div class="sender">
    <input type="text" name="name" class="textbox" placeholder="Enter your name">
    <?php
    if(!empty($_POST['send'])){
        $name = $_POST['name'];
        $query = "select * from customer where name = '$name'";
        $resultset = $db-> query($query);
        $count = mysqli_num_rows($resultset);
        if($count>0){
            echo "successful";
        }
        else{
            echo "invalid user";
        }
    } 
    ?>
</div>

<div class="receiver">
    Receiver: <select name="receive">
    <?php 
    while($rows = $result->fetch_assoc()){
        $receiver = $rows['name'];
        echo "<option value='$receiver'>$receiver</option>";
    }
    ?>

    
</select>

</div>

<div class="amount">
    <input type="number" name="amount" class="textbox" placeholder="Enter amount">
</div>

<div class="button">
    <input type="submit" value="Send" name="send" class="buttoon">
</div>
</form>

    </body>
</html>

