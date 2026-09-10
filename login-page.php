<!-- file: login-page.php  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JSON Login System</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex min-h-screen p-4 items-center justify-center">
    <div  class="w-full max-w-md">
        <a href="index.php" class="block w-fit m-3 mx-auto bg-blue-600 text-white px-4 py-2 rounded-md">Home</a>
        <div class="max-w-md w-full bg-white rounded-xl shadow-md border border-gray-200 mx-auto p-6">
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

            <?php if (isset($_GET['signup']) && $_GET['signup'] === 'success'): ?>
                <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-4 text-sm" role="alert">
                    User registered! You can now log in.
                </div>
            <?php endif; ?>

            <form action="includes/login.inc.php" method="POST" class="space-y-3">
                <div>
                    <label for="username" class="block mb-1 text-sm">Username</label>
                    <input type="text" id="username" name="username" required class="w-full border border-gray-300 rounded px-3 py-2">        
                </div>                
                <div>
                    <label for="pwd" class="block mb-1 text-sm">Password</label>
                    <input type="password" id="pwd" name="pwd" required class="w-full border border-gray-300 rounded px-3 py-2">
                </div>
                <button type="submit" name="submit" class="w-full bg-blue-600 text-white rounded px-3 py-2 hover:bg-blue-700" >    
                    Log In
                </button>
            </form>
            <p class="text-sm text-center text-gray-600 mt-4">
                Don't have an account? <a href="signup-page.php" class="text-blue-600 hover:underline font-medium">Sign up here</a>.
            </p>
        </div>
    </div>

</body>
</html>