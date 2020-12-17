<?php
    include_once("db_conn.php");
    if (isset($_POST['register']))
    {
        $uname = $_POST['uname'];
        $passwd = $_POST['passwd'];
        $email = $_POST['email'];
        $type = $_POST['admin-user'];
    }
    
    $check = mysqli_query($conn, "select * from user where uname = '$uname'");
    $row = mysqli_fetch_array($check);

    if ($row['uname'] == $uname)
    {
        header("location:login.html?reg=alreadyreg");
    }
    else
    {
        if (strlen($uname) == 0)
        {
            header("location:register.html?err=users");
            return ;
        }

        if (strlen($passwd) < 5)
        {
            header("location:register.html?err=passlen");
            return ;
        }
    }
    $insert = mysqli_query($conn, "insert into user (uname, passwd, type) values ('$uname', '$passwd', '$type')");

    if ($insert)
    {
        header("location:login.html?reg=newreg");
    }
    else
    {
        echo "Insertion failed";
    }

    mysqli_close($conn);
