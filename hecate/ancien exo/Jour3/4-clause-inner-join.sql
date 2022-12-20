/* La liste des employés (nom, prénom et fonction) 
et des bureaux (adresse et ville) dans lequel ils travaillent */
SELECT `lastName`, `firstName`, `jobTitle`, `offices`.`addressLine1`, `offices`.`city`, `offices`.`country`
FROM `employees` 
/* JOIN `offices` USING (`officeCode`) */
JOIN `offices` ON `employees`.`officeCode` = `offices`.`officeCode`
/* RESULTAT ==> 23 lignes / Diane Murphy */



/* La liste des clients français ou américains (nom du client, nom, 
prénom du contact et pays) et de leur commercial dédié (nom et prénom) 
triés par nom et prénom du contact */

SELECT `customerName`,`contactLastName`,`contactFirstName`,`country`, lastName, firstName
FROM customers
JOIN employees ON customers.salesRepEmployeeNumber = employees.employeeNumber
WHERE country = 'USA' OR country = 'France'
ORDER BY contactLastName, contactFirstName

/* RESULTAT ==> 48 lignes / Miguel Barajas */



/* La liste des lignes de commande (numéro de commande, code,
 nom et ligne de produit) et la remise appliquée aux voitures ou motos 
 commandées triées par numéro de commande puis par remise décroissante */

SELECT `orderNumber`, `products`.`productCode`, `productName`, `productLine`, ROUND(`products`.`MSRP` - `priceEach`, 2) AS `remise`
FROM `orderdetails`
JOIN `products` ON `orderdetails`.`productCode` = `products`.`productCode`
WHERE  `productLine` = 'Motorcycles' 
OR `productLine` = 'Classic Cars' 
OR `productLine` = 'Vintage Cars'
ORDER BY `orderNumber`, `remise` DESC;


/* RESULTAT ==> 2026 lignes / 34 */
