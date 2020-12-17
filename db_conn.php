<?php
    $server = "localhost";
    $user = "root";
    $passwd = "";

    $conn = mysqli_connect($server, $user, $passwd);
    $sql = "create database if not exists dws";
    $result = mysqli_query($conn,$sql);
    if(!$result)
    {
        echo"SoMe Problem occured";
    }
    $sql = "use dws;";
    $result = mysqli_query($conn,$sql);
    if(!$result)
    {
        echo"SoMe Problem occured";
    }
    
    $sql = "create table if not exists web
    (
        wname varchar(50),
        wgenre varchar(20),
        nosea int ,
        noepi int ,
        duration int default 60,
        ratings int ,
        image varchar(150),
        video varchar(150),
        date date
    );
    ";
    $result = mysqli_query($conn,$sql);
    $sql = "create table if not exists user
    (
        uname varchar(50) primary key,
        passwd varchar(50),
        type varchar(70)
    );";
    $result = mysqli_query($conn,$sql);
    $sql = "insert into user values('Lucky','admin','admin');";
    $result = mysqli_query($conn,$sql);
?>