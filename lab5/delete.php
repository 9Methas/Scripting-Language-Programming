<html>
    <body>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "RegisterDB");
        $conn->query("SET NAMES UTF8");
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        
            // สร้างคำสั่ง SQL เพื่อลบข้อมูลจากฐานข้อมูล
            $sql = "DELETE FROM Register WHERE ID = '$id'";
        
            // ดำเนินการลบข้อมูล
            if($conn->query($sql) === TRUE){
                echo "ID: $id Deleted Aleardy! <br>";   
            } else {
                echo "Execution Error!" . $conn->error;
            }
        } else {
            echo "Data Not Found";
        }
        
        $conn->close();
        ?>
        <a href="view.php">Go to Home</a>
    </body>
</html>
