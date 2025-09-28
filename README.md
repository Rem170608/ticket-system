## About

This project uses [Feathers](http://feathersjs.com). An open source web framework for building modern real-time applications.

This is a rework of the Vibecoded Ticket system for ÜK 187, by Leon and Raffael.

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
## Important !!
The Database is currently on a **VM** the name is **noserq** the Database is reachable with **MySQL** on the **VM**

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
- **Bessere Kategorie Auswahl
    - Frage
    - Problem
    - Korrektur**
- **First ticket delete** 
- **Ticket clear after 4h**
- (Code verbessern)
