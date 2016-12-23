/* 2012036901 윤진한 */

/* Ex1 */
use imdb_small;

select r.role from roles r join movies m on r.movie_id = m.id where m.name = 'Pi';

select a.first_name,a.last_name from actors a join roles r on a.id = r.actor_id join movies m on m.id = r.movie_id where m.name = 'Pi';

select a2.first_name,a2.last_name from (select a.first_name,a.last_name,a.id from actors a join roles r on a.id = r.actor_id join movies m on m.id = r.movie_id where m.name = 'Kill Bill: Vol. 1') a2 join roles r2 on a2.id = r2.actor_id join movies m2 on r2.movie_id = m2.id where m2.name = 'Kill Bill: Vol. 2';

select count(*) number_of_movies,a.first_name,a.last_name from actors a join roles r on a.id = r.actor_id group by a.id order by count(*) desc limit 7;

select count(*) number_of_genre,genre from movies_genres mg group by genre order by count(*) desc limit 3;

select count(*) number_of_Thriller_films,dd.first_name,dd.last_name from (select d.id from directors d join movies_directors md on d.id = md.director_id join movies_genres mg on md.movie_id = mg.movie_id where mg.genre = 'Thriller') d2 join directors dd on dd.id = d2.id group by dd.id order by count(*) desc limit 1;

/* Ex2 */
use simpsons;

select g.grade from grades g join courses c on g.course_id = c.id where c.name = 'Computer Science 143';

select s.name,g.grade from students s join grades g on s.id = g.student_id join courses c on c.id = g.course_id where c.name = 'Computer Science 143' and g.grade <= 'B-';

select s.name student_name,c.name course_name,g.grade from students s join grades g on s.id = g.student_id join courses c on c.id = g.course_id and g.grade <= 'B-';

select count(*) number_of_students,c.name from courses c join grades g on c.id = g.course_id join students s on s.id = g.student_id group by c.id having count(*) >= 2;
