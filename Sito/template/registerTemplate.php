<div class="row justify-content-center ">
    <form action="#" method="POST">
        <h2>Register</h2>
        <?php if (isset($templateParams["errorelogin"])): ?>
            <p><?php echo $templateParams["errorelogin"]; ?></p>
        <?php endif; ?>
        <ul>
            <li>
                <label for="username">Username:</label><input type="text" id="username" name="username"/>
            </li>
            <li>
                <label for="password">Password:</label><input type="password" id="password" name="password"/>
            </li>
            <li>
                <label for="password">Confirm Password:</label><input type="password" id="password" name="password"/>
            </li>
            <li>
                <input type="submit" name="submit" value="Invia"/>
            </li>
        </ul>
    </form>
</div>
