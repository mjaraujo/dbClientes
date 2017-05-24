<?php
include_once ('../classes/Estado.php');
include_once '../bd/DB.php';

class CrudEstado extends Estado{
    
    function __construct($nome) {
        parent::__construct($nome);
    }

    
    public function getByNome($nomeUF) {
        
        
        $sql = "SELECT * FROM Estados WHERE est_nome = :nomeUF";
                
        $stmt = DB::prepare($sql);

        $stmt->bindValue(':nomeUF', $nomeUF, PDO::PARAM_STR);
        
        $est = new Estado();
        $stmt->setFetchMode( PDO::FETCH_INTO, $est);
        $stmt->execute();
        $est = $stmt->fetch( PDO::FETCH_INTO );
        $stmt->closeCursor();
        
        var_dump($est);
        echo $est->getTimestamp();
        return $est;
        
    }

    
}
