<?php

/**
 * Vérifie si l'utilisateur existe bien en Base de donnée et enregistre son uid en session si c'est le cas
 *
 * @param string $email Email de l'utilisateur
 * @param string $password Mot de passe de l'utilisateur
 * @return integer Si les infos de connection sont correctes, l'uid de l'utilisateur, sinon 0
 */
function user_connect(string $email, string $password): int
{

    // CHARGEMENT DATABASE
    $database = connect();

    // ÉCRITURE DU SQL POUR TROUVER LE MOT DE PASSE ET L'UID DE L'UTILISATEUR PAR SON EMAIL
    $SQL = 'SELECT * 
            FROM users 
            WHERE email = :email';

    // DEMANDER À LA DATABASE DE PRÉPARER LA REQUÊTE SQL
    $query = $database->prepare($SQL);

    // EXÉCUTER LA REQUÊTE (AVEC EMAIL EN PARAMÊTRE)
    $success = $query->execute([':email' => $email]);

    // SI $success N'EST PAS VRAI ALORS
    if (!$success) {
        // RENVOYER 0
        return 0;
        // FIN SI
    }
    // RÉCUPÉRER LE RÉSULTAT SOUS FORME DE TABLEAU ASSOCIATIF
    $result = $query->fetch(PDO::FETCH_ASSOC);

    // SI LE MOT DE PASSE REÇU EN ARGUMENT DE LA FONCTION ET CELUI DANS LA BASE DE DONNÉES NE CORRESPONDENT PAS ALORS
    if (!$result || $password != $result['password']) {
        // RENVOYER 0 (ON A PAS LE BON MOT DE PASSE)
        return 0;
        // FIN SI
    }
    // ENREGISTRER L'uid (TROUVÉ DANS LA BDD) VERS LA SESSION
    $_SESSION['uid'] = $result['uid'];
    // RENVOYER L'uid 
    return $result['uid'];
}

/**
 * Déconnecte l'utilisateur (vide la session)
 *
 * @return void Rien
 */
function user_disconnect()
{

    // PURGER TOUTES LES DONNÉES DE LA SESSION
    session_unset();
}

/**
 * Vérifie si l'utilisateur est connecté
 *
 * @return boolean true si l'utilisateur est connecté
 */
function user_isConnected(): bool
{
    // RENVOYER TRUE SI $_SESSION['uid'] EST DÉFINI
    return isset($_SESSION['uid']);
}
/**
 * Cherche un utilisateur dans la BDD par son uid et le renvoie
 *
 * @param integer $uid uid de l'utilisateur
 * @return array toutes les datas de l'utilisateur
 */
function user_getUserById(int $uid): array
{
    // CHARGER $database
    $database = connect();
    // ÉCRIRE LE SQL (CHAINE DE CARACTÈRE)
    $SQL = 'SELECT * FROM users WHERE uid = :uid';
    // DEMANDER À LA DATABASE DE PRÉPARER LA REQUÊTE SQL
    $success = $database->prepare($SQL);

    // ÉXÉCUTER LA REQUÊTE (AVEC UID EN PARAMÈTRE)
    $success->execute([':uid' => $uid]);
    // SI ÉCHEC DE LA REQUÊTE ALORS

    if (!$success) {
        // RENVOYER UN TABLEAU VIDE
        return [];
        // FIN SI
    }
    // DEMANDER LE RESULTAT (UN SEUL) EN TABLEAU ASSOCIATIF
    $result = $success->fetch(PDO::FETCH_ASSOC);
    // SI LE RESULTAT EST FALSE (UTILISATEUR PAS TROUVÉ) ALORS
    if (!$result) {
        // RENVOYER UN TABLEAU VIDE
        return [];
        // FIN SI
    }
    // DÉTRUIRE LE MOT DE PASSE DANS LE RESULTAT (ON ENVOIE JAMAIS UN MOT DE PASSE SE PROMENER DIEU SAIT OÙ DANS LE CODE)
    /* unset($result ['password']) */
    // RENVOYER LE RESULTAT (C.À.D. L'UTILISATEUR ET TOUTES CES DATAS)
    return $result;
}
