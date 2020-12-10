<html>
<title>
    Home
</title>

<head>
    <link rel=stylesheet type=text/css href=css/playlist.css> </head> <style>

    .nav
    {
    background-color: black;
    opacity: 0.8;
    height: 70px;
    border-radius: 30px;
    }
    .nav1
    {
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    width: 150px;
    margin-top: 13px;
    border-radius: 30px;
    margin-left: 10px;
    height: 40px;
    border: 1px solid white;
    display: inline-block;
    align-items: center;
    color: blanchedalmond;
    }
    .navmid
    {
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    width: 500px;
    margin-left: 150px;
    padding-top: 15px;
    display: inline-block;
    align-items: center;
    color: blanchedalmond;

    }

    a:visited , a:link
    {
    text-decoration: none;
    color: white;
    }
    .nav3
    {
    float: right;
    margin-top: 20px;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    width: 80px;
    margin-top: 20px;
    padding: 5px;
    border-radius: 20px;
    text-align: center;
    border: 1px solid white;
    margin-bottom: auto;
    display: inline-block;
    align-items: center;
    color: blanchedalmond;
    }
    .nav3:hover
    {
    background-color:red;
    }


    .parent
    {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: space_between;
    align-items: center;
    }
    .dropdown{
    position: relative;
    width: 80px;
    /* height: 150px; */
    }
    .part
    {
    margin: 10px;
    width: 48%;
    border-radius: 4px;
    display: block;
    background-color: #5B84B1FF;
    }
    .p1
    {
    color: #080f0f;
    }
    .p2
    {
    color: #a52422;
    }
    .scss
    {
    width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    }
    .btncss
    {
    width: 25%;
    background-color: #7dd181;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    }
    .btncss:hover
    {
    background-color: #4b7f52;
    }
    </style>

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
        echo "<a class = nav3 href=welcome.html>Settings</a>";
    }
    echo "</div>
     <center>
     <form name=sbar action=playlist.php method=post>
     <input name=search class=scss type=text placeholder=Search..>
     <input name=btn class=btncss type=submit value=Go>
     </center>
     </form>";
    if (isset($_POST['btn'])) {
        $db_query = mysqli_query($conn, "select * from web_series where ws_name like '%" . $_POST['search'] . "%'");
    } else {
        $db_query = mysqli_query($conn, "select * from web_series");
    }
    echo "<div class=parent>";
    while ($rows = mysqli_fetch_assoc($db_query)) {
        $name = $rows['ws_name'];
        $genre = $rows['ws_genre'];
        $no_of_seasons = $rows['no_of_seasons'];
        $no_of_episodes = $rows['no_of_episodes'];
        $duration = $rows['duration'];
        $ratings = $rows['ratings'];
        $pub_date = $rows['pub_date'];
        $img = './images/' . $rows['ws_image'];
        $vid = './videos/' . $rows['ws_video'];
        echo "<div class=part>";
        echo "<video width=600 height=176 poster='$img' controls>";
        echo "<source src='$vid' type=video/mp4>";
        echo "</video>";
        echo "<p>";
        echo "<div class=p1> Name:            </div> <div class=p2>$name           </div> <br>";
        echo "<div class=p1> Genre:           </div> <div class=p2>$genre          </div> <br>";
        echo "<div class=p1> No. of seasons:  </div> <div class=p2>$no_of_seasons  </div> <br>";
        echo "<div class=p1> No. of episodes: </div> <div class=p2>$no_of_episodes </div> <br>";
        echo "<div class=p1> Duration:        </div> <div class=p2>$duration       </div> <br>";
        echo "<div class=p1> Ratings:         </div> <div class=p2>$ratings        </div> <br>";
        echo "<div class=p1> Published Date:  </div> <div class=p2>$pub_date       </div> <br>";
        echo "</p>";
        echo "</div><br>";
    }
    echo "</div>";
    ?>
</body>

</html>