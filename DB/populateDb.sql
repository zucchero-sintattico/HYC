USE HYC;

INSERT INTO `Categoria` (`Tipo`, `IdCategoria`, `ImgCategoria`)
VALUES ('matematica', NULL, 'matematica.png'), ('fisica', NULL, 'fisica.png'), ('videogiochi', NULL, 'videogiochi.png'), ('spazio', NULL, 'spazio.png');

INSERT INTO `Linguaggio` (`NomeLinguaggio`) VALUES ('clike'), ('python'), ('javascript');

INSERT INTO `Tema` (`NomeTema`) VALUES ('monokai'), ('base16-light');
INSERT INTO `Prodotto` (`IdProd`, `Codice`, `Colore_frame`, `Larghezza`, `Titolo`, `Descrizione`, `Altezza`, `Padding`, `Dimensione_font`, `Mostra_numero_linee`, `NomeLinguaggio`, `IdCategoria`, `NomeTema`) VALUES (NULL, ' k;double sin()\\n\\\r\n ,cos();main(){float A=\\n\\\r\n 0,B=0,i,j,z[1760];char b[\\n\\\r\n 1760];printf(\"\\x1b[2J\");for(;;\\n\\\r\n ){memset(b,32,1760);memset(z,0,7040)\\n\\\r\n ;for(j=0;6.28>j;j+=0.07)for(i=0;6.28\\n\\\r\n >i;i+=0.02){float c=sin(i),d=cos(j),e=\\n\\\r\n sin(A),f=sin(j),g=cos(A),h=d+2,D=1/(c*\\n\\\r\n h*e+f*g+5),l=cos (i),m=cos(B),n=s\\n\\\r\nin(B),t=c*h*g-f* e;int x=40+30*D*\\n\\\r\n(l*h*m-t*n),y= 12+15*D*(l*h*n\\n\\\r\n+t*m),o=x+80*y, N=8*((f*e-c*d*g\\n\\\r\n )*m-c*d*e-f*g-l *d*n);if(22>y&&\\n\\\r\n y>0&&x>0&&80>x&&D>z[o]){z[o]=D;;;b[o]=\\n\\\r\n \".,-~:;=!*#$@\"[N>0?N:0];}}/*#****!!-*/\\n\\\r\n printf(\"\\x1b[H\");for(k=0;1761>k;k++)\\n\\\r\n putchar(k%80?b[k]:10);A+=0.04;B+=\\n\\\r\n 0.02;}}/*****####*******!!=;:~\\n\\\r\n ~::==!!!**********!!!==::-\\n\\\r\n .,~~;;;========;;;:~-.\\n\\\r\n ..,--------,*/', 'red', '150', 'dount code', 'ciambellaaa', '150', '3', '4', '1', 'clike', '3', 'monokai');
INSERT INTO `Prodotto` (`IdProd`, `Codice`, `Colore_frame`, `Larghezza`, `Titolo`, `Altezza`, `Padding`, `Dimensione_font`, `Mostra_numero_linee`, `NomeLinguaggio`, `NomeTema`)
VALUES (NULL, 'let a = 5;', 'red', '100', 'Apollo11', '100', '2', '6', 't', 'javascript', 'base16-light'),
       (NULL, 'int a = 7;', 'blue', '120', 'Donut C-like', '120', '3', '6', 't', 'clike', 'base16-light');

INSERT INTO `ProdottoInVetrina` (`IdProd`, `IndicePopolarita`, `Descrizione`, `IdCategoria`) VALUES ('1', '1', 'Codice C a forma di donut che renderizza donut 3d', '3'), ('2', '2', 'Primo codice usato per navicella','4');