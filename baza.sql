--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = off;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET escape_string_warning = off;

--
-- Name: plpgsql; Type: PROCEDURAL LANGUAGE; Schema: -; Owner: dziennik
--

CREATE PROCEDURAL LANGUAGE plpgsql;


ALTER PROCEDURAL LANGUAGE plpgsql OWNER TO dziennik;

SET search_path = public, pg_catalog;

--
-- Name: sha1(bytea); Type: FUNCTION; Schema: public; Owner: dziennik
--

CREATE FUNCTION sha1(bytea) RETURNS character varying
    LANGUAGE plpgsql
    AS $_$
BEGIN
RETURN ENCODE(DIGEST($1, 'sha1'), 'hex');
END;
$_$;


ALTER FUNCTION public.sha1(bytea) OWNER TO dziennik;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: dyplomy; Type: TABLE; Schema: public; Owner: dziennik; Tablespace: 
--

CREATE TABLE dyplomy (
    id integer NOT NULL,
    pupil integer NOT NULL,
    semestr_id integer NOT NULL,
    przedmiot_id integer NOT NULL,
    ocenadyplomu integer NOT NULL
);


ALTER TABLE public.dyplomy OWNER TO dziennik;

--
-- Name: dyplomy_id_seq; Type: SEQUENCE; Schema: public; Owner: dziennik
--

CREATE SEQUENCE dyplomy_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.dyplomy_id_seq OWNER TO dziennik;

--
-- Name: dyplomy_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dziennik
--

ALTER SEQUENCE dyplomy_id_seq OWNED BY dyplomy.id;


--
-- Name: grupy; Type: TABLE; Schema: public; Owner: dziennik; Tablespace: 
--

CREATE TABLE grupy (
    id integer NOT NULL,
    pupil integer NOT NULL,
    semestr_id integer NOT NULL,
    grupa integer,
    info character varying(200)
);


ALTER TABLE public.grupy OWNER TO dziennik;

--
-- Name: grupy_id_seq; Type: SEQUENCE; Schema: public; Owner: dziennik
--

CREATE SEQUENCE grupy_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.grupy_id_seq OWNER TO dziennik;

--
-- Name: grupy_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dziennik
--

ALTER SEQUENCE grupy_id_seq OWNED BY grupy.id;


--
-- Name: klasy; Type: TABLE; Schema: public; Owner: dziennik; Tablespace: 
--

CREATE TABLE klasy (
    id integer NOT NULL,
    poziom integer,
    znak character varying(5),
    opis character varying(60),
    wychowawca integer,
    startsemestr integer
);


ALTER TABLE public.klasy OWNER TO dziennik;

--
-- Name: klasy_id_seq; Type: SEQUENCE; Schema: public; Owner: dziennik
--

CREATE SEQUENCE klasy_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.klasy_id_seq OWNER TO dziennik;

--
-- Name: klasy_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dziennik
--

ALTER SEQUENCE klasy_id_seq OWNED BY klasy.id;


--
-- Name: lekcje; Type: TABLE; Schema: public; Owner: dziennik; Tablespace: 
--

CREATE TABLE lekcje (
    id integer NOT NULL,
    przedmiot_id integer NOT NULL,
    klasa_id integer NOT NULL,
    semestr_id integer NOT NULL,
    temat character varying(50),
    datalekcji timestamp(0) without time zone,
    nauczyciel_id integer NOT NULL
);


ALTER TABLE public.lekcje OWNER TO dziennik;

--
-- Name: lekcje_id_seq; Type: SEQUENCE; Schema: public; Owner: dziennik
--

CREATE SEQUENCE lekcje_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.lekcje_id_seq OWNER TO dziennik;

--
-- Name: lekcje_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dziennik
--

ALTER SEQUENCE lekcje_id_seq OWNED BY lekcje.id;


--
-- Name: obecnosci; Type: TABLE; Schema: public; Owner: dziennik; Tablespace: 
--

