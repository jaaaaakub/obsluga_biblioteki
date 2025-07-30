-- Tworzenie użytkownika z uprawnieniami superużytkownika
CREATE ROLE administrator_biblioteki WITH
    LOGIN
    SUPERUSER
    PASSWORD 'test';

-- Tworzenie bazy danych i nadanie właściciela
CREATE DATABASE biblioteka
    WITH OWNER = administrator_biblioteki
    ENCODING = 'UTF8'
    TEMPLATE = template0;
