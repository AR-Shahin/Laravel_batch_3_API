SELECT DISTINCT name FROM `students`
SELECT * FROM `students` WHERE city = 'pabna' OR id = 2

SELECT * FROM `students` WHERE NOT city = 'pabna'

SELECT * FROM `students` ORDER BY id DESC
UPDATE students SET name = 'tanzim' WHERE name ='Shahin' and id = 5

DELETE FROM students WHERE name = 'tanzim'
SELECT MIN(department_id) as min_value FROM students

SELECT MAX(department_id) as max_value FROM students
SELECT AVG(department_id) as avg_value FROM students
SELECT COUNT(id) FROM students
SELECT * FROM `students` WHERE date IS NULL
SELECT * FROM `students` WHERE date IS NOT NULL
SELECT * FROM `students` WHERE name LIKE 'A%'

SELECT students.name,students.city, departments.name,departments.id FROM students INNER JOIN departments ON students.department_id = departments.id
SELECT students.name,students.city, departments.name,departments.id FROM departments LEFT JOIN students ON students.department_id = departments.id
SELECT students.name,students.city, departments.name,departments.id FROM students RIGHT JOIN departments ON students.department_id = departments.id