CREATE TABLE obecnosci (
    id integer NOT NULL,
    pupil integer NOT NULL,
    lekcja_id integer NOT NULL,
    rodzajobecnosci character varying(2)
);


ALTER TABLE public.obecnosci OWNER TO dziennik;

--
-- Name: obecnosci_id_seq; Type: SEQUENCE; Schema: public; Owner: dziennik
--

CREATE SEQUENCE obecnosci_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.obecnosci_id_seq OWNER TO dziennik;

--
-- Name: obecnosci_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dziennik
--

ALTER SEQUENCE obecnosci_id_seq OWNED BY obecnosci.id;


--
-- Name: oceny; Type: TABLE; Schema: public; Owner: dziennik; Tablespace: 
--

CREATE TABLE oceny (
    id integer NOT NULL,
    pupil integer NOT NULL,
    ocena_id integer NOT NULL,
    waga double precision DEFAULT 1 NOT NULL,
    nauczyciel_id integer NOT NULL,
    przedmiot_id integer NOT NULL,
    semestr_id integer NOT NULL,
    dataoceny date,
    info character varying(200)
);


ALTER TABLE public.oceny OWNER TO dziennik;

--
-- Name: oceny_id_seq; Type: SEQUENCE; Schema: public; Owner: dziennik
--

CREATE SEQUENCE oceny_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.oceny_id_seq OWNER TO dziennik;

--
-- Name: oceny_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dziennik
--

ALTER SEQUENCE oceny_id_seq OWNED BY oceny.id;


--
-- Name: planlekcji; Type: TABLE; Schema: public; Owner: dziennik; Tablespace: 
--

CREATE TABLE planlekcji (
    id integer NOT NULL,
    semestr_id integer NOT NULL,
    klasa_id integer NOT NULL,
    nauczyciel_id integer NOT NULL,
    przedmiot_id integer NOT NULL,
    czasstart date,
    czasstop date,
    dzientygodnia integer,
    godzinalekcyjna integer,
    grupa_id integer,
    obowiazkowa boolean DEFAULT true NOT NULL
);


ALTER TABLE public.planlekcji OWNER TO dziennik;

--
-- Name: planlekcji_id_seq; Type: SEQUENCE; Schema: public; Owner: dziennik
--

CREATE SEQUENCE planlekcji_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.planlekcji_id_seq OWNER TO dziennik;

--
-- Name: planlekcji_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dziennik
--

ALTER SEQUENCE planlekcji_id_seq OWNED BY planlekcji.id;


--
-- Name: przedmiot; Type: TABLE; Schema: public; Owner: dziennik; Tablespace: 
--

CREATE TABLE przedmiot (
    id integer NOT NULL,
    nazwa character varying(50)
);


ALTER TABLE public.przedmiot OWNER TO dziennik;

--
-- Name: przedmiot_id_seq; Type: SEQUENCE; Schema: public; Owner: dziennik
--

CREATE SEQUENCE przedmiot_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.przedmiot_id_seq OWNER TO dziennik;

--
-- Name: przedmiot_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dziennik
--

ALTER SEQUENCE przedmiot_id_seq OWNED BY przedmiot.id;


--
-- Name: semestr; Type: TABLE; Schema: public; Owner: dziennik; Tablespace: 
--

CREATE TABLE semestr (
    id integer NOT NULL,
    rok character varying(9),
    polowa character varying(10)
);


ALTER TABLE public.semestr OWNER TO dziennik;

--
-- Name: semestr_id_seq; Type: SEQUENCE; Schema: public; Owner: dziennik
--

CREATE SEQUENCE semestr_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.semestr_id_seq OWNER TO dziennik;

--
-- Name: semestr_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dziennik
--

ALTER SEQUENCE semestr_id_seq OWNED BY semestr.id;


--
-- Name: tablicaocen; Type: TABLE; Schema: public; Owner: dziennik; Tablespace: 
--

CREATE TABLE tablicaocen (
    id integer NOT NULL,
    nazwa character varying(20),
    wartosc double precision
);


