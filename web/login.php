<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lookwork</title>
    <link rel="stylesheet" href="aset/css/index.css">
</head>
<body>
<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to get user data based on username and password
    $query = "SELECT * FROM tb_user WHERE username = ? AND pass = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Set session variables
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        // Redirect based on user role
        if ($user['role'] === 'admin') {
            header("Location: dashboardadm.php");
        } else {
            header("Location: index.php");
        }
        exit();
    } else {
        echo "Invalid username or password.";
    }

    $stmt->close();
} else {
    echo "";
}
?>
    <nav class="navbar">
        <div class="logo">LookWork</div>
        <ul class="nav-links">
            <li><a href="login.php">Login</a></li>
        </ul>
    </nav>

<main class="form-signin w-100 m-auto">
  <form method="POST" action="login.php">
    <h1 class="h3 mb-3 fw-normal">Sign in</h1>
    <div class="form-floating">
      <input type="text" name="username" class="form-control" id="floatingInput" placeholder="username" required>
      <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
      <label for="floatingPassword">Password</label>
    </div>
    <input type="submit" class="btn btn-primary w-100 py-2" value="Sign in">
    <a class="btn --bs-btn-active-border-color #0056b3" href="register.php">Register here</a>
  </form>
</main>
</body>
</html>