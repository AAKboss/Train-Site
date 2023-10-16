<!DOCTYPE html>
<?php session_start();
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $showPost = true;
} else {
    $username = "Guest";
    $showPost = false;
}
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'Admin') {
        $showReview = true;
    } else {
        $showReview = false;
    }
} else {
    $showReview = false;
}
?>

<html lang="en">

<head>
    <title>Train-Site--AAK</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<style>
    @font-face {
        font-family: 'Merienda';
        src: url('../Train-Site/Merienda/Merienda-VariableFont_wght.ttf') format('truetype');
    }

    html {
        background: url("Train-bgpic.png") center fixed;
        background-size: cover;
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        font-family: 'Merienda', serif;
        font-size: 12px;
    }

    hr {
        color: lavender;
    }

    #header,
    #main-b {
        background-color: rgba(0, 0, 0, 0.7);
        padding: 20px;
        color: lavender;
    }

    #nav-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
        margin-bottom: -30px;
        margin-top: -30px;
    }

    #nav-ul-left,
    #nav-ul-right {
        list-style-type: none;
        margin: 0;
        padding: 0;
        display: flex;
    }

    #nav-ul-left li,
    #nav-ul-right li {
        margin-right: 10px;
    }

    #nav-ul-left li:last-child,
    #nav-ul-right li:last-child {
        margin-right: 0;
    }

    #nav-ul-left a,
    #nav-ul-right a {
        text-decoration: none;
        color: black;
        padding: 5px 10px;
        border-radius: 40px 70px;
        background-color: lightslategrey;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    #nav-ul-left a:hover,
    #nav-ul-right a:hover {
        color: deepskyblue;
        background-color: lavender;
    }

    #nav-ul-right .dropdown {
        position: relative;
    }

    #nav-ul-right .dropdown:hover .dropdown-menu {
        display: block;
        align-items: center;
        justify-content: center;
    }

    #nav-ul-right .dropdown-menu {
        display: none;
        position: absolute;
        background-color: lightslategrey;
        z-index: 5;
        min-width: 80px;
        border-radius: 40px 40px 15px 15px;
        list-style: none;
        margin-left: -50px;
        margin-top: 1px;
    }

    #nav-ul-right .dropdown-menu li {
        padding: 5px;
        margin-left: -20px;
    }

    #nav-ul-right .dropdown-menu a {
        color: black;
        text-decoration: none;
        display: block;
    }

    #nav-ul-right .dropdown-menu a:hover {
        background-color: lavender;
        color: deepskyblue;
    }

    #user-prp {
        padding: 5px;
    }
</style>


<div id="header">
    <header>
        <nav>
            <div id="nav-container">
                <ul id="nav-ul-left">
                    <li><a href="Home.php">Home</a></li>
                    <li><a href="News.php">News</a></li>
                    <?php if ($showReview) {
                        echo '<li><a href="Review.php">Review</a></li>';
                    } ?>
                </ul>
                <h1>Home</h1>
                <ul id="nav-ul-right">
                    <li id="user-prp">
                        <?php echo "$username"; ?>
                    </li>
                    <?php if ($showPost) {
                        echo '<li><a href="Post.php">Post</a></li>';
                    } ?>
                    <li class="dropdown">
                        <a href="#">!!!</a>
                        <ul class="dropdown-menu">
                            <li><a href="Login.php">Login</a></li>
                            <li><a href="Settings.php">Settings</a></li>
                            <li><a href="Support.php">Support</a></li>
                            <li><a href="Logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
</div>

<div>
    <hr>
</div>

<body>
    <div id="main-b">
        <h1>Welcome to TrainSpotter</h1>

        <div id="submissions">
            <h2>Latest Submissions</h2>
            <?php
            $host = "localhost";
            $username = "AAK";
            $password = "Azgar Ali";
            $database = "trainsite";

            $conn = mysqli_connect($host, $username, $password, $database);

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Fetch submissions
            $submissions = array(); 
            $query = "SELECT * FROM reviews"; 
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $submissions[] = $row;
                }
            }

            // Display 
            foreach ($submissions as $submission) {
                echo "<div class='submission'>";
                echo "<h3>{$reviews['title']}</h3>";
                echo "<p>{$reviews['date_time']}</p>";
                echo "<p>{$reviews['location']}</p>";
                echo "<p>{$reviews['train_type']}</p>";
                echo "<img>{$reviews['images']}";
                echo "</div>";
            }
            ?>
        </div>
    </div>
</body>


</html>