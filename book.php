<?php
class Book {
    public $titolo;
    public $autore;
    public $anno;
    public $prezzo;
    public $pagine;

    public function __construct($titolo, $autore, $anno, $prezzo, $pagine) {
        $this->titolo = $titolo;
        $this->autore = $autore;
        $this->anno = $anno;
        $this->prezzo = $prezzo;
        $this->pagine = $pagine;
    }

    public function __toString() {
        return "{$this->titolo} di {$this->autore} - {$this->anno} - {$this->prezzo} € - {$this->pagine} pagine";
    }
}
?>
