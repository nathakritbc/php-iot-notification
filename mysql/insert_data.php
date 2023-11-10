<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <title>Inser Data Boostrap4</title>
</head>

<body>

    <h1 class="text-center my-5">Create Data</h1>
    <section>
        <div class="container">
            <form action="" method="post">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId"
                        placeholder="ชื่อ" required />
                    <label for="" class="mt-3">Value</label>
                    <input type="number" value="0" type="number" min="0" class="form-control" name="value" id="value"
                        aria-describedby="helpId" placeholder="จำนวน" required />
                    <input type="submit" class="btn btn-primary mt-3" name="submit_create_data" value="บันทึกข้อมูล">
                </div>
            </form>
        </div>
    </section>

    <?php 
    include_once("../configs/connectDB.php");
    include_once("./sweetalert2_function.php");
    function sanitizeInput($input)
    {
        global $conn;
        return mysqli_real_escape_string($conn, $input);
    }

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_create_data"])) {
        global $conn;
        $name = sanitizeInput($_POST["name"]);
        $value = sanitizeInput($_POST["value"]);

        $sql = "INSERT INTO demo (name, value) VALUES ('$name', '$value')";
        
        if (mysqli_query($conn, $sql)) {
             $title="Create Data Successfully";
             $locationRedirect="./insert_data.php"; 
             alertSuccess($title,$locationRedirect);
        } else {
            // return "Error: " . $sql . "<br>" . mysqli_error($conn);
            $title="Create Data Fail";
            $text="Please try again....";
            $locationRedirect="./insert_data.php";  
            alertError($title,$text,$locationRedirect); 
        }
        
        mysqli_close($conn);

    }

    ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>