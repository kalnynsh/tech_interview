-- 1. Как получить в виде результата все поля из таблицы title (my_table)?
USE d_employees;

SELECT *
    FROM titles ;

-- 1	1	Software Engineer I	2005-10-02	3000-01-01
-- 2	2	Software Engineer I	2008-09-03	3000-01-01
-- 3	3	Clinical Specialist	2008-01-03	3000-01-01

-- 2. Как получить в виде результата только поля first_name, last_name, salary из таблицы employees?

SELECT
	e.first_name,
	e.last_name,
	s.salary
FROM
	employees e
LEFT JOIN salaries s ON
	e.id = s.employee_id
WHERE s.salary > 0
GROUP BY
	e.last_name
ORDER BY
	s.salary ASC ;

-- Morena	Penniell	3100
-- Fawnia	Alliband	3100
-- Gearalt	Kersley	    4100
-- Rodd	    Fabry	    4100

-- 3. Задать таблице employees (my_table) псевдоним e и вывести всех, у кого salary выше 3800.
SELECT
	e.first_name,
	e.last_name,
	s.salary
FROM
	employees e
LEFT JOIN salaries s ON
	e.id = s.employee_id
WHERE s.salary > 3800
GROUP BY
	e.last_name
ORDER BY
    s.salary ASC ;

-- Gearalt	Kersley	    4100
-- Rodd	    Fabry	    4100
-- Kary	    D'Alessio	4800
