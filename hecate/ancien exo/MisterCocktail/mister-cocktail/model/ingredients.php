<?php

/**
 * Renvoie tous les ingrédiernts d'un cocktail
 *
 * @param integer $id du cocktail
 * @return void tableau a deux dim contenant tous les ingredients
 */
function getIngredientsByCocktailId(int $id): array
{

    $database = databaseConnect();

    $SQL = 'SELECT `name`
    FROM `cocktails_ingredients` 
    JOIN `ingredients` ON `cocktails_ingredients`.`id_ingredient` = `ingredients`.`id_ingredient` 
    WHERE `id_cocktail` = :id;';

    $query = $database->prepare($SQL);

    $query->execute([
        ':id' => $id
    ]);

    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}
