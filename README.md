# Welcome to BUKUPEDIA V.1.0.0

Database = MySql

## membuat database

`CREATE DATABASE IF NOT EXISTS e_library;`

## membuat Table Buku

`CREATE TABLE IF NOT EXISTS tb_buku ( id_buku INT NOT NULL AUTO_INCREMENT, judul_buku VARCHAR(64) NOT NULL, kategori VARCHAR(64) NOT NULL, pengarang VARCHAR(64) NOT NULL, penerbit VARCHAR(64) NULL, PRIMARY KEY (id_buku) );`
