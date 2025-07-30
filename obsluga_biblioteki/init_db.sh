#!/bin/bash

# Ustawienia
DB_USER="administrator_biblioteki"
DB_NAME="biblioteka"
SQL1="./sql/1_create_db_and_user.sql"
SQL2="./sql/2_create_tables.sql"
SQL3="./sql/3_insert_into_tables.sql"

# Krok 1: Uruchomienie jako postgres – tworzenie użytkownika i bazy
echo "Tworzenie użytkownika i bazy danych..."
sudo -u postgres psql -f "$SQL1"

# Krok 2: Uruchomienie kolejnych plików jako administrator_biblioteki
echo "Tworzenie tabel..."
PGPASSWORD='test' psql -U "$DB_USER" -d "$DB_NAME" -f "$SQL2"

echo "Dodawanie danych testowych..."
PGPASSWORD='test' psql -U "$DB_USER" -d "$DB_NAME" -f "$SQL3"

echo "✅ Gotowe! Baza '$DB_NAME' z użytkownikiem '$DB_USER' została w pełni zainicjalizowana."

