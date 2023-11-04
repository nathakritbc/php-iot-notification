<?php
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $command = $_POST['command']; // รับคำสั่งจากฟอร์มบนหน้าเว็บ
    // $command="upsc myups@localhost 2>& 1 | grep -v '^Init SSL'";
    // $command="upsc myups@localhost battery.voltage";
    $output = shell_exec($command); // รันคำสั่งและรับผลลัพธ์

    echo "<pre>$output</pre>";  
  }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Run Command</title>
</head>

<body>
    <h1>Run Command</h1>
    <form method="post">
        <label for="command">Enter Command:</label>
        <input type="text" name="command" id="command" value="ls -a"> <!-- ค่าเริ่มต้นเป็น "ls -a" -->
        <input type="submit" value="Run">
    </form>
</body>

</html>