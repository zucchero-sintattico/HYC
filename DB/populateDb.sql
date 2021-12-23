USE HYC;

INSERT INTO `Categoria` (`Tipo`, `IdCategoria`, `ImgCategoria`)
VALUES ('matematica', NULL, 'matematica.png'), ('fisica', NULL, 'fisica.png'), ('videogiochi', NULL, 'videogiochi.png'), ('spazio', NULL, 'spazio.png');

INSERT INTO `Linguaggio` (`NomeLinguaggio`) VALUES ('clike'), ('python'), ('javascript');

INSERT INTO `Tema` (`NomeTema`) VALUES ('monokai'), ('base16-light');

INSERT INTO `Prodotto` (`IdProd`, `Codice`, `Colore_frame`, `Larghezza`, `Titolo`, `Altezza`, `Padding`, `Dimensione_font`, `Mostra_numero_linee`, `NomeLinguaggio`, `NomeTema`)
VALUES (NULL, 'let a = 5;', 'red', '100', 'Apollo11', '100', '2', '6', 't', 'javascript', 'base16-light'),
       (NULL, 'int a = 7;', 'blue', '120', 'Donut C-like', '120', '3', '6', 't', 'clike', 'base16-light');

INSERT INTO `ProdottoInVetrina` (`IdProd`, `IndicePopolarita`, `Descrizione`, `IdCategoria`) VALUES ('1', '1', 'Codice C a forma di donut che renderizza donut 3d', '3'), ('2', '2', 'Primo codice usato per navicella','4');