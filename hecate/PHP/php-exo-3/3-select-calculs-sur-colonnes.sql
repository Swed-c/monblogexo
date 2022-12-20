/* La liste des motos (nom, vendeur, quantité et marge) triés par marge décroissante */
SELECT `productName`, `productVendor`, `quantityInStock`, ROUND(`MSRP` - `buyPrice`, 2) AS `marge`
FROM `products` 
WHERE `productLine` = 'motorcycles'
ORDER BY `marge` DESC;
/* RESULTAT ==> 13 lignes / 2003 Harley-Davidson Eagle Drag Bike */



/* La liste des commandes (numéro, date de commande, date d'expédition, écart en jours entre les deux dates et statut) qui sont en cours de traitement, ou (qui ont été expédiées et ont un écart de plus de 10j) triés par écart décroissant puis par date de commande */
SELECT `orderNumber`, `orderDate`, `shippedDate`, `status`, DATEDIFF(`shippedDate`, `orderDate`) as `ecart`
FROM `orders`  
HAVING `status` = 'In Process' OR `status` = 'Shipped' AND  `ecart` > 10
ORDER BY `ecart` DESC, `orderDate`;
/* RESULTAT ==> 7  lignes / commande 10165 */



/*La liste des produits (nom et valeur du stock à la vente) des années 1960 */
SELECT *, ROUND(`quantityInStock` * `MSRP`, 2) AS `valeurStock`
FROM `products`
WHERE `productName` LIKE '196%';
/* RESULTAT ==> 16 lignes / 1969 Harley Davidson Ultimate Chopper */
