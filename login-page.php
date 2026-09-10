<!-- file: auth_system/login-page.php ,  Login form styled with Tailwind CSS -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JSON Login System</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">

    <div class="max-w-md w-full bg-white rounded-xl shadow-md border border-gray-200 p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Log In</h2>

        <?php if (isset($_GET['error'])): ?>
            <?php if ($_GET['error'] === 'emptyinput'): ?>
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-4 text-sm">
                    Please fill in all fields!
                </div>
            <?php elseif ($_GET['error'] === 'usernamenotfound'): ?>
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-4 text-sm">
                    Username does not exist!
                </div>
            <?php elseif ($_GET['error'] === 'wrongpassword'): ?>
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-4 text-sm">
                    Incorrect password!
                </div>
            <?php endif; ?>
        <?php endif; ?>        

        <form action="includes/login.inc.php" method="POST" class="space-y-4"> <!-- action -->
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                <input type="text" id="username" name="username" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150">
            </div>

            <div>
                <label for="pwd" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" id="pwd" name="pwd" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150">
            </div>

            <button type="submit" name="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 px-4 rounded-lg shadow transition duration-200 cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Log In
            </button>
        </form>

        <p class="text-sm text-center text-gray-600 mt-4">
            Don't have an account? <a href="index.php" class="text-blue-600 hover:underline font-medium">Sign up here</a>.
        </p>
    </div>

</body>
</html>