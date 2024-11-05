# Teste Tecnotech PHP

This project is a PHP application that tracks the annuity payments of members in the "Devs do RN" association. It's built based on a MVC architechture and is implemented in pure PHP, without frameworks.

## Requirements

- PHP ^7.2.5 || ^8.0
- Composer
- MySQL

## Installation

1. Clone the repository:

```sh
git clone https://github.com/leon-siqueira/teste-tecnotech-php.git
cd teste-tecnotech-php
```

2. Install dependencies:

```sh
composer install
```

3. Install MySQL:
   Follow the instructions for your operating system to install MySQL. Ensure that the MySQL server is running.

4. Set up the `.env` file:
   Copy the `.env.example` file to `.env` and update the necessary environment variables, such as database connection details:

```sh
cp .env.example .env
```

Open the `.env` file in a text editor and configure the following settings:

```
DB_HOST=<your_db_hostname>
DB_USER=<your_db_username>
DB_PASS=<your_db_password>
```

5. Run the SQL scripts from the `meu_database.sql` file to create the schema and seed it with data by running the `seeder.sql` SQL script

```sh
mysql -u <your_db_username> -p<your_db_password> < meu_database.sql; mysql -u <your_db_username> -p<your_db_password> < seeder.sql
```

## Usage

To run the application, use the following command:

```sh
php -S localhost:8000 -t public
```

Then open your browser and navigate to `http://localhost:8000`.

## Authors

- Leon Siqueira - [leon.siqueir4@gmail.com](mailto:leon.siqueir4@gmail.com)
