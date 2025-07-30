-- Dodanie przykładowych czytelników
INSERT INTO czytelnicy (imię, nazwisko, data_urodzenia) VALUES
('Anna', 'Nowak', '1990-05-15'),
('Jan', 'Kowalski', '1985-12-03'),
('Maria', 'Wiśniewska', '2000-03-22'),
('Piotr', 'Wójcik', '1992-08-10'),
('Katarzyna', 'Kamińska', '1995-01-05'),
('Tomasz', 'Lewandowski', '1988-06-30'),
('Agnieszka', 'Zielińska', '1993-11-11'),
('Michał', 'Szymański', '1991-07-07'),
('Joanna', 'Woźniak', '1997-09-25'),
('Paweł', 'Dąbrowski', '1989-04-12');

-- Dodanie przykładowych książek z tytułami
INSERT INTO książki (tytuł, autor, data_wydania) VALUES
('Pan Tadeusz', 'Adam Mickiewicz', '1834-01-01'),
('Quo Vadis', 'Henryk Sienkiewicz', '1896-01-01'),
('Chmury', 'Wisława Szymborska', '1996-03-15'),
('Solaris', 'Stanisław Lem', '1961-10-01'),
('Bieguni', 'Olga Tokarczuk', '2007-09-30'),
('Lalka', 'Bolesław Prus', '1890-02-14'),
('Nad Niemnem', 'Eliza Orzeszkowa', '1888-05-22'),
('Kordian', 'Juliusz Słowacki', '1834-11-17'),
('Granica', 'Zofia Nałkowska', '1935-03-12'),
('Cesarz', 'Ryszard Kapuściński', '1978-06-06');

-- Dodanie przykładowych wypożyczeń
INSERT INTO wypożyczenia (id_czytelnika, id_książki, data_wypożyczenia, termin_oddania) VALUES
(1, 2, '2025-07-01', '2025-07-21'),
(2, 3, '2025-07-02', '2025-07-22'),
(3, 1, '2025-07-03', '2025-07-23'),
(4, 5, '2025-07-04', '2025-07-24'),
(5, 4, '2025-07-05', '2025-07-25'),
(6, 6, '2025-07-06', '2025-07-26'),
(7, 7, '2025-07-07', '2025-07-27'),
(8, 8, '2025-07-08', '2025-07-28'),
(9, 9, '2025-07-09', '2025-07-29'),
(10, 10, '2025-07-10', '2025-07-30');

