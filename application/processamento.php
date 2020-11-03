<?php
            session_start();
            echo "<h1>Pagina de processamento </h1><br>";
            
            //Chamando a classe PHPExcel e a conexão
            require("../Libraries/PHPExcel.php");
            require("../Libraries/PHPExcel/IOFactory.php");
            require("../application/models/Gestor.class.php");
            
            //Chamando os arquivos responsáveis pela conexão ao banco
            require ("../application/config/config.php");
            require ("../application/config/Conn.class.php");
            
            //Classe de cadastro
            require ("../application/models/Create.class.php");
            require ("../application/models/Usuario.php");
            require ("../application/models/UsuarioDAO.class.php");
            require ("../application/models/Aluno.class.php");
            
            //Conectando com o banco
            $conn = new Conn;
            $conn->getConn();          
            //var_dump($conn);
            
            //Verificando se o arquivo não veio vazio
            if(!empty($_FILES['uploadPPs']['tmp_name'])){
                
                $planilha = $_FILES['uploadPPs']['tmp_name'];
                
                //Carrega automaticamente qualquer tipo de arquivo que for enviado
                $leitura = PHPExcel_IOFactory::createReaderForFile($planilha);
                
                //Carrega o arquivo enviado
                $objPHPExcel = $leitura->load($planilha);
                
                //Não entendi direito pra que serve mas fé
                $worksheet = $objPHPExcel->getWorksheetIterator();

                foreach($worksheet as $sheet){
                    $totalLinhas = $sheet->getHighestRow();
                    
                    //pegando o total de colunas
                    $colunas = $objPHPExcel->setActiveSheetIndex(0)->getHighestColumn();
                    $totaColunas = PHPExcel_Cell::columnIndexFromString($colunas);

                    $row=1;
                    $coluna=0;
                    $i=0;

                    $l=0;
                                        
                    $tabela = array (
                        array()
                    );
                   
                    //ALTEREI O FOR PRA IR POUCO DADO PRO BANCO AGORA NO COMEÇO - Xofana
                    for ($row=9; $row<=10; $row++){
                        //implementado
                        $c=0;
                                                
                        for ($coluna=0; $coluna<=$totaColunas; $coluna++){
                            $dados = $sheet->getCellByColumnAndRow($coluna, $row)->getValue();
                            if ($dados != null){
                                switch($coluna){
                                    case 2: $rmAluno = $dados;break;
                                    case 3: $nomeAluno = $dados;break;
                                    case 4: $periodo = $dados;break;
                                    case 6: $seriePP = $dados;break;
                                    case 7: $semestreAno = $dados;break;
                                    case 8: $disciplina = $dados;break;
                                    case 9: $professor = $dados;break;
                                    default: $nulo = $dados;
                                }
                                $c++;
                            }                                                                       
                        }
                        $l++; 
                        
                        //tirando a / da string de professores da tabela
                        $professores = explode("/", $professor);
                        $prof1 = $professores[0];
                        
                        echo "RM do aluno: " . $rmAluno . "<hr>";
                        echo "Nome do aluno: " . $nomeAluno . "<br><hr>";
                        echo "Período: " . $periodo . "<br><hr>";
                        echo "Série/Módulo: " . $seriePP . "<br><hr>";
                        echo "Semestre/Ano: " . $semestreAno . "<br><hr>";
                        echo "Disciplina: " . $disciplina . "<br><hr>";
                        
                        //exibindo o nome dos profs separado
                        if (count($professores) == 1){
                            echo "Professor responsável: " . $prof1 . "<br><hr>";
                            
                        }else{
                            $prof2 = $professores[1];
                            echo "Professores responsaveis: " . $prof1 . " e " . $prof2 . "<br><hr>";
                        }
                        
                        $Usuario = new application\models\Usuario();
                        $UsuarioDAO = new UsuarioDAO();
                        
                        //Cadastrando os alunos
                        $Usuario->setId($rmAluno);
                        $Usuario->setNome($nomeAluno);
                        $Usuario->setPerfil('Aluno');
                        
                        $UsuarioDAO->cadastrarUsuario($Usuario);
                        
                        if($UsuarioDAO->getResult()):
                           echo "Usuário cadastrado com sucesso!";
                        else:
                            echo $UsuarioDAO->getResult();
                        endif;
                        
                        //Cadastrando os professores
                        //Não está funcionando por enquanto, pois precisamos do real RM dos professores
                        /*for ($rmProf = 180120; $rmProf <= 180123; $rmProf++){
                            $cadUsuario = ['rmUsuario' => $rmProf, 'nomeUsuario' => $prof1, 'perfilUsuario' => 'Professor'];
                            $cadProfessor = ['rmProfessor' => $rmProf, 'rmUsuario' => $rmProf ];
                            if (count($professores) == 2){
                                $cadUsuario = ['rmUsuario' => $rmProf, 'nomeUsuario' => $prof2, 'perfilUsuario' => 'Professor'];
                                //$Cadastrar->ExeCreate('usuario', $cadUsuario);
                            }
                            $Cadastrar->ExeCreate('usuario', $cadUsuario);
                            $Cadastrar->ExeCreate('professor', $cadProfessor);
                        }*/
                        
                        //Cadastrando turma, aqui eu vou usar um código ja cadastrado manualmente na tabela curso, já que por enquanto não sabemos como vamos cadastrá-lo
                        //Separando o semestre e o ano da turma de PP
                        /*$SemAno = explode("/", $semestreAno);
                        $semestre = $SemAno[0];
                        $ano = $SemAno[1];
                        
                        //O cod curso está preenchido de forma manual, pois ainda não sabemos como cadastrar os cursos a partir da planilha
                        $cadTurma = ['cod_curso'=> 1, 'nome_turma'=> $seriePP, 'semestre_turma' => $semestre, 'ano_turma' => $ano];

                        //Cadastrando disciplina
                        $cadDisciplina = ['nomeDisciplina' => $disciplina, 'codTurma' => 4];
                        
                        //Cadastrando a PP
                        //$cadPP= ['aluno_rmAluno' => $rmAluno,  ];
                        
                        $Cadastrar->ExeCreate('turma', $cadTurma);
                        $Cadastrar->ExeCreate('disciplina', $cadDisciplina);
                        
                        if($Cadastrar->getResultado()){
                            echo "Cadastro efetuado com sucesso! <\br><hr>";
                            $_SESSION["resultado"] = true;
                        }
                        
                        echo "<pre>";
                        //var_dump($Cadastrar);
                        echo "</pre>";*/
                    }
                    echo "</table>";
                }      
            }
            else{
                echo "Arquivo não foi carregado!";
            }
?>

