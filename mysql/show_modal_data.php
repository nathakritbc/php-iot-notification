<?php 
if(isset($_GET["show_modal_data"]) && isset($_GET["show_modal_data"])){
    function sanitizeInput($input)
    {
        global $conn;
        return mysqli_real_escape_string($conn, $input);
    }
    $id = sanitizeInput($_GET["id"]);
}
?>
<!-- Modal -->