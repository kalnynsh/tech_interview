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

-- Вариант 2, через UNION - выбираются уникальные значения
SELECT
	country
FROM
	customers
UNION
SELECT
	country
FROM
	customers ;

-- Вариант 3, через GROUP BY
SELECT
	country
FROM
	customers
GROUP BY
	country ;
