UPDATE mdl_quiz SET 
PASSWORD = 'bbbbbbbbb'
WHERE 
course IN (
	SELECT
	c.id
	FROM mdl_course AS c
	WHERE
   c.category = 1
);