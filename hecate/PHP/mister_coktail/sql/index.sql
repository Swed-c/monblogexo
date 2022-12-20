SELECT cocktails.`name`,`description`,`image`,`families`.`name`,`active`,cocktails.id FROM `cocktails`
INNER JOIN `families`
ON `cocktails`.`id_family`=`families`.`id`;