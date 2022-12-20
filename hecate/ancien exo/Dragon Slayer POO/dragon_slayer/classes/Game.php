<?php

require_once 'Angel.php';
require_once 'Warrior.php';
require_once 'Wizard.php';
require_once 'Dragon.php';

class Game
{

    private $_name;
    private $_type;
    private $_difficulty;
    public $tabMessage;
    public $tabImage;

    public function __construct($name, $type, $difficulty)
    {
        $this->_name = $name;
        $this->_type = $type;
        $this->_difficulty = $difficulty;
    }

    public function startGame()
    {

        $this->tabMessage[] = 'Le jeu est en mode ' . $this->_difficulty;

        $player = null;

        //choix du type de joueur
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

        //instanciation de dragon
        $dragon = new Dragon();

        $this->tabMessage[] = $dragon->presentation();

        //boucle qui continue tant que un des deux joueur n'est pas mort
        while ($player->getPv() > 0 && $dragon->getPv() > 0) {

            //mettre en place un aleatoire pour choisir celui qui attaque
            $whoAttack = rand(0, 1);

            //attaque
            if ($whoAttack == 0) {
                //le joueur attaque
                $this->tabMessage[] = $player->attack($dragon);
            } else {
                //Le dragon attaque
                $this->tabMessage[] = $dragon->attack($player);
            }
        }

        $this->tabMessage[] = 'Le combat est terminé, le vainqueur est déclaré.';


        //afficher le vainqueur
        if ($player->getPv() <= 0) {
            //le joueur est mort, affichage du dragon
            $this->tabImage[] = 'bone-dragon';
        } else {
            //le dragon est mort, affichage du joueur

            //creation d'un tableau de correspondance (nom select <> nom image)
            $tab = [
                'ange' => 'angel',
                'magicien' => 'wizard',
                'guerrier' => 'warrior'
            ];

            $this->tabImage[] = $tab[$this->_type];
        }
    }
}
