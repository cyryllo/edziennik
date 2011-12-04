--polecenia dla bazy danych postgreSQL
--baza danych dla programu Dziennik internetowy  nazwa bazy edziennik
--użytkownik w postgres:  dziennik




--tworzenie klas
CREATE TABLE klasy 
    ( 
     id SERIAL PRIMARY KEY , 
     poziom INTEGER , 
     znak VARCHAR (5) , 
     opis VARCHAR (60) , 
     wychowawca INTEGER  NOT NULL , 
     startSemestr INTEGER  NOT NULL ,
     FOREIGN KEY (wychowawca) REFERENCES uzytkownik (id) ON DELETE CASCADE ON UPDATE CASCADE
    ) 
;



--tabela dyplomów
CREATE TABLE dyplomy 
    ( 
     id SERIAL  PRIMARY KEY , 
     pupil INTEGER  NOT NULL , 
     semestr_id INTEGER  NOT NULL , 
     przedmiot_id INTEGER  NOT NULL , 
     ocenaDyplomu INTEGER  NOT NULL ,
     FOREIGN KEY (pupil) REFERENCES uzytkownik (id) ON DELETE CASCADE ON UPDATE CASCADE ,
     FOREIGN KEY (semestr_id) REFERENCES semestr (id) ON DELETE CASCADE ON UPDATE CASCADE ,
     FOREIGN KEY (przedmiot_id) REFERENCES przedmiot (id) ON DELETE CASCADE ON UPDATE CASCADE
     
    ) 
;


--grupy
CREATE TABLE grupy 
    ( 
     id SERIAL  PRIMARY KEY , 
     pupil INTEGER  NOT NULL , 
     semestr_id INTEGER  NOT NULL , 
     grupa INTEGER , 
     info VARCHAR (200) ,
     FOREIGN KEY (pupil) REFERENCES uzytkownik (id) ON DELETE CASCADE ON UPDATE CASCADE ,
     FOREIGN KEY (semestr_id) REFERENCES semestr (id) ON DELETE CASCADE ON UPDATE CASCADE ,
    ) 
;


--obecnosci
CREATE TABLE obecnosci 
    ( 
     id SERIAL  PRIMARY KEY , 
     pupil INTEGER  NOT NULL , 
     lekcja_id INTEGER  NOT NULL , 
     rodzajObecnosci VARCHAR (2),
     FOREIGN KEY (pupil) REFERENCES uzytkownik (id) ON DELETE CASCADE ON UPDATE CASCADE ,
     FOREIGN KEY (lekcja_id) REFERENCES lekcje (id) ON DELETE CASCADE ON UPDATE CASCADE 
     
    ) 
;

--usprawiedliwienia
CREATE TABLE usprawiedliwienie 
    ( 
     obecnosci_id INTEGER  , 
     uzytkownik_id INTEGER  NOT NULL , 
     tresc VARCHAR (200) ,
     FOREIGN KEY (obecnosci_id) REFERENCES obecnosci (id) ON DELETE CASCADE ON UPDATE CASCADE ,
     FOREIGN KEY (uzytkownik_id) REFERENCES uzytkownik (id) ON DELETE CASCADE ON UPDATE CASCADE
    ) 
;

--tabela lekscji
CREATE TABLE lekcje 
    ( 
     id SERIAL  PRIMARY KEY , 
     przedmiot_id INTEGER  NOT NULL , 
     klasa_id INTEGER  NOT NULL , 
     semestr_id INTEGER  NOT NULL , 
     temat VARCHAR (50) , 
     dataLekcji TIMESTAMP (0) , 
     nauczyciel_id INTEGER  NOT NULL ,
     FOREIGN KEY (przedmiot_id) REFERENCES przedmiot (id) ON DELETE CASCADE ON UPDATE CASCADE ,
     FOREIGN KEY (klasa_id) REFERENCES klasy (id) ON DELETE CASCADE ON UPDATE CASCADE ,
     FOREIGN KEY (semestr_id) REFERENCES semestr (id) ON DELETE CASCADE ON UPDATE CASCADE ,
     FOREIGN KEY (nauczyciel_id) REFERENCES uzytkownik (id) ON DELETE CASCADE ON UPDATE CASCADE
    )
    ;