ALTER TABLE public.tablicaocen OWNER TO dziennik;

--
-- Name: tablicaocen_id_seq; Type: SEQUENCE; Schema: public; Owner: dziennik
--

CREATE SEQUENCE tablicaocen_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.tablicaocen_id_seq OWNER TO dziennik;

--
-- Name: tablicaocen_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dziennik
--

ALTER SEQUENCE tablicaocen_id_seq OWNED BY tablicaocen.id;


--
-- Name: usprawiedliwienie; Type: TABLE; Schema: public; Owner: dziennik; Tablespace: 
--

CREATE TABLE usprawiedliwienie (
    obecnosci_id integer,
    uzytkownik_id integer NOT NULL,
    tresc character varying(200)
);


ALTER TABLE public.usprawiedliwienie OWNER TO dziennik;

--
-- Name: uwagi; Type: TABLE; Schema: public; Owner: dziennik; Tablespace: 
--

CREATE TABLE uwagi (
    id integer NOT NULL,
    pupil integer NOT NULL,
    lekcja_id integer NOT NULL,
    info character varying(200)
);


ALTER TABLE public.uwagi OWNER TO dziennik;

--
-- Name: uwagi_id_seq; Type: SEQUENCE; Schema: public; Owner: dziennik
--

CREATE SEQUENCE uwagi_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.uwagi_id_seq OWNER TO dziennik;

--
-- Name: uwagi_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dziennik
--

ALTER SEQUENCE uwagi_id_seq OWNED BY uwagi.id;


--
-- Name: uzytkownik; Type: TABLE; Schema: public; Owner: dziennik; Tablespace: 
--

CREATE TABLE uzytkownik (
    id integer NOT NULL,
    rodzaj character(6),
    imie character varying(20),
    nazwisko character varying(40),
    login character varying(20) NOT NULL,
    haslo text NOT NULL,
    email character varying(60),
    telefon character varying(28),
    klasa_id integer,
    pesel integer,
    dataurodzin date,
    miejsceurodzin date,
    ojciec integer,
    matka integer,
    ulica character varying(60),
    nrdomu character varying(8),
    kodpocztowy character varying(6),
    panstwo character varying(20),
    info character varying(200),
    aktywny boolean DEFAULT true NOT NULL
);


ALTER TABLE public.uzytkownik OWNER TO dziennik;

--
-- Name: uzytkownik_id_seq; Type: SEQUENCE; Schema: public; Owner: dziennik
--

CREATE SEQUENCE uzytkownik_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


ALTER TABLE public.uzytkownik_id_seq OWNER TO dziennik;

--
-- Name: uzytkownik_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dziennik
--

ALTER SEQUENCE uzytkownik_id_seq OWNED BY uzytkownik.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: dziennik
--

