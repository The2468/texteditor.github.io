1) Design any database with at least 3 entities and establish proper relationships between them. Draw suitable ER/EER diagrams for the system. Apply DCL and DDL commands. 
Consider the schema of WORLD database. 

a) Create a SQL statement to display columns Id, Name, Population from the city table and limit results to first 10 rows only.  

Select Id,name,Population from city limit 10; 
 
 
b) Create a SQL statement to display columns Id, Name, Population from the city table and limit results to rows 31-40 

Select Id,Name, Population from city limit 30,10; 
 
 
c) Create a SQL statement to find only those cities from city table whose population is larger than 2000000. 

Select Name, population from city where population >2000000 

 
d) Select the Districts with population above the average population of all the districts in the table.

Select district from city where population > (select avg(population) from city); 

 
e) What is the country code for Kabul 

SELECT * from city WHERE Name = ‘Kabul’ 

 
f) Find out what the population and average life expectancy for people in Argentina. 
 (ARG) is (37032000, 75.10000) 

SELECT population, AVG(lifeExpectancy) FROM country WHERE CODE='arg'; 
 
                       
g) -- Using IS NOTNULL,ORDER BY,LIMIT,what country has the highest life expectancy?  
(Andorra, 83.5) 

SELECT * FROM country; 
SELECT NAME,lifeExpectancy FROM country ORDER BY lifeExpectancy DESC LIMIT 1 ; 





2) Use of order by functions and LIKE. 
a) -- Select 25 cities around the world that start with the letter 'F' in a single SQL query. 

SELECT NAME FROM city WHERE NAME LIKE 'f%' ORDER BY NAME ASC LIMIT 25; 
 

 
b) Show the countries which have a name that includes the word 'United' 
 
SELECT name FROM world WHERE name LIKE '%United%' 
 
 
c) -- Some countries have populations more than three times that of any of their neighbors (in the same continent). Give the countries and continents. 
 
SELECT name, continent FROM country x WHERE 
 population > ALL 
 (SELECT population*3 FROM country y 
 WHERE y.continent = x.continent 
 AND y.name != x.name) 
 
 
d) -- Which countries are not too small and not too big? BETWEEN allows range checking 
(range specified is inclusive of boundary values). The example below shows countries 
with an area of 250,000-300,000 sq. km. Modify it to show the country and the area for 
countries with an area between 200,000 and 250,000. 


SELECT name, SurfaceArea 
FROM country 
WHERE SurfaceArea BETWEEN 200000 AND 250000 
 
 
e) -- Show the name - but substitute Australasia for Oceania - for countries beginning with N.

SELECT name, CASE WHEN continent='Oceania' THEN 'Australasia' 
   ELSE continent END 
   FROM country 
   WHERE name LIKE 'N%' 
 
f) Find the largest country (by area) in each continent, show the continent, the name and the area:

SELECT continent, name, surfacearea  
FROM country x 
 WHERE surfacearea >= ALL 
 (SELECT surfacearea FROM country y 
 WHERE y.continent=x.continent 
          AND surfacearea > 0 );


g)List each continent and the name of the country that comes first alphabetically 

SELECT continent,name FROM country x 
 WHERE x.name <= ALL ( 
 SELECT name FROM country y 
 WHERE x.continent=y.continent); 
 
h) Find the continents where all countries have a population <= 25000000. Then find the names of the countries associated with these continents. Show name, continent and population. 

SELECT name,continent,population FROM country x 
 WHERE 25000000 >= ALL ( 
 SELECT population FROM country y 
 WHERE x.continent=y.continent 
 AND y.population>0);





3)Use of Join, Write Sql code to join tables and retrieve the combined information from tables. 
 
 a) -- Using LEFT JOIN, ON, what is the capital of Spain (ESP)? (Madrid) 
 
SELECT city.name  
FROM city, country 
WHERE country.code=city.countryCode 
AND country.capital=city.ID 
AND country.code='ITA'; 
 
SELECT city.name, country.name 
FROM country 
LEFT JOIN city 
ON country.capital=city.ID 
AND country.code=city.countryCode 
WHERE country.code='ESP'; 
 
b) -- Using LEFT JOIN, ON, list all the languages spoken in the 'Southeast Asia' region (65) 
    
