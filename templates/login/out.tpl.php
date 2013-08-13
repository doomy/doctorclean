<form action="" method="POST">
    Přihlášení
    <input type="text" name="username" <?php if($failed_login) echo 'class="failed"'; ?> placeholder="Uživ. jméno"/>
    <input type="password" name="password" <?php if($failed_login) echo 'class="failed"'; ?> placeholder="Heslo"/>
    <input type="submit" class="submit" value="Přihlásit"/>
    <a href="?p=registrace">Registrace nového uživatele</a>
</form>
