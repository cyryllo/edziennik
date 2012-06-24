
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- dyplomy
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `dyplomy`;


CREATE TABLE `dyplomy`
(
	`id` INTEGER  NOT NULL,
	`pupil` INTEGER  NOT NULL,
	`semestr_id` INTEGER  NOT NULL,
	`przedmiot_id` INTEGER  NOT NULL,
	`ocenadyplomu` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `dyplomy_FI_1` (`pupil`),
	CONSTRAINT `dyplomy_FK_1`
		FOREIGN KEY (`pupil`)
		REFERENCES `uzytkownik` (`id`),
	INDEX `dyplomy_FI_2` (`semestr_id`),
	CONSTRAINT `dyplomy_FK_2`
		FOREIGN KEY (`semestr_id`)
		REFERENCES `semestr` (`id`),
	INDEX `dyplomy_FI_3` (`przedmiot_id`),
	CONSTRAINT `dyplomy_FK_3`
		FOREIGN KEY (`przedmiot_id`)
		REFERENCES `przedmiot` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- grupy
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `grupy`;


CREATE TABLE `grupy`
(
	`id` INTEGER  NOT NULL,
	`pupil` INTEGER  NOT NULL,
	`semestr_id` INTEGER  NOT NULL,
	`grupa` INTEGER,
	`info` TEXT,
	PRIMARY KEY (`id`),
	INDEX `grupy_FI_1` (`pupil`),
	CONSTRAINT `grupy_FK_1`
		FOREIGN KEY (`pupil`)
		REFERENCES `uzytkownik` (`id`),
	INDEX `grupy_FI_2` (`semestr_id`),
	CONSTRAINT `grupy_FK_2`
		FOREIGN KEY (`semestr_id`)
		REFERENCES `semestr` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- klasy
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `klasy`;


CREATE TABLE `klasy`
(
	`id` INTEGER  NOT NULL,
	`poziom` INTEGER,
	`znak` TEXT,
	`opis` TEXT,
	`wychowawca` INTEGER,
	`startsemestr` INTEGER,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- lekcje
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `lekcje`;


CREATE TABLE `lekcje`
(
	`id` INTEGER  NOT NULL,
	`przedmiot_id` INTEGER  NOT NULL,
	`klasa_id` INTEGER  NOT NULL,
	`semestr_id` INTEGER  NOT NULL,
	`temat` TEXT,
	`datalekcji` DATETIME,
	`nauczyciel_id` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `lekcje_FI_1` (`przedmiot_id`),
	CONSTRAINT `lekcje_FK_1`
		FOREIGN KEY (`przedmiot_id`)
		REFERENCES `przedmiot` (`id`),
	INDEX `lekcje_FI_2` (`klasa_id`),
	CONSTRAINT `lekcje_FK_2`
		FOREIGN KEY (`klasa_id`)
		REFERENCES `klasy` (`id`),
	INDEX `lekcje_FI_3` (`semestr_id`),
	CONSTRAINT `lekcje_FK_3`
		FOREIGN KEY (`semestr_id`)
		REFERENCES `semestr` (`id`),
	INDEX `lekcje_FI_4` (`nauczyciel_id`),
	CONSTRAINT `lekcje_FK_4`
		FOREIGN KEY (`nauczyciel_id`)
		REFERENCES `uzytkownik` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- obecnosci
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `obecnosci`;


CREATE TABLE `obecnosci`
(
	`id` INTEGER  NOT NULL,
	`pupil` INTEGER  NOT NULL,
	`lekcja_id` INTEGER  NOT NULL,
	`rodzajobecnosci` TEXT,
	PRIMARY KEY (`id`),
	INDEX `obecnosci_FI_1` (`pupil`),
	CONSTRAINT `obecnosci_FK_1`
		FOREIGN KEY (`pupil`)
		REFERENCES `uzytkownik` (`id`),
	INDEX `obecnosci_FI_2` (`lekcja_id`),
	CONSTRAINT `obecnosci_FK_2`
		FOREIGN KEY (`lekcja_id`)
		REFERENCES `lekcje` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- oceny
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `oceny`;


CREATE TABLE `oceny`
(
	`id` INTEGER  NOT NULL,
	`pupil` INTEGER  NOT NULL,
	`ocena_id` INTEGER  NOT NULL,
	`waga` VARCHAR(255) default '1' NOT NULL,
	`nauczyciel_id` INTEGER  NOT NULL,
	`przedmiot_id` INTEGER  NOT NULL,
	`semestr_id` INTEGER  NOT NULL,
	`dataoceny` DATE,
	`info` TEXT,
	PRIMARY KEY (`id`),
	INDEX `oceny_FI_1` (`pupil`),
	CONSTRAINT `oceny_FK_1`
		FOREIGN KEY (`pupil`)
		REFERENCES `uzytkownik` (`id`),
	INDEX `oceny_FI_2` (`ocena_id`),
	CONSTRAINT `oceny_FK_2`
		FOREIGN KEY (`ocena_id`)
		REFERENCES `tablicaocen` (`id`),
	INDEX `oceny_FI_3` (`nauczyciel_id`),
	CONSTRAINT `oceny_FK_3`
		FOREIGN KEY (`nauczyciel_id`)
		REFERENCES `uzytkownik` (`id`),
	INDEX `oceny_FI_4` (`przedmiot_id`),
	CONSTRAINT `oceny_FK_4`
		FOREIGN KEY (`przedmiot_id`)
		REFERENCES `przedmiot` (`id`),
	INDEX `oceny_FI_5` (`semestr_id`),
	CONSTRAINT `oceny_FK_5`
		FOREIGN KEY (`semestr_id`)
		REFERENCES `semestr` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- planlekcji
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `planlekcji`;


CREATE TABLE `planlekcji`
(
	`id` INTEGER  NOT NULL,
	`semestr_id` INTEGER  NOT NULL,
	`klasa_id` INTEGER  NOT NULL,
	`nauczyciel_id` INTEGER  NOT NULL,
	`przedmiot_id` INTEGER  NOT NULL,
	`czasstart` DATE,
	`czasstop` DATE,
	`dzientygodnia` INTEGER,
	`godzinalekcyjna` INTEGER,
	`grupa_id` INTEGER,
	`obowiazkowa` TINYINT default 1 NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `planlekcji_FI_1` (`semestr_id`),
	CONSTRAINT `planlekcji_FK_1`
		FOREIGN KEY (`semestr_id`)
		REFERENCES `semestr` (`id`),
	INDEX `planlekcji_FI_2` (`klasa_id`),
	CONSTRAINT `planlekcji_FK_2`
		FOREIGN KEY (`klasa_id`)
		REFERENCES `klasy` (`id`),
	INDEX `planlekcji_FI_3` (`nauczyciel_id`),
	CONSTRAINT `planlekcji_FK_3`
		FOREIGN KEY (`nauczyciel_id`)
		REFERENCES `uzytkownik` (`id`),
	INDEX `planlekcji_FI_4` (`przedmiot_id`),
	CONSTRAINT `planlekcji_FK_4`
		FOREIGN KEY (`przedmiot_id`)
		REFERENCES `przedmiot` (`id`),
	INDEX `planlekcji_FI_5` (`grupa_id`),
	CONSTRAINT `planlekcji_FK_5`
		FOREIGN KEY (`grupa_id`)
		REFERENCES `grupy` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- przedmiot
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `przedmiot`;


CREATE TABLE `przedmiot`
(
	`id` INTEGER  NOT NULL,
	`nazwa` TEXT,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- semestr
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `semestr`;


CREATE TABLE `semestr`
(
	`id` INTEGER  NOT NULL,
	`rok` TEXT,
	`polowa` TEXT,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- tablicaocen
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `tablicaocen`;


CREATE TABLE `tablicaocen`
(
	`id` INTEGER  NOT NULL,
	`nazwa` TEXT,
	`wartosc` VARCHAR(255),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- usprawiedliwienie
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `usprawiedliwienie`;


CREATE TABLE `usprawiedliwienie`
(
	`id` BIGINT  NOT NULL AUTO_INCREMENT,
	`obecnosci_id` INTEGER,
	`uzytkownik_id` INTEGER  NOT NULL,
	`tresc` TEXT,
	PRIMARY KEY (`id`),
	INDEX `usprawiedliwienie_FI_1` (`obecnosci_id`),
	CONSTRAINT `usprawiedliwienie_FK_1`
		FOREIGN KEY (`obecnosci_id`)
		REFERENCES `obecnosci` (`id`),
	INDEX `usprawiedliwienie_FI_2` (`uzytkownik_id`),
	CONSTRAINT `usprawiedliwienie_FK_2`
		FOREIGN KEY (`uzytkownik_id`)
		REFERENCES `uzytkownik` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- uwagi
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `uwagi`;


CREATE TABLE `uwagi`
(
	`id` INTEGER  NOT NULL,
	`pupil` INTEGER  NOT NULL,
	`lekcja_id` INTEGER  NOT NULL,
	`info` TEXT,
	PRIMARY KEY (`id`),
	INDEX `uwagi_FI_1` (`pupil`),
	CONSTRAINT `uwagi_FK_1`
		FOREIGN KEY (`pupil`)
		REFERENCES `uzytkownik` (`id`),
	INDEX `uwagi_FI_2` (`lekcja_id`),
	CONSTRAINT `uwagi_FK_2`
		FOREIGN KEY (`lekcja_id`)
		REFERENCES `lekcje` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- uzytkownik
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `uzytkownik`;


CREATE TABLE `uzytkownik`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`rodzaj` CHAR(1),
	`imie` TEXT,
	`nazwisko` TEXT,
	`login` TEXT  NOT NULL,
	`haslo` TEXT  NOT NULL,
	`email` TEXT,
	`telefon` TEXT,
	`klasa_id` INTEGER,
	`pesel` INTEGER,
	`dataurodzin` DATE,
	`miejsceurodzin` TEXT,
	`ojciec` INTEGER,
	`matka` INTEGER,
	`ulica` TEXT,
	`nrdomu` TEXT,
	`kodpocztowy` TEXT,
	`panstwo` TEXT,
	`info` TEXT,
	`aktywny` TINYINT default 1 NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
