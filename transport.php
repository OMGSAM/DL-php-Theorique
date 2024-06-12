<?php

// 1. Classe abstraite Transport
abstract class Transport {
    protected $idtrans;
    protected $vitesse;
    protected $capacite;
    
    // Constructeur paramétré
    public function __construct($idtrans,$vitesse, $capacite) {
        $this->idtrans = $idtrans;
        $this->vitesse = $vitesse;
        $this->capacite = $capacite;

    }

    // 2. Méthode info pour afficher les informations du transport
    public function info() {
        echo "Places: " . $this->idtrans . "<br>";
        echo "SPEED: " . $this->vitesse . "<br>";
        echo "Capacité: " . $this->capacite . "<br>";

    }

    // 3. Méthode montant qui retourne le montant si tous les places sont occupés
    abstract public function montant();
}

// 4. Classe Autocar avec attributs (marque, prix) et constructeur les initialise
class Autocar extends Transport {
    private $marque;
    private $prix;

    public function __construct($places, $capacite, $marque, $prix) {
        parent::__construct($places, $capacite);
        $this->marque = $marque;
        $this->prix = $prix;
    }

    // 5. Implémenter méthode montant qui retourne le prix si tous les tickets sont vendus
    public function montant() {
        if ($this->places == $this->capacite) {
            return $this->prix * $this->capacite;
        } else {
            return 0;
        }
    }

    // 6. Redéfinir méthode info qui affiche les infos de l'autocar
    public function info() {
        parent::info();
        echo "Marque: " . $this->marque . "<br>";
        echo "Prix par ticket: " . $this->prix . "<br>";
    }
}

 
$autocar = new Autocar(50, 50, "Mercedes", 20);  

$autocar->info();
echo "Montant total si tous les tickets sont vendus: " . $autocar->montant() . " EUR<br>";

?>
