<?php

/**
 * TurmaDAO.class [ TIPO ]
 * Descricao
 * @copyright (c) year, Geovana M. Melo 
 */
class TurmaDAO extends Conn{
    public $result;
    
    public function cadastrar(Turma $turma)
    {
        $query = "INSERT INTO turma (cod_curso, nome_turma, semestre_turma, ano_turma) values (?,?,?,?)";
        
        $cadastrar = Conn::getConn()->prepare($query);
        
        $cadastrar->bindValue(1, $turma->getCodCurso());
        $cadastrar->bindValue(2, $turma->getNomeTurma());
        $cadastrar->bindValue(3, $turma->getSemestreTurma());
        $cadastrar->bindValue(4, $turma->getAnoTurma());
        
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
    
    public function alterar(Turma $turma)
    {
        $query = "UPDATE turma SET cod_curso = ?, nome_turma = ?, semestre_turma = ?, ano_turma = ? WHERE cod_turma = ?";
        $alterar = Conn::getConn()->prepare($query);
        
        $alterar->bindValue(1, $turma->getCodCurso());
        $alterar->bindValue(2, $turma->getNomeTurma());
        $alterar->bindValue(3, $turma->getSemestreTurma());
        $alterar->bindValue(4, $turma->getAnoTurma());
        $alterar->bindValue(5, $turma->getCodTurma());
        
        try{
            $alterar->execute();
            $this->result = Conn::getConn()->lastInsertId();
        } catch (Exception $e) {
            $this->result = null;
            WSErro("<b>Erro ao alterar o registro de código: {$turma->getCodTurma()}:</b> {$e->getMessage()}", $e->getCode());
        }
    }
    
    public function excluir($id){
        $query = "DELETE FROM turma where cod_turma = ?";
        
        $deletar = Conn::getConn()->prepare($query);
        $deletar->bindValue(1, $id);
        $deletar->execute();
    }
    
    //É NECESSÁRIO CRIAR UM MÉTODO PARA EXCLUIR FK DE TURMA DE OUTRAS TABELAS, CASO EXISTA
    
    public function getResult() {
        return $this->result;
    }
    
}
