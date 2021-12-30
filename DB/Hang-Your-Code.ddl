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

create
database HYC;
use
HYC;


-- DBSpace Section
-- _______________


-- Tables Section
-- _____________

create table Carrello
(
    IdCarrello int not null AUTO_INCREMENT,
    IdUtente int         not null,
    constraint ID_Carrello_ID primary key (IdCarrello)
);

create table Ordine
(
    IdOrdine   int     not null AUTO_INCREMENT,
    IdCarrello int     not null,
    Data       date    not null,
    Stato      char(1) not null,
    constraint ID_Ordine_ID primary key (IdOrdine),
    constraint SID_Ordin_Carre_ID unique (IdCarrello)
);

create table Notifica
(
    IdNotifica   int     not null AUTO_INCREMENT,
    TipoNotifica    varchar (15)    not null,
    Data       date    not null,
    Descrizione      varchar(100) not null,
    IdUtente    int     not null,
    Letto   INT not null,
    constraint ID_Notifica_ID primary key (IdNotifica)
);

create table Prodotto
(
    IdProd              int          not null AUTO_INCREMENT,
    Codice              varchar(1500) not null,
    Colore_frame        varchar(10)   not null,
    Larghezza           int          not null,
    Titolo              varchar(40)  not null,

    Altezza             int          not null,
    Padding             int          not null,
    Dimensione_font     int          not null,
    Mostra_numero_linee char         not null,
    NomeLinguaggio      varchar(40)  not null,

    NomeTema            varchar(40)  not null,
    constraint ID_Prodotto_ID primary key (IdProd)
);

create table Spedizione
(
    IdSpedizione    int     not null AUTO_INCREMENT,
    IdOrdine        int     not null,
    StatoSpedizione char(1) not null,
    DataInvio       date    not null,
    DataConsegna    date    not null,
    constraint ID_Spedizione_ID primary key (IdSpedizione),
    constraint SID_Spedi_Ordin_ID unique (IdOrdine)
);

create table Categoria
(
    Tipo        varchar(40) not null,
    IdCategoria int         not null AUTO_INCREMENT,
    ImgCategoria varchar(30) not null,
    constraint ID_Categoria_ID primary key (IdCategoria)
);

create table Linguaggio
(
    NomeLinguaggio varchar(40) not null,
    constraint ID_Linguaggio_ID primary key (NomeLinguaggio)
);

create table Tema
(
    NomeTema varchar(40) not null,
    constraint ID_Tema_ID primary key (NomeTema)
);

create table ProdottoInVetrina
(
    IdProdInVetrina  int not null AUTO_INCREMENT,
    IdProd           int not null,
    IndicePopolarita int not null,
    Descrizione         varchar(100),
    IdCategoria         int          not null,
    constraint ID_ProdottoInVetrina_ID primary key (IdProdInVetrina),
    constraint SID_Prodo_Prodo_ID unique (IdProd)
);

create table ProdottoInCarrello
(
    IdCarrello int not null AUTO_INCREMENT,
    IdProd     int not null,
    Quantità int DEFAULT 1,
    constraint ID_ProdottoInCarrello_ID primary key (IdCarrello, IdProd)
);

create table Utente
(
    IdUtente     int         not null AUTO_INCREMENT,
    Nome       varchar(40) not null,
    Cognome    varchar(40) not null,
    Username   varchar(40) not null,
    Email      varchar(40) not null,
    Password   varchar(40) not null,
    IsAdmin bit default 0,
    constraint ID_Utente_ID primary key (IdUtente)
);


-- Constraints Section
-- ___________________

alter table Ordine
    add constraint SID_Ordin_Carre_FK
        foreign key (IdCarrello)
            references Carrello (IdCarrello);

alter table Notifica
    add constraint SID_Notifica_Utente_FK
        foreign key (IdUtente)
            references Utente (IdUtente);

alter table Prodotto
    add constraint REF_Prodo_Lingu_FK
        foreign key (NomeLinguaggio)
            references Linguaggio (NomeLinguaggio);

alter table ProdottoInVetrina
    add constraint REF_Prodo_Categ_FK
        foreign key (IdCategoria)
            references Categoria (IdCategoria);

alter table Prodotto
    add constraint REF_Prodo_Tema_FK
        foreign key (NomeTema)
            references Tema (NomeTema);

alter table Spedizione
    add constraint SID_Spedi_Ordin_FK
        foreign key (IdOrdine)
            references Ordine (IdOrdine);

alter table ProdottoInVetrina
    add constraint SID_Prodo_Prodo_FK
        foreign key (IdProd)
            references Prodotto (idProd);

alter table ProdottoInCarrello
    add constraint REF_Prodo_Prodo_FK
        foreign key (IdProd)
            references Prodotto (IdProd);

alter table ProdottoInCarrello
    add constraint REF_Prodo_Carre
        foreign key (IdCarrello)
            references Carrello (IdCarrello);

alter table Carrello
    add constraint SID_Carre_Utent_FK
        foreign key (IdUtente)
            references Utente (IdUtente);


-- Index Section
-- _____________

create unique index ID_Carrello_IND
    on Carrello (IdCarrello);

create unique index ID_Ordine_IND
    on Ordine (IdOrdine);

create unique index SID_Ordin_Carre_IND
    on Ordine (IdCarrello);

create unique index ID_Notifica_IND
    on Notifica (IdNotifica);

create index REF_Notifica_Utente_IND
    on Notifica (IdUtente);

create unique index ID_Prodotto_IND
    on Prodotto (IdProd);

create index REF_Prodo_Lingu_IND
    on Prodotto (NomeLinguaggio);

create index REF_Prodo_Categ_IND
    on ProdottoInVetrina (IdCategoria);

create index REF_Prodo_Tema_IND
    on Prodotto (NomeTema);

create unique index ID_Spedizione_IND
    on Spedizione (IdSpedizione);

create unique index SID_Spedi_Ordin_IND
    on Spedizione (IdOrdine);

create unique index ID_Categoria_IND
    on Categoria (IdCategoria);

create unique index ID_Linguaggio_IND
    on Linguaggio (NomeLinguaggio);

create unique index ID_Tema_IND
    on Tema (NomeTema);

create unique index ID_ProdottoInVetrina_IND
    on ProdottoInVetrina (IdProdInVetrina);

create unique index SID_Prodo_Prodo_IND
    on ProdottoInVetrina (IdProd);

create unique index ID_ProdottoInCarrello_IND
    on ProdottoInCarrello (IdCarrello, IdProd);

create index REF_Prodo_Prodo_IND
    on ProdottoInCarrello (IdProd);

create unique index ID_Utente_IND
    on Utente (IdUtente);


