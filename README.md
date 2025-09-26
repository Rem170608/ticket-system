## About

This project uses [Feathers](http://feathersjs.com). An open source web framework for building modern real-time applications.

This is a rework of the Vibecoded Ticket system for ÜK 187, by Leon and Raffael

## Getting Started

Getting up and running is as easy as 1, 2, 3.

1. Make sure you have [NodeJS](https://nodejs.org/) and [npm](https://www.npmjs.com/) installed.
2. Install your dependencies

    ```
    cd path/to/tema-backend
    npm install
    ```

3. Start your app

    ```
    npm start
    ```

## Files
- **Admin.php:** ist die Verwaltungsseite wo man Tickets löschen und Verwalten kann
- **Submit.php:** Logik des Tickets, damit dieses auch korrekt anzeigt welche Nummer und ist verbunden mit dem admin.php und dem live.php
- **Index.php:** dort sollte jeder ein Ticket erstellen können 
- **Live.php:** dort werden alle Tickets angezeigt ( für die Tafel) damit jeder Bescheid weiss wer als nächstes dran kommt ( aktualisiert Live alle 3 Sekunden im Hintergrund)
- **API.php:** ist für generelle Logik für die Live Anzeige und die Verbindung dazu 
- **Delete.php:** ist die Logik für das löschen der Tickets im admin.php damit diese Einträge auch in der Datenbank gelöscht werden 
- **Success.php:** ist für für das Speichern des Tickets und der Anzeige des Tickets welches erstellt wurde da 

## Testing

Simply run `npm test` and all your tests in the `test/` directory will be run.

## Scaffolding

Feathers has a powerful command line interface. Here are a few things it can do:

```
$ npm install -g @feathersjs/cli          # Install Feathers CLI

$ feathers generate service               # Generate a new Service
$ feathers generate hook                  # Generate a new Hook
$ feathers help                           # Show all commands
```
## Noch wichtig !!
Die Datenbank ist derzeit auf der vm und wird für die Daten Verarbeitung gebraucht 
Name der DB ist **noserq** welche über **MySQL** auf der vm erreichbar ist

## Help

For more information on all the things you can do with Feathers visit [docs.feathersjs.com](http://docs.feathersjs.com).


# To Do
- Unötige Sachen im code entfernen
- Unötige Tabellen entfernen
    - seat
    - ticket_number
    - created_at oder Zeit
- "Reihe" zu "Kategorie" umändern
    - Bei allen Files
    - In der Datenbank
- **Passwörter von der Datenbank verschlüsselt im Code abspeichern**
- **Bessere Kategorie Auswahl**
    - Frage
    - Problem
    - Korrektur
- **First ticket delete** 
- **Ticket clear after 4h**
- (Code verbessern)
