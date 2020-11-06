<?php

/**
 * PPDAO.class [ TIPO ]
 * Descricao
 * @copyright (c) year, Geovana M. Melo 
 */
class PPDAO{
    private $resultado;
    
    public function cadastrar(PP $pp)
    {
        $query = "INSERT INTO pp (aluno_rmAluno, disciplina_CodDisciplina, gestor_rmGestor, cursoPP"
                . ", semestrePP, anoPP, seriePP, statusPP, disciplinaPP) values (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $cadastrar = Conn::getConn()->prepare($query);
        $cadastrar->bindValue(1, $pp->getRmAluno());
        $cadastrar->bindValue(2, $pp->getCodDisciplina());
        $cadastrar->bindValue(3, $pp->getRmGestor());
        $cadastrar->bindValue(4, $pp->getCursoPP());
        $cadastrar->bindValue(5, $pp->getSemestrePP());
        $cadastrar->bindValue(6, $pp->getAnoPP());
        $cadastrar->bindValue(7, $pp->getSeriePP());
        $cadastrar->bindValue(8, $pp->getStatusPP());
        $cadastrar->bindValue(9, $pp->getDisciplinaPP());
        
        try{
            $cadastrar->execute();
            return true;
            //$this->result = Conn::getConn()->lastInsertId();
        } catch (Exception $e) {
            //$this->result = null;
            WSErro("<b>Erro ao cadastrar:</b> {$e->getMessage()}", $e->getCode());
        }
    }
    
    public function consultar(){
        $sql = "SELECT * FROM pp";
        
        $consultar = Conn::getConn()->prepare($sql);
        $consultar->execute();
        
        if ($consultar->rowCount() > 0){
            $this->resultado = $consultar->fetchAll(PDO::FETCH_ASSOC);
            return $this->resultado;
        } 
    }
    
    public function consultarNomeAluno() {
        $sql = "SELECT a.nomeUsuario from usuario a inner join pp b on a.rmUsuario = b.aluno_rmAluno";
        
        $consultar = Conn::getConn()->prepare($sql);
        $consultar->execute();
        
        if ($consultar->rowCount() > 0){
            $this->resultado = $consultar->fetchAll(PDO::FETCH_ASSOC);
            return $this->resultado;
        } 
    }
    
    public function alterar(Disciplina $disciplina)
    {
        $query = "UPDATE disciplina SET nomeDisciplina = ?, siglaDisciplina = ? WHERE codDisciplina = ?";
        $alterar = Conn::getConn()->prepare($query);
        
        $alterar->bindValue(1, $disciplina->getNomeDisciplina());
        $alterar->bindValue(2, $disciplina->getSiglaDisciplina());
        
        $alterar->bindValue(3, $disciplina->getCodDisciplina());
        
        try{
            $alterar->execute();
            $this->result = Conn::getConn()->lastInsertId();
        } catch (Exception $e) {
            $this->result = null;
            WSErro("<b>Erro ao alterar o registro de código: {$disciplina->getCodDisciplina()}:</b> {$e->getMessage()}", $e->getCode());
        }
    }
    
    public function excluir($codDisciplina){
        $query = "DELETE FROM PP where codDisciplina = ?";
        
        $deletar = Conn::getConn()->prepare($query);
        $deletar->bindValue(1, $codDisciplina);
        $deletar->execute();
    }
    
    public function verificaDisciplina(Disciplina $disciplina) {

    }
    
    public function getResultado() {
        return $this->resultado;
    }
}
