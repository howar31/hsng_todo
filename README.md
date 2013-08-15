# HSNG Todo List 2013

## Intro

This is a project for CCU HSNG Lab newcomers to practice with basic HTML/CSS/PHP/MySQL by designing a todo list with basic login/logout member system and list entities maneuver.

## Requirements and Features

This demo includes the following features:

* Member System
	* Register new member
	* Modify member information
	* Custom display name (username)
	* Individual per-user todo list
* Todo list
	* Create new entry
	* Edit entry
	* Delete entry

## Installation

1. Clone this repository.
1. Create a database for import.
1. Import the sql file: `mysql -u [mysql-user] -p -h [mysql-host] [database-name] < hsngtodo2013.sql`
	* [mysql-user] is your MySQL username.
	* [mysql-host] is your MySQL address.  Default is localhost if the MySQL is right on local.
	* [database-name] is the database name for import.
	* This sql file only contain structure without any data.
1. Edit the cofingration file (config.php)
	* $db_host="localhost";
	* $db_name="hsngtodo2013";	//database name
	* $db_user="hsng";		//database login username
	* $db_pass="hsng";		//database login password
