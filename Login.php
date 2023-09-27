<!DOCTYPE html>
<!DOCTYPE html>
<?php
session_start();
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    $username = "Guest";
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
        background-color: lightslategray;
        z-index: 5;
        min-width: 80px;
        border-radius: 40px 15px;
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
        padding: 70px;
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

    #incorrectUser,
    #incorrectPass {
        color: coral;
        margin-top: -5px;
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
                <h1>Login</h1>
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
        <form action="Login.php" method="POST">
            <h1>Login</h1>
            <input type="text" id="Iusername" name="Iusername" placeholder="Enter Username"><BR>
            <p id="incorrectUser"></p><BR>

            <input type="password" id="Ipassword" name="Ipassword" placeholder="Enter password">
            <input id="View" type="hidden"><BR>
            <p id="incorrectPass"></p>

            <input type="hidden" id="JSValid" name="JSValid" value="">
            <button type="submit" onclick="HomeRedirect()">Login</button>
            <button type="reset">Reset</button>

            <p>Don't have an account?</p>
            <p><a href="Register.php">Register</a></p>
        </form>
    </div>
</body>

<?php
$servername = 'localhost';
$username = 'AAK';
$password = 'Azgar Ali';
$dbname = 'trainsite';

if (isset($_POST['Iusername']) && isset($_POST['Ipassword'])) {
    $enteredUsername = htmlspecialchars($_POST['Iusername']);
    $enteredPassword = $_POST['Ipassword'];

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $selectQueryName = "SELECT * FROM users WHERE username = :username";
        $stmt = $conn->prepare($selectQueryName);
        $stmt->bindParam(':username', $enteredUsername);
        $stmt->execute();
        $row = $stmt->fetch();

        if ($row !== false) {
            $username = $row['username'];
            $UEmail = $row['email'];
            $hashedPassword = $row['password'];

            // Verify the password using password_verify
            if ($enteredPassword === $hashedPassword) {
                $_SESSION['username'] = $username;
                echo "<script>document.getElementById('user-prp').textContent = '$username';</script>";
                echo "<script>window.location.href = 'Home.php';</script>";
            } else {
                echo "<script>document.getElementById('incorrectPass').textContent = 'Sorry, wrong password.';</script>";
            }
        } else {
            echo '<script>document.getElementById("incorrectUser").textContent = "Sorry, User not found??";</script>';
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
} else {
    echo "<script>document.getElementById('incorrectUser').textContent = 'Please Enter';</script>";
    echo "<script>document.getElementById('incorrectPass').textContent = 'Please Enter';</script>";
}
?>

<script>
    const passwordInput = document.getElementById("Ipassword");
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