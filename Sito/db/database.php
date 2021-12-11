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

    public function getCategorie()
    {
        $stmt = $this->db->prepare("SELECT Tipo, IdCategoria,ImgCategoria  FROM Categoria");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getMostPopularProducts($n)
    {
        $query = "        SELECT * FROM Prodotto, ProdottoInVetrina 
                        WHERE Prodotto.IdProd = ProdottoInVetrina.IdProd
                        ORDER BY ProdottoInVetrina.IndicePopolarita DESC
                        LIMIT ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $n);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getThemes()
    {
        $stmt = $this->db->prepare("SELECT * FROM Tema");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProductByCategory($category)
    {
        $query = "SELECT p.IdProd, Codice, Colore_frame, Larghezza,
       Titolo, Descrizione, Altezza, Padding, Dimensione_font, Mostra_numero_linee,
       NomeLinguaggio, NomeTema, Tipo
            FROM Prodotto p, ProdottoInVetrina pv, Categoria c
            WHERE p.IdProd = pv.IdProd
              AND c.IdCategoria = p.IdCategoria
              AND p.IdCategoria = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $category);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getArticleByName($Titolo)
    {
        $query = "SELECT p.IdProd, Codice, Colore_frame, Larghezza, Titolo, Descrizione, Altezza, Padding, Dimensione_font,
        Mostra_numero_linee, NomeLinguaggio, NomeTema, Tipo 
        FROM Prodotto p, ProdottoInVetrina pv, Categoria c 
        WHERE p.IdProd = pv.IdProd 
        AND Titolo LIKE concat('%', ?, '%')";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $Titolo);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getArticleByLanguage($language)
    {
        $query = "SELECT p.IdProd, Codice, Colore_frame, Larghezza, Titolo, Descrizione, Altezza, Padding, Dimensione_font, Mostra_numero_linee, NomeLinguaggio, NomeTema 
        FROM Prodotto p, ProdottoInVetrina pv 
        WHERE p.IdProd = pv.IdProd 
          AND NomeLinguaggio = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $language);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getArticleInCart($idUser)
    {
        $query = "SELECT p.IdProd, Codice, Colore_frame, Larghezza, Titolo, Descrizione, Altezza, Padding, Dimensione_font, Mostra_numero_linee, NomeLinguaggio, NomeTema 
         FROM Prodotto p, ProdottoInCarrello pc, Carrello c, Utente u 
            WHERE p.IdProd = pc.IdProd
              AND pc.IdCarrello = c.IdCarrello 
              AND c.IdCarrello = u.IdCarrello 
              AND u.IdUser = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $idUser);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function checkLogin($username, $password){
        $query = "SELECT IdUtente, Username,  Nome FROM Utente WHERE  Username = ? AND Password = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss',$username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProductById($id)
    {
        $query = "SELECT IdProd, Codice, Colore_frame, Larghezza,
       Titolo, Descrizione, Altezza, Padding, Dimensione_font, Mostra_numero_linee,
       NomeLinguaggio, NomeTema
            FROM Prodotto p
            WHERE p.IdProd = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }


}
/*
    public function getRandomPosts($n){
        $stmt = $this->db->prepare("SELECT idarticolo, Titoloarticolo, imgarticolo FROM articolo ORDER BY RAND() LIMIT ?");
        $stmt->bind_param('i',$n);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }


    public function getPosts($n=-1){
        $query = "SELECT idarticolo, Titoloarticolo, imgarticolo, anteprimaarticolo, dataarticolo, nome FROM articolo, autore WHERE autore=idautore ORDER BY dataarticolo DESC";
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


