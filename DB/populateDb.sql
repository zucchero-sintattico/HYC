INSERT INTO `categoria` (`Tipo`, `IdCategoria`, `ImgCategoria`) 
VALUES ('matematica', NULL, 'matematica.png'), ('fisica', NULL, 'fisica.png'), ('videogiochi', NULL, 'videogiochi.png'), ('spazio', NULL, 'spazio.png');

INSERT INTO `linguaggio` (`NomeLinguaggio`) VALUES ('clike'), ('python'), ('javascript');

INSERT INTO `tema` (`NomeTema`) VALUES ('monokai'), ('base16-light');

INSERT INTO `prodotto` (`IdProd`, `Codice`, `Colore_frame`, `Larghezza`, `Titolo`, `Descrizione`, `Altezza`, `Padding`, `Dimensione_font`, `Mostra_numero_linee`, `NomeLinguaggio`, `IdCategoria`, `NomeTema`, `IdProdInVetrina`) 
VALUES (NULL, 'let a = 5;', 'red', '10', 'Apollo11', 'Primo codice usato per navicella', '10', '2', '12', 't', 'javascript', '4', 'base16-light', NULL),
 (NULL, 'int a = 7;', 'blue', '12', 'Donut C-like', 'Codice C a forma di donut che renderizza donut 3d', '12', '3', '16', 't', 'clike', '3', 'base16-light', NULL);

INSERT INTO `prodottoinvetrina` (`IdProdInVetrina`, `IdProd`, `IndicePopolarita`) VALUES (NULL, '1', '1'), (NULL, '2', '2');