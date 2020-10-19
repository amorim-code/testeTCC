<?php

/**
 * Create.class.php [ TIPO ]
 * Descricao
 * @copyright (c) year, Geovana M. Melo 
 */
class Create extends Conn{
    //recebe o nome da tabela onde irá ser inserido os dados
    private $Tabela;
    
    //os dados das colunas dessa tabela vem em array 
    private $Dados;
    
    //recebe o resultado, verifica se deu certo ou não
    private $Resultado;
    
    //vai receber a instrução e preparar ela
    /** @var PDOStatement */
    private $Cadastrar;
    
    //conexão com o banco
    /** @var PDO */
    private $Conn;
    
    /**
     * <b>ExeCreate: </b> Executa um cadastro simplificado no banco de dados utilizando prepared statements.
     * Basta informar o nome da tabela e um array atributiivo com o nome da coluna e o valor.
     * 
     * @param STRING $Tabela = Informe o nome da tabela no banco!
     * @param ARRAY $Dados = Informe um array atribuitivo. (Nome da coluna => Valor)
     */
    public function ExeCreate($Tabela, array $Dados){
       $this->Tabela = (string) $Tabela;
       $this->Dados = $Dados;
       
       $this->getQuery();
       $this->Execute();
    }
    
    public function getResultado() {
        return $this->Result;
    }
    /**
     * ****************************************
     * ************ PRIVATE METHODS ***********
     * ****************************************
     */
    
    //realiza a conexão com o banco, prepara a variável que foi alimentada com a instrução
    private function Connect() {
            //alterado, ta recebendo o método de conexão da classe Conn em config
        $this->Conn = parent::getConn();
        $this->Cadastrar = $this->Conn->prepare($this->Cadastrar);
    }
    
    //Alimenta o atributo Create com a instrução, Fileds são as colunas, Places é o dado em si
    //Lembrando que array_keys pega o index, e nesse caso o index foi nomeado pelos nomes da coluna
    //Além disso, foi adicionado : antes dos nomes das colunas no campo values, para criar um link para receber os dados, que nem foi aprendido no prepare statements
    private function getQuery() {
        $Fileds = implode(',', array_keys($this->Dados));
        $Places = ':' . implode(', :', array_keys($this->Dados));
        $this->Cadastrar = "INSERT INTO {$this->Tabela} ({$Fileds}) VALUES ({$Places})";
    }
    
    /**
     * Método responsável pela execução da preparada no atributo Create
     * Os dados são inseridos e o atributo Result e atualizado com o último Id inserido     
     */
    private function Execute() {
        $this->Connect();
        try{
            $this->Cadastrar->execute($this->Dados);
            $this->Result = $this->Conn->lastInsertId();
        } catch (Exception $e) {
            $this->Result = null;
            WSErro("<b>Erro ao cadastrar:</b> {$e->getMessage()}", $e->getCode());
        }
    }
}

