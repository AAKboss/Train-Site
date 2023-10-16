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

    html form {
        text-align: center;
        padding: 5px;
    }

    html form table {
        text-align: left;
    }

    html form input,
    html form select {
        padding: 5px;
        margin: 5px;
        text-align: center;
        color: black;
        font-family: 'Merienda', serif;
        background-color: lavender;
    }

    html form textarea {
        text-align: left;
        padding: 5px;
        margin: 5px;
        color: black;
        font-family: 'Merienda', serif;
        background-color: lavender;
    }

    html form button {
        padding: 5px;
        margin: 10px;
        text-align: center;
        color: black;
        font-family: "Merienda", serif;
        background-color: lavender;
    }

    html form a {
        color: coral;
        font-size: 12px;
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
                <h1>Post</h1>
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
        <form action="Home.php" method="POST">
            <table>
                <tr>
                    <td><label for="title"> Enter a title:</td>
                    <td><input required type="text" id="title" name="title"></label><BR>
                    <td>
                </tr>
                <tr>
                    <td><label for="date_time">Date and Time:</td>
                    <td><input required type="datetime-local" id="date_time" name="date_time"></label><BR></td>
                </tr>

                <tr>
                    <td><label for="location">Location:</td>
                    <td><input type="text" id="location" name="location"></label><br></td>
                </tr>

                <tr>
                    <td><label for="train_type">Train Type: </td>
                    <td><select id="train_type" name="train_type" required>
                            <option value="Other">Other</option>
                            <option value="Diesel">Diesel</option>
                            <option value="Freight">Freight</option>
                            <option value="High-Speed">High-Speed</option>
                            <option value="Steam">Steam</option>
                            <option value="Commuter">Commuter</option>
                            <option value="Electric">Electric</option>
                            <option value="Long-Distance">Long-Distance</option>
                            <option value="Maglev">Maglev</option>
                            <option value="Military">Military</option>
                            <option value="Mine">Mine</option>
                            <option value="Model_Scale">Model / Scale</option>
                            <option value="Monorail">Monorail</option>
                            <option value="Tram">Tram</option>
                        </select><br></td>
                </tr>

                <tr>
                    <td><label for="images"> Images: </td>
                    <td><input type="file" id="images" name="images[]" accept="image/*" multiple><br></td>
                </tr>

                <tr>
                    <td><label for="videos"> Videos: </td>
                    <td><input type="file" id="videos" name="videos[]" accept="video/*" multiple><br></td>
                </tr>

                <tr>
                    <td><label for="comments">Comments: </td>
                    <td><textarea id="comments" name="comments" rows="2" cols="37" required></textarea><br></td>
                </tr>
            </table>

            <button type="submit" onclick="Pre_Post()">Submit</button>
            <button type="reset">Reset</button>

        </form>
        <?php
        // Establish a database connection (replace with your database credentials)
        $host = "local";
        $username = "AAK";
        $password = "Azgar Ali";
        $database = "trainsite";

        $conn = mysqli_connect($host, $username, $password, $database);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $title = $_POST["title"];
            $date_time = $_POST["date_time"];
            $location = $_POST["location"];
            $train_type = $_POST["train_type"];
            $images = $_POST["images"]; 
            $videos = $_POST["videos"]; 
            $comments = $_POST["comments"];
        
            // Perform the SQL insert
            $query = "INSERT INTO submissions (title, date_time, location, train_type, images, videos, comments) 
                        VALUES ('$title', '$date_time', '$location', '$train_type', '$images', '$videos', '$comments)";
            if (mysqli_query($conn, $query)) {
                echo "Submission successful!";
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
        }
        mysqli_close($conn);
        ?>

    </div>
</body>

<script>
    function Pre_Post() {
        var date_time = document.getElementById("date_time");
        var comments = document.getElementById("comments");

        switch (true) {
            case date_time.value.length === 0:
                alert("Please enter the Date and Time of viewing the train");
                return false;

            case comments.value.length === 0:
                alert("Please enter some commentary");
                return false;

            default:
                if (confirm("Please note all submissions are sent for reviewing before being posted on the Home page for viewing. \nAre you sure you want to submit?") == true) {
                    confirm("Submission sent for review. Hang in there");
                    window.location.href = 'Home.php'; // Redirect here
                    return true; // Allow form submission
                } else {
                    return false; // Prevent form submission
                }
        }
    }
</script>

</html>