<?php
include_once ('../classes/Estado.php');
include_once '../bd/DB.php';

class CrudEstado extends Estado{
    
    function __construct() {
        parent::__construct();
    }

    
    public static function getByNome($nomeUF) {
        
        
        $sql = "SELECT * FROM Estados WHERE est_nome = :nomeUF";
                
        $stmt = DB::prepare($sql);

        $stmt->bindValue(':nomeUF', $nomeUF, PDO::PARAM_STR);
        
        $est = new CrudEstado();
        $stmt->setFetchMode( PDO::FETCH_INTO, $est);
        $stmt->execute();
        $estFinded = $stmt->fetch( PDO::FETCH_INTO );
        $stmt->closeCursor();
        
        $est->id=$estFinded->est_id;
        $est->nome=$estFinded->est_nome;
        $est->timestamp=$estFinded->est_timestamp;
  
        return $est;
        
    }

    
}
