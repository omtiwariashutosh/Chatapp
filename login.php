<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    header("location: users.php");
}
?>

<?php include_once 'header.php'; ?>

<body>
    <div class="wrapper">
        <section class="form login">
            <header>Sign-In</header>
            <form action="#" method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="error-text"></div>

                <div class="field input">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Your Email" required>
                </div>
                <div class="field input">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Password" required>
                    <i class="fas fa-eye"></i>
                </div>

                <div class="field button">
                    <input type="submit" value="Continue to chat" name="submit">
                </div>

            </form>
            <div class="link">Don't have an account? <a href="index.php">Login here</a></div>
        </section>
    </div>
    <script src="script.js"></script>
    <script src="login.js"></script>
</body>

</html>