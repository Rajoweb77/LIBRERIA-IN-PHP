<?php
require_once 'Book.php';

//-----------------------------LOGICA SALVATAGGIO SESSION STORAGE---------------------------

session_start();

// Inizializza la sessione 
if (!isset($_SESSION['libri'])) {
    $_SESSION['libri'] = []; // prima volta : libri nella sessione del browser
}


//Devo fare un riferimento all array della sessione con &
$libri = &$_SESSION['libri'];




// Aggiungi libro
function addBook($titolo, $autore, $anno, $prezzo, $pagine)
{
    $libro = new Book($titolo, $autore, $anno, $prezzo, $pagine);
    $_SESSION['libri'][] = $libro;
}

// Visualizza libri
function printBooks()
{

    echo "<ul class='list-group'>";
    foreach ($_SESSION['libri'] as $visualizza => $libro) {
        echo "<li class='list-group-item d-flex justify-content-between align-items-center'>";
        echo $libro;
        echo "<form method='POST' style='margin:0'>
                    <input type='hidden' name='delete' value='$visualizza'>
                    <button type='submit' class='btn btn-danger btn-sm'>Elimina</button>
                  </form>";
        echo "</li>";
    }
    echo "</ul>";
}


// Cerca libro
function searchBook($cerca)
{
    $results = [];
    foreach ($_SESSION['libri'] as $libro) {
        if (stripos($libro->titolo, $cerca) !== false || stripos($libro->autore, $cerca) !== false) {
            $results[] = $libro;
        }
    }
    return $results;
}

// Cancella libro
function deleteBook($visualizza)
{
    if (isset($_SESSION['libri'][$visualizza])) {
        unset($_SESSION['libri'][$visualizza]);
        $_SESSION['libri'] = array_values($_SESSION['libri']); // riordina gli indici
    }
}
