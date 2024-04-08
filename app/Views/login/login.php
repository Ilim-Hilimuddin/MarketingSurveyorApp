<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>login</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">

    <!-- STYLES -->
    <style>
        body {
            background-color: #f8f9fa;
            color: #343a40;
            font-family: Arial, sans-serif;
        }

        header {
            background-color: #007bff;
            color: #fff;
            padding: 1rem 0;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-weight: normal;
        }

        section {
            padding: 2rem 1rem;
            text-align: center;
        }

        .form-control {
            width: 100%;
            max-width: 300px;
            margin: 0 auto;
            padding: 0.5rem;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 1rem 1.2rem;
            border-radius: 0.25rem;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        footer {
            background-color: #a0a0a0;
            color: #f1f1f1;
            padding: 1rem 0;
            text-align: center;
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <header>
        <h1>Selamat Datang di E-Marketing Surveyor</h1>
    </header>

    <!-- CONTENT -->
    <section>
        <div class="row">
            <div class="col">
                <img src="<?= base_url(); ?>/dist/img/main-logo.png" style="width: 350px" alt="Profile Picture">
                <h2>LOGIN</h2>
                <label for="username">Username:</label>
                <input type="text" id="username" class="form-control" placeholder="Username" aria-label="Username">
            </div>
            <div class="col">
                <br> <!-- Add line break here -->
                <label for="password">Password:</label>
                <input type="password" id="password" class="form-control" placeholder="Password" aria-label="Password">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <button type="button" id="loginButton" class="btn btn-primary">Masuk</button>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer style="display:block; position:absolute; bottom:0; width:100%; padding: 10px 0;">
        <div style="display: block; float: right; margin-right: 10px">
            <b>E-Marketing Surveyor</b>
        </div>
        <strong style="float: left; margin-left: 10px">Copyright &copy; <?= date('Y'); ?> All rights reserved.
    </footer>

    <!-- SCRIPT -->
    <script>
        // Menambahkan event listener untuk menangani klik pada tombol "Masuk"
        document.getElementById('loginButton').addEventListener('click', function() {
            // Lakukan pengalihan ke halaman dashboard
            window.location.href = 'dashboard.php'; // Ganti 'dashboard.php' dengan URL sesuai kebutuhan kita yaaa
        });
    </script>

</body>

</html>