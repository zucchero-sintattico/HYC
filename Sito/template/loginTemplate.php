<div class="row justify-content-center ">
    <form>
        <h2>Login</h2>
        <?php if (isset($templateParams["errorelogin"])): ?>
            <p><?php echo $templateParams["errorelogin"]; ?></p>
        <?php endif; ?>
        <label for="username">Username</label>
        <input type="text" placeholder="Email or Phone" id="username">

        <label for="password">Password</label>
        <input type="password" placeholder="Password" id="password">

        <input type="submit" value="Login">
        <div class="row justify-content-center">
            <a href="../register.php">Sign Up</a>
        </div>
    </form>

</div>


