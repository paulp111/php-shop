<!DOCTYPE html>
<html lang="de" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="/webshop/public/css/pico.classless.min.css">
    <style>
        .theme-switch-wrapper {
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .theme-switch {
            display: inline-block;
            width: 34px;
            height: 20px;
            position: relative;
        }

        .theme-switch input {
            display: none;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: 0.4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
            left: 2px;
            bottom: 2px;
            background-color: white;
            transition: 0.4s;
            border-radius: 50%;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:checked + .slider:before {
            transform: translateX(14px);
        }
    </style>
    <script src="/webshop/public/js/theme-toggle.js"></script>
</head>

<body>
    <div class="theme-switch-wrapper">
        <label class="theme-switch">
            <input type="checkbox" id="theme-switch" onclick="toggleTheme()">
            <span class="slider"></span>
        </label>
    </div>
    <main>
        <h2>Register</h2>
        <?php if (isset($error)) : ?>
            <p><?php echo $error; ?></p>
        <?php endif; ?>
        <form action="layouts/register.main.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>

            <input type="submit" value="Register">
        </form>
    </main>
</body>

</html>
