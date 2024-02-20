<form action="requestHandler.php?action=login" method="post">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <input type="hidden" name="csrf_token" value="<?php echo generateCsrfToken(); ?>">

    <button type="submit">Login</button>
</form>
