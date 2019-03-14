CREATE TABLE samochod( Samochod_id serial ,
                        id_Model_samochodu INTEGER NOT NULL ,
                        Wersja VARCHAR(40) NOT NULL,
                        rok_produkcji integer NOT NULL,
                        Przebieg FLOAT NOT NULL,
                        id_Typ_silnika INTEGER ,
						Pojemnosc_silnika FLOAT ,
						Skrzynia_biegow VARCHAR(40) ,
						Moc FLOAT ,
						Bezwypadkowy BOOLEAN ,
						id_Kolor INTEGER ,							
						primary key(Samochod_id),
						foreign  key(id_Model_samochodu) references Model_samochodu(Model_samochodu_id),
						foreign  key(id_Typ_silnika) references Typ_silnika(Typ_silnika_id),
						foreign  key(id_Kolor) references Kolor(Kolor_id)
			
);


ALTER TABLE samochod
ADD COLUMN dostepnosc INTEGER;

create table Kolor( Kolor_id serial,
					Kolor VARCHAR(40),
					primary key(Kolor_id)

);

create table Typ_silnika( Typ_silnika_id serial,
					Typ_silnika_w_samochodzie VARCHAR(40),
					primary key(Typ_silnika_id)

);

create table Marka( Marka_id serial,
					marka_samochodu VARCHAR(40),
					primary key(Marka_id)

);

create table Model_samochodu( Model_samochodu_id serial,
					Model VARCHAR(40),
					id_marka INTEGER NOT NULL,
					primary key(Model_samochodu_id),
					foreign  key(id_marka) references Marka(Marka_id)

);


create table Oferta_sprzedazy( 
					Oferta_sprzedazy_id serial,	
					cena_wywolawcza FLOAT,
					wlasciciel_najwyzszej_oferty varchar,		
					data_dodania DATE,
					data_zakonczenia DATE,
					id_samochod INTEGER NOT NULL,
					id_sprzedawcy INTEGER NOT NULL,
					primary key(Oferta_sprzedazy_id),
					foreign  key(id_sprzedawcy) references sprzedawca(Sprzedawca_id),
					foreign  key(id_samochod) references samochod(Samochod_id)

);

ALTER TABLE Oferta_sprzedazy
ADD COLUMN dostepnosc INTEGER;

create table sprzedawca(
Sprzedawca_id serial,
imie VARCHAR(40),
nazwisko VARCHAR(40) not null,
ulica VARCHAR(40),
miejscowosc VARCHAR(40),
numer_domu VARCHAR(10),
numer_mieszkania VARCHAR(10),
kod_pocztowy VARCHAR(10),
numer_telefonu VARCHAR(40),
adres_email VARCHAR(40),
pesel VARCHAR(40),
nip VARCHAR(40),
numer_konta VARCHAR(40),
primary key(Sprzedawca_id)
);

create table kupujacy(
Kupujacy_id serial,
imie VARCHAR(40),
nazwisko VARCHAR(40) not null,
ulica VARCHAR(40),
miejscowosc VARCHAR(40),
numer_domu VARCHAR(10),
numer_mieszkania VARCHAR(10),
kod_pocztowy VARCHAR(10),
numer_telefonu VARCHAR(40),
adres_email VARCHAR(40),
pesel VARCHAR(40),
nip VARCHAR(40),
numer_konta VARCHAR(40),
primary key(Kupujacy_id)

);

create table licytacja(
licytacja_id serial,
kupujacy_id integer,
obecna_cena float,
Oferta_sprzedazy_id integer,
primary key(licytacja_id),
foreign  key(kupujacy_id) references kupujacy(Kupujacy_id),
foreign  key(Oferta_sprzedazy_id) references Oferta_sprzedazy(Oferta_sprzedazy_id)
);

create table zakup(
id_zakup serial,

Oferta_sprzedazy_id integer,
kupujacy_id integer,
primary key(id_zakup),
foreign  key(Oferta_sprzedazy_id) references Oferta_sprzedazy(Oferta_sprzedazy_id),
foreign  key(kupujacy_id) references kupujacy(Kupujacy_id)
);

create table archiwum_ofert(
id_archiwum_ofert serial,
primary key(id_archiwum_ofert),


					cena_wywolawcza FLOAT,
					wlasciciel_najwyzszej_oferty varchar,		
					data_dodania DATE,
					data_zakonczenia DATE,
					id_samochod INTEGER ,
					id_sprzedawcy INTEGER



);


-- funkcja do TRIGGER 1 - dodaj_licytacje
CREATE OR REPLACE FUNCTION dodaj_licytacje_fun() RETURNS TRIGGER AS $$
   BEGIN
      INSERT INTO licytacja(licytacja_id, obecna_cena, Oferta_sprzedazy_id) VALUES (new.Oferta_sprzedazy_id,new.cena_wywolawcza, new.Oferta_sprzedazy_id);
      RETURN NEW;
   END;
$$ LANGUAGE plpgsql;

-- TRIGGER1
create trigger dodaj_licytacje after insert on Oferta_sprzedazy for each row execute procedure dodaj_licytacje_fun();


-- WIDOK
create view licytacja_view as select kupujacy_id, obecna_cena, oferta_sprzedazy_id from licytacja;



-- funkcja do TRIGGER 2 - sprawdzanie_ceny
CREATE OR REPLACE FUNCTION sprawdzanie_ceny_fun() RETURNS TRIGGER AS $$
   BEGIN
      IF old.obecna_cena<new.obecna_cena then
      RETURN NEW;
      else
      raise exception 'za niska cena by przebic licytacje';
      end if;
   END;
$$ LANGUAGE plpgsql;

-- TRIGGER2
create trigger sprawdzanie_ceny before update on licytacja for each row execute procedure sprawdzanie_ceny_fun();