SELECT LANGUAGE,region 
FROM countrylanguage 
LEFT JOIN country 
ON countrylanguage.CountryCode=country.code 
WHERE country.region='Southeast Asia';


4)Execute the Aggregate functions count, sum, avg, min, max on a suitable database. Make 
use of built in functions according to the need of the database chosen . 
 
a) -- Using count, get the number of cities in the USA (274) 
 
SELECT COUNT(*) FROM city, country 
WHERE country.code=city.countryCode 
AND country.name='United States'; 
 

b) Get count of coutrycode where countrycode > 100 
 
select count(countrycode),countrycode from city 
group by countrycode 
having count(countrycode)>100; 
 
 
 
c) Find total districts in each country. 
 
SELECT countrycode, country,COUNT(*) AS District 
FROM city 
GROUP BY countrycode; 
 
 
5) Retrieve the data from the database based on time and date functions like now(), date(), 
day(), time() etc., Use of group by and having clauses use Sakila data base. 
 
a) Explore NOW,CURRDATE,CURRTIME  
SELECT NOW(); 
SELECT CURDATE(); 
SELECT CURTIME(); 

 
b) Actor with most films (ignoring ties)  from sakila database  
SELECT first_name, last_name, count(*) films 
FROM actor AS a 
JOIN film_actor AS fa USING (actor_id) 
GROUP BY actor_id, first_name, last_name 
ORDER BY films DESC 
LIMIT 1; 
 
c) Cumulative revenue of all stores 
SELECT payment_date, amount, sum(amount) OVER (ORDER BY payment_date) 
FROM (SELECT CAST(payment_date AS DATE) AS payment_date, SUM(amount)  
AS amount FROM payment 
GROUP BY CAST(payment_date AS DATE)) p 
ORDER BY payment_date;



extra)
1)Retrieve all events happening today. 
SELECT * FROM events WHERE event_date = CURDATE(); 
 
2. Retrieve events happening this month. 
SELECT * FROM events 
WHERE MONTH(event_date) = MONTH(CURDATE()) 
AND YEAR(event_date) = YEAR(CURDATE()); 
 
3. Count the number of events happening each day in the next month. 
SELECT event_date, COUNT(*) AS event_count FROM events 
WHERE event_date BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 1 MONTH) 
GROUP BY event_date; 
 
4. List events happening on weekends. 
SELECT * FROM events 
WHERE DAYOFWEEK(event_date) IN (1, 7); 
 
5. Retrieve the total number of events for each month where the total number of events is greater than 2. 
SELECT MONTH(event_date) AS month, COUNT(*) AS event_count 
FROM events 
GROUP BY MONTH(event_date) 
HAVING COUNT(*) > 2; 
 
6. Print current date, time, day. 
select now(); 
select date(now()); 
select day(now());


Exp 6:  Write and execute database trigger. Consider row level and statement level triggers. 
use dsu; 
CREATE TABLE test1(a1 INT); 
CREATE TABLE test2(a2 INT); 
 
delimiter | 
 
CREATE TRIGGER testref1 BEFORE INSERT ON test1 
  FOR EACH ROW 
  BEGIN 
    INSERT INTO test2 SET a2 = NEW.a1; 
  END; 
| 
 
delimiter ; 
  
INSERT INTO test1 values (10000);

Exp 7: Write and execute program to perform operations on MongoDb Database. 
 
a) Show databases
[26-05-2024 11:31 PM] Nooruddin Kazi DSU: b) Use databasename 
c) insertone() 
d) insertmany() 
e) Findone() 
f) Findmany()
Exp 8: Write and execute program to perform CRUD operations. 
 
Create record, read record, update record and delete the record 
 
a) Create operation 
insertOne({ 
            fName: 'RAM', 
            lName: 'AYODHYA', 
            email: 'ram@gmail.com', 
            hobbies: ['Photography', 'Travelling'] 
        }); 
 
insertMany([{ 
            fName: 'Adi', 
            lName: 'Yogi', 
            email: 'yogi@gmail.com', 
            hobbies: ['Drawing', 'Music'] 
        }, { 
            fName: 'Modi', 
            lName: 'PM', 
            email: 'modi@gmail.com', 
            hobbies: ['Drawing', 'Classical Dance'] }]);
b) Read opearation 
 collection.find()
