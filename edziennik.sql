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
     przedmiot INTEGER  NOT NULL , 
     klasa INTEGER  NOT NULL , 
     semestr INTEGER  NOT NULL , 
     temat VARCHAR (50) , 
     dataLekcji TIMESTAMP (0) , 
     nauczyciel INTEGER  NOT NULL ,
     
    )
    ;


--plan lekcji
CREATE TABLE planLekcji 
    ( 
     id SERIAL PRIMARY KEY , 
     semestr INTEGER  NOT NULL , 
     klasa INTEGER  NOT NULL , 
     nauczyciel INTEGER  NOT NULL , 
     przedmiot INTEGER  NOT NULL , 
     czasStart DATE , 
     czasStop DATE , 
     dzienTygodnia INTEGER , 
     godzinaLekcyjna INTEGER , 
     grupaNr INTEGER , 
     obowiazkowa CHAR (1) 
    ) 
;


-- oceny
CREATE TABLE oceny 
    ( 
     id SERIAL PRIMARY KEY , 
     pupil INTEGER  NOT NULL , 
     ocena INTEGER  NOT NULL ,
     waga FLOAT  NOT NULL default 1 , 
     nauczyciel INTEGER  NOT NULL , 
     temat INTEGER  NOT NULL , 
     semestr INTEGER  NOT NULL , 
     dataOceny DATE , 
     info VARCHAR (200) 
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
     lekcja INTEGER  NOT NULL , 
     info VARCHAR (200) 
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
     Imie VARCHAR (20) , 
     nazwisko VARCHAR (40) , 
     login VARCHAR (20) , 
     haslo VARCHAR (12) , 
     email VARCHAR (60) , 
     telefon VARCHAR (28) , 
     idKlasy INTEGER , 
     nrPupil INTEGER , 
     pesel INTEGER , 
     dataUrodzin DATE , 
     miejsceUrodzin DATE , 
     ojciec INTEGER , 
     matka INTEGER , 
     ulica VARCHAR (60) , 
     nrDomu VARCHAR (8) , 
     kodPocztowy VARCHAR (6) , 
     panstwo VARCHAR (20) , 
     info VARCHAR (200) 
    ) 
;



