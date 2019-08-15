Maxserv Opdracht van Thomas Verhoeven
2019-08-15

Installatie: 
Database instellingen zijn te vinden in /.env en /app/Maxserv_opdracht/DBConnection.php. DBConnection is de voor de opdracht aangemaakte class die gebruikt wordt voor zelfgeschreven code. Het .env bestand bevat database instellingen voor Laravel's eigen verbinding (hoofdzakelijk authenticatie)
	Standaard instellingen zijn:
		DB_HOST=127.0.0.1
		DB_PORT=3306
		DB_DATABASE=maxserv_opdracht
		DB_USERNAME=root
		DB_PASSWORD=
		
Database 'maxserv_opdracht' moet aangemaakt zijn
Command line vanuit root folder: 
	composer install
	php artisan migrate:refresh --seed
Dit werkt lokaal, maar mocht dit niet werken dan is kun je 'maxserv_opdracht.sql' importeren voor tabellen, sample data, trigger en foreign key.

Inloggen:
	Bob: 
		Username = test@test.nl
		Password = password123
	Lisa
		Username = email@email.nl
		Password = wachtwoord123
		
De mappen/bestanden die zijn aangepast:

app/Http/Controllers/
app/Maxserv_opdracht
database/migrations
database/seeds
public
resources/views
routes/web.php
maxserv_opdracht.sql
.env
