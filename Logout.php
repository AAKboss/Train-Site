<!DOCTYPE html>
<?php session_start();
$username = $_SESSION['username']; ?>
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

    #logoutTxt {
        text-align: center;
    }


    html form {
        text-align: center;
        margin-bottom: 50px;
        padding: 30px;
    }

    html form input, html form button {
        padding: 10px;
        margin: 15px;
        text-align: center;
        color: black;
        background-color: lavender;
    }

    html form label {
        padding: 10px;
        margin: 10px;
        text-align: center;
        color: coral;
        font-size: 20px;
    }
    
    input[type="radio"]:checked + label {
        border-bottom: 2px solid green;
    }
</style>

<div id="header">
    <header>
        <nav>
            <div id="nav-container">
                <ul id="nav-ul-left">
                    <li><a href="Home.php">Home</a></li>
                    <li><a href="News.php">News</a></li>
                </ul>
                <h1>Logout</h1>
                <ul id="nav-ul-right">
                    <li id="user-prp">
                        <?php echo "$username"; ?>
                    </li>
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

<body action="Logout.php" method="POST">
    <div id="main-b">
        <h2 id="logoutTxt">Are you sure you want to logout?</h2>
        <h2 id="logoutTxt">You wont be able to post or comment.</h2>

        <form>
            <label for="yes">
                <input type="radio" name="choice" id="yes" value="yes">
                Yes
            </label>

            <label for="no">
                <input type="radio" name="choice" id="no" value="no">
                No
            </label>

            <label for="maybe">
                <input type="radio" name="choice" id="maybe" value="maybe">
                Maybe
            </label>
            
            <br><button type="submit">Press Me</button>
        </form>
    </div>
</body>


<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["choice"])) {
        $choice = $_POST["choice"];

        if ($choice === "Yes") {
            echo '<script>window.location.href = "Login.php";</script>';
        } elseif ($choice === "No") {
            echo '<script>window.location.href = "Home.php";</script>';
        }
    }
}
?>

</html>