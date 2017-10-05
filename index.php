<?php
    require_once('database.php');


 //midterm query
 $version = 2.0;

 $query = "SELECT productCode, name FROM products WHERE version= 2.0";
 $stmt = $conn->prepare($query);
 //$stmt->bind_param('s', $customerID);
 $stmt->execute();

 $stmt->store_result();
 //store result fields in variables
 $stmt->bind_result($name, $productCode);
 
?>
<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>My Guitar Shop</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>
    <div id="page">

    <div id="header">
        <h1>Product Manager</h1>
    </div>

    <div id="main">
        
            
        <h1>Product List</h1> 
            <table>
                <tr>
                    <th>Name</th>
                    <th>Code</th>
                </tr>
               <?php while ($stmt->fetch()){ ?>
               <tr>
                   <td><?php echo $name; ?> </td>
                   <td><?php echo $productCode; ?> </td>
               </tr>
               <?php }
               $stmt->free_result();
               $conn->close();?>
            </table>
        </div>
    </div>

    <div id="footer">
        <p>&copy; <?php echo date("Y"); ?> My Guitar Shop, Inc.</p>
    </div>

    </div><!-- end page -->
</body>
</html>