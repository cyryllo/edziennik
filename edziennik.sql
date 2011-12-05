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
     wychowawca INTEGER , 
     startSemestr INTEGER
    ) 
;



--tabela dyplomów
CREATE TABLE dyplomy 
    ( 
     id SERIAL  PRIMARY KEY , 
     pupil INTEGER  NOT NULL , 
     semestr_id INTEGER  NOT NULL , 
     przedmiot_id INTEGER  NOT NULL , 
     ocenaDyplomu INTEGER  NOT NULL 
    ) 
;


--grupy
CREATE TABLE grupy 
    ( 
     id SERIAL  PRIMARY KEY , 
     pupil INTEGER  NOT NULL , 
     semestr_id INTEGER  NOT NULL , 
     grupa INTEGER , 
     info VARCHAR (200)
    )
;


--obecnosci
CREATE TABLE obecnosci 
    ( 
     id SERIAL  PRIMARY KEY , 
     pupil INTEGER  NOT NULL , 
     lekcja_id INTEGER  NOT NULL , 
     rodzajObecnosci VARCHAR (2)     
    ) 
;

--usprawiedliwienia
CREATE TABLE usprawiedliwienie 
    ( 
     obecnosci_id INTEGER  , 
     uzytkownik_id INTEGER  NOT NULL , 
     tresc VARCHAR (200)
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
     nauczyciel_id INTEGER  NOT NULL
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
     obowiazkowa BOOLEAN NOT NULL DEFAULT TRUE        
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
     lekcja_id INTEGER  NOT NULL , 
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
     imie VARCHAR (20) , 
     nazwisko VARCHAR (40) , 
     login VARCHAR (20) NOT NULL, 
     haslo TEXT NOT NULL, 
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
     aktywny BOOLEAN NOT NULL DEFAULT TRUE
    ) 
;


