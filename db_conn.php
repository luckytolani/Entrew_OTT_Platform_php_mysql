<?php
    $server = "localhost";
    $user = "root";
    $passwd = "";
    // $dbname = "dbms_miniproject";

    $conn = mysqli_connect($server, $user, $passwd);
    $sql = "create database if not exists dbms_miniproject";
    $result = mysqli_query($conn,$sql);
    if(!$result)
    {
        echo"SoMe Problem occured";
    }
    $sql = "use dbms_miniproject;";
    $result = mysqli_query($conn,$sql);
    if(!$result)
    {
        echo"SoMe Problem occured";
    }
    $sql = "create table if not exists web_series
    (
        ws_name varchar(50),
        ws_genre varchar(20),
        no_of_seasons int default 1,
        no_of_episodes int default 1,
        duration int default 60,
        ratings int default 1,
        ws_image varchar(150),
        ws_video varchar(150),
        pub_date date
    );
    ";
    $result = mysqli_query($conn,$sql);
    if(!$result)
    {
        echo"SoMe Problem occured";
    }
    $sql = "create table if not exists user
    (
        uname varchar(50) primary key,
        passwd varchar(50),
        conpasswd varchar(50),
        email varchar(70)
    );";
    $result = mysqli_query($conn,$sql);
    if(!$result)
    {
        echo"SoMe Problem occured";
    }
    // if ($conn)
    // {
    //     echo "Connection Successfully Established";
    // }
    // else
    // {
    //     echo "Connection Refused";
    // }
?>