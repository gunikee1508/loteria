<?php

class Database{
    private static $servidor = "localhost";
    private static $banco = "test";
    private static $usuario = "root";
    private static $senha = "";
    private static $pdo;
   
  

    private static function setPDO()
    {
        $banco = self::$banco;
        $servidor = self::$servidor;

        try {
            self::$pdo = new PDO("mysql:host={$servidor};dbname={$banco}", self::$usuario, self::$senha);
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            //echo "Conexão bem sucedida!";
        } catch (PDOException $e) {
            echo "Erro na conexão! ";
        }
    }

   

    public static function getConexao()
    {
        if(!self::$pdo){
            self::setPDO();
        }
        return self::$pdo;
    }

}
