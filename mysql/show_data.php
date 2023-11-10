<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <title>Show Data</title>
</head>

<body>
    <h1 class="text-center my-5 text-primary">Show Data</h1>
    <section>
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Value</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        include_once("../configs/connectDB.php");
                        $sqlShowData = "SELECT * FROM DEMO;";
                        $resultShowData =mysqli_query($conn,$sqlShowData); 
                        if(mysqli_num_rows($resultShowData) == 0){
                            echo "<h3>ไม่พบข้อมูล</h3>";
                        }
                        $num=1; 
                        while($data = mysqli_fetch_assoc($resultShowData)){ 
                    ?>
                    <tr>
                        <td scope="row"><?=$num?></td>
                        <td>id : <?=$data["id"]?></td>
                        <td><?=$data["name"]?></td>
                        <td><?=$data["value"]?></td>
                        <td>
                            <div>
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#modalId<?=$data["id"]?>">ดูข้อมูล
                                </button>
                                <a type="button" href="./update_form_data.php?submit_update_data=1&id=<?=$data["id"]?>"
                                    class="btn btn-warning">เเก้ไขข้อมูล</a>
                                <a type="button" href="./show_data.php?delete_data=1&id=<?=$data["id"]?>"
                                    class="btn btn-danger">ลบข้อมูล</a>
                            </div>
                        </td>
                    </tr>
                    <div class="modal fade" id="modalId<?=$data["id"]?>" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">ข้อมูล ID <?=$data["id"]?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    ID : <?=$data["id"]?><br>
                                    Name : <?=$data["name"]?> <br>
                                    Value : <?=$data["value"]?>
                                </div>
                                <div class="modal-footer">
                                    <!-- <button type="button" class="btn btn-primary">9d]'</button> -->
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                            $num++;
                        }
                        //end while
                    ?>
                </tbody>
            </table>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>


    <?php  
        include_once("../configs/connectDB.php");
        include_once("./sweetalert2_function.php");
        $locationRedirect="./show_data.php";
        include_once("./delete_data.php"); 

    ?>


</body>

</html>