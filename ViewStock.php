<?php require_once('includes/connection.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Department of Agriculture</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script> -->

    <style>
    
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

    </style>
</head>

<body>

    <header>
        <h1>AGRO FERTILIZING</h1>
    </header>

    <nav>
        <ul>
            <li><a href="Farmers.php">Farmers</a></li>
            <li><a href="Officers.php">Offices</a></li>
            <li><a href="Cultivations.php">Cultivations</a></li>
            <li><a href="IssueFertilizer.php">Fertilizer Issuing</a></li>
            <li><a href="ViewStock.php">View Stock</a></li>
            <!--            
            <li><a href="about-us.php">About Us</a></li>
            <li><a href="contact-us.php">Contact Us</a></li>
            <li><a href="services.php">Services</a></li>
            -->
        </ul>
    </nav>
    
    <h1>Store Info</h1><hr>

    <form action="ViewStock.php" method = "post">

    </form>
   
    <table>
       <thead>
            <tr>
                <th>FertilizerID</th>
                <th>Description</th>
    			<th>QtyOnHand</th>			
    			<th>StoredDate</th>
    			<th>ExpireDate</th>
    		</tr>
    	</thead>
        
        <tbody>

            <?php
                session_start();
                $officerid =   $_SESSION['userID'] ;

                $query = "SELECT FertilizerID , Description, QtyOnHand , StoredDate , ExpireDate  FROM fertilizer_management.stores fm join fertilizer f USING(FertilizerID) where  CenterID = (SELECT CenterID FROM fertilizer_management.agricultural_officer where OfficerID = '{$officerid}')";


                $result = $conn -> query($query);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {

            ?>

            <tr>
                <td><?php echo $row["FertilizerID"]; ?></td>
                <td><?php echo $row["Description"]; ?></td>
                <td><?php echo $row["QtyOnHand"]; ?></td>
                <td><?php echo $row["StoredDate"]; ?></td>
                <td><?php echo $row["ExpireDate"]; ?></td>
            </tr>
          
            <?php
                    }
            
                } else {
                    echo "0 results";
                }

            ?>

       </tbody>
    </table>

<?php include('includes/footer.php'); ?>

<?php mysqli_close($conn) ?>

