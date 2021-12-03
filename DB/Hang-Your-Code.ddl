-- *********************************************
-- * Standard SQL generation                   
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.1              
-- * Generator date: Dec  4 2018              
-- * Generation date: Fri Dec  3 17:20:04 2021 
-- * LUN file: C:\Users\Stefano\Downloads\Hang-Your-Code.lun 
-- * Schema: logico3/SQL 
-- ********************************************* 


-- Database Section
-- ________________ 

create database HYC;


-- DBSpace Section
-- _______________


-- Tables Section
-- _____________ 

create table Carrello (
     IdCarrello int not null AUTO_INCREMENT,
     constraint ID_Carrello_ID primary key (IdCarrello));

create table Ordine (
     idOrdine int not null AUTO_INCREMENT,
     IdCarrello int not null,
     Data date not null,
     Stato char(1) not null,
     constraint ID_Ordine_ID primary key (idOrdine),
     constraint SID_Ordin_Carre_ID unique (IdCarrello));

create table Prodotto (
     idProd int not null AUTO_INCREMENT,
     codice varchar(150) not null,
     colore_frame varchar(1) not null,
     larghezza int not null,
     titolo varchar(40) not null,
     descrizione varchar(100),
     altezza int not null,
     padding int not null,
     dimensione_font int not null,
     mostra_numero_linee char not null,
     NomeLinguaggio varchar(40) not null,
     IdCategoria int not null,
     NomeTema varchar(40) not null,
     IdProdInVetrina int,
     constraint ID_Prodotto_ID primary key (idProd));

create table Spedizione (
     idSpedizione int not null AUTO_INCREMENT,
     idOrdine int not null,
     StatoSpedizione char(1) not null,
     DataInvio date not null,
     DataConsegna date not null,
     constraint ID_Spedizione_ID primary key (idSpedizione),
     constraint SID_Spedi_Ordin_ID unique (idOrdine));

create table Categoria (
     Tipo varchar(40) not null,
     IdCategoria int not null AUTO_INCREMENT,
     constraint ID_Categoria_ID primary key (IdCategoria));

create table Linguaggio (
     NomeLinguaggio varchar(40) not null,
     constraint ID_Linguaggio_ID primary key (NomeLinguaggio));

create table Tema (
     NomeTema varchar(40) not null,
     constraint ID_Tema_ID primary key (NomeTema));

create table ProdottoInVetrina (
     IdProdInVetrina int not null AUTO_INCREMENT,
     idProd int not null,
     IndicePopolarita int not null,
     constraint ID_ProdottoInVetrina_ID primary key (IdProdInVetrina),
     constraint SID_Prodo_Prodo_ID unique (idProd));

create table ProdottoInCarrello (
     IdCarrello int not null AUTO_INCREMENT,
     idProd int not null,
     constraint ID_ProdottoInCarrello_ID primary key (IdCarrello, idProd));

create table Utente (
     idUser int not null AUTO_INCREMENT,
     IdCarrello int not null,
     Nome varchar(40) not null,
     Cognome varchar(40) not null,
     Username varchar(40) not null,
     Email varchar(40) not null,
     Password varchar(40) not null,
     constraint ID_Utente_ID primary key (idUser),
     constraint SID_Utent_Carre_ID unique (IdCarrello));


-- Constraints Section
-- ___________________ 

alter table Ordine add constraint SID_Ordin_Carre_FK
     foreign key (IdCarrello)
     references Carrello(IdCarrello);

alter table Prodotto add constraint REF_Prodo_Lingu_FK
     foreign key (NomeLinguaggio)
     references Linguaggio(NomeLinguaggio);

alter table Prodotto add constraint REF_Prodo_Categ_FK
     foreign key (IdCategoria)
     references Categoria(IdCategoria);

alter table Prodotto add constraint REF_Prodo_Tema_FK
     foreign key (NomeTema)
     references Tema(NomeTema);

alter table Spedizione add constraint SID_Spedi_Ordin_FK
     foreign key (idOrdine)
     references Ordine(idOrdine);

alter table ProdottoInVetrina add constraint SID_Prodo_Prodo_FK
     foreign key (idProd)
     references Prodotto(idProd);

alter table ProdottoInCarrello add constraint REF_Prodo_Prodo_FK
     foreign key (idProd)
     references Prodotto(idProd);

alter table ProdottoInCarrello add constraint REF_Prodo_Carre
     foreign key (IdCarrello)
     references Carrello(IdCarrello);

alter table Utente add constraint SID_Utent_Carre_FK
     foreign key (IdCarrello)
     references Carrello(IdCarrello);


-- Index Section
-- _____________ 

create unique index ID_Carrello_IND
     on Carrello (IdCarrello);

create unique index ID_Ordine_IND
     on Ordine (idOrdine);

create unique index SID_Ordin_Carre_IND
     on Ordine (IdCarrello);

create unique index ID_Prodotto_IND
     on Prodotto (idProd);

create index REF_Prodo_Lingu_IND
     on Prodotto (NomeLinguaggio);

create index REF_Prodo_Categ_IND
     on Prodotto (IdCategoria);

create index REF_Prodo_Tema_IND
     on Prodotto (NomeTema);

create unique index ID_Spedizione_IND
     on Spedizione (idSpedizione);

create unique index SID_Spedi_Ordin_IND
     on Spedizione (idOrdine);

create unique index ID_Categoria_IND
     on Categoria (IdCategoria);

create unique index ID_Linguaggio_IND
     on Linguaggio (NomeLinguaggio);

create unique index ID_Tema_IND
     on Tema (NomeTema);

create unique index ID_ProdottoInVetrina_IND
     on ProdottoInVetrina (IdProdInVetrina);

create unique index SID_Prodo_Prodo_IND
     on ProdottoInVetrina (idProd);

create unique index ID_ProdottoInCarrello_IND
     on ProdottoInCarrello (IdCarrello, idProd);

create index REF_Prodo_Prodo_IND
     on ProdottoInCarrello (idProd);

create unique index ID_Utente_IND
     on Utente (idUser);

create unique index SID_Utent_Carre_IND
     on Utente (IdCarrello);

