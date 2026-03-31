<?php
    // Load environment configuration
    require_once 'config.php';

    class Model 
    {
        protected $dataAccess = null;

        public function __construct($pdo)
        {
            $this->dataAccess = $pdo;
        }

        public function __destruct()
        {
            $this->dataAccess = null;
        }

        // Vérifie si l'utilisateur existe
        public function isUser( $login, $password )
        {
            $isuser = False;
        
            $query = 'SELECT login FROM Users WHERE login = :login AND password = :password';
            $stmt = $this->dataAccess->prepare($query);
            $stmt->execute([':login' => $login, ':password' => $password]);
        
            if( $stmt->rowCount() > 0 )
                $isuser = True;
        
            $stmt->closeCursor();
        
            return $isuser;
        }

        // Récupère toutes les annonces
        public function getAllAnnonces()
        {
            $stmt = $this->dataAccess->prepare('SELECT id, title FROM Post');
            $stmt->execute();
            $annonces = array();
        
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $annonces[] = $row;
            }
        
            $stmt->closeCursor();
        
            return $annonces;
        }

        // Récupère un post
        public function getPost( $id )
        {
            $id = intval($id);
            $stmt = $this->dataAccess->prepare('SELECT * FROM Post WHERE id = :id');
            $stmt->execute([':id' => $id]);
            $post = $stmt->fetch(PDO::FETCH_ASSOC);
        
            $stmt->closeCursor();
            return $post;
        }
    }

?>
