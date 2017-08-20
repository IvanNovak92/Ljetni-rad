drop database if exists skladiste;
create database skladiste default character set utf8;
use skladiste;

create table skladiste(
sifra int not null primary key auto_increment,
ime varchar(50) not null,
vlasnik varchar(50) not null,
lokacija varchar(50) not null,
djelatnik int not null

);

create table komora(
sifra int not null primary key auto_increment,
broj_komore char(5) not null,
roba int not null
);

create table roba(
sifra int not null primary key auto_increment,
vrsta_robe varchar(50) not null,
datum_berbe datetime not null,
datum_skladistenja datetime not null,
vrsta_boxa varchar(50) not null,
komad_boxa int(2) not null,
tezina decimal(4,1) not null,
djelatnik int not null
);

create table polje(
sifra int not null primary key auto_increment,
naziv varchar(50) not null,
roba int not null

);

create table kooperant(
sifra int not null primary key auto_increment,
ime varchar(50) not null,
ziro_racun char(11) not null,
roba int not null
);

create table djelatnik(
sifra int not null primary key auto_increment,
ime varchar(50) not null,
prezime varchar(50) not null,
funkcija varchar(50)
);

create table operater(
sifra 		int not null primary key auto_increment,
ime 		varchar(50) not null,
prezime 	varchar(50) not null,
email 		varchar(50) not null,
lozinka		char(32) not null,
uloga		varchar(50) not null

);

alter table skladiste add foreign key (djelatnik) references djelatnik(sifra);
alter table komora add foreign key (roba) references roba(sifra);
alter table roba add foreign key (djelatnik) references djelatnik(sifra);
alter table polje add foreign key (roba) references roba(sifra);
alter table kooperant add foreign key (roba) references roba(sifra);

#1
insert into operater(ime,prezime,email,lozinka,uloga)
values	('Ivan','Novak','ivannovak92@yahoo.com',md5('p'),'admin'),
		('Korisnik','','korisnik@korisnik.com',md5('p'),'korisnik');
		
#2
insert into djelatnik(ime,prezime,funkcija)
values	('Marko','Markic','skladistar'),
		('Niko','Nikić','skladistar');

#3
insert into skladiste(ime,vlasnik,lokacija,djelatnik)
values	('Bora','Nikola d.o.o','Knezevi Vinogradi',1),
		('Bora','Nikola d.o.o','Suljoš',2);
		
#4
insert into roba(vrsta_robe,datum_berbe,datum_skladistenja,vrsta_boxa,komad_boxa,tezina,djelatnik)
values	('Jabuka Granny','2016.8.9.','2016.10.10','Box Belje','4','1000,5',1),
		('Jabuka Jonagold','2016.6.6.','2016.7.7','Box Belje','3','700,5',2);

#5
insert into polje(naziv,roba)
values	('A10',1),
		('D1',2);
		
#6 
insert into komora(broj_komore,roba)
values	('10',1),
		('1',2);
		
#7
insert into kooperant(ime,ziro_racun,roba)
values	('Belje','11111111111',1),
		('Tomislav Tomić','22222222222',2);
		


