
<?php require('../config/autoload.php'); ?>

<?php
$dao=new DataAccess();



?>
<?php include('header.php'); ?>

    
    <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-12">
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>
                        
                        <th>ID</th>
                        <th>NAME</th>
                        <th>AGE</th>
                        <th>IMAGE</th>
                        <th>DESCRIPTION</th>
                        <th>EDIT/DELETE</th>
                     
                      
                    </tr>
<?php
    
    $actions = array(
        'edit' => array('label' => 'Edit', 'link' => 'editvaccine.php', 'params' => array('id' => 'vid'), 'attributes' => array('class' => 'btn btn-success')),
        'delete' => array('label' => 'Delete', 'link' => 'deletevaccine.php', 'params' => array('id' => 'vid'), 'attributes' => array('class' => 'btn btn-danger'))
    );
    
    $config = array(
        'srno' => true,
        'hiddenfields' => array('vid'),
        'actions_td' => true, // Set to true to display the "EDIT/DELETE" column
        'images' => array(
            'field' => 'vimage',
            'path' => '../upload/',
            'attributes' => array('style' => 'width:100px;')
        )
    );
    
    $join = [];
    
    $fields = ['vid', 'vname','vage' , 'vimage', 'description'];
    
    // Establish a database connection
    $mysqli = new mysqli('localhost', 'root', '', 'vaccination');
    
    // Check for connection errors
    if ($mysqli->connect_error) {
        die('Connect Error: ' . $mysqli->connect_error);
    }
    
    // Execute the query
    $query = "SELECT " . implode(',', $fields) . " FROM vaccine WHERE status=1";
    $result = $mysqli->query($query);
    
    if ($result) {
        while ($row = $result->fetch_row()) {
            echo "<tr>";
            echo "<td>" . $row[0] . "</td>";
            echo "<td>" . $row[1] . "</td>";
            echo "<td>" . $row[2] . "</td>";
            echo "<td><img src='../upload/" . $row[3] . "' style='width:100px;'></td>";
            
            // Extract the first 5 words from the description
            $description = $row[4];
            $words = explode(' ', $description);
            $first5Words = implode(' ', array_slice($words, 0, 5));
            
            echo "<td>" . $first5Words . "</td>";
            echo "<td>";
            // Render "Edit" and "Delete" buttons
            echo "<a class='btn btn-success' href='editvaccine.php?vid=" . $row[0] . "'>EDIT</a> ";
            echo "<a class='btn btn-danger' href='deletevaccine.php?vid=" . $row[0] . "'>DELETE</a>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        // Handle the query error here
    }
    
    // Close the database connection
    $mysqli->close();
    ?>
    </table>
    </div>

            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    