ALTER TABLE klasy ADD CONSTRAINT wychowawcaklasy_fk FOREIGN KEY (wychowawca) REFERENCES uzytkownik (id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE dyplomy ADD CONSTRAINT pupildyplom_fk FOREIGN KEY (pupil) REFERENCES uzytkownik (id) ON DELETE CASCADE ON UPDATE CASCADE ,
     ADD CONSTRAINT semestrdyplom_fk FOREIGN KEY (semestr_id) REFERENCES semestr (id) ON DELETE CASCADE ON UPDATE CASCADE ,
     ADD CONSTRAINT przedmiotdyplom_fk FOREIGN KEY (przedmiot_id) REFERENCES przedmiot (id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE grupy ADD CONSTRAINT pupilgrupy_fk FOREIGN KEY (pupil) REFERENCES uzytkownik (id) ON DELETE CASCADE ON UPDATE CASCADE ,
     ADD CONSTRAINT semestrgrupy_fk FOREIGN KEY (semestr_id) REFERENCES semestr (id) ON DELETE CASCADE ON UPDATE CASCADE;
     
ALTER TABLE obecnosci ADD CONSTRAINT pupilobecnosci_fk FOREIGN KEY (pupil) REFERENCES uzytkownik (id) ON DELETE CASCADE ON UPDATE CASCADE ,
     ADD CONSTRAINT lekcjaobecnosci_fk FOREIGN KEY (lekcja_id) REFERENCES lekcje (id) ON DELETE CASCADE ON UPDATE CASCADE;
     
     
ALTER TABLE usprawiedliwienie ADD CONSTRAINT obecnoscusprawiedliwienie_fk FOREIGN KEY (obecnosci_id) REFERENCES obecnosci (id) ON DELETE CASCADE ON UPDATE CASCADE ,
     ADD CONSTRAINT uzytkownikusprawiedliwienie_fk FOREIGN KEY (uzytkownik_id) REFERENCES uzytkownik (id) ON DELETE CASCADE ON UPDATE CASCADE;
     
ALTER TABLE lekcje ADD CONSTRAINT przedmiotlekcje_fk FOREIGN KEY (przedmiot_id) REFERENCES przedmiot (id) ON DELETE CASCADE ON UPDATE CASCADE ,
     ADD CONSTRAINT klasalekcje_fk  FOREIGN KEY (klasa_id) REFERENCES klasy (id) ON DELETE CASCADE ON UPDATE CASCADE ,
     ADD CONSTRAINT semestrlekcje_fk  FOREIGN KEY (semestr_id) REFERENCES semestr (id) ON DELETE CASCADE ON UPDATE CASCADE ,
     ADD CONSTRAINT uzytkowniklekcje_fk  FOREIGN KEY (nauczyciel_id) REFERENCES uzytkownik (id) ON DELETE CASCADE ON UPDATE CASCADE;
     
ALTER TABLE planLekcji ADD CONSTRAINT semestrplanlekcji_fk FOREIGN KEY (semestr_id) REFERENCES semestr (id) ON DELETE CASCADE ON UPDATE CASCADE ,
     ADD CONSTRAINT klasaplanlekcji_fk FOREIGN KEY (klasa_id) REFERENCES klasy (id) ON DELETE CASCADE ON UPDATE CASCADE ,
     ADD CONSTRAINT nauczycielplanlekcji_fk FOREIGN KEY (nauczyciel_id) REFERENCES uzytkownik (id) ON DELETE CASCADE ON UPDATE CASCADE ,
     ADD CONSTRAINT przedmiotplanlekcji_fk FOREIGN KEY (przedmiot_id) REFERENCES przedmiot (id) ON DELETE CASCADE ON UPDATE CASCADE ,
     ADD CONSTRAINT grupyplanlekcji_fk FOREIGN KEY (grupa_id) REFERENCES grupy (id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE oceny ADD CONSTRAINT pupiloceny_fk FOREIGN KEY (pupil) REFERENCES uzytkownik (id) ON DELETE CASCADE ON UPDATE CASCADE ,
     ADD CONSTRAINT ocenaoceny_fk FOREIGN KEY (ocena_id) REFERENCES tablicaOcen (id) ON DELETE CASCADE ON UPDATE CASCADE ,
     ADD CONSTRAINT nauczycieloceny_fk FOREIGN KEY (nauczyciel_id) REFERENCES uzytkownik (id) ON DELETE CASCADE ON UPDATE CASCADE ,
     ADD CONSTRAINT przedmiotoceny_fk FOREIGN KEY (przedmiot_id) REFERENCES przedmiot (id) ON DELETE CASCADE ON UPDATE CASCADE ,
     ADD CONSTRAINT semestroceny_fk FOREIGN KEY (semestr_id) REFERENCES semestr (id) ON DELETE CASCADE ON UPDATE CASCADE;
     
ALTER TABLE uwagi ADD CONSTRAINT pupiluwagi_fk FOREIGN KEY (pupil) REFERENCES uzytkownik (id) ON DELETE CASCADE ON UPDATE CASCADE ,
     ADD CONSTRAINT lekcjauwagi_fk FOREIGN KEY (lekcja_id) REFERENCES lekcje (id) ON DELETE CASCADE ON UPDATE CASCADE;
     
ALTER TABLE uzytkownik ADD CONSTRAINT klasauzytkownik_fk FOREIGN KEY (klasa_id) REFERENCES klasy (id) ON DELETE CASCADE ON UPDATE CASCADE ,
     ADD CONSTRAINT ojciecuzytkownik_fk FOREIGN KEY (ojciec) REFERENCES uzytkownik (id) ON DELETE CASCADE ON UPDATE CASCADE ,
     ADD CONSTRAINT matkauzytkownik_fk FOREIGN KEY (matka) REFERENCES uzytkownik (id) ON DELETE CASCADE ON UPDATE CASCADE;

CREATE LANGUAGE plpgsql; 

CREATE OR REPLACE FUNCTION sha1(bytea)
RETURNS character varying AS
$BODY$
BEGIN
RETURN ENCODE(DIGEST($1, 'sha1'), 'hex');
END;
$BODY$
LANGUAGE 'plpgsql'

-- INSERT INTO klasy VALUES (0,-1,A,'nie uczeń') 
-- INSERT INTO użytkownik VALUES ( NULL, 'a','Admin','Administrator','admin',  sha1('admin123456'), 'kontakt@brosbit4u.net',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL, DEFAULT );

