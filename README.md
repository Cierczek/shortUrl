# ShortUrl TEST

## Installation

###Install composer

1. Download project
2. Go to project dir `cd /dirName/`.
3. Run `composer install`.
4. When composer ask for `Token (hidden):` press Enter
5. When composer ask: `Set Folder Permissions ? (Default to Y) [Y,n]?` Put  `Y`


### Configure Database
1. Go to  `config/` directory and open `app.php` file .
2. In file `app.php` on line `255` configure you database username, password, and database name.  

### Create Database Schema

1. Go to `/config/` dir `cd config/`.
2. Run migrations scripts `../bin/cake migrations migrate`
3. When scripts finish you can saw 2 tables in your database phinxlog and short_url table.

### Start Server
1. Go to proyect root dir `cd ..`
2. You can now either use your machine's webserver. `bin/cake server`
3. If you need specify port to run server you can use -p `bin/cake server -p 8765`