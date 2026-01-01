<?php
$page = $_GET['page'] ?? 'home';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= ucfirst($page) ?> - My Website</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="template.php?page=home">MyWebsite</a>
        <ul class="navbar-nav">
            <li class="nav-item"><a href="template.php?page=home">Home</a></li>
            <li class="nav-item"><a href="template.php?page=about">About</a></li>
            <li class="nav-item"><a href="template.php?page=contact">Contact</a></li>
        </ul>
    </div>
</nav>

<div class="container-fluid mt-4 ">
    <div class="row">

        <aside class="col-2">
            <div class="list-group">
                <a href="template.php?page=home" class="list-group-item">Home</a>
                <a href="template.php?page=about" class="list-group-item">About</a>
                <a href="template.php?page=contact" class="list-group-item">Contact</a>
            </div>
        </aside>

        <main class="col-10">
            <div class="card p-4">
                <?php include "$page.php"; ?>
            </div>
        </main>

    </div>
</div>

<footer class="bg-primary text-white text-center p-3 mt-4">
    <p> @ 2025 MyWebsite</p>
</footer>

</body>
</html>
