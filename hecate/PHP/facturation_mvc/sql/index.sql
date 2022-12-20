SELECT orderNumber, orderDate,status,customers.customerName
FROM orders
INNER JOIN customers
ON customers.customerNumber = orders.customerNumber

/* Exercice 1 */
SELECT * FROM `products` ORDER BY `buyPrice` DESC, `productVendor` DESC 

/* Exercice 2 */
SELECT COUNT(`quantityInStock`), `productLine` FROM `products` GROUP BY `productLine`

/* Exercice 3 */
SELECT SUM(`quantityInStock`),SUM(`msrp`),`productLine` 
FROM `products`
WHERE `msrp` > 100
GROUP BY `productLine`

/* Exercice 4  */
SELECT `productVendor`, MAX(`quantityInStock`)
FROM `products`
GROUP BY `productVendor`

 
/* Requette 1 */
 SELECT customers.`customerNumber`, `customerName`, `addressLine1`,`addressLine2`,`city`,`state` 
FROM `customers` 
inner JOIN orders 
on customers.customerNumber=orders.customerNumber 
where orders.orderNumber="10424"

/* Requette 2 */
SELECT productName, classicmodels.orderdetails.quantityOrdered, classicmodels.orderdetails.orderNumber,(classicmodels.products.MSRP * classicmodels.orderdetails.quantityOrdered) as Total
FROM products 
INNER JOIN orderdetails 
ON classicmodels.orderdetails.productCode = classicmodels.products.productCode
WHERE classicmodels.orderdetails.orderNumber = 10424