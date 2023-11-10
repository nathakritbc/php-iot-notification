<?php
        function sanitizeInput($input)
        {
            global $conn;
            return mysqli_real_escape_string($conn, $input);
        }
        if(isset($_GET["delete_data"]) && $_GET["delete_data"]=="1") {
        global $conn;
        $id = sanitizeInput($_GET["id"]); 
        $title="ต้องการลบข้อมูล";
        $text="คุณต้องการลบข้อมูล id {$id} ใช่หรือไม่";
        $titleIsConfirm="ลบข้อมูลสำเร็จ";
        $textIsConfirm="คุณลบข้อมูล id {$id} เรียบร้อย";
        
        alertConfirm($title,$text,$titleIsConfirm,$textIsConfirm,$locationRedirect,$id); 
        }
        
        if(isset($_GET["confirmDelete"]) && $_GET["confirmDelete"]=="1"){ 
            $id= sanitizeInput($_GET["id"]); 
            $sqlQuery= "DELETE FROM demo WHERE id = '$id';"; 
            if (mysqli_query($conn, $sqlQuery)) {
                $title="ลบข้อมูลสำเร็จ"; 
                alertSuccess($title,$locationRedirect);
            } else {
                // return "Error: " . $sql . "<br>" . mysqli_error($conn);
                $title="ลบข้อมูลไม่ได้";
                $text="โปรดลองใหม่ภายหลัง"; 
                alertError($title,$text,$locationRedirect); 
            } 
            mysqli_close($conn); 
        }