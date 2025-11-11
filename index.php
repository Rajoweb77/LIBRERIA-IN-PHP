<?php
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['titolo'])) {
        addBook($_POST['titolo'], $_POST['autore'], $_POST['anno'], $_POST['prezzo'], $_POST['pagine']);
    }
    if (isset($_POST['delete'])) {
        deleteBook($_POST['delete']);
    }
    if (isset($_POST['search'])) {
        $risultati = searchBook($_POST['cerca']);
    }
}
?>





<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Libreria in PHP</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<?php include 'header.php'; ?>

<div class="container mt-4">
    <h2>Aggiungi un libro</h2>
    <form method="post" class="row g-3">
        <div class="col-md-4">
            <input type="text" name="titolo" class="form-control" placeholder="Titolo" required>
        </div>
        <div class="col-md-4">
            <input type="text" name="autore" class="form-control" placeholder="Autore" required>
        </div>
        <div class="col-md-2">
            <input type="text" name="anno" class="form-control" placeholder="Anno" required>
        </div>
        <div class="col-md-1">
            <input type="number" name="prezzo" class="form-control" placeholder="€" required>
        </div>
        <div class="col-md-1">
            <input type="number" name="pagine" class="form-control" placeholder="Pagine" required>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Aggiungi</button>
        </div>
    </form>

    <hr>

    <h2>Cerca un libro</h2>
    <form method="post" class="row g-3">
        <div class="col-md-10">
            <input type="text" name="cerca" class="form-control" placeholder="Titolo o autore...">
        </div>
        <div class="col-md-2">
            <button type="submit" name="search" class="btn btn-success w-100">Cerca</button>
        </div>
    </form>



<?php
    if (isset($risultati)) {
        echo "<h3 class='mt-3'>Risultati ricerca:</h3>";
        if (empty($risultati)) {
            echo "<p>Nessun libro trovato.</p>";
        } else {
            
            foreach ($risultati as $libro) {
                echo "<p>". $libro ."</p>";
            }
           
        }
    }
    ?>



    <hr>

    <h2>Lista dei libri</h2>
    <?php printBooks(); ?>
</div>

<?php include 'footer.php'; ?>

</body>
</html>
