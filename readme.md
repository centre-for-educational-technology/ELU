# IDP application

## Requirements

* PHP 7.0 and higher

* SSH enabled on server

* Composer
  
* Supports databases
  * MySQL
  * Postgres
  * SQLite
  * SQL Server
  (Tested on MySQL 5.5)
  
## Installation 

### 1. Install dependencies

Run `composer install` command in the root folder of the project.

### 2. Edit the configuration file

`.env.example`  and change name to `.env`

### 3. Import the database scheme

Run `artisan migrate` to create database tables

### 4. Make sure `.htaccess` file in `public` directory and server config files are configured correctly

## Post-installation procedures

Register a new user.