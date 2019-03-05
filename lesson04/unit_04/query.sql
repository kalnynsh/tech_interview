-- 4. Так выбрать страны, чтобы они не повторялись по 2 и более раз.

USE d_customers;

SELECT
	DISTINCT country
FROM
	customers ;

-- country
-- Germany
-- Mexico
-- UK
-- Sweden
