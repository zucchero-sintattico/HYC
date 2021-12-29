USE HYC;

INSERT INTO `Categoria` (`Tipo`, `IdCategoria`, `ImgCategoria`)
VALUES ('matematica', NULL, 'matematica.png'), ('fisica', NULL, 'fisica.png'), ('videogiochi', NULL, 'videogiochi.png'), ('spazio', NULL, 'spazio.png');

INSERT INTO `Linguaggio` (`NomeLinguaggio`) VALUES ('clike'), ('python'), ('javascript');

INSERT INTO `Tema` (`NomeTema`) VALUES ('monokai'), ('base16-light');

INSERT INTO `Prodotto` (`IdProd`, `Codice`, `Colore_frame`, `Larghezza`, `Titolo`, `Altezza`, `Padding`, `Dimensione_font`, `Mostra_numero_linee`, `NomeLinguaggio`, `NomeTema`) VALUES (NULL, '            `k;double sin()\r\n         ,cos();main(){float A=\r\n       0,B=0,i,j,z[1760];char b[\r\n     1760];printf(\"\\x1b[2J\");for(;;\r\n  ){memset(b,32,1760);memset(z,0,7040)\r\n  ;for(j=0;6.28>j;j+=0.07)for(i=0;6.28\r\n >i;i+=0.02){float c=sin(i),d=cos(j),e=\r\n sin(A),f=sin(j),g=cos(A),h=d+2,D=1/(c*\r\n h*e+f*g+5),l=cos      (i),m=cos(B),n=s\\\r\nin(B),t=c*h*g-f*        e;int x=40+30*D*\r\n(l*h*m-t*n),y=            12+15*D*(l*h*n\r\n+t*m),o=x+80*y,          N=8*((f*e-c*d*g\r\n )*m-c*d*e-f*g-l        *d*n);if(22>y&&\r\n y>0&&x>0&&80>x&&D>z[o]){z[o]=D;;;b[o]=\r\n \".,-~:;=!*#$@\"[N>0?N:0];}}/*#****!!-*/\r\n  printf(\"\\x1b[H\");for(k=0;1761>k;k++)\r\n   putchar(k%80?b[k]:10);A+=0.04;B+=\r\n     0.02;}}/*****####*******!!=;:~\r\n       ~::==!!!**********!!!==::-\r\n         .,~~;;;========;;;:~-.\r\n             ..,--------,*/)`', 'red', '150', 'ciambella', '150', '3', '4', '1', 'clike', 'monokai');
INSERT INTO `Prodotto` (`IdProd`, `Codice`, `Colore_frame`, `Larghezza`, `Titolo`, `Altezza`, `Padding`, `Dimensione_font`, `Mostra_numero_linee`, `NomeLinguaggio`, `NomeTema`) VALUES (NULL, '`\r\n\r\n\r\n\r\n\r\n\r\n\r\nmain(){printf(\\\"hello, world\\\\n\\\");}\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n`', 'red', '120', 'Hello, World!', '100', '3', '4', '1', 'clike', 'base16-light');
INSERT INTO `ProdottoInVetrina` (`IdProdInVetrina`, `IdProd`, `IndicePopolarita`, `Descrizione`, `IdCategoria`) VALUES (NULL, '1', '4', 'ciambelloneee', '3');
INSERT INTO `ProdottoInVetrina` (`IdProdInVetrina`, `IdProd`, `IndicePopolarita`, `Descrizione`, `IdCategoria`) VALUES (NULL, '2', '3', 'Date: 1972 or earlier\r\nThe phrase that has introduced generations to code', '1');