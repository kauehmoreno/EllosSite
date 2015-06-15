<?php
    $con = mysqli_connect("localhost","root", "", "ellos");
    if(mysqli_connect_errno()){
        $erro = mysqli_connect_error();
        echo $erro;
        // O ALERT ABAIXO NAO FUNCIONA - só com echo ou alert com texto fixo
        echo "<script>
                    alert('".$erro."');
                    location.href='espacodoaluno.php';
             </script>";      
    }else{
        mysqli_autocommit($con, false);    
    }
?>

