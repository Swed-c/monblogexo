// SQL

// MAMP > WebStart > Tools > PHPMyAdmin
// Interface graphique pour gérer son serveur de bases de données

// Dans le fichier SQL
// create database >> indique que l'on crée une base de données
// create table >> crée la structure de la base de données
// insert into >> ajout dans la structure préalablement créée des données

// Dans PHPMyAdmin, on importe le fichier sql
// Pas besoin de changer les options d'import

// La base de données apparaît dans le bandeau de navigation à gauche dans l'Interface
// Il est possible alors d'accéder aux différentes tables crées dans la base de données

// Le lien entre les tables se fait en fonction des informations qui y figurent
// Une information présente dans une cellule d'une table peut être la clé pour obtenir des informations complémentaires qui lui sont liées dans une autre table
// Le fait de disposer de plusieurs tables avec des liens entre elles permet d'éviter les redondances et donc de surcharger la base de données
// Cela permet aussi d'éviter de devoir répercuter une correction / un ajustement à différents endroits

// Il est possible d'obtenir une vision complète de la base de données
// Avec un visuel sur toutes les structures de tables et les liens entre elles

// Situation courante (90%) : n:1 >> n éléments peuvent appartenir à 1 même utilisateur
// Situation rare : 1:n >> 1 film peut avoir n catégories
// Situation complexe (10%) : n:n >> 1 utilisateur peut être rattaché à n salons, et 1 salon peut avoir n utilisateurs (nécessite souvent une table de correspondance intermédiaire pour faire le lien)

// Les requêtes SQL sont ce qui permet de naviguer entre et dans les tables de la base de données
// Il est possible de les éditer dans l'interface
// Bonne pratique : même s'il s'agit d'une seule requête SQL, il est préférable de mettre une instruction par ligne
// SELECT * FROM `users` >> sélectionne tout dans la table `users` >> affiche l'intégralité de la table 'users'
// SELECT `city`, `country` FROM `offices` >> sélectionne uniquement les informations 'city' et 'country' dans la table 'offices'
// ORDER BY `country` >> classe/trie l'information suivant l'information `country`
// WHERE >> filtre l'information suivant le critère fourni (attention, l'ordre des instructions est important, WHERE doit toujours être positionné avant un ORDER BY)
// LIKE permet de sélectionner un élément se rapprochant, avec le caractère % qui précise la partie de la variable qui peut varier
// AND / OR sont utilisables dans les conditions pour indiquer les ET et les OU
// Le nom des tables et des colonnes est entre `` et non pas '' (mais reste optionnel)
// Le ; n'est pas obligatoire à la fin de la requête SQL, sauf si on cumule plusieurs requêtes SQL d'affilée
// L'ordre des instructions a son importance, car le process d'exécution de SQL est le suivant : SELECT > WHERE > CALCULS > HAVING > ORDER BY
// Le HAVING est équivalent au WHERE, mais leur positionnement dans le process SQL n'est pas le même (WHERE ne peut bénéficier des calculs réalisés, HAVING le peut)
// Pour des calculs sur les dates, il faut obligatoirement utiliser les fonctions associées, et non pas des calculs directs comme la soustraction, sinon on aura des erreurs
// JOIN `table2` ON `table1`.`id` =  `table2`.`id` permet de créer une jointure entre la table1 et la table2 sur la base de la clé commune (il est possible de cumuler les jointures)
// INNER JOIN n'inclut que l'intersection parfaite entre les tables (celle qui comporte la correspondance)
// OUTER JOIN ne prend que les lignes sans correspondances entre les tables et remplace les informations manquantes par null
// LEFT JOIN prend toutes les informations à gauche et complète si les informations à droite sont manquantes, mais il ne fait pas l'inverse
// RIGHT JOIN prend toutes les informations à droite et complète si les informations à gauche sont manquantes, mais il ne fait pas l'inverse
// GROUP BY permet de regrouper plusieurs lignes en une seule lorsque ces dernières partagent la même référence (il est alors possible de l'associer à une fonction de calcul pour une colonne qui fera la moyenne, la somme, le compte etc. des données qui y figurent)

// Ces requêtes SQL seront ensuite intégrées dans notre PHP une fois testées dans l'interface
