# MyImmo
 meine Symfony-App
 
 Ich gehe davon aus, dass Sie Symfony Anwendung laufen können.

Um die Seite sehen zu können,
-gehen Sie erst im Ordner
-da bearbeiten Sie die Datei .env.local , um den Zugriff auf Ihrem Server zu geben
-dann müssen Sie im Ordner die Datenbank(DB) erstellen mit dem Befehl:
	php bin/console doctrine:database:create
Mit diesem Befehl wird die DB 'immo_dev' erstellt, wenn Sie den Name nicht geändert haben.
-Nach erforlgreicher Erstellung der DB müssen Sie das Entity bzw die Tabelle 'Property' in die DB hochladen.
Das erreichern Sie nur mit folgendem Befehl:
	- php bin/console doctrine:migrations:migrate (denn ich habe schon make:migration ausgeführt und die migration-version ist noch im Ordner enthalten)
Wenn alles gut geklappt hat, können Sie Ihrem Server aktualiesern, um die Tabelle 'Property' zu sehen.

Nun wollen wir die DB mit zufälligen Werten füllen und dafür habe ich Faker eingebunden.
Jetzt können Sie zufällige Werten generieren und sie werden dann unmittelbar vor Ende der Funktion load() in die DB hochgeladen:
	php bin/console doctrine:fixtures:load
Mit diesem Befehl wird die methode load() aus AppFixtures.php(src/DataFixtures) aufgeruft.
Die methode enthält eine for-Schleife und speichert dann 50 'Property' in der DB.

Sie können auch ihrem Server aktualisieren um die Werte zu sehen.

Wenn Sie alle Schritte gefolgt haben, können Sie Jetzt die Webseiten laufen lassen: php -S 127.0.0.1:8000 -t public

Property:
	title
	description
	image
	price
	surface
	floor
	rooms
	badrooms
	city
	plz
	street
	hnr
