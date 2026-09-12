<!-- file: signup-page.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign up</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex min-h-screen p-4 items-center justify-center">
    <div class="w-full max-w-md">
        <a href="index.php" class="block w-fit m-3 mx-auto bg-blue-600 text-white px-4 py-2 rounded-md">go Home page</a>
        <div class="bg-white p-6 rounded shadow w-full max-w-md  mx-auto">
            <h1 class="text-2xl font-bold mb-4 text-center">Sign Up</h1>
            <!-- php messages -->
            <?php  
                $errorMessageStyle = "bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-4 text-sm";
                $successMessageStyle = "bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-4 text-sm";
            ?>
            <?php if (isset($_GET['error'])): ?>
                <?php if ($_GET['error'] === 'signuperror'): ?>
                    <div class="<?= $errorMessageStyle ?>">
                        Could not signup, please try again!
                    </div>
                <?php elseif ($_GET['error'] === 'emptyinput'): ?>
                    <div class="<?= $errorMessageStyle ?>">
                        Please fill in all fields!
                    </div>
                <?php elseif ($_GET['error'] === 'usernametaken'): ?>
                    <div class="<?= $errorMessageStyle ?>">
                        Username is already taken!
                    </div>
                <?php elseif ($_GET['error'] === 'invalidrequest'): ?>
                    <div class="<?= $errorMessageStyle ?>">
                        Invalid request!
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <?php if (isset($_GET['signup']) && $_GET['signup'] === 'success'): ?>
                <div class="<?= $successMessageStyle ?>">
                    User registered! You can now log in.
                </div>
            <?php endif; ?>

            <!-- signup form -->
            <form action="includes/signup.inc.php" method="POST">
                <div>
                    <label for="username" class="block mb-1">Username</label>
                    <input type="text" id="username" name="username" required class="w-full border p-2 rounded mb-4">
                </div>
                <div>
                    <label for="pwd" class="block mb-1">Password</label>
                    <input type="password" id="pwd" name="pwd" required class="w-full border p-2 rounded mb-4">
                </div>                
                <button type="submit" name="submit" class="w-full bg-blue-600 text-white py-2 rounded">            
                    Sign Up
                </button>
            </form>

            <p class="text-center mt-4">
                Already have an account?
                <a href="login-page.php" class="text-blue-600 hover:underline font-medium">Log in</a>
            </p>
        </div>
    </div>
</body>
</html>