ALTER TABLE dyplomy ALTER COLUMN id SET DEFAULT nextval('dyplomy_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: dziennik
--

ALTER TABLE grupy ALTER COLUMN id SET DEFAULT nextval('grupy_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: dziennik
--

ALTER TABLE klasy ALTER COLUMN id SET DEFAULT nextval('klasy_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: dziennik
--

ALTER TABLE lekcje ALTER COLUMN id SET DEFAULT nextval('lekcje_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: dziennik
--

ALTER TABLE obecnosci ALTER COLUMN id SET DEFAULT nextval('obecnosci_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: dziennik
--

ALTER TABLE oceny ALTER COLUMN id SET DEFAULT nextval('oceny_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: dziennik
--

ALTER TABLE planlekcji ALTER COLUMN id SET DEFAULT nextval('planlekcji_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: dziennik
--

ALTER TABLE przedmiot ALTER COLUMN id SET DEFAULT nextval('przedmiot_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: dziennik
--

ALTER TABLE semestr ALTER COLUMN id SET DEFAULT nextval('semestr_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: dziennik
--

ALTER TABLE tablicaocen ALTER COLUMN id SET DEFAULT nextval('tablicaocen_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: dziennik
--

ALTER TABLE uwagi ALTER COLUMN id SET DEFAULT nextval('uwagi_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: dziennik
--

ALTER TABLE uzytkownik ALTER COLUMN id SET DEFAULT nextval('uzytkownik_id_seq'::regclass);


--
-- Name: dyplomy_pkey; Type: CONSTRAINT; Schema: public; Owner: dziennik; Tablespace: 
--

ALTER TABLE ONLY dyplomy
    ADD CONSTRAINT dyplomy_pkey PRIMARY KEY (id);


--
-- Name: grupy_pkey; Type: CONSTRAINT; Schema: public; Owner: dziennik; Tablespace: 
--

ALTER TABLE ONLY grupy
    ADD CONSTRAINT grupy_pkey PRIMARY KEY (id);


--
-- Name: klasy_pkey; Type: CONSTRAINT; Schema: public; Owner: dziennik; Tablespace: 
--

ALTER TABLE ONLY klasy
    ADD CONSTRAINT klasy_pkey PRIMARY KEY (id);


--
-- Name: lekcje_pkey; Type: CONSTRAINT; Schema: public; Owner: dziennik; Tablespace: 
--

ALTER TABLE ONLY lekcje
    ADD CONSTRAINT lekcje_pkey PRIMARY KEY (id);


--
-- Name: obecnosci_pkey; Type: CONSTRAINT; Schema: public; Owner: dziennik; Tablespace: 
--

ALTER TABLE ONLY obecnosci
    ADD CONSTRAINT obecnosci_pkey PRIMARY KEY (id);


--
-- Name: oceny_pkey; Type: CONSTRAINT; Schema: public; Owner: dziennik; Tablespace: 
--

ALTER TABLE ONLY oceny
    ADD CONSTRAINT oceny_pkey PRIMARY KEY (id);


--
-- Name: planlekcji_pkey; Type: CONSTRAINT; Schema: public; Owner: dziennik; Tablespace: 
--

ALTER TABLE ONLY planlekcji
    ADD CONSTRAINT planlekcji_pkey PRIMARY KEY (id);


--
-- Name: przedmiot_pkey; Type: CONSTRAINT; Schema: public; Owner: dziennik; Tablespace: 
--

ALTER TABLE ONLY przedmiot
    ADD CONSTRAINT przedmiot_pkey PRIMARY KEY (id);


--
-- Name: semestr_pkey; Type: CONSTRAINT; Schema: public; Owner: dziennik; Tablespace: 
--

ALTER TABLE ONLY semestr
    ADD CONSTRAINT semestr_pkey PRIMARY KEY (id);


--
-- Name: tablicaocen_pkey; Type: CONSTRAINT; Schema: public; Owner: dziennik; Tablespace: 
--

ALTER TABLE ONLY tablicaocen
    ADD CONSTRAINT tablicaocen_pkey PRIMARY KEY (id);


--
-- Name: uwagi_pkey; Type: CONSTRAINT; Schema: public; Owner: dziennik; Tablespace: 
--

ALTER TABLE ONLY uwagi
    ADD CONSTRAINT uwagi_pkey PRIMARY KEY (id);


--
-- Name: uzytkownik_pkey; Type: CONSTRAINT; Schema: public; Owner: dziennik; Tablespace: 
--

ALTER TABLE ONLY uzytkownik
    ADD CONSTRAINT uzytkownik_pkey PRIMARY KEY (id);


--
-- Name: grupyplanlekcji_fk; Type: FK CONSTRAINT; Schema: public; Owner: dziennik
--

ALTER TABLE ONLY planlekcji
    ADD CONSTRAINT grupyplanlekcji_fk FOREIGN KEY (grupa_id) REFERENCES grupy(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: klasalekcje_fk; Type: FK CONSTRAINT; Schema: public; Owner: dziennik
--

ALTER TABLE ONLY lekcje
    ADD CONSTRAINT klasalekcje_fk FOREIGN KEY (klasa_id) REFERENCES klasy(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: klasaplanlekcji_fk; Type: FK CONSTRAINT; Schema: public; Owner: dziennik
--

ALTER TABLE ONLY planlekcji
    ADD CONSTRAINT klasaplanlekcji_fk FOREIGN KEY (klasa_id) REFERENCES klasy(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: klasauzytkownik_fk; Type: FK CONSTRAINT; Schema: public; Owner: dziennik
--

ALTER TABLE ONLY uzytkownik
    ADD CONSTRAINT klasauzytkownik_fk FOREIGN KEY (klasa_id) REFERENCES klasy(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: lekcjaobecnosci_fk; Type: FK CONSTRAINT; Schema: public; Owner: dziennik
--

ALTER TABLE ONLY obecnosci
    ADD CONSTRAINT lekcjaobecnosci_fk FOREIGN KEY (lekcja_id) REFERENCES lekcje(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: lekcjauwagi_fk; Type: FK CONSTRAINT; Schema: public; Owner: dziennik
--

ALTER TABLE ONLY uwagi
    ADD CONSTRAINT lekcjauwagi_fk FOREIGN KEY (lekcja_id) REFERENCES lekcje(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: matkauzytkownik_fk; Type: FK CONSTRAINT; Schema: public; Owner: dziennik
--

ALTER TABLE ONLY uzytkownik
    ADD CONSTRAINT matkauzytkownik_fk FOREIGN KEY (matka) REFERENCES uzytkownik(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: nauczycieloceny_fk; Type: FK CONSTRAINT; Schema: public; Owner: dziennik
--

ALTER TABLE ONLY oceny
    ADD CONSTRAINT nauczycieloceny_fk FOREIGN KEY (nauczyciel_id) REFERENCES uzytkownik(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: nauczycielplanlekcji_fk; Type: FK CONSTRAINT; Schema: public; Owner: dziennik
--

ALTER TABLE ONLY planlekcji
    ADD CONSTRAINT nauczycielplanlekcji_fk FOREIGN KEY (nauczyciel_id) REFERENCES uzytkownik(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: obecnoscusprawiedliwienie_fk; Type: FK CONSTRAINT; Schema: public; Owner: dziennik
--

ALTER TABLE ONLY usprawiedliwienie
    ADD CONSTRAINT obecnoscusprawiedliwienie_fk FOREIGN KEY (obecnosci_id) REFERENCES obecnosci(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: ocenaoceny_fk; Type: FK CONSTRAINT; Schema: public; Owner: dziennik
--

ALTER TABLE ONLY oceny
    ADD CONSTRAINT ocenaoceny_fk FOREIGN KEY (ocena_id) REFERENCES tablicaocen(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: ojciecuzytkownik_fk; Type: FK CONSTRAINT; Schema: public; Owner: dziennik
--

ALTER TABLE ONLY uzytkownik
    ADD CONSTRAINT ojciecuzytkownik_fk FOREIGN KEY (ojciec) REFERENCES uzytkownik(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: przedmiotdyplom_fk; Type: FK CONSTRAINT; Schema: public; Owner: dziennik
--

ALTER TABLE ONLY dyplomy
    ADD CONSTRAINT przedmiotdyplom_fk FOREIGN KEY (przedmiot_id) REFERENCES przedmiot(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: przedmiotlekcje_fk; Type: FK CONSTRAINT; Schema: public; Owner: dziennik
--

ALTER TABLE ONLY lekcje
    ADD CONSTRAINT przedmiotlekcje_fk FOREIGN KEY (przedmiot_id) REFERENCES przedmiot(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: przedmiotoceny_fk; Type: FK CONSTRAINT; Schema: public; Owner: dziennik
--

ALTER TABLE ONLY oceny
    ADD CONSTRAINT przedmiotoceny_fk FOREIGN KEY (przedmiot_id) REFERENCES przedmiot(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: przedmiotplanlekcji_fk; Type: FK CONSTRAINT; Schema: public; Owner: dziennik
--

ALTER TABLE ONLY planlekcji
    ADD CONSTRAINT przedmiotplanlekcji_fk FOREIGN KEY (przedmiot_id) REFERENCES przedmiot(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: pupildyplom_fk; Type: FK CONSTRAINT; Schema: public; Owner: dziennik
--

ALTER TABLE ONLY dyplomy
    ADD CONSTRAINT pupildyplom_fk FOREIGN KEY (pupil) REFERENCES uzytkownik(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: pupilgrupy_fk; Type: FK CONSTRAINT; Schema: public; Owner: dziennik
--

ALTER TABLE ONLY grupy
    ADD CONSTRAINT pupilgrupy_fk FOREIGN KEY (pupil) REFERENCES uzytkownik(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: pupilobecnosci_fk; Type: FK CONSTRAINT; Schema: public; Owner: dziennik
--

ALTER TABLE ONLY obecnosci
    ADD CONSTRAINT pupilobecnosci_fk FOREIGN KEY (pupil) REFERENCES uzytkownik(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: pupiloceny_fk; Type: FK CONSTRAINT; Schema: public; Owner: dziennik
--

ALTER TABLE ONLY oceny
    ADD CONSTRAINT pupiloceny_fk FOREIGN KEY (pupil) REFERENCES uzytkownik(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: pupiluwagi_fk; Type: FK CONSTRAINT; Schema: public; Owner: dziennik
--

ALTER TABLE ONLY uwagi
    ADD CONSTRAINT pupiluwagi_fk FOREIGN KEY (pupil) REFERENCES uzytkownik(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: semestrdyplom_fk; Type: FK CONSTRAINT; Schema: public; Owner: dziennik
--

ALTER TABLE ONLY dyplomy
    ADD CONSTRAINT semestrdyplom_fk FOREIGN KEY (semestr_id) REFERENCES semestr(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: semestrgrupy_fk; Type: FK CONSTRAINT; Schema: public; Owner: dziennik
--

ALTER TABLE ONLY grupy
    ADD CONSTRAINT semestrgrupy_fk FOREIGN KEY (semestr_id) REFERENCES semestr(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: semestrlekcje_fk; Type: FK CONSTRAINT; Schema: public; Owner: dziennik
--

ALTER TABLE ONLY lekcje
    ADD CONSTRAINT semestrlekcje_fk FOREIGN KEY (semestr_id) REFERENCES semestr(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: semestroceny_fk; Type: FK CONSTRAINT; Schema: public; Owner: dziennik
--

ALTER TABLE ONLY oceny
    ADD CONSTRAINT semestroceny_fk FOREIGN KEY (semestr_id) REFERENCES semestr(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: semestrplanlekcji_fk; Type: FK CONSTRAINT; Schema: public; Owner: dziennik
--

ALTER TABLE ONLY planlekcji
    ADD CONSTRAINT semestrplanlekcji_fk FOREIGN KEY (semestr_id) REFERENCES semestr(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: uzytkowniklekcje_fk; Type: FK CONSTRAINT; Schema: public; Owner: dziennik
--

ALTER TABLE ONLY lekcje
    ADD CONSTRAINT uzytkowniklekcje_fk FOREIGN KEY (nauczyciel_id) REFERENCES uzytkownik(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: uzytkownikusprawiedliwienie_fk; Type: FK CONSTRAINT; Schema: public; Owner: dziennik
--

ALTER TABLE ONLY usprawiedliwienie
    ADD CONSTRAINT uzytkownikusprawiedliwienie_fk FOREIGN KEY (uzytkownik_id) REFERENCES uzytkownik(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: wychowawcaklasy_fk; Type: FK CONSTRAINT; Schema: public; Owner: dziennik
--

ALTER TABLE ONLY klasy
    ADD CONSTRAINT wychowawcaklasy_fk FOREIGN KEY (wychowawca) REFERENCES uzytkownik(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

