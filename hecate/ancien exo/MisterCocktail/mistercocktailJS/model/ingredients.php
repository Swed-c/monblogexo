<?php
require_once 'model/database.php';

/**
 * Renvoie la liste de tous les ingrédients
 *
 * @return array Tableau à deux dimensions contenant tous les ingrédients
 */
function getAllIngredients(): array {
    $database = databaseConnect();

    $SQL = 'SELECT * FROM `ingredients`';

    $query = $database->prepare($SQL);

    $query->execute();

    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

/**
 * Renvoie tous les ingrédients d'un cocktail
 *
 * @param integer $id Id du coktail
 * @return array Tableau à deux dimensions contenant tous les ingrédients
 */
function getIngredientsByCocktailId(int $id): array{
    $database = databaseConnect();

    $SQL = 'SELECT name
            FROM `cocktails_ingredients` 
            JOIN `ingredients` ON `cocktails_ingredients`.`id_ingredient` = `ingredients`.`id`
            WHERE `id_cocktail` = :id;';

    $query = $database->prepare($SQL);

    $query->execute([':id' => $id]);

    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

/**
 * Ajoute un ingrédient dans la BDD
 *
 * @param string $name Nom de l'ingrédient
 * @return boolean true si tout s'est bien passé
 */
function addIngredient(string $name): bool {

    $database = databaseConnect();

    $SQL = "INSERT INTO `ingredients` 
                        (`id`, `name`) 
                 VALUES (null, :name)";

    $query = $database->prepare($SQL);

    $query->execute([
        ':name'         => $name
    ]);

    $id = $database->lastInsertId();

    return $id;
}

/**
 * Ajoute dan,s la table cocktails_ingredients une nouvelle relation entre un cocktail et un ingrédient
 *
 * @param integer $id_cocktail Id du cocktail
 * @param integer $id_ingredient Id de l'ingrédient
 * @return boolean true si tout s'est bien passé
 */
function addRelationCocktailToIngredient(int $id_cocktail, int $id_ingredient): bool{

    return false;
}