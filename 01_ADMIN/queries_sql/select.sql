SELECT
c.id,
c.fullname,
c.shortname,
q.`password`
FROM mdl_course AS c
INNER JOIN mdl_quiz AS q ON (q.course = c.id)
WHERE
c.category = 1;