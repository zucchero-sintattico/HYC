USE HYC;

INSERT INTO `Categoria` (`Tipo`, `IdCategoria`, `ImgCategoria`)
    VALUES ('matematica', NULL, 'matematica.png'),
           ('fisica', NULL, 'fisica.png'),
           ('videogiochi', NULL, 'videogiochi.png'),
           ('spazio', NULL, 'spazio.png'),
           ('storici', NULL, 'varie.png'),
           ('varie', NULL, 'varie.png');


INSERT INTO `Linguaggio` (`NomeLinguaggio`) VALUES ('clike'), ('python'), ('javascript'), ('z80'), ('htmlmixed');


INSERT INTO `Tema` (`NomeTema`) VALUES ('3024-day'),('3024-night'),('abcdef'),('ambiance-mobile'),
                                       ('ambiance'),('ayu-dark'),('ayu-mirage'),('base16-dark'),('base16-light'),
                                       ('bespin'),('blackboard'),('cobalt'),('colorforth'),('darcula'),('dracula'),('eclipse'),('elegant'),
                                       ('erlang-dark'),('gruvbox-dark'),('hopscotch'),('icecoder'),('idea'),('isotope'),
                                       ('lesser-dark'),('liquibyte'),('lucario'),('material-darker'),
                                       ('material-ocean'),('material-palenight'),('material'),('mbo'),('mdn-like'),
                                       ('midnight'),('monokai'),('moxer'),('neat'),('neo'),('night'),('nord'),('oceanic-next'),
                                       ('panda-syntax'),('paraiso-dark'),('paraiso-light'),('pastel-on-dark'),('railscasts'),
                                       ('rubyblue'),('seti'),('shadowfox'),('solarized'),('ssms'),('the-matrix'),('tomorrow-night-bright'),
                                       ('tomorrow-night-eighties'),('ttcn'),('twilight'),('vibrant-ink'),('xq-dark'),('xq-light'),
                                       ('yeti'),('yonce'),('zenburn');


INSERT INTO `Prodotto` (`IdProd`, `Codice`, `Colore_frame`, `Larghezza`, `Titolo`, `Altezza`, `Padding`, `Dimensione_font`, `Mostra_numero_linee`, `NomeLinguaggio`, `NomeTema`)
    VALUES (NULL, '`            k;double sin()\r\n         ,cos();main(){float A=\r\n       0,B=0,i,j,z[1760];char b[\r\n     1760];printf(\"\\x1b[2J\");for(;;\r\n  ){memset(b,32,1760);memset(z,0,7040)\r\n  ;for(j=0;6.28>j;j+=0.07)for(i=0;6.28\r\n >i;i+=0.02){float c=sin(i),d=cos(j),e=\r\n sin(A),f=sin(j),g=cos(A),h=d+2,D=1/(c*\r\n h*e+f*g+5),l=cos      (i),m=cos(B),n=s\r\nin(B),t=c*h*g-f*        e;int x=40+30*D*\r\n(l*h*m-t*n),y=            12+15*D*(l*h*n\r\n+t*m),o=x+80*y,          N=8*((f*e-c*d*g\r\n )*m-c*d*e-f*g-l        *d*n);if(22>y&&\r\n y>0&&x>0&&80>x&&D>z[o]){z[o]=D;;;b[o]=\r\n \".,-~:;=!*#$@\"[N>0?N:0];}}/*#****!!-*/\r\n  printf(\"\\x1b[H\");for(k=0;1761>k;k++)\r\n   putchar(k%80?b[k]:10);A+=0.04;B+=\r\n     0.02;}}/*****####*******!!=;:~\r\n       ~::==!!!**********!!!==::-\r\n         .,~~;;;========;;;:~-.\r\n             ..,--------,*/)`',
            'red', '150', '3D Donut renderer', '150', '3', '4', '1', 'clike', 'midnight');

INSERT INTO `Prodotto` (`IdProd`, `Codice`, `Colore_frame`, `Larghezza`, `Titolo`, `Altezza`, `Padding`, `Dimensione_font`, `Mostra_numero_linee`, `NomeLinguaggio`, `NomeTema`)
    VALUES (NULL, '`\r\n\r\n\r\n\r\n\r\n\r\n\r\nmain(){printf(\\\"hello, world\\\\n\\\");}\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n`',
            'red', '120', 'Hello, World!', '100', '3', '4', '1', 'clike', 'blackboard');

