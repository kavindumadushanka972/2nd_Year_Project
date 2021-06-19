<?php require_once('includes/connection.php'); ?>

<?php
    
    if (isset($_POST['btn_update'])) {

        $farmerID = $_POST['txtFarmerID'];
        $first_name = $_POST['txtFirstName'];
        $last_name = $_POST['txtLastName'];
        $address = $_POST['txtAddress'];
        $telNo = $_POST['txtTelNo'];

        $query = "UPDATE FARMER SET FName = '{$first_name}', LName = '{$last_name}', Address = '{$address}', TelNo = '{$telNo}' WHERE FarmerID = '{$farmerID}'";

        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "1 record updated successfully.";
        } else {
            echo "Database update query failed.";
        }

    }

    if (isset($_POST['btn_save'])) {

        $farmerID = $_POST['txtFarmerID'];
        $first_name = $_POST['txtFirstName'];
        $last_name = $_POST['txtLastName'];
        $address = $_POST['txtAddress'];
        $telNo = $_POST['txtTelNo'];

        $query = "INSERT INTO FARMER VALUES ('{$farmerID}', '{$first_name}', '{$last_name}', '{$address}', '{$telNo}')";

        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "1 record added successfully";
        } else {
            echo "Database query failed";
        }

    }
    
    if (isset($_POST['btnAddNew'])) {
        
        $query = "SELECT * FROM FARMER";

        $result_set = mysqli_query($conn, $query);

        $farmerID = '';

        while ($record = mysqli_fetch_assoc($result_set)) {
            $farmerID = $record['FarmerID'];
        }

        $farmerID = "F" . str_pad(((int)(substr($farmerID, 1)) + 1), 3, '0', STR_PAD_LEFT);

    }

    if (isset($_POST['btnSearchID'])) {
        
        $farmerID = $_POST['txtFarmerID'];
        
        $query = "SELECT * FROM FARMER WHERE FarmerID = '{$farmerID}'";

        $resultRow = mysqli_query($conn, $query);

        if ($record = mysqli_fetch_assoc($resultRow)) {
            $farmerID = $record['FarmerID'];
            $firstName = $record['FName'];
            $lastName = $record['LName'];
            $address = $record['Address'];
            $telNo = $record['TelNo'];
        }

    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Department of Agriculture</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
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
    
    <form action="Farmers.php" method = "post">

        <h1>View Farmer Info</h1><hr>
    
        <table>

            <tr>
                <td>Farmer ID : </td>
                <td>
                    <input type="text" name = "txtFarmerID" value = "<?php echo (isset($farmerID)) ? $farmerID : ''; ?>"></input>
                    <button name="btnSearchID" type="submit" value="HTML">SEARCH</button>
                    <button name="btnAddNew" type="submit" value="HTML">ADD NEW</button>
                </td>
            </tr>
            <tr>
                <td>First Name : </td>
                <td><input type="text" name="txtFirstName" value = "<?php echo (isset($firstName)) ? $firstName : ''; ?>"></input></td>
            </tr>
            <tr>
                <td>Last Name : </td>
                <td><input type="text" name = "txtLastName" value = "<?php echo (isset($lastName)) ? $lastName : ''; ?>"></input></td>
            </tr>
            <tr>
                <td>Address : </td>
                <td><input type="text" name = "txtAddress" value = "<?php echo (isset($address)) ? $address : ''; ?>"></input></td>
            </tr>
            <tr>
                <td>Tel No : </td>
                <td><input type="text" name = "txtTelNo" value = "<?php echo (isset($telNo)) ? $telNo : ''; ?>"></input></td>
            </tr>
            
            <tr>
                <td>
                    <button name="btn_update" type="submit" value="HTML">UPDATE</button>
                </td>
            
                <td>
                    <button name="btn_save" type="submit" value="HTML">SAVE NEW</button>
                </td>
            </tr>
            
        </table>

	</form> 

<?php include('includes/footer.php'); ?>

<?php mysqli_close($conn) ?>

