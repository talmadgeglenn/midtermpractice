<?php
    require_once('database.php');

  
//Set search term or hard-code the parameter value
 $state = 'CA';

 $query = "SELECT firstName, lastName, city FROM customers WHERE 
 state = ? order by lastName";
 $stmt = $conn->prepare($query);
 $stmt->bind_param('s', $state);
 $stmt->execute();

 $stmt->store_result();
 //store result fields in variables
 $stmt->bind_result($firstName, $lastName, $city);
 
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
        
        <h1>Category List</h1>

        <div id="content">
            <!-- display a table of categories -->
            <table>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>City</th>
                </tr>
               <?php while ($stmt->fetch()){ ?>
               <tr>
                   <td><?php echo $firstName; ?> </td>
                   <td><?php echo $lastName; ?> </td>
                   <td><?php echo $city; ?> </td>
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