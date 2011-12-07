
-----------------------------------------------------------------------------
-- dyplomy
-----------------------------------------------------------------------------

DROP TABLE "dyplomy" CASCADE;


CREATE TABLE "dyplomy"
(
	"id" INTEGER  NOT NULL,
	"pupil" INTEGER  NOT NULL,
	"semestr_id" INTEGER  NOT NULL,
	"przedmiot_id" INTEGER  NOT NULL,
	"ocenadyplomu" INTEGER  NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "dyplomy" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- grupy
-----------------------------------------------------------------------------

DROP TABLE "grupy" CASCADE;


CREATE TABLE "grupy"
(
	"id" INTEGER  NOT NULL,
	"pupil" INTEGER  NOT NULL,
	"semestr_id" INTEGER  NOT NULL,
	"grupa" INTEGER,
	"info" TEXT,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "grupy" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- klasy
-----------------------------------------------------------------------------

DROP TABLE "klasy" CASCADE;


CREATE TABLE "klasy"
(
	"id" INTEGER  NOT NULL,
	"poziom" INTEGER,
	"znak" TEXT,
	"opis" TEXT,
	"wychowawca" INTEGER,
	"startsemestr" INTEGER,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "klasy" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- lekcje
-----------------------------------------------------------------------------

DROP TABLE "lekcje" CASCADE;


CREATE TABLE "lekcje"
(
	"id" INTEGER  NOT NULL,
	"przedmiot_id" INTEGER  NOT NULL,
	"klasa_id" INTEGER  NOT NULL,
	"semestr_id" INTEGER  NOT NULL,
	"temat" TEXT,
	"datalekcji" TIMESTAMP,
	"nauczyciel_id" INTEGER  NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "lekcje" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- obecnosci
-----------------------------------------------------------------------------

DROP TABLE "obecnosci" CASCADE;


CREATE TABLE "obecnosci"
(
	"id" INTEGER  NOT NULL,
	"pupil" INTEGER  NOT NULL,
	"lekcja_id" INTEGER  NOT NULL,
	"rodzajobecnosci" TEXT,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "obecnosci" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- oceny
-----------------------------------------------------------------------------

DROP TABLE "oceny" CASCADE;


CREATE TABLE "oceny"
(
	"id" INTEGER  NOT NULL,
	"pupil" INTEGER  NOT NULL,
	"ocena_id" INTEGER  NOT NULL,
	"waga" VARCHAR(255) default '1' NOT NULL,
	"nauczyciel_id" INTEGER  NOT NULL,
	"przedmiot_id" INTEGER  NOT NULL,
	"semestr_id" INTEGER  NOT NULL,
	"dataoceny" DATE,
	"info" TEXT,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "oceny" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- planlekcji
-----------------------------------------------------------------------------

DROP TABLE "planlekcji" CASCADE;


CREATE TABLE "planlekcji"
(
	"id" INTEGER  NOT NULL,
	"semestr_id" INTEGER  NOT NULL,
	"klasa_id" INTEGER  NOT NULL,
	"nauczyciel_id" INTEGER  NOT NULL,
	"przedmiot_id" INTEGER  NOT NULL,
	"czasstart" DATE,
	"czasstop" DATE,
	"dzientygodnia" INTEGER,
	"godzinalekcyjna" INTEGER,
	"grupa_id" INTEGER,
	"obowiazkowa" BOOLEAN default 't' NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "planlekcji" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- przedmiot
-----------------------------------------------------------------------------

DROP TABLE "przedmiot" CASCADE;


CREATE TABLE "przedmiot"
(
	"id" INTEGER  NOT NULL,
	"nazwa" TEXT,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "przedmiot" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- semestr
-----------------------------------------------------------------------------

DROP TABLE "semestr" CASCADE;


CREATE TABLE "semestr"
(
	"id" INTEGER  NOT NULL,
	"rok" TEXT,
	"polowa" TEXT,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "semestr" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- tablicaocen
-----------------------------------------------------------------------------

DROP TABLE "tablicaocen" CASCADE;


CREATE TABLE "tablicaocen"
(
	"id" INTEGER  NOT NULL,
	"nazwa" TEXT,
	"wartosc" VARCHAR(255),
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "tablicaocen" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- usprawiedliwienie
-----------------------------------------------------------------------------

DROP TABLE "usprawiedliwienie" CASCADE;


CREATE TABLE "usprawiedliwienie"
(
	"id" bigserial  NOT NULL,
	"obecnosci_id" INTEGER,
	"uzytkownik_id" INTEGER  NOT NULL,
	"tresc" TEXT,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "usprawiedliwienie" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- uwagi
-----------------------------------------------------------------------------

DROP TABLE "uwagi" CASCADE;


CREATE TABLE "uwagi"
(
	"id" INTEGER  NOT NULL,
	"pupil" INTEGER  NOT NULL,
	"lekcja_id" INTEGER  NOT NULL,
	"info" TEXT,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "uwagi" IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- uzytkownik
-----------------------------------------------------------------------------

DROP TABLE "uzytkownik" CASCADE;


CREATE TABLE "uzytkownik"
(
	"id" INTEGER  NOT NULL,
	"rodzaj" CHAR(6),
	"imie" TEXT,
	"nazwisko" TEXT,
	"login" TEXT  NOT NULL,
	"haslo" TEXT  NOT NULL,
	"email" TEXT,
	"telefon" TEXT,
	"klasa_id" INTEGER,
	"pesel" INTEGER,
	"dataurodzin" DATE,
	"miejsceurodzin" DATE,
	"ojciec" INTEGER,
	"matka" INTEGER,
	"ulica" TEXT,
	"nrdomu" TEXT,
	"kodpocztowy" TEXT,
	"panstwo" TEXT,
	"info" TEXT,
	"aktywny" BOOLEAN default 't' NOT NULL,
	PRIMARY KEY ("id")
);

COMMENT ON TABLE "uzytkownik" IS '';


SET search_path TO public;
ALTER TABLE "dyplomy" ADD CONSTRAINT "dyplomy_FK_1" FOREIGN KEY ("pupil") REFERENCES "uzytkownik" ("id");

ALTER TABLE "dyplomy" ADD CONSTRAINT "dyplomy_FK_2" FOREIGN KEY ("semestr_id") REFERENCES "semestr" ("id");

ALTER TABLE "dyplomy" ADD CONSTRAINT "dyplomy_FK_3" FOREIGN KEY ("przedmiot_id") REFERENCES "przedmiot" ("id");

ALTER TABLE "grupy" ADD CONSTRAINT "grupy_FK_1" FOREIGN KEY ("pupil") REFERENCES "uzytkownik" ("id");

ALTER TABLE "grupy" ADD CONSTRAINT "grupy_FK_2" FOREIGN KEY ("semestr_id") REFERENCES "semestr" ("id");

ALTER TABLE "lekcje" ADD CONSTRAINT "lekcje_FK_1" FOREIGN KEY ("przedmiot_id") REFERENCES "przedmiot" ("id");

ALTER TABLE "lekcje" ADD CONSTRAINT "lekcje_FK_2" FOREIGN KEY ("klasa_id") REFERENCES "klasy" ("id");

ALTER TABLE "lekcje" ADD CONSTRAINT "lekcje_FK_3" FOREIGN KEY ("semestr_id") REFERENCES "semestr" ("id");

ALTER TABLE "lekcje" ADD CONSTRAINT "lekcje_FK_4" FOREIGN KEY ("nauczyciel_id") REFERENCES "uzytkownik" ("id");

ALTER TABLE "obecnosci" ADD CONSTRAINT "obecnosci_FK_1" FOREIGN KEY ("pupil") REFERENCES "uzytkownik" ("id");

ALTER TABLE "obecnosci" ADD CONSTRAINT "obecnosci_FK_2" FOREIGN KEY ("lekcja_id") REFERENCES "lekcje" ("id");

ALTER TABLE "oceny" ADD CONSTRAINT "oceny_FK_1" FOREIGN KEY ("pupil") REFERENCES "uzytkownik" ("id");

ALTER TABLE "oceny" ADD CONSTRAINT "oceny_FK_2" FOREIGN KEY ("ocena_id") REFERENCES "tablicaocen" ("id");

ALTER TABLE "oceny" ADD CONSTRAINT "oceny_FK_3" FOREIGN KEY ("nauczyciel_id") REFERENCES "uzytkownik" ("id");

ALTER TABLE "oceny" ADD CONSTRAINT "oceny_FK_4" FOREIGN KEY ("przedmiot_id") REFERENCES "przedmiot" ("id");

ALTER TABLE "oceny" ADD CONSTRAINT "oceny_FK_5" FOREIGN KEY ("semestr_id") REFERENCES "semestr" ("id");

ALTER TABLE "planlekcji" ADD CONSTRAINT "planlekcji_FK_1" FOREIGN KEY ("semestr_id") REFERENCES "semestr" ("id");

ALTER TABLE "planlekcji" ADD CONSTRAINT "planlekcji_FK_2" FOREIGN KEY ("klasa_id") REFERENCES "klasy" ("id");

ALTER TABLE "planlekcji" ADD CONSTRAINT "planlekcji_FK_3" FOREIGN KEY ("nauczyciel_id") REFERENCES "uzytkownik" ("id");

ALTER TABLE "planlekcji" ADD CONSTRAINT "planlekcji_FK_4" FOREIGN KEY ("przedmiot_id") REFERENCES "przedmiot" ("id");

ALTER TABLE "planlekcji" ADD CONSTRAINT "planlekcji_FK_5" FOREIGN KEY ("grupa_id") REFERENCES "grupy" ("id");

ALTER TABLE "usprawiedliwienie" ADD CONSTRAINT "usprawiedliwienie_FK_1" FOREIGN KEY ("obecnosci_id") REFERENCES "obecnosci" ("id");

ALTER TABLE "usprawiedliwienie" ADD CONSTRAINT "usprawiedliwienie_FK_2" FOREIGN KEY ("uzytkownik_id") REFERENCES "uzytkownik" ("id");

ALTER TABLE "uwagi" ADD CONSTRAINT "uwagi_FK_1" FOREIGN KEY ("pupil") REFERENCES "uzytkownik" ("id");

ALTER TABLE "uwagi" ADD CONSTRAINT "uwagi_FK_2" FOREIGN KEY ("lekcja_id") REFERENCES "lekcje" ("id");
