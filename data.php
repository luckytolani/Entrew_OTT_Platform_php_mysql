<html>
    <head>
    <title>
        About Entrew
    </title>
        <link rel=stylesheet type=text/css href=./css/style.css>
    </head>
    <body class="main">
    <div class="nav">
            <div class="nav1">
                <center>
                    Entrew<br>Best Webseries
                </center>
            </div>
            <div class="navmid">
                <Marquee><b>Our Motto:-</b>&nbsp; Viewer Satisfaction + Entertainment x 3</Marquee>
            </div>
            <div class="nav2">
                <center>
                    <a href="login.html" >Login</a> 
                </center>
            </div>
            <div class="nav3">
                <center>
                    <a href="register.html?user=user" >Register</a>
                </center>
            </div>
    </div>
    <center>
            <h1 style="color: wheat; background:black; opacity: 0.8 ; width: 200px;
            border-radius: 20px; border:2px white solid;"> About Users </h1>
        </center>
    </body>
</html>

<?php
    session_start();
    if ($_SESSION['type'] != "admin")
    {
        header("location:login.html?val=permit");
    }
    include_once('db_conn.php');

    $db_qurey = mysqli_query($conn, "select * from user");

    echo "<div class=card>";
    while ($row = mysqli_fetch_array($db_qurey))
    {
        echo "<div class=mcard>";
        $name = $row['uname'];
        $type = $row['type'];
        if ($type == 'user')
        {
            echo "Username: $name<br>";
            echo "Type: User<br>";
        }
        else if ($type == 'admin')
        {
            echo "Username: $name<br>";
            echo "Type: Admin<br>";
        }
        echo "</div><br>";
    }
    echo "</div>"; 
?>