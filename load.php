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
