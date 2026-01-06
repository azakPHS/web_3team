<?php
    session_start();
    $UID = $_POST['UID'];
    $UPW = $_POST['UPW'];

    $dbcon = mysqli_connect('localhost', 'root', '');
    // print_r($dbcon);
    mysqli_select_db($dbcon, 'web_3team');
    $query = "select * from student where student_id = '$UID'";
    $result = mysqli_query($dbcon, $query);
    $num = mysqli_num_rows($result);

    if($num){
        $row = mysqli_fetch_array($result);
        if($row['student_pw'] == $UPW){
            $_SESSION['s_name'] = $row['student_name'];
            // echo "<script>alert('로그인 성공')</script>";
            echo "<script>location.replace('./3team_webpage.php')</script>";
        }else {
            // echo "<script>alert('로그인 실패')</script>";
            echo "<script>history.back()</script>";
        }
    }else{
        // echo "<script>alert('로그인 실패')</script>";
        echo "<script>history.back()</script>";
    }

    mysqli_close($dbcon);
    ?>
