<?php

/**
 * Conn.class.php [ TIPO ]
 * Descricao
 * @copyright (c) year, Geovana M. Melo 
 */

//namespace application\config;
class Conn{
    private static $Host = HOST;
    private static $User = USER;
    private static $Pass = PASS;
    private static $Dbsa = DBSA;
    
    /** @var PDO Description*/
    private static $Connect = null;
    // Só vai executar a conexão, se o Connect estiver null, se não estiver, utiliza
    // o mesmo objeto
    
    /**
     * Conecta com o banco de dados com o pattern singleton.
     * Retorna um objeto PDO!
     */
   private static function Conectar(){
       try{
           if(self::$Connect == null):
               $dsn = 'mysql:host=' . self::$Host . ';dbname=' . self::$Dbsa;
               /*Options deve ser um array, nesse caso são passadas configurações para o banco de dados 
               trabalhar com UTF8, esse em verde é o índice de configuração que queremos acessar.*/
               $options = [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'];
               self::$Connect = new PDO($dsn, self::$User, self::$Pass, $options);
               //echo "Ta conectando <hr>";
           endif;
           
       } catch (PDOException $e) {
           PHPErro($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
           die;
       }
       
       //Setando os tipos de erros que o PDO vai trabalhar, nesse caso serão lançados exceções.
       self::$Connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       return self::$Connect;
   }
   
   /** Retorna um objeto PDO Singleton Pattern */
   public static function getConn(){
       return self::Conectar();
   }
}
