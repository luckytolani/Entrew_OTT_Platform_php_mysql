<html>

<head>
    <title>
        Entrew Dashboard
    </title>
    <link rel="stylesheet" href="css/dash.css">
</head>

<body style="background-image: url(imgused/bg.jpg);">

    <?php
    session_start();
    if (!isset($_SESSION['uname'])) {
        header("location:login.html?val=firstlogin");
    }
    include_once("db_conn.php");
    echo "<div class=nav>
    <div class=nav1>
        <center>
            <a href=index.html>Entrew<br>Best Webseries</a>
        </center>
    </div>
    <div class=navmid>
        <Marquee><b>Our Motto:-</b>&nbsp; Viewer Satisfaction + Entertainment x 3</Marquee>
    </div>";
    echo "<div class=nav3>
    <center>
    <a  href=logout.php> Logout </a>
    </center>
    </div>
    <div class=nav3>
        <center>
        <a href=register.html?user=user> Add User </a> 
        </center>
    </div>";
    echo "<div class = nav3><a href=#>" . $_SESSION['uname'] . "</a></div>";
    if ($_SESSION['type'] == 'admin') {
        // echo "<a class = nav3 href=data.php>Users</a>";
        echo "<a class = nav3 href=welcome.php>Settings</a>";
    }
    echo "</div>";
    $db_query = mysqli_query($conn, "select * from web");
    echo "<div class=card>
            <center>";
    while ($rows = mysqli_fetch_assoc($db_query)) {
        $name = $rows['wname'];
        $genre = $rows['wgenre'];
        $no_of_seasons = $rows['nosea'];
        $no_of_episodes = $rows['noepi'];
        $duration = $rows['duration'];
        $ratings = $rows['ratings'];
        $pub_date = $rows['date'];
        $img = './images/' . $rows['image'];
        $vid = './videos/' . $rows['video'];
        echo "<div class=mcard>
        <video class = vid width=600 height=176 poster='$img' controls>
        <source src='$vid' type=video/mp4>
        </video>
        <p>
        <div class = cont>
        <div class=title> Name:            </div> <div class=tdata>$name           </div> <br>
        <div class=title> Genre:</div> <div class=tdata>$genre</div> <br>
        <div class=title> No. of seasons:</div> <div class=tdata>$no_of_seasons</div> <br>
        <div class=title> No. of episodes:</div> <div class=tdata>$no_of_episodes </div> <br>
        <div class=title> Duration:</div> <div class=tdata>$duration(mins)</div> <br>
        <div class=title> Ratings:</div> <div class=tdata>$ratings</div> <br>
        <div class=title> Published Date:</div> <div class=tdata>$pub_date</div> <br>
        </div>
        </p>
        </div><br>";
    }
    echo "</center>
        </div>";
    ?>
</body>
</html>