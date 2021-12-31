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

    public function getProductsByCategory($category)
    {
        $query = "SELECT p.IdProd, Codice, Colore_frame, Larghezza,
       Titolo, Descrizione, Altezza, Padding, Dimensione_font, Mostra_numero_linee,
       NomeLinguaggio, NomeTema, Tipo
            FROM Prodotto p, ProdottoInVetrina pv, Categoria c
            WHERE p.IdProd = pv.IdProd
              AND c.IdCategoria = pv.IdCategoria
              AND pv.IdCategoria = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $category);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProductsByTitle($Titolo)
    {
        $query = "SELECT distinct p.IdProd, Codice, Colore_frame, Larghezza, Titolo, Descrizione, Altezza, Padding, Dimensione_font, Mostra_numero_linee, NomeLinguaggio, NomeTema 
                    FROM Prodotto p, ProdottoInVetrina pv 
                    WHERE p.IdProd = pv.IdProd AND Titolo LIKE concat('%', ?, '%')";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $Titolo);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getCategoryById($idCategory)
    {
        $query = "SELECT * FROM Categoria c
                    WHERE c.IdCategoria = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $idCategory);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProductsByLanguage($language)
    {
        $query = "SELECT * FROM Prodotto WHERE NomeLinguaggio = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $language);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProductsInCart($idUser)
    {
        $cart = $this->getLastCartOfUser($idUser);
        $query = "SELECT p.IdProd, Quantità, Codice, Colore_frame, Larghezza, Titolo, Altezza, Padding, Dimensione_font, Mostra_numero_linee, NomeLinguaggio, NomeTema 
         FROM Prodotto p, ProdottoInCarrello pc, Carrello c
            WHERE p.IdProd = pc.IdProd
              AND pc.IdCarrello = c.IdCarrello 
              AND c.IdCarrello = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $cart);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function checkLogin($username, $password)
    {
        $query = "SELECT IdUtente, Username, Nome FROM Utente WHERE  Username = ? AND Password = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function checkLoginById($idUtente, $password)
    {
        $query = "SELECT IdUtente, Username, Nome FROM Utente WHERE  IdUtente = ? AND Password = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('is', $idUtente, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProductById($id)
    {
        $query = "SELECT IdProd, Codice, Colore_frame, Larghezza,
       Titolo, Altezza, Padding, Dimensione_font, Mostra_numero_linee,
       NomeLinguaggio, NomeTema
            FROM Prodotto p
            WHERE p.IdProd = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getOrdersMatchingUser($id)
    {
        $query = "SELECT o.IdOrdine as OrdineId, p.*
            FROM Carrello c, Ordine o, ProdottoInCarrello pic, Prodotto p
            WHERE c.IdUtente = ?
            AND o.IdCarrello = c.IdCarrello
            AND pic.IdProd = p.IdProd
            AND pic.IdCarrello = c.IdCarrello
            ORDER BY o.IdOrdine";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $resultFetched = $result->fetch_all(MYSQLI_ASSOC);

        $ordersArrayOrderedByIndex = array();
        $var = -1;
        $lastOrderId = -1;

        foreach ($resultFetched as $productOrdered){

            $productsOrderId = $productOrdered["OrdineId"];

            if($lastOrderId != $productsOrderId){
                $var++;
                $ordersArrayOrderedByIndex[$var] = array();
                $lastOrderId = $productsOrderId;

            }
            $ordersArrayOrderedByIndex[$var][] = ($productOrdered);

        }

        return $ordersArrayOrderedByIndex;
    }

    public function getUserInfoById($id)
    {
        $query = "SELECT *
            FROM Utente u
            WHERE u.IdUtente = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }



    /** Return the last IdUtente of the DB to be attached to the cart */
    public function getLastUser(){
        $query = "Select * from Utente order by IdUtente DESC LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = ($result->fetch_all(MYSQLI_ASSOC))[0];
        return $user['IdUtente'];
    }

    /** Insert a user into Db */
    public function registerUser($Nome, $Cognome, $Username, $Email, $Password){
        $query = "INSERT INTO Utente (Nome, Cognome, Username, Email, Password) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sssss", $Nome, $Cognome, $Username, $Email, $Password);
        $stmt->execute();
        $userId = $this->getLastUser();
        $this->getNewCartForUser($userId);

    }

    public function updateUserData($idUtente, $dataToUpdate){
        $query = "UPDATE Utente SET Nome = ?, Cognome = ?, Username = ?, Email = ?, Password = ? 
                    WHERE Utente.idUtente = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sssssi",
            $dataToUpdate["nome"],
            $dataToUpdate["cognome"],
            $dataToUpdate["username"],
            $dataToUpdate["email"],
            $dataToUpdate["password"],
            $idUtente
        );
        return $stmt->execute();
    }

    public function updateUserPass($idUtente, $passToUpdate){
        $query = "UPDATE Utente SET Password = ? 
                    WHERE Utente.IdUtente = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("si",
            $passToUpdate,
            $idUtente
        );
        return $stmt->execute();
    }

    /** Create a new Cart for the Input User */
    public function getNewCartForUser($IdUser){
        $query = "INSERT INTO Carrello (IdUtente) VALUES ($IdUser)";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
    }

    /** Return the last cart used by the User */
    public function getLastCartOfUser($IdUser){
        $query = "Select * from Carrello where Carrello.IdUtente = ? order by IdCarrello DESC LIMIT 1;";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $IdUser);
        $stmt->execute();
        $result = $stmt->get_result();
        $cart = ($result->fetch_all(MYSQLI_ASSOC))[0];
        return $cart['IdCarrello'];
    }

    /** Insert a new Product on the Db */
    public function createProduct($Codice, $Colore_frame, $Larghezza, $Titolo, $Altezza, $Padding, $Dimensione_font, $Mostra_numero_linee, $NomeLinguaggio,
                                   $NomeTema){
        $query = "INSERT INTO Prodotto (`Codice`, `Colore_frame`, `Larghezza`, `Titolo`, `Altezza`, `Padding`, `Dimensione_font`, `Mostra_numero_linee`, `NomeLinguaggio`, `NomeTema`) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ssisiiisss", $Codice, $Colore_frame, $Larghezza, $Titolo, $Altezza, $Padding, $Dimensione_font, $Mostra_numero_linee, $NomeLinguaggio,
             $NomeTema);
        $stmt->execute();

        // Return the IdProd of the newest Product
        $query = "Select * from Prodotto order by IdProd DESC LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        return (($result->fetch_all(MYSQLI_ASSOC))[0])['IdProd'];
    }

    /** Edit a product on the DB */
    public function editProduct($Codice, $Colore_frame, $Larghezza, $Titolo, $Altezza, $Padding, $Dimensione_font, $Mostra_numero_linee, $NomeLinguaggio,
                                 $NomeTema, $IdProd){
        $query = "UPDATE Prodotto SET (Codice, Colore_frame, Larghezza, Titolo, Altezza, Padding, Dimensione_font, Mostra_numero_linee, NomeLinguaggio,
                       NomeTema)
                    WHERE IdProd = ?
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ssisiiisssi", $Codice, $Colore_frame, $Larghezza, $Titolo, $Altezza, $Padding, $Dimensione_font, $Mostra_numero_linee, $NomeLinguaggio,
            $NomeTema, $IdProd);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /** ADD a product to the Showcase */
    public function addProductToShowCase($IdProd, $PopIndex, $Descrizione, $IdCategoria){
        $query = "INSERT INTO ProdottoInVetrina (IdProd, IndicePopolarita, Descrizione, IdCategoria) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("iisi", $IdProd, $PopIndex, $Descrizione, $IdCategoria);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /** Remove a product for the DB */
    public function removeProduct($IdProd){
        $query = "DELETE FROM Prodotto WHERE Prodotto.IdProd = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $IdProd);
        $stmt->execute();
        /** Delete from ShowCase */
        $query = "DELETE FROM ProdottoInVetrina WHERE IdProd = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $IdProd);
        $stmt->execute();
    }

    /** Add a product to a cart */
    public function addProductInCart($IdProd, $IdUser){
        $cart = $this->getLastCartOfUser($IdUser);
        $query = "INSERT INTO ProdottoInCarrello (IdCarrello, IdProd) VALUES (?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ii", $cart, $IdProd);
        $stmt->execute();
    }

    /** Change product quantity in cart */
    public function changeProductQuantityInCart($IdProd, $IdUser, $Quantità){
        $cart = $this->getLastCartOfUser($IdUser);
        $query = "UPDATE ProdottoInCarrello
                    SET Quantità = ?
                    WHERE IdProd = ? and IdCarrello = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("iii", $Quantità,  $IdProd, $cart);
        $stmt->execute();
    }

    /** Remove a product from a cart */
    public function removeProductFromCart($IdProd, $IdUser){
        $cart = $this->getLastCartOfUser($IdUser);
        $query = "DELETE FROM ProdottoInCarrello 
                    WHERE ProdottoInCarrello.IdCarrello = ? 
                      AND ProdottoInCarrello.IdProd = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ii", $cart,$IdProd);
        $stmt->execute();
    }

    /** Create a new Order */
    public function createOrder($IdUser){
        $cart = $this->getLastCartOfUser($IdUser);
        $query = "INSERT INTO Ordine (IdCarrello, Data, Stato) 
                    VALUES (?, DATE(NOW()), ?);";
        $stmt = $this->db->prepare($query);
        $status = 'P';
        $stmt->bind_param("is", $cart, $status);
        $stmt->execute();
    }

    /** Return the last order by the User */
    public function getLastOrderOfUser($IdUser){
        $query = "Select * from Carrello where Carrello.IdUtente = ? order by IdCarrello DESC LIMIT 1;";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $IdUser);
        $stmt->execute();
        $result = $stmt->get_result();
        $cart = (($result->fetch_all(MYSQLI_ASSOC))[0])['IdCarrello'];

        $query = "Select * from Ordine where Ordine.IdCarrello = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $cart);
        $stmt->execute();
        $result = $stmt->get_result();
        return ($result->fetch_all(MYSQLI_ASSOC))[0];
    }

    public function editOrderStatus($IdOrder, $Status){
        $query = "UPDATE Ordine SET Stato = ? WHERE Ordine.IdOrdine = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("si", $Status, $IdOrder);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function createNotification($Type, $Desc, $IdUser){
        $query = "INSERT INTO Notifica (TipoNotifica, Data, Descrizione, IdUtente, Letto) 
                    VALUES (?, ?, ?, ?, ?);";
        $stmt = $this->db->prepare($query);
        $date = date("y/m/d");
        $read = 0;
        $stmt->bind_param("sssii", $Type, $date, $Desc, $IdUser, $read);
        $stmt->execute();
    }

    public function readAllNotifications($IdUser){
        $query = "SELECT * FROM Notifica WHERE IdUtente = ?;";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $IdUser);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getLastNotificationByUserId($id)
    {
        $query = "SELECT * FROM `Notifica` WHERE IdUtente = ? AND Letto = 0 ORDER BY -IdNotifica LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);

    }

    /**
     * @param $IdUtente
     * @return true if the User is an Admin
     *
     */
    public function isUserAdmin($IdUtente){
        $query = "SELECT IsAdmin FROM Utente WHERE IdUtente = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $IdUtente);
        $stmt->execute();
        $result = $stmt->get_result();
        return ($result->fetch_all(MYSQLI_ASSOC))[0];

    }

    /**
     * Set a new User as Admin
     *
     * @param $IdUtente
     * @param $AdminValue
     * @return void
     */
    public function setUserAdmin($IdUtente, $AdminValue){
        $query = "UPDATE Utente SET IsAdmin = ? where IdUtente = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ii", $AdminValue, $IdUtente);
        $stmt->execute();
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