INSERT INTO `Prodotto` (`IdProd`, `Codice`, `Colore_frame`, `Larghezza`, `Titolo`, `Altezza`, `Padding`, `Dimensione_font`, `Mostra_numero_linee`, `NomeLinguaggio`, `NomeTema`)
    VALUES (NULL, '`\r\n\r\n\r\nchar yellow[26] = {"y", "e", "l", "l", "o", "w", "\0"};\r\n\r\n\r\n`',
            'blue', '120', 'The Null-Terminated String', '100', '3', '4', '1', 'clike', 'icecoder');

INSERT INTO `Prodotto` (`IdProd`, `Codice`, `Colore_frame`, `Larghezza`, `Titolo`, `Altezza`, `Padding`, `Dimensione_font`, `Mostra_numero_linee`, `NomeLinguaggio`, `NomeTema`)
    VALUES (NULL, '`\r\n\r\n\r\n- return floor(value)\n+ return round(value)\r\n\r\n\r\n`',
            'red', '120', 'The Vancouver Stock Exchange’s Rounding Error', '100', '3', '4', '1', 'clike', 'monokai');

INSERT INTO `Prodotto` (`IdProd`, `Codice`, `Colore_frame`, `Larghezza`, `Titolo`, `Altezza`, `Padding`, `Dimensione_font`, `Mostra_numero_linee`, `NomeLinguaggio`, `NomeTema`)
    VALUES (NULL, '`\r\n\r\n\r\n/join #cats\r\n\r\n\r\n`',
            'red', '120', 'Internet Relay Chat', '100', '3', '4', '1', 'clike', 'moxer');

INSERT INTO `Prodotto` (`IdProd`, `Codice`, `Colore_frame`, `Larghezza`, `Titolo`, `Altezza`, `Padding`, `Dimensione_font`, `Mostra_numero_linee`, `NomeLinguaggio`, `NomeTema`)
    VALUES (NULL, '`double *NaiveDct_transform(double vector[], size_t len) {\n  if (SIZE_MAX / sizeof(double) < len)\n    return NULL;\n  double *result = malloc(len * sizeof(double));\n  if (result == NULL)\n    return NULL;\n\n  double factor = M_PI / len;\n  for (size_t i = 0; i < len; i++) {\n    double sum = 0;\n    for (size_t j = 0; j < len; j++)\n      sum += vector[j] * cos((j + 0.5) * i * factor);\n    result[i] = sum;\n  }\n  return result;\n}`',
            'red', '120', 'Introduction of the JPEG', '100', '3', '4', '1', 'clike', 'the-matrix');

INSERT INTO `Prodotto` (`IdProd`, `Codice`, `Colore_frame`, `Larghezza`, `Titolo`, `Altezza`, `Padding`, `Dimensione_font`, `Mostra_numero_linee`, `NomeLinguaggio`, `NomeTema`)
VALUES (NULL, '`import numpy as np\n\ndef pagerank(M, num_iterations=100, d=0.85):\n    N = M.shape[1]\n    v = np.random.rand(N, 1)\n    v = v / np.linalg.norm(v, 1)\n    iteration = 0\n    while iteration < num_iterations:\n        iteration += 1\n        v = d * np.matmul(M, v) + (1 - d) / N\n    return v`',
        'red', '120', 'Google’s PageRank Algorithm', '100', '3', '4', '1', 'python', 'yeti');

INSERT INTO `Prodotto` (`IdProd`, `Codice`, `Colore_frame`, `Larghezza`, `Titolo`, `Altezza`, `Padding`, `Dimensione_font`, `Mostra_numero_linee`, `NomeLinguaggio`, `NomeTema`)
VALUES (NULL, '`JSFX.FireSpark.prototype.changeColour = function()\n{\n  var colour="";\n\n  r2= Math.random()*255;\n  g2= r2;\n  b2= 0;\n\n  if(!(r2 | g2 | b2))\n  {\n    r2=255;\n    g2=255;\n    b2=0;\n  }\n\n  colour = "#" + dec2hex(r2) + dec2hex(g2) + dec2hex(b2);\n  this.setBgColor(colour);\n}`',
        'red', '120', 'GeoCities Mouse Trails', '100', '3', '4', '1', 'javascript', 'railscasts');

