<!-- file: auth_system/index.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JSON Signup System</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">

    <div class="max-w-md w-full bg-white rounded-xl shadow-md border border-gray-200 p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Register</h2>        

        <?php if (isset($_GET['error'])): ?>
            <?php if ($_GET['error'] === 'signuperror'): ?>
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-4 text-sm" role="alert">
                    Could not signup, please try again!
                </div>
            <?php elseif ($_GET['error'] === 'emptyinput'): ?>
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-4 text-sm" role="alert">
                    Plese fill in all fields!
                </div>
            <?php elseif ($_GET['error'] === 'usernametaken'): ?>
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-4 text-sm" role="alert">
                    Username is already taken!
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <?php if (isset($_GET['signup']) && $_GET['signup'] === 'success'): ?>
            <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-4 text-sm" role="alert">
                User registered! Credentials are saved to JSON file.
            </div>
        <?php endif; ?>        

        <form action="includes/signup.inc.php" method="POST" class="space-y-4"> <!-- action -->
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
                Sign Up
            </button>
        </form>
        <p class="text-sm text-center text-gray-600 mt-4">
            Already have an account? <a href="login-page.php" class="text-blue-600 hover:underline font-medium">Log in here</a>.
        </p>
    </div>

</body>
</html>