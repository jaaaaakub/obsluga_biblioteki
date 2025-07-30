-- Połączenie z bazą biblioteka powinno już być aktywne

-- Tworzenie tabeli czytelnicy
CREATE TABLE czytelnicy (
    id_czytelnika SERIAL PRIMARY KEY,
    imię VARCHAR(50) NOT NULL,
    nazwisko VARCHAR(50) NOT NULL,
    data_urodzenia DATE NOT NULL
);

-- Tworzenie tabeli książki (z tytułem!)
CREATE TABLE książki (
    id_książki SERIAL PRIMARY KEY,
    tytuł VARCHAR(150) NOT NULL,
    autor VARCHAR(100) NOT NULL,
    data_wydania DATE NOT NULL
);

-- Tworzenie tabeli wypożyczenia
CREATE TABLE wypożyczenia (
    id_wypożyczenia SERIAL PRIMARY KEY,
    id_czytelnika INTEGER NOT NULL REFERENCES czytelnicy(id_czytelnika) ON DELETE CASCADE,
    id_książki INTEGER NOT NULL REFERENCES książki(id_książki) ON DELETE CASCADE,
    data_wypożyczenia DATE NOT NULL,
    termin_oddania DATE NOT NULL
);

