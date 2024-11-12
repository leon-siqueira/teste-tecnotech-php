CREATE DATABASE IF NOT EXISTS db_teste_leon;

USE db_teste_leon;

CREATE TABLE members (
  cpf VARCHAR(11) PRIMARY KEY,
  name  VARCHAR(100) NOT NULL,
  email VARCHAR(100) UNIQUE NOT NULL,
  filiation_date DATE NOT NULL DEFAULT (CURRENT_DATE),
  CONSTRAINT cpf_format CHECK (cpf REGEXP '^[0-9]{11}$')
);

CREATE TABLE annuities (
  year INT NOT NULL PRIMARY KEY,
  value DECIMAL(10,2) NOT NULL
);

CREATE TABLE checkouts (
  id SERIAL PRIMARY KEY,
  is_paid BOOLEAN NOT NULL DEFAULT FALSE,
  annuity_year INT NOT NULL,
  member_cpf VARCHAR(11) NOT NULL,
  FOREIGN KEY (annuity_year) REFERENCES annuities(year) ON DELETE CASCADE,
  FOREIGN KEY (member_cpf) REFERENCES members(cpf) ON DELETE CASCADE
);
