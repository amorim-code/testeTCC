<?php

/**
 * DisciplinaDAO.class.php [ TIPO ]
 * Descricao
 * @copyright (c) year, Geovana M. Melo 
 */
class DisciplinaDAO{
    private $resultado;
    
    public function cadastrar(Disciplina $disciplina)
    {
        $query = "INSERT INTO disciplina (nomeDisciplina, codTurma) values (?, ?)";
        $cadastrar = Conn::getConn()->prepare($query);
        $cadastrar->bindValue(1, $disciplina->getNomeDisciplina());
        $cadastrar->bindValue(2, $disciplina->getCodTurma());
        
        try{
            $cadastrar->execute();
            $this->result = Conn::getConn()->lastInsertId();
        } catch (Exception $e) {
            $this->result = null;
            WSErro("<b>Erro ao cadastrar:</b> {$e->getMessage()}", $e->getCode());
        }
    }
    
    public function consultar($q){
        $sql = $q;
        
        $consultar = Conn::getConn()->prepare($sql);
        $consultar->execute();
        
        if ($consultar->rowCount() > 0){
            $resultado = $consultar->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } 
    }
    
    public function alterar(Disciplina $disciplina)
    {
        $query = "UPDATE disciplina SET nomeDisciplina = ?, siglaDisciplina = ?, codTurma = ? WHERE codDisciplina = ?";
        $alterar = Conn::getConn()->prepare($query);
        
        $alterar->bindValue(1, $disciplina->getNomeDisciplina());
        $alterar->bindValue(2, $disciplina->getSiglaDisciplina());
        $alterar->bindValue(3, $disciplina->getCodTurma());
        
        $alterar->bindValue(4, $disciplina->getCodDisciplina());
        
        try{
            $alterar->execute();
            $this->result = Conn::getConn()->lastInsertId();
        } catch (Exception $e) {
            $this->result = null;
            WSErro("<b>Erro ao alterar o registro de código: {$disciplina->getCodDisciplina()}:</b> {$e->getMessage()}", $e->getCode());
        }
    }
    
    public function excluir($codDisciplina){
        $query = "DELETE FROM disciplina where codDisciplina = ?";
        
        $deletar = Conn::getConn()->prepare($query);
        $deletar->bindValue(1, $codDisciplina);
        $deletar->execute();
    }
    
    public function getResultado() {
        return $this->getResultado();
    }
}
