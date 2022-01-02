<div class="row justify-content-center">
    <form action="#" method="POST">
        <h2>Register</h2>
        <?php if (isset($templateParams["errorelogin"])): ?>
            <p class="errorInRegister"><?php echo $templateParams["errorelogin"]; ?></p>
        <?php endif; ?>
        <ul>
            <li>
                <label for="name">Name:</label><input type="text" id="name" name="name"/>
            </li>
            <li>
                <label for="surname">Surname:</label><input type="text" id="surname" name="surname"/>
            </li>
            <li>
                <label for="username">Username:</label><input type="text" id="username" name="username"/>
            </li>
            <li>
                <label for="mail">Mail:</label><input type="email" id="mail" name="mail"/>
            </li>
            <li>
                <label for="password">Password:</label><input type="password" id="password" name="password"/>
            </li>
            <li>
                <input type="submit" name="submit" value="Send" id="sendBtn"/>
            </li>
        </ul>
    </form>
</div>
<div class="row justify-content-center">
    <a href="../login.php">Go to login</a>
</div>