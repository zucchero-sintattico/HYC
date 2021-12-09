<?php
    $key=$_GET['key'];
    $array = array();
    $con=mysqli_connect("localhost","root","","HYC");
    $query=mysqli_query($con, "SELECT p.idProd, codice, 
        colore_frame, larghezza, titolo, descrizione, altezza, padding, dimensione_font,
        mostra_numero_linee, NomeLinguaggio, NomeTema, Tipo 
        FROM Prodotto p, ProdottoInVetrina pv, Categoria c 
        WHERE p.IdProd = pv.IdProd 
        AND titolo LIKE concat('%', $['key'], '%')");
    while($row=mysqli_fetch_assoc($query))
    {
        $array[] = $row['idProd'];
    }
    echo json_encode($array);