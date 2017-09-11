drop database if exists skladiste;
create database skladiste default character set utf8;
use skladiste;

create table komora(
sifra int not null primary key auto_increment,
broj_komore char(5) not null,
polje varchar(50)

);

create table komora_roba(
sifra int not null primary key auto_increment,
komora int not null,
roba int not null
);

create table roba(
sifra int not null primary key auto_increment,
vrsta_robe varchar(50) not null,
datum_berbe datetime not null,
datum_skladistenja datetime not null,
vrsta_boxa varchar(50) not null,
komad_boxa int(2) not null


);

create table roba_kooperant(
sifra int not null primary key auto_increment,
roba int not null,
kooperant int not null,
kolicina decimal(4,1) not null
);

create table kooperant(
sifra int not null primary key auto_increment,
ime varchar(50) not null,
ziro_racun char(11) not null

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


alter table komora_roba add foreign key (roba) references roba(sifra);
alter table komora_roba add foreign key (komora) references komora(sifra);


alter table roba_kooperant add foreign key (roba) references roba(sifra);
alter table roba_kooperant add foreign key (kooperant) references kooperant(sifra);

#1
insert into operater(ime,prezime,email,lozinka,uloga)
values	('Ivan','Novak','ivannovak92@yahoo.com',md5('p'),'admin'),
		('Korisnik','','korisnik@korisnik.com',md5('p'),'korisnik');
		
#2
insert into djelatnik(ime,prezime,funkcija)
values	('Marko','Markic','skladistar'),
		('Niko','Nikić','skladistar');

		
#4
insert into roba(vrsta_robe,datum_berbe,datum_skladistenja,vrsta_boxa,komad_boxa)
values	('Jabuka Granny','2016.8.9.','2016.10.10','Box Belje','4'),
		('Jabuka Jonagold','2016.6.6.','2016.7.7','Box Belje','3');


		
#6 
insert into komora(broj_komore,polje)
values	('10','A10'),
		('1','B51');
		
#7
insert into kooperant(ime,ziro_racun)
values	('Belje','11111111111'),
		('Tomislav Tomić','22222222222');
		
insert into roba_kooperant(roba,kooperant,kolicina)
values	(1,1,'1000'),
		(2,2,'2000');
		
		insert into komora_roba(komora,roba)
values	(1,1),
		(2,2);
		


