call search("m");

DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `search`(
	IN query Varchar(100)
)

BEGIN
	SELECT c.* FROM companies as c join company_product as cp on c.id = cp.company_id 
	join products as p on p.id = cp.product_id join company_processing as cpr on cpr.company_id = c.id 
	join processing as pro on pro.id=cpr.processing_id 
	where p.name LIKE CONCAT('%',query,'%') or pro.main_process LIKE CONCAT('%',query,'%') or c.name LIKE CONCAT('%',query,'%')
	or c.main_machine_equipment LIKE CONCAT('%',query,'%') GROUP BY c.id;
END $$