--plan lekcji
CREATE TABLE planLekcji 
    ( 
     id SERIAL PRIMARY KEY , 
     semestr_id INTEGER  NOT NULL , 
     klasa_id INTEGER  NOT NULL , 
     nauczyciel_id INTEGER  NOT NULL , 
     przedmiot_id INTEGER  NOT NULL , 
     czasStart DATE , 
     czasStop DATE , 
     dzienTygodnia INTEGER , 
     godzinaLekcyjna INTEGER , 
     grupa_id INTEGER , 
     obowiazkowa boolean NOT NULL DEFAULT TRUE ,
     FOREIGN KEY (semestr_id) REFERENCES semestr (id) ON DELETE CASCADE ON UPDATE CASCADE ,
     FOREIGN KEY (klasa_id) REFERENCES klasy (id) ON DELETE CASCADE ON UPDATE CASCADE ,
     FOREIGN KEY (nauczyciel_id) REFERENCES uzytkownik (id) ON DELETE CASCADE ON UPDATE CASCADE ,
     FOREIGN KEY (przedmiot_id) REFERENCES przedmiot (id) ON DELETE CASCADE ON UPDATE CASCADE ,
     FOREIGN KEY (grupa_id) REFERENCES grupy (id) ON DELETE CASCADE ON UPDATE CASCADE
         
    ) 
;


-- oceny
CREATE TABLE oceny 
    ( 
     id SERIAL PRIMARY KEY , 
     pupil INTEGER  NOT NULL , 
     ocena_id INTEGER  NOT NULL ,
     waga FLOAT  NOT NULL DEFAULT 1 , 
     nauczyciel_id INTEGER  NOT NULL , 
     przedmiot_id INTEGER  NOT NULL , 
     semestr_id INTEGER  NOT NULL , 
     dataOceny DATE , 
     info VARCHAR (200) ,
     FOREIGN KEY (pupil) REFERENCES uzytkownik (id) ON DELETE CASCADE ON UPDATE CASCADE ,
     FOREIGN KEY (ocena_id) REFERENCES tablicaOcen (id) ON DELETE CASCADE ON UPDATE CASCADE ,
     FOREIGN KEY (nauczyciel_id) REFERENCES uzytkownik (id) ON DELETE CASCADE ON UPDATE CASCADE ,
     FOREIGN KEY (przedmiot_id) REFERENCES przedmiot (id) ON DELETE CASCADE ON UPDATE CASCADE ,
     FOREIGN KEY (semestr_id) REFERENCES semestr (id) ON DELETE CASCADE ON UPDATE CASCADE 
    ) 
;


--tablica ocen
CREATE TABLE tablicaOcen 
    ( 
     id SERIAL PRIMARY KEY , 
     nazwa VARCHAR (20) , 
     wartosc FLOAT 
    ) 
;


--uwagi do lekcji
CREATE TABLE uwagi 
    ( 
     id SERIAL PRIMARY KEY , 
     pupil INTEGER  NOT NULL , 
     lekcja_id INTEGER  NOT NULL , 
     info VARCHAR (200) ,
     FOREIGN KEY (pupil) REFERENCES uzytkownik (id) ON DELETE CASCADE ON UPDATE CASCADE ,
     FOREIGN KEY (lekcja_id) REFERENCES lekcje (id) ON DELETE CASCADE ON UPDATE CASCADE ,
    ) 
;


-- semestry
CREATE TABLE semestr 
    ( 
     id SERIAL PRIMARY KEY , 
     rok VARCHAR (9) , 
     polowa VARCHAR (10) 
    ) 
;


--przedmiot
CREATE TABLE przedmiot 
    ( 
     id SERIAL PRIMARY KEY , 
     nazwa VARCHAR (50) 
    ) 
;


-- tabela użytkowników
CREATE TABLE uzytkownik 
    ( 
     id SERIAL PRIMARY KEY , 
     rodzaj CHAR (6) , 
     imie VARCHAR (20) , 
     nazwisko VARCHAR (40) , 
     login VARCHAR (20) , 
     haslo VARCHAR (12) , 
     email VARCHAR (60) , 
     telefon VARCHAR (28) , 
     klasa_id INTEGER ,  
     pesel INTEGER , 
     dataUrodzin DATE , 
     miejsceUrodzin DATE , 
     ojciec INTEGER , 
     matka INTEGER , 
     ulica VARCHAR (60) , 
     nrDomu VARCHAR (8) , 
     kodPocztowy VARCHAR (6) , 
     panstwo VARCHAR (20) , 
     info VARCHAR (200) ,
     FOREIGN KEY (klasa_id) REFERENCES klasy (id) ON DELETE CASCADE ON UPDATE CASCADE ,
     FOREIGN KEY (ojciec) REFERENCES uzytkownik (id) ON DELETE CASCADE ON UPDATE CASCADE ,
     FOREIGN KEY (matka) REFERENCES uzytkownik (id) ON DELETE CASCADE ON UPDATE CASCADE ,
    ) 
;



