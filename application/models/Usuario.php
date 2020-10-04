<?php

/**
 * Usuario.class.php [ TIPO ]
 * Descricao
 * @copyright (c) year, Geovana M. Melo 
 */

namespace application\models;
use application\config\dbConfig;
use application\controllers\Login;

class Usuario extends dbConfig
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
            //Senha padrão = "ETECHAS"
            if($this->senhaUsuario == "ETECHAS")
            {
                return 'atualizarSenha';
            }
            else
            {
                    
            }
        }
        else
        {
            return 'index';
        }       
    }

    public function verifyPerm($perfil = "")
    {
        $login = new Login;
        switch ($perfil) {
            case 'gestor':                
                return $login->indexManager();
            break;
            case 'professor':
                return $login->indexTeach();                
            break;
            case 'aluno':
                return $login->indexStudy();
            break;
        }
    }

    public function realScape($id, $senha)
    {
        $id = mysqli_real_escape_string($this->conect(), $id);
        $senha = mysqli_real_escape_string($this->conect(), $senha);

        $trat[] = [$id, $senha];

        return  $trat;       
    }

    public function setId($id)
    {
        $this->idUsuario = $id;
    }

    public function getId()
    {
        return $idUsuario;
    }

    public function setNome($nome)
    {
        $this->nomeUsuario = $nome;
    }

    public function getNome()
    {
        return $nomeUsuario;
    }

    public function setEmail($email)
    {
        $this->emailUsuario = $email;
    }

    public function getEmail()
    {
        return $emailUsuario;
    }

    public function setPerfil($perfil)
    {
        $this->perfilUsuario = $perfil;
    }

    public function getPerfil()
    {
        return $perfilUsuario;
    }

    public function setSenha($senha)
    {
        $this->senhaUsuario = $senha;
    }

    public function getSenha()
    {
        return $senhaUsuario;
    }
}
