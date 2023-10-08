<?php
$error = '';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'admin' && $password === '12345') {
        header("Location: beranda.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Perpustakaan - Login</title>
    <link rel="stylesheet" href="style-login.css">
</head>
<body>

    <div class="main">
        <div class="card">
            <div class="card_body">
                <div class="card_header">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                        <path fill="none" d="M0 0h24v24H0z"></path>
                        <path fill="currentColor" d="M4 15h2v5h12V4H6v5H4V3a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-6zm6-4V8l5 4-5 4v-3H2v-2h8z"></path>
                    </svg>
                    <h1 class="form_heading">Halo, Admin!</h1>
                </div>
                <?php if (!empty($error)) { ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php } ?>
                <form method="POST" action="">
                    <div class="field">
                        <label for="username">Username</label>
                        <input class="input" name="username" type="text" placeholder="Username" id="username" required>
                    </div>
                    <div class="field">
                        <label for="password">Password</label>
                        <input class="input" name="password" type="password" placeholder="Password" id="password" required>
                    </div>
                    <div class="field">
                        <button type="submit" name="login" class="button">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