INSERT INTO `Prodotto` (`IdProd`, `Codice`, `Colore_frame`, `Larghezza`, `Titolo`, `Altezza`, `Padding`, `Dimensione_font`, `Mostra_numero_linee`, `NomeLinguaggio`, `NomeTema`)
VALUES (NULL, '`hp1,  dap hp2\ncount i ma1, hp2\nlaw hp3    / next step\ndac i ml1\nlaw 7\ndac i mb1\nrandom\nscr 9s\nsir 9s\nxct hr1\nadd i mx1\ndac i mx1\nswap\nadd i my1\ndac i my1\nrandom\nscr 9s\nsir 9s\nxct hr2\ndac i mdy\ndio i mdx\nsetup .hpt,3\nlac ran\ndac i mth\nhp4,  lac i mth\nsma\nsub (311040\nspa\nadd (311040\ndac i mth\ncount .hpt,hp4\nxct hd2\ndac i ma1\nhp2,  jmp .`',
        'red', '100', 'Spacewar!', '170', '3', '3', '1', 'z80', 'ttcn');

INSERT INTO `Prodotto` (`IdProd`, `Codice`, `Colore_frame`, `Larghezza`, `Titolo`, `Altezza`, `Padding`, `Dimensione_font`, `Mostra_numero_linee`, `NomeLinguaggio`, `NomeTema`)
VALUES (NULL, '`POODOO    INHINT\nCA  Q\nTS  ALMCADR\n\nTC  BANKCALL\nCADR  VAC5STOR  # STORE ERASABLES FOR DEBUGGING PURPOSES.\n\nINDEX  ALMCADR\nCAF  0\nABORT2    TC  BORTENT\n\nOCT77770  OCT  77770    # DONT MOVE\nCA  V37FLBIT  # IS AVERAGE G ON\nMASKFLAGWRD7\nCCS  A\nTC  WHIMPER -1  # YES.  DONT DO POODOO.  DO BAILOUT.\n\nTC  DOWNFLAG\nADRES  STATEFLG\n\nTCDOWNFLAG\nADRES  REINTFLG\n\nTC  DOWNFLAG\nADRES  NODOFLAG\n\nTC  BANKCALL\nCADR  MR.KLEAN\nTC  WHIMPER`',
        'red', '120', 'Apollo 11 Lunar Module’s BAILOUT Code', '170', '3', '3', '1', 'z80', 'liquibyte');

INSERT INTO `Prodotto` (`IdProd`, `Codice`, `Colore_frame`, `Larghezza`, `Titolo`, `Altezza`, `Padding`, `Dimensione_font`, `Mostra_numero_linee`, `NomeLinguaggio`, `NomeTema`)
VALUES (NULL, '`\n\n\n\n\n<a href = "https://www.slate.com">Slate</a>\n\n\n\n\n`',
        'red', '170', 'The HTML Hyperlink', '100', '3', '5', '1', 'htmlmixed', '3024-night');



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

INSERT INTO `ProdottoInVetrina` (`IdProdInVetrina`, `IdProd`, `IndicePopolarita`, `Descrizione`, `IdCategoria`)
VALUES (NULL, '9', '6', 'In late 1961 a group of young MIT employees, students, and associates (many of them members of the Tech Model Railroad Club) gained late-night access to a recently donated DEC PDP-1 computer.  Over the course of five months, these programmers created a game in which two players control spaceships—the needle and the wedge—that engage in a one-on-one space battle while avoiding the gravity well of a star at center screen.'
        , '3');

INSERT INTO `ProdottoInVetrina` (`IdProdInVetrina`, `IdProd`, `IndicePopolarita`, `Descrizione`, `IdCategoria`)
VALUES (NULL, '10', '6', '1969: The code that kept the lunar module’s computer from running out of space in space.\nThat limited power and storage space meant that tasks had to be carefully managed so the AGC was always focused on the most important jobs. If it ran out of space to perform tasks, that wouldn’t happen. The AGC software team knew there were eventualities they couldn’t plan for. So they created BAILOUT. When the computer was at risk of running out of space (or “overflow”), the AGC triggered BAILOUT to schedule less important data and operations so it could keep the vital ones up and running.'
       , '4');

INSERT INTO `ProdottoInVetrina` (`IdProdInVetrina`, `IdProd`, `IndicePopolarita`, `Descrizione`, `IdCategoria`)
VALUES (NULL, '11', '6', 'In 1990 Tim Berners-Lee changed the world when he introduced the hyperlink, a snippet of code that lets anyone jump across the World Wide Web.'
       , '5');
