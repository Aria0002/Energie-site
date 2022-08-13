<head>
    <link rel="stylesheet" href="opmaak.css">
</head>
<nav>
    <ul class="navbar">
        <li><a class="link" href="index.php">Home</a></li>
    </ul>
</nav>

<!-- upload.php is for signup -->
<form method="POST" action="upload.php">
    <div class="login-box">
        <h1>Register</h1>
        <p class="label">Username</p>
        <div class="input-box">
            <input type="text" name="username" placeholder="Username...">
        </div>
        <p class="label">Password</p>
        <div class="input-box">
            <input type="password" name="password" placeholder="Password...">
        </div>
        <button class="btn" type="submit" name="submit">Sign Up</button>
    </div>
</form>
