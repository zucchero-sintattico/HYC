<?php

class DatabaseHelper
{
    private $db;

    public function __construct($servername, $username, $password, $dbname)
    {
        $this->db = new mysqli($servername, $username, $password, $dbname);
        if ($this->db->connect_error) {
            $this->db = new mysqli($servername, $username, "root", $dbname);
            if ($this->db->connect_error) {
                $this->db = new mysqli($servername, $username, "password", $dbname);
                if ($this->db->connect_error) {
                    die("Connection failed: " . $this->db->connect_error);
                }
            }
        }
    }

    public function getLanguages()
    {
        $stmt = $this->db->prepare("SELECT * FROM Linguaggio");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProductByCategory($category)
    {
        $query = "SELECT p.idProd, codice, colore_frame, larghezza,
       titolo, descrizione, altezza, padding, dimensione_font, mostra_numero_linee,
       NomeLinguaggio, NomeTema, Tipo
            FROM prodotto p, prodottoinvetrina pv, categoria c
            WHERE p.IdProd = pv.IdProd
              AND c.IdCategoria = p.IdCategoria
              AND p.IdCategoria = ?";
        $stmt = $this -> db -> prepare($query);
        $stmt -> bind_param("i", $category);
        $stmt -> execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getArticleByName($titolo)
    {
        $query = "SELECT p.idProd, codice, colore_frame, larghezza,
       titolo, descrizione, altezza, padding, dimensione_font, mostra_numero_linee,
       NomeLinguaggio, NomeTema, Tipo
            FROM prodotto p, prodottoinvetrina pv, categoria c
            WHERE p.IdProd = pv.IdProd
              AND titolo LIKE concat('%', ?, '%')";
        $stmt = $this -> db -> prepare($query);
        $stmt -> bind_param('s', $titolo);
        $stmt -> execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

}
/*
    public function getRandomPosts($n){
        $stmt = $this->db->prepare("SELECT idarticolo, titoloarticolo, imgarticolo FROM articolo ORDER BY RAND() LIMIT ?");
        $stmt->bind_param('i',$n);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }


    public function getPosts($n=-1){
        $query = "SELECT idarticolo, titoloarticolo, imgarticolo, anteprimaarticolo, dataarticolo, nome FROM articolo, autore WHERE autore=idautore ORDER BY dataarticolo DESC";
        if($n > 0){
            $query .= " LIMIT ?";
        }
        $stmt = $this->db->prepare($query);
        if($n > 0){
            $stmt->bind_param('i',$n);
        }
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    */


