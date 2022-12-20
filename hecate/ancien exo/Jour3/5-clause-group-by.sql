/* Le prix moyen d'un produit vendu par chaque fournisseur triés par prix moyen décroissant */
SELECT `productVendor`, ROUNd(AVG(`buyPrice`),2) AS `moyenne`
FROM `products`
GROUP BY  `productVendor`
ORDER BY `moyenne` DESC;
/* RESULTAT ==> 13 lignes / Welly Diecast Productions / 113.9325 */



/* Le nombre de produits pour chaque ligne de produit */
SELECT `productLine`, COUNT(*) 
FROM `products`
GROUP BY `productLine`;
/* RESULTAT ==> 7 lignes / Classic Cars / 38 */



/* Le total du stock et le total de la valeur du stock 
à la vente de chaque ligne de produit 
pour les produits vendus plus de 100$ 
trié par total de la valeur du stock à la vente */
SELECT `productLine`, SUM(`quantityInStock`) AS `quantity`, SUM((`quantityInStock`*`MSRP`)) AS `valeurStock`
FROM `products`
WHERE `MSRP` > 100
GROUP BY `productLine`
ORDER BY `valeurStock`;
/* RESULTAT ==> 7 lignes / Ships / 429177.74 */



/* La quantité du produit le plus en stock de chaque vendeur 
trié par vendeur */
SELECT `productVendor`, MAX(`quantityInStock`)
FROM `products`
GROUP BY `productVendor`
ORDER BY  `productVendor`;
/* RESULTAT ==> 13 lignes / Autoart Studio Design / 9354 */



/* Le prix de l'avion qui coûte le moins cher à l'achat */
SELECT MIN(`buyPrice`) AS 'minPrice'
FROM `products`
WHERE `productLine` = 'planes';
/* RESULTAT ==> 1 ligne / 29.34$ */



/* Le crédit des clients qui ont payé plus de 20000$ durant l'année 2004 
trié par crédit décroissant */
SELECT `customerNumber`, `customerName`, ROUND(SUM(`amount`)) as `total`
FROM `payments`
JOIN `customers` USING(`customerNumber`)
WHERE `paymentDate` LIKE '2004%'
GROUP BY `customerNumber`, `customerName`
HAVING `total` > 20000
ORDER BY `total` DESC;
/* RESULTAT ==> 69 lignes / 141 / 293 765.51 */