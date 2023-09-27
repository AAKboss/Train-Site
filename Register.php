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

    html form {
        text-align: center;
        margin-bottom: 60px;
        padding: 30px;
    }

    html form input {
        padding: 10px;
        margin: 10px;
        text-align: center;
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

    #wrongUser,
    #wrongEmail,
    #wrongPass1,
    #wrongPass2 {
        color: coral;
        margin-top: -10px;
        margin-bottom: -15px;
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
                <h1>Register</h1>
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

<body>
    <div id="main-b">
        <form action="Register.php" method="POST">
            <h1>Register</h1>
            <input type="text" id="name" name="name" placeholder="Enter A Username"><BR>
            <p id="wrongUser"></p><BR>

            <input type="text" id="email" name="email" placeholder="Enter A Email"><BR>
            <p id="wrongEmail"></p><BR>

            <input type="password" id="password" name="password" placeholder="Enter A Password">
            <input id="View" type="hidden"><BR>
            <p id="wrongPass1"></p><BR>

            <input type="password" id="password2" name="password2" placeholder="Enter Password Again">
            <input id="View" type="hidden"><BR>
            <p id="wrongPass2"></p><BR>

            <button type="submit">Login</button>
            <button type="reset">Reset</button>

            <p>Already have an account?</p>
            <p><a href="Login.php">Sign-In</a></p>
        </form>
    </div>
</body>

<?php
$servername = 'localhost';
$SQLUser = 'AAK';
$SQLPass = 'Azgar Ali';
$dbname = 'trainsite';
$name = $email = $password = $password2 = "";
function sanitizeInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['name'])) {
        $name = sanitizeInput($_POST['name']);
    } else {
        echo "<script>document.getElementById('wrongUser').textContent = 'Please enter a Username';</script>";
    }

    if (!empty($_POST['email'])) {
        $email = sanitizeInput($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>document.getElementById('wrongEmail').textContent = 'Please enter a valid Email';</script>";
        }
    } else {
        echo "<script>document.getElementById('wrongEmail').textContent = 'Please enter an Email';</script>";
    }

    if (!empty($_POST['password'])) {
        $pass1 = $_POST['password'];
    } else {
        echo "<script>document.getElementById('wrongPass1').textContent = 'Please enter a Password';</script>";
    }

    if (!empty($_POST['password2'])) {
        $pass2 = $_POST['password2'];
        if ($pass1 != $pass2) {
            echo "<script>document.getElementById('wrongPass2').textContent = 'Passwords do not match';</script>";
        }
    } else {
        echo "<script>document.getElementById('wrongPass2').textContent = 'Please enter a Password';</script>";
    }

}
?>

<script>
    const passwordInput = document.getElementById("password");
    const viewButton = document.getElementById("viewButton");

    viewButton.addEventListener("click", function () {
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            viewButton.textContent = "Hide Password";
        } else {
            passwordInput.type = "password";
            viewButton.textContent = "View Password";
        }
    });

</script>

</html>