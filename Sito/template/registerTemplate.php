<div class="row justify-content-center">
    <form action="#" method="POST">
        <h2>Register</h2>
        <?php if (isset($templateParams["errorelogin"])): ?>
            <p class="errorInRegister"><?php echo $templateParams["errorelogin"]; ?></p>
        <?php endif; ?>

        <label for="name">Name:</label><input type="text" id="name" name="name"/>

        <label for="surname">Surname:</label><input type="text" id="surname" name="surname"/>

        <label for="username">Username:</label><input type="text" id="username" name="username"/>

        <label for="mail">Mail:</label><input type="email" id="mail" name="mail"/>

        <label for="password">Password:</label><input type="password" id="password" name="password"/>

        <input type="submit" name="submit" value="Send" id="sendBtn"/>
        <div class="row justify-content-center">
            <a href="../login.php">Go to login</a>
        </div>
    </form>
</div>
