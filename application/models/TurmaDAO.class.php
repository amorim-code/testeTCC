<?php

/**
 * TurmaDAO.class [ TIPO ]
 * Descricao
 * @copyright (c) year, Geovana M. Melo 
 */
class TurmaDAO extends Conn{
    public $resultado;
    
    public function cadastrar(Turma $turma)
    {
        $query = "INSERT INTO turma (cod_curso, nome_turma, ano_turma) values (?,?,?)";
        
        $cadastrar = Conn::getConn()->prepare($query);
        
        $cadastrar->bindValue(1, $turma->getCodCurso());
        $cadastrar->bindValue(2, $turma->getNomeTurma());
        $cadastrar->bindValue(3, $turma->getAnoTurma());
        
        try{
            $cadastrar->execute();
            $this->resultado = Conn::getConn()->lastInsertId();
        } catch (Exception $e) {
            $this->resultado = null;
            WSErro("<b>Erro ao cadastrar:</b> {$e->getMessage()}", $e->getCode());
        }
    }
   
    public function consultar($q){
        $sql = $q;
        
        $consultar = Conn::getConn()->prepare($sql);
        $consultar->execute();
        
        if ($consultar->rowCount() > 0){
            $this->resultado = $consultar->fetchAll(PDO::FETCH_ASSOC);
            return $this->resultado;
        } 
    }
    
    public function alterar(Turma $turma)
    {
        $query = "UPDATE turma SET cod_curso = ?, nome_turma = ?, ano_turma = ? WHERE cod_turma = ?";
        $alterar = Conn::getConn()->prepare($query);
        
        $alterar->bindValue(1, $turma->getCodCurso());
        $alterar->bindValue(2, $turma->getNomeTurma());
        $alterar->bindValue(3, $turma->getAnoTurma());
        $alterar->bindValue(4, $turma->getCodTurma());
        
        try{
            $alterar->execute();
            $this->resultado = Conn::getConn()->lastInsertId();
        } catch (Exception $e) {
            $this->resultado = null;
            WSErro("<b>Erro ao alterar o registro de código: {$turma->getCodTurma()}:</b> {$e->getMessage()}", $e->getCode());
        }
    }
    
    public function excluir($id){
        $query = "DELETE FROM turma WHERE cod_turma = ?";
        
        $deletar = Conn::getConn()->prepare($query);
        $deletar->bindValue(1, $id);
        $deletar->execute();
    }
    
    //É NECESSÁRIO CRIAR UM MÉTODO PARA EXCLUIR FK DE TURMA DE OUTRAS TABELAS, CASO EXISTA
    
    public function verificaTurma(Turma $turma) {
        $query = "SELECT * FROM turma WHERE nome_turma = ? and ano_turma = ? and cod_curso = ?";
        
        $verifica = Conn::getConn()->prepare($query);
        $verifica->bindValue(1, $turma->getNomeTurma());
        $verifica->bindValue(2, $turma->getAnoTurma());
        $verifica->bindValue(3, $turma->getCodCurso());
        $verifica->execute();
        
        if($verifica->rowCount() > 0){
            $this->resultado = $verifica->fetchAll(PDO::FETCH_ASSOC);
            return $this->resultado;
        }else{
            $this->resultado = false;
        }
    }
    
    public function buscarCursoTurma($id) {
        $query = "SELECT c.nome_curso FROM curso c inner join turma t on t.cod_curso = c.cod_curso where t.cod_curso = ?";
        
        $busca = Conn::getConn()->prepare($query);
        $busca->bindValue(1, $id);
        $busca->execute();
        
        $this->resultado = $busca->fetchAll(PDO::FETCH_ASSOC);
        return $this->resultado;
    }
    
    public function getResult() {
        return $this->resultado;
    }
}
