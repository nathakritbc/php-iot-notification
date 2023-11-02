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

    <?php
          include_once("./configs/connectDB.php");
          function getUPSInfo($upsName) {
                $command = "sudo upsc $upsName";
                $output = shell_exec($command);
                return $output;
            }
     ?>

    <div class="container">

        <form>
            <div class="mb-3">
                <label for="" class="form-label">Voltage</label>
                <input type="text" readonly class="form-control" name="voltage" id="">
                <?php 
            $command="upsc myups@localhost battery.voltage";
            // $command="upsc myups@localhost";

            $output = shell_exec($command); // รันคำสั่งและรับผลลัพธ์

            echo "<pre>$output</pre>"; 
        ?>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Temperature</label>
                <input type="text" readonly class="form-control" name="temperature" id="">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>

</html>