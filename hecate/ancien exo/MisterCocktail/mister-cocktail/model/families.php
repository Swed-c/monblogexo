<?php
require_once 'model/database.php';

/**
 * Renvoie toutes les familles de cocktails présentent en BDD
 *
 * @return array Tableau à 2 dimensions contenant les familles (id, name)
 */
function getAllFamilies(): array
{
    $database = databaseConnect();

    $SQL = 'SELECT * FROM `families`';

    $query = $database->prepare($SQL);

    $query->execute();

    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}


function getFamilyById(int $id): array
{
    $database = databaseConnect();

    $SQL = 'SELECT `id_family`, `name`
    FROM `cocktails`
    WHERE id = :id';

    $query = $database->prepare($SQL);

    // Execute la requête SQL
    $query->execute([
        ':id' => $id
    ]);

    // Récupère le résultat de la requête SQL
    $familyById = $query->fetch();

    return $familyById;
}
