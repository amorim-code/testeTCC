<?php

/**
 * CursoDAO.class.php [ TIPO ]
 * Descricao
 * @copyright (c) year, Geovana M. Melo 
 */
class CursoDAO{
    public $result;
    
    public function cadastrar(Curso $curso){
        $query = "INSERT INTO curso (nome_curso, eixo_curso) values (?, ?)";
        $cadastrar = Conn::getConn()->prepare($query);
        $cadastrar->bindValue(1, $curso->getNomeCurso());
        $cadastrar->bindValue(2, $curso->getEixoCurso());
        
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
    
    public function alterar(Curso $curso){
         $query = "UPDATE curso SET nome_curso = ?, eixo_curso = ? WHERE cod_curso = ?";
        $alterar = Conn::getConn()->prepare($query);
        
        $alterar->bindValue(1, $curso->getNomeCurso());
        $alterar->bindValue(2, $curso->getEixoCurso());
        
        $alterar->bindValue(4, $curso->getCodCurso());
        
        try{
            $alterar->execute();
            $this->result = Conn::getConn()->lastInsertId();
        } catch (Exception $e) {
            $this->result = null;
            WSErro("<b>Erro ao alterar o registro de código: {$curso->getCodCurso()}:</b> {$e->getMessage()}", $e->getCode());
        }
    }
    
    public function excluir($codCurso){
        $query = "DELETE FROM curso where cod_curso = ?";
        
        $deletar = Conn::getConn()->prepare($query);
        $deletar->bindValue(1, $codCurso);
        $deletar->execute();
    }
}
