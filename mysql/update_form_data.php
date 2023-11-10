<?php 

if(isset($_GET["submit_update_data"]) && isset($_GET["submit_update_data"])){
    function sanitizeInput($input)
    {
        global $conn;
        return mysqli_real_escape_string($conn, $input);
    }
    include_once("../configs/connectDB.php");
    $id = sanitizeInput($_GET["id"]);
    $sqlShowData="SELECT * FROM DEMO WHERE id='$id';";
    $resultShowData=mysqli_query($conn,$sqlShowData);
    $data=  mysqli_fetch_assoc($resultShowData);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <title>Update Data Boostrap4</title>
</head>

<body>

    <h1 class="text-center my-5 text-warning">Update Data </h1>
    <section>
        <div class="container">
            <form action="" method="post">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="<?=$data["name"]?>"
                        aria-describedby="helpId" placeholder="ชื่อ" required />
                    <label for="" class="mt-3">Value</label>
                    <input type="number" value="<?=$data["value"]?>" type="number" min="0" class="form-control"
                        name="value" id="value" aria-describedby="helpId" placeholder="จำนวน" required />
                    <input type="submit" class="btn btn-warning mt-3" name="submit_update_data" value="เเก้ไขข้อมูล">
                </div>
            </form>
        </div>
    </section>

    <?php  
    include_once("./sweetalert2_function.php");
    $locationRedirect="./show_data.php"; 

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_update_data"])) {
        global $conn;
        $name = sanitizeInput($_POST["name"]);
        $value = sanitizeInput($_POST["value"]);

        $sql = "UPDATE DEMO SET name='$name',value='$value' WHERE id='$id';";
        
        if (mysqli_query($conn, $sql)) {
             $title="Update Data Successfully"; 
             alertSuccess($title,$locationRedirect);
        } else {
            // return "Error: " . $sql . "<br>" . mysqli_error($conn);
            $title="Update Data Fail";
            $text="Please try again...."; 
            $locationRedirectError="./update_form_data.php?submit_update_data=1&id=$id";
            alertError($title,$text,$locationRedirectError); 
        } 
        mysqli_close($conn);

    }

    ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>
<?php     
}
?>