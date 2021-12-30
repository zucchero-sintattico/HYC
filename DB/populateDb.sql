USE HYC;

INSERT INTO `Categoria` (`Tipo`, `IdCategoria`, `ImgCategoria`)
    VALUES ('matematica', NULL, 'matematica.png'),
           ('fisica', NULL, 'fisica.png'),
           ('videogiochi', NULL, 'videogiochi.png'),
           ('spazio', NULL, 'spazio.png'),
           ('storici', NULL, 'varie.png'),
           ('varie', NULL, 'varie.png');


INSERT INTO `Linguaggio` (`NomeLinguaggio`) VALUES ('clike'), ('python'), ('javascript');


INSERT INTO `Tema` (`NomeTema`) VALUES ('monokai'), ('base16-light');


INSERT INTO `Prodotto` (`IdProd`, `Codice`, `Colore_frame`, `Larghezza`, `Titolo`, `Altezza`, `Padding`, `Dimensione_font`, `Mostra_numero_linee`, `NomeLinguaggio`, `NomeTema`)
    VALUES (NULL, '            `k;double sin()\r\n         ,cos();main(){float A=\r\n       0,B=0,i,j,z[1760];char b[\r\n     1760];printf(\"\\x1b[2J\");for(;;\r\n  ){memset(b,32,1760);memset(z,0,7040)\r\n  ;for(j=0;6.28>j;j+=0.07)for(i=0;6.28\r\n >i;i+=0.02){float c=sin(i),d=cos(j),e=\r\n sin(A),f=sin(j),g=cos(A),h=d+2,D=1/(c*\r\n h*e+f*g+5),l=cos      (i),m=cos(B),n=s\\\r\nin(B),t=c*h*g-f*        e;int x=40+30*D*\r\n(l*h*m-t*n),y=            12+15*D*(l*h*n\r\n+t*m),o=x+80*y,          N=8*((f*e-c*d*g\r\n )*m-c*d*e-f*g-l        *d*n);if(22>y&&\r\n y>0&&x>0&&80>x&&D>z[o]){z[o]=D;;;b[o]=\r\n \".,-~:;=!*#$@\"[N>0?N:0];}}/*#****!!-*/\r\n  printf(\"\\x1b[H\");for(k=0;1761>k;k++)\r\n   putchar(k%80?b[k]:10);A+=0.04;B+=\r\n     0.02;}}/*****####*******!!=;:~\r\n       ~::==!!!**********!!!==::-\r\n         .,~~;;;========;;;:~-.\r\n             ..,--------,*/)`',
            'red', '150', '3D Donut renderer', '150', '3', '4', '1', 'clike', 'monokai');

INSERT INTO `Prodotto` (`IdProd`, `Codice`, `Colore_frame`, `Larghezza`, `Titolo`, `Altezza`, `Padding`, `Dimensione_font`, `Mostra_numero_linee`, `NomeLinguaggio`, `NomeTema`)
    VALUES (NULL, '`\r\n\r\n\r\n\r\n\r\n\r\n\r\nmain(){printf(\\\"hello, world\\\\n\\\");}\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n`',
            'red', '120', 'Hello, World!', '100', '3', '4', '1', 'clike', 'base16-light');

INSERT INTO `Prodotto` (`IdProd`, `Codice`, `Colore_frame`, `Larghezza`, `Titolo`, `Altezza`, `Padding`, `Dimensione_font`, `Mostra_numero_linee`, `NomeLinguaggio`, `NomeTema`)
    VALUES (NULL, '`\r\n\r\n\r\nchar yellow[26] = {"y", "e", "l", "l", "o", "w", "\0"};\r\n\r\n\r\n`',
            'blue', '120', 'The Null-Terminated String', '100', '3', '4', '1', 'clike', 'monokai');

INSERT INTO `Prodotto` (`IdProd`, `Codice`, `Colore_frame`, `Larghezza`, `Titolo`, `Altezza`, `Padding`, `Dimensione_font`, `Mostra_numero_linee`, `NomeLinguaggio`, `NomeTema`)
    VALUES (NULL, '`\r\n\r\n\r\n- return floor(value)\n+ return round(value)\r\n\r\n\r\n`',
            'red', '120', 'The Vancouver Stock Exchange’s Rounding Error', '100', '3', '4', '1', 'clike', 'monokai');

INSERT INTO `Prodotto` (`IdProd`, `Codice`, `Colore_frame`, `Larghezza`, `Titolo`, `Altezza`, `Padding`, `Dimensione_font`, `Mostra_numero_linee`, `NomeLinguaggio`, `NomeTema`)
    VALUES (NULL, '`\r\n\r\n\r\n/join #cats\r\n\r\n\r\n`',
            'red', '120', 'Internet Relay Chat', '100', '3', '4', '1', 'clike', 'monokai');

