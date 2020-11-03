<?php

/**
 * AtividadeDAO.class [ TIPO ]
 * Descricao
 * @copyright (c) year, Geovana M. Melo 
 */
class AtividadeDAO extends Conn{
    public function cadastrarAtividade() {
        $query = "INSERT INTO usuario (rmUsuario, nomeUsuario, perfilUsuario) values (?,?,?)";
        
        $cadastrar = Conn::getConn()->prepare($query);
        
        $cadastrar->bindValue(1, $u->getId());
        $cadastrar->bindValue(2, $u->getNome());
        $cadastrar->bindValue(3, $u->getPerfil());
        
        try{
            $cadastrar->execute();
            $this->result = Conn::getConn()->lastInsertId();
            echo "Cadastro efetuado com sucesso!";
        } catch (Exception $e) {
            $this->result = null;
            WSErro("<b>Erro ao cadastrar:</b> {$e->getMessage()}", $e->getCode());
        }
    }
    
    public function consultarAtividade(){
        $sql = $q;
        
        $consultar = Conn::getConn()->prepare($sql);
        $consultar->execute();
        
        if ($consultar->rowCount() > 0){
            $resultado = $consultar->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } 
    }
    
    private function excluirAtividade($id)
    {
        $query = "DELETE FROM atividade where codAtividade = ?";
        
        $deletar = Conn::getConn()->prepare($query);
        $deletar->bindValue(1, $id);
        $deletar->execute();
    }
    
    public function getResult() {
        return $this->result;
    }
    
    public function editarAtividade(){
        $query = "UPDATE usuario SET nomeUsuario = ?, emailUsuario = ?, perfilUsuario = ? WHERE rmUsuario = ?";
        $alterar = Conn::getConn()->prepare($query);
        
        $alterar->bindValue(1, $u->getNome());
        $alterar->bindValue(2, $u->getEmail());
        $alterar->bindValue(3, $u->getPerfil());
        $alterar->bindValue(4, $u->getId());
        
        try{
            $alterar->execute();
            $this->result = Conn::getConn()->lastInsertId();
        } catch (Exception $e) {
            $this->result = null;
            WSErro("<b>Erro ao alterar o registro de código: {$u->getId()}:</b> {$e->getMessage()}", $e->getCode());
        }
    }
}
