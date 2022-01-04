<div class="row justify-content-center">
    <form action="#" method="POST">
        <h2>Register</h2>
        <?php if (isset($templateParams["errorelogin"])): ?>
            <p class="errorInRegister"><?php echo $templateParams["errorelogin"]; ?></p>
        <?php endif; ?>

        <label for="name">Name:</label><input type="text" id="name" name="name" placeholder="Insert your name..."/>

        <label for="surname">Surname:</label><input type="text" id="surname" name="surname"
                                                    placeholder="Insert your surname..."/>

        <label for="username">Username:</label><input type="text" id="username" name="username"
                                                      placeholder="Insert your username..."/>

        <label for="mail">Mail:</label><input type="email" id="mail" name="mail" placeholder="Insert your mail..."/>

        <label for="password">Password:</label><input type="password" id="password" name="password"
                                                      placeholder="Insert your password..."/>

        <input type="submit" name="submit" value="Sign Up" id="sendBtn"/>
        <div class="row justify-content-center">
            <a href="../login.php">Go to login</a>
        </div>
    </form>
</div>