INSERT INTO `Prodotto` (`IdProd`, `Codice`, `Colore_frame`, `Larghezza`, `Titolo`, `Altezza`, `Padding`, `Dimensione_font`, `Mostra_numero_linee`, `NomeLinguaggio`, `NomeTema`)
    VALUES (NULL, '`double *NaiveDct_transform(double vector[], size_t len) {\n  if (SIZE_MAX / sizeof(double) < len)\n    return NULL;\n  double *result = malloc(len * sizeof(double));\n  if (result == NULL)\n    return NULL;\n\n  double factor = M_PI / len;\n  for (size_t i = 0; i < len; i++) {\n    double sum = 0;\n    for (size_t j = 0; j < len; j++)\n      sum += vector[j] * cos((j + 0.5) * i * factor);\n    result[i] = sum;\n  }\n  return result;\n}`',
            'red', '120', 'Introduction of the JPEG', '100', '3', '4', '1', 'clike', 'monokai');

INSERT INTO `Prodotto` (`IdProd`, `Codice`, `Colore_frame`, `Larghezza`, `Titolo`, `Altezza`, `Padding`, `Dimensione_font`, `Mostra_numero_linee`, `NomeLinguaggio`, `NomeTema`)
VALUES (NULL, '`import numpy as np\n\ndef pagerank(M, num_iterations=100, d=0.85):\n    N = M.shape[1]\n    v = np.random.rand(N, 1)\n    v = v / np.linalg.norm(v, 1)\n    iteration = 0\n    while iteration < num_iterations:\n        iteration += 1\n        v = d * np.matmul(M, v) + (1 - d) / N\n    return v`',
        'red', '120', 'Google’s PageRank Algorithm', '100', '3', '4', '1', 'python', 'monokai');

INSERT INTO `Prodotto` (`IdProd`, `Codice`, `Colore_frame`, `Larghezza`, `Titolo`, `Altezza`, `Padding`, `Dimensione_font`, `Mostra_numero_linee`, `NomeLinguaggio`, `NomeTema`)
VALUES (NULL, '`JSFX.FireSpark.prototype.changeColour = function()\n{\n  var colour="";\n\n  r2= Math.random()*255;\n  g2= r2;\n  b2= 0;\n\n  if(!(r2 | g2 | b2))\n  {\n    r2=255;\n    g2=255;\n    b2=0;\n  }\n\n  colour = "#" + dec2hex(r2) + dec2hex(g2) + dec2hex(b2);\n  this.setBgColor(colour);\n}`',
        'red', '120', 'GeoCities Mouse Trails', '100', '3', '4', '1', 'javascript', 'monokai');



INSERT INTO `ProdottoInVetrina` (`IdProdInVetrina`, `IdProd`, `IndicePopolarita`, `Descrizione`, `IdCategoria`)
    VALUES (NULL, '1', '4', 'Donut shaped C code that renders\na 3D donut in the terminal', '6');

INSERT INTO `ProdottoInVetrina` (`IdProdInVetrina`, `IdProd`, `IndicePopolarita`, `Descrizione`, `IdCategoria`)
    VALUES (NULL, '3', '4', '1972: The most catastrophic design bug in the history of computing', '5');

INSERT INTO `ProdottoInVetrina` (`IdProdInVetrina`, `IdProd`, `IndicePopolarita`, `Descrizione`, `IdCategoria`)
    VALUES (NULL, '2', '3', 'The phrase that has introduced generations to code', '5');

INSERT INTO `ProdottoInVetrina` (`IdProdInVetrina`, `IdProd`, `IndicePopolarita`, `Descrizione`, `IdCategoria`)
    VALUES (NULL, '4', '3', 'In early 1982, the Vancouver Stock Exchange unveiled an electronic\nstock index initially pegged to a value of 1,000 points. In two years\nit dropped to half its original value—a confusing trend amid the bull\nmarket of the early 1980s. An investigation revealed that the\ncalculations of the index were wrong in just one command, using\nfloor() rather than round(). This command meant that instead of\nrounding to the third decimal place, the value was being truncated'
    , '5');

INSERT INTO `ProdottoInVetrina` (`IdProdInVetrina`, `IdProd`, `IndicePopolarita`, `Descrizione`, `IdCategoria`)
VALUES (NULL, '5', '3', 'Internet Relay Chat, better known as IRC, began before most people\ncould even tell you what an internet is. In the 1980s It was the first\npopular way to chat in real time with other people in a group channel'
, '5');

INSERT INTO `ProdottoInVetrina` (`IdProdInVetrina`, `IdProd`, `IndicePopolarita`, `Descrizione`, `IdCategoria`)
VALUES (NULL, '6', '3', 'In 1992, the Joint Photographic Experts Group published specifications\nfor a standard—the JPEG—to make image files smaller. Though other\ncompression formats were available at the time, the JPEG became the\nworldwide standard, in part because it was royalty-free',
        '5');

INSERT INTO `ProdottoInVetrina` (`IdProdInVetrina`, `IdProd`, `IndicePopolarita`, `Descrizione`, `IdCategoria`)
VALUES (NULL, '7', '3', 'In 1996 Google revolutionized the way we organize knowledge', '6');

INSERT INTO `ProdottoInVetrina` (`IdProdInVetrina`, `IdProd`, `IndicePopolarita`, `Descrizione`, `IdCategoria`)
VALUES (NULL, '8', '3', 'In the mid-1990s, GeoCities was the first service to offer\nusers a free and easy way to create their own web content', '5');
