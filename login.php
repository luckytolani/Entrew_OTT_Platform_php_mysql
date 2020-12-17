<?php
    session_start();
    include_once("db_conn.php");

    if (isset($_POST['login']))
    {
        $_SESSION['uname'] = $_POST['uname'];
        $uname = $_POST['uname'];
        $passwd = mysqli_real_escape_string($conn, $_POST['passwd']);
        $_SESSION['passwd'] = $passwd;
        $res1 = mysqli_query($conn, "select * from user where uname = '$uname' and passwd ='$passwd' and type = 'admin'");
        $res2 = mysqli_query($conn, "select * from user where uname = '$uname' and passwd ='$passwd'and type = 'user'");
    }
    else
    {
        echo "Invalid Information";
    }
    
    if ($row = mysqli_fetch_array($res1))
    {
        $_SESSION['type'] = "admin";
        header("location:welcome.html");
    }
    elseif (($row = mysqli_fetch_array($res2)))
    {
        $_SESSION['type'] = "user";
        header("location:playlist.php");
    }
    else
    {
        header("location:login.html?val=loginfail");;
    }
    mysqli_close($conn);
