<?php

/**
 * Usuario.class.php [ TIPO ]
 * Descricao
 * @copyright (c) year, Geovana M. Melo 
 */

namespace application\models;
//use application\config\dbConfig;

class Usuario extends \Conn
{
    protected $idUsuario;
    protected $nomeUsuario;
    private $emailUsuario;
    private $perfilUsuario;
    private $senhaUsuario;
    
    # VALIDAÇÃO DO LOGIN #
    private function Login()
    {     
        $query = "SELECT rmUsuario, senhaUsuario, perfilUsuario FROM usuario WHERE rmUsuario = '{$this->idUsuario}' AND senhaUsuario = '{$this->senhaUsuario}' AND perfilUsuario = '{$this->perfilUsuario}'";
        $result = mysqli_query($this->conect(), $query);
        $row = mysqli_num_rows($result);

        if($row == 1)
        {
            return true;
        }
        else
        {
            return false;
        }       
    }

    public function veryfyPass()
    {
        $query = "SELECT rmUsuario, senhaUsuario, perfilUsuario FROM usuario WHERE rmUsuario = '{$this->idUsuario}' AND senhaUsuario = '{$this->senhaUsuario}' AND perfilUsuario = '{$this->perfilUsuario}' AND atualizaSenha = '1'";
        $result = mysqli_query($this->conect(), $query);
        $row = mysqli_num_rows($result);

        if($row == 1)
        {
            return true;
        }
        else
        {
            return false;
        } 
    }

    public function verifyPerm()
    {
        switch ($this->perfilUsuario) {
            case 'gestor':                
                return 'indexManager';
            break;
            case 'professor':
                return 'indexTeach';                
            break;
            case 'aluno':
                return 'indexStudy';
            break;
        }
    }

    public function realScape($id, $senha)
    {
        $realId = mysqli_real_escape_string($this->conect(), $id);
        $realSenha = mysqli_real_escape_string($this->conect(), $senha);

        $trat = array(
           'setId' => $realId,
            'setSenha' => $realSenha
        );

        return  $trat;       
    }

    public function setId($id)
    {
        $this->idUsuario = $id;
    }

    public function getId()
    {
        return $this->idUsuario;
    }

    public function setNome($nome)
    {
        $this->nomeUsuario = $nome;
    }

    public function getNome()
    {
        return $this->nomeUsuario;
    }

    public function setEmail($email)
    {
        $this->emailUsuario = $email;
    }

    public function getEmail()
    {
        return $this->emailUsuario;
    }

    public function setPerfil($perfil)
    {
        $this->perfilUsuario = $perfil;
    }

    public function getPerfil()
    {
        return $this->perfilUsuario;
    }

    public function setSenha($senha)
    {
        $this->senhaUsuario = $senha;
    }

    public function getSenha()
    {
        return $this->senhaUsuario;
    }
}
