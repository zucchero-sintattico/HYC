<div class="row justify-content-center ">
    <form action="#" method="POST">
        <h2>Login</h2>
        <?php if (isset($templateParams["errorelogin"])): ?>
            <p class="errorInRegister"><?php echo $templateParams["errorelogin"]; ?></p>
        <?php endif; ?>
        <label for="username">Username</label>
        <input name="username" type="text" placeholder="Username" id="username">

        <label for="password">Password</label>
        <input name="password" type="password" placeholder="Password" id="password">

        <input type="submit" value="Login">
        <div class="row justify-content-center">
            <a href="../register.php">Sign Up</a>
        </div>
    </form>

</div>


