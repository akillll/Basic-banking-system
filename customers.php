<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="cutomer.css?v=<?php echo time(); ?>" rel="stylesheet">
    <link href="css/all.min.css" rel="stylesheet">
    <title>customers</title>
</head>
<body>
    
<form method="get" action="home.html">
    <button type="submit"><i class="fas fa-2x fa-long-arrow-alt-left"></i></button>
</form>


    </div>
    <table>
        <tr>
            
            <th>NAME</th>
            <th>EMAIL</th>
            <th>BALANCE(in $)</th> 
                   
        </tr>
        


    
    <?php
    
    $user = 'root';
    $pass = '';
    $db = 'customerdb';
    
    $db = new mysqli('localhost', $user ,$pass,$db) or die("unable to connect");
    

    $sql = "SELECT name,email,balance from customer";
    $result = $db-> query($sql);

    if ($result-> num_rows > 0){
        while($row = $result-> fetch_assoc()){
            echo "<tr><td><a href='transactions.php'>".$row["name"]."</a></td><td><a href='transactions.php'>".$row["email"]."</a></td><td><a href='transactions.php'>".$row["balance"]."</a></td></tr><br>";
        }
        echo "</table>";

    }
    else{
        echo "0 result";
    }
    $db-> close();

        ?>

    </table>  
</body>
</html>