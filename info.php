<?php

session_start();

if (!isset($_SESSION['username'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $users = file_get_contents('users.json');
        $users = json_decode($users, true);

        // Sanitize the input

        $_POST['username'] = htmlspecialchars($_POST['username']);
        $_POST['password'] = htmlspecialchars($_POST['password']);

        foreach ($users['users'] as $user) {
            if ($user['username'] == $_POST['username'] && password_verify($_POST['password'], $user['password'])) {
                $_SESSION['username'] = $_POST['username'];
            }
        }

        if (!isset($_SESSION['username'])) {
            $error = 'Invalid username or password';
        }
    }
}

?>

<?php if (isset($_SESSION['username'])) : ?>
    <?php phpinfo(); ?>
<?php else : ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Access Denied</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.colors.min.css" />
    </head>

    <body>
        <main class="container">
            <header>
                <h1>Access Denied</h1>
            </header>

            <p>You must be logged in to view this page.</p>

            <?php if (isset($error)) : ?>
                <article class="pico-background-red-600">
                    <?php echo $error; ?>
                </article>
            <?php endif; ?>

            <form action="info.php" method="post">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password">
                <button type="submit">Login</button>
            </form>
        </main>
    </body>

    </html>

<?php endif; ?>
