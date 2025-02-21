<?php
session_start(); // Start the session to access session variables
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-in/Sign-up</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="wrapper">
        <span class="bg-animate"></span>
        <span class="bg-animate2"></span>

        <!-- Login Form -->
        <div class="form-box login">
            <h2 class="animation" style="--i:0; --j:21;">Sign-In</h2>
            <form action="login.php" method="POST">
                <div class="input-box animation" style="--i:1; --j:22;">
                    <input type="text" name="username" required>
                    <label>Username</label>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box animation" style="--i:2; --j:23;">
                    <input type="password" name="password" required>
                    <label>Password</label>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <button type="submit" class="btn animation" style="--i:3; --j:24;">Login</button>
                <div class="logreg-link animation" style="--i:4; --j:25;">
                    <p>Don't have an account? <a href="#" class="register-link">Sign Up</a></p>
                </div>
            </form>
        </div>

        <div class="info-text login">
            <h2 class="animation" style="--i:0; --j:20;">Welcome Back!</h2>
            <p class="animation" style="--i:1; --j:21;">Lorem ipsum dolor sit. Lorem ipsum dolor sit amet, consectetur
                adipisicing.</p>
        </div>

        <!-- Registration Form -->
        <div class="form-box register">
            <h2 class="animation" style="--i:17; --j:0;">Sign-Up</h2>
            <form action="auth.php" method="POST">
                <div class="input-box animation" style="--i:18; --j:1;">
                    <input type="text" name="username" required>
                    <label>Username</label>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box animation" style="--i:19; --j:2;">
                    <input type="email" name="email" required>
                    <label>Email Id</label>
                    <i class='bx bxs-envelope'></i>
                </div>
                <div class="input-box animation" style="--i:20; --j:3;">
                    <input type="password" name="password" required>
                    <label>Password</label>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <button type="submit" class="btn animation" style="--i:21; --j:4;">Sign Up</button>
                <div class="logreg-link animation" style="--i:22; --j:5;">
                    <p>Already have an account? <a href="#" class="login-link">Sign In</a></p>
                </div>
            </form>
        </div>

        <div class="info-text register">
            <h2 class="animation" style="--i:17; --j:0;">Sign Up!</h2>
            <p class="animation" style="--i:18; --j:1;">Lorem ipsum dolor sit. Lorem ipsum dolor sit amet, consectetur
                adipisicing.</p>
        </div>
    </div>

    <!-- Modal for Success Message -->
    <div id="successModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeModal">&times;</span>
            <p id="modalMessage">Account created successfully!</p>
        </div>
    </div>

    <script src="script.js"></script>
    <script>
        // Get the modal
        var modal = document.getElementById("successModal");

        // Get the <span> element that closes the modal
        var span = document.getElementById("closeModal");

        // Check if there's a success message in the session
        <?php if (isset($_SESSION['success_message'])): ?>
            document.getElementById("modalMessage").innerText = "<?php echo $_SESSION['success_message']; ?>";
            modal.style.display = "block"; // Show the modal
            <?php unset($_SESSION['success_message']); // Clear the message after displaying 
            ?>
        <?php endif; ?>

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>

</html>