<?php
    require_once('database.php');

  
//Set search term or hard-code the parameter value
 $categoryID = 1;

 $query = "SELECT categoryName FROM categories WHERE 
 categoryID = ?";
 $stmt = $conn->prepare($query);
 $stmt->bind_param('s', $categoryID);
 $stmt->execute();

 $stmt->store_result();
 //store result fields in variables
 $stmt->bind_result($categoryName);
 
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
                    <th>Category ID</th>
                    <th>Category Name</th>
                </tr>
               <?php while ($stmt->fetch()){ ?>
               <tr>
                   <td><?php echo $categoryID; ?> </td>
                   <td><?php echo $categoryName; ?> </td>
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