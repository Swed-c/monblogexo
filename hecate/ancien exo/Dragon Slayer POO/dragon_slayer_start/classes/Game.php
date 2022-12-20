<?php
require_once 'Player.php';
require_once 'Angel.php';
require_once 'Warrior.php';
require_once 'Wizard.php';

require_once 'Dragon.php';
require_once 'Monster.php';

/* $warrior = new Warrior($name);
$wizard = new Wizard($name); */

/* $dragon = new Dragon(); */

class Game
{
    private $_type;
    private $_name;
    private $_difficulty;
    public $tabMessage;
    public $tabImg;

    public function __construct($name, $type, $difficulty)
    {

        $this->_type = $type;
        $angel = new Angel($name);

        var_dump($angel);
    }

    public function startGame()
    {
        $player = null;

        // Choix type de joueur
        switch ($this->_type) {
            case 'ange':
                $player = new Angel($this->_name);
                break;
            case 'guerrier':
                $player = new Warrior($this->_name);
                break;
            case 'magicien':
                $player = new Wizard($this->_name);
                break;
        }
        $this->tabMessage[] = $player->presentation();

        // instanciation du monstre
        $dragon = new Dragon();
        $this->tabMessage[] = $dragon->presentation();

        // boucle tant qu'un des deux joueurs n'est pas mort
        while ($player->getPv() > 0 && $dragon->getPv() > 0) {

            // choix aleatoire de celui qui attaque
            $whoAttack = rand(0, 1);

            // attaque
            if ($whoAttack == 0) {
                // le joueur attaque
                $this->tabMessage[] = $player->attack($dragon);
            } else {
                // Le dragon attaque
                $this->tabMessage[] = $dragon->attack($player);
            }
        }
        $this->tabMessage[] = "Le combat est terminé, le vainqueur est déclaré...";

        // afficher le vainqueur

        if ($player->getPv() <= 0) {
            $this->tabImg[] = 'bone-dragon';
        } else {
            $tab = [
                'ange' => 'angel',
                'magicien' => 'wizard',
                'guerrier' => 'warrior'
            ];

            $this->tabImg[] = $tab[$this->_type];
        }
    }
}
