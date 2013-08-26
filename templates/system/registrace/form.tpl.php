<form class="styled-form" action="?p=registrace" method="POST">
    Zde zaregistrujete nového uživatele.
    
    <?php
        if (isset($registration_error))
            echo "<div class='error'>$registration_error</div>";
    
    ?>
    
    <table>
        <tr>
            <th>
                <label for="username">Uživatelské jméno</label>
            </th>
            <td>
                <input type="text" name="username" />
            </td>
        <tr>
            <th>
                <label for="password">Heslo</label>
            </th>
            <td>
                <input type="password" name="password" />
            </td>
        </tr>
        <tr>
            <th>
                <label for="password_again">Heslo znovu</label>
            </th>
            <td>
                <input type="password" name="password_again" />
            </td>
        </tr>
        <tr>
            <th>
                <label for="email">E-mailová adresa</label>
            </th>
            <td>
                <input type="email" name="email" />
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="hidden" name="is_registering" value="1" />
                <input type="submit" class="blue-submit" value="Registrovat!" />
            </td>
        </tr>
    </table>
</form>
