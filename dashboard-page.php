<?php
// file: auth_system/dashboard-page.php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login-page.php");
    exit();
}

if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: login-page.php");
    exit();
}
$pageLinkButtonStyle = "bg-blue-600 text-white px-4 py-2 rounded-md mx-1";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-4">
    <div class="flex items-center justify-center mb-6">
        <a href="index.php" class="<?= $pageLinkButtonStyle ?>">Home</a>
        <a href="signup-page.php" class="<?= $pageLinkButtonStyle ?>">Sign Up</a>
        <a href="login-page.php" class="<?= $pageLinkButtonStyle ?>" >Log In</a>
    </div>

    <div class="max-w-md mx-auto w-full bg-white rounded-xl shadow-md border border-gray-200 p-6 text-center">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Welcome!</h1>
        <p class="text-gray-600 mb-6">You are logged in as <span class="font-semibold text-blue-600"><?php echo htmlspecialchars($_SESSION["username"]); ?></span></p>

        <form method="POST">
            <button type="submit" name="logout"
                    class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-lg shadow transition duration-200 cursor-pointer">
                Log Out
            </button>
        </form>
    </div>

</body>
</html>