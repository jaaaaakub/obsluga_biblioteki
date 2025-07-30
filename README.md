# Biblioteczny System Zarządzania (PHP + PostgreSQL)

Prosty system webowy do zarządzania wypożyczeniami książek w bibliotece. Projekt oparty na PHP i PostgreSQL umożliwia przeglądanie książek, czytelników oraz wypożyczeń.

## Funkcje

- Dodawanie i przeglądanie książek  
- Obsługa czytelników  
- Zarządzanie wypożyczeniami  
- Prosty interfejs webowy

## Prezentacja

🎥 [Zobacz demo na YouTube](https://www.youtube.com/watch?v=OKbz3RPp_AI)

## Wymagania

- System operacyjny: **Linux (preferowany: Ubuntu 24.04 lub nowszy)**
- PHP 7.x lub wyższy
- PostgreSQL
- Apache2
- git

## Instalacja

1. **Zainstaluj wymagane oprogramowanie:**

   - **PostgreSQL:**  
     Oficjalna dokumentacja: [https://www.postgresql.org/download/](https://www.postgresql.org/download/)  
     Na Ubuntu:
     ```bash
     sudo apt update
     sudo apt install postgresql postgresql-contrib
     ```

     Po instalacji:

     - Zmień hasło użytkownika `postgres`:
       ```bash
       sudo -u postgres psql template1
       ALTER USER postgres with encrypted password 'twoje_hasło';
       \q
       ```

     - Skonfiguruj dostęp z poziomu aplikacji webowej:

       Edytuj plik `pg_hba.conf`:
       ```bash
       sudo nano /etc/postgresql/*/main/pg_hba.conf
       ```

       Zamień metodę uwierzytelniania z `peer` na `scram-sha-256`:
       ```
       # Database administrative login by Unix domain socket
       local   all             postgres                                scram-sha-256

       # TYPE  DATABASE        USER            ADDRESS                 METHOD

       # "local" is for Unix domain socket connections only
       local   all             all                                     scram-sha-256

       ```

       Edytuj plik `postgresql.conf`:
       ```bash
       sudo nano /etc/postgresql/*/main/postgresql.conf
       ```

       Odkomentuj i ustaw:
       ```
       listen_addresses = '*'
       ```

       Następnie zrestartuj serwer:
       ```bash
       sudo systemctl restart postgresql
       ```

   - **Apache2:**  
     Dokumentacja: [https://httpd.apache.org/docs/](https://httpd.apache.org/docs/)  
     Na Ubuntu:
     ```bash
     sudo apt install apache2
     ```

   - **PHP i moduły PostgreSQL:**
     ```bash
     sudo apt install php libapache2-mod-php php-pgsql
     ```

   - **Git:**  
     Dokumentacja: [https://github.com/git-guides/install-git](https://github.com/git-guides/install-git)  
     Na Ubuntu:
     ```bash
     sudo apt install git-all
     ```

2. **Wybierz miejsce dla projektu:**

   Możesz sklonować repozytorium do dowolnego katalogu użytkownika:
   ```bash
   cd /home/<user>/
   git clone https://github.com/jaaaaakub/obsluga_biblioteki.git
   cd obsluga_biblioteki/
   ```

3. **Utwórz bazę danych i użytkownika:**
   Można to zrobić automatycznie:
   ```bash
   chmod +x init_db.sh
   ./init_db.sh
   ```

4. **Skonfiguruj serwer Apache2:**

   Skopiuj pliki do katalogu domyślnego Apache2:
   ```bash
   sudo cp -r /home/<user>/obsluga_biblioteki/html/* /var/www/html/
   ```
   Następnie usuń domyślny plik index.html:
   ```bash
   sudo rm /var/www/html/index.html
   ```

   Potem zrestartuj Apache:
   ```bash
   sudo systemctl restart apache2
   ```

5. **Gotowe!**
   Otwórz przeglądarkę i przejdź do:
   ```
   http://localhost/
   ```

## Struktura projektu

```
test/
├── init_db.sh                     # Skrypt inicjalizujązy bazę danych "biblioteka"
├── sql/
│   ├── 1_create_db_and_user.sql   # Tworzy bazę danych i użytkownika
│   ├── 2_create_tables.sql        # Tworzy tabele
│   └── 3_insert_into_tables.sql   # Wypełnia tabele przykładowymi danymi
├── html/
│   ├── books.php                  # Obsługa książek
│   ├── functions.php              # Funkcje pomocnicze
│   ├── index.php                  # Strona główna
│   ├── menu.php                   # Pasek nawigacji
│   ├── readers.php                # Obsługa użytkowników
│   ├── rentals.php                # Obsługa wypożyczeń
│   └── style.css                  # Styl CSS
```
