SELECT
    orderNumber, 
    customerName, 
    orderDate, 
    status
FROM orders
INNER JOIN customers
ON customers.customerNumber = orders.customerNumber
WHERE customerName LIKE '%Euro%'
ORDER BY orderDate DESC;