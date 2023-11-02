<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Insert UPS Data</title>
</head>

<body>


    <div class="container">

        <form method="POST">
            <div class="mb-3">
                <?php                   
                   $voltage_command="upsc myups@localhost battery.voltage"; 
                   $voltage = shell_exec($voltage_command); 

                   $temperature_command="upsc myups@localhost ups.temperature"; 
                   $temperature = shell_exec($voltage_command);
                   ?>
                <label for="" class="form-label">Voltage</label>
                <input type="text" readonly class="form-control" value="<?=$voltage?>" name="voltage" id="">
                <?php 

        ?>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Temperature</label>
                <input type="text" readonly class="form-control" name="temperature" value="<?=$temperature?>" id="">
            </div>
            <button type="submit" name="submit_insert_data_ups" class="btn btn-primary">Submit</button>
        </form>
    </div>


    <?php
       
       if   ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST["submit_insert_data_ups"]) {
        
            include_once("./configs/connectDB.php");
            $sql = "INSERT INTO `test-demo` (`id`, `voltage`, `temperature`) 
                    VALUES (NULL, '{$_POST["voltage"]}', '{$_POST["temperature"]}');";

            if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
            } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

            mysqli_close($conn);
            
        }
    
    ?>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>

</html>