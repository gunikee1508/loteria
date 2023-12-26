<?php

class Crud {
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function insert($tabela, $jogos, $tipo_jogo)
    {
        try{
            $sql = "INSERT INTO $tabela (jogos, tipo_jogo) VALUES (?, ?)";
            $stmt = $this->pdo->prepare($sql);

            $stmt->bindParam(1, $jogos);
            $stmt->bindParam(2, $tipo_jogo);

            $stmt->execute();

            //echo "Inserção bem sucedida!: ";
        }catch(PDOException $e){
            echo "Erro na inserção! ".$e->getMessage();
        }
    }

    public function listar($tabela){
        $sql = "SELECT * FROM $tabela";
        return $this->pdo->query($sql);

    }

}

?>