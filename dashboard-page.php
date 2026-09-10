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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">

    <div class="max-w-md w-full bg-white rounded-xl shadow-md border border-gray-200 p-6 text-center">
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