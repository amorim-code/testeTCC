<?php
            session_start();
            echo "Pagina de processamento <br>";
            
            //Chamando a classe PHPExcel e a conexão
            require("../Libraries/PHPExcel.php");
            require("../Libraries/PHPExcel/IOFactory.php");
            require('conexao.php');
            //require("../application/models/Gestor.class.php");
            
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
                    
                    //Implementado de outra aula
                    $colunas = $objPHPExcel->setActiveSheetIndex(0)->getHighestColumn();
                    $totaColunas = PHPExcel_Cell::columnIndexFromString($colunas);

                    $row=1;
                    $coluna=0;
                    $i=0;

                    $dados = $sheet->getCellByColumnAndRow($coluna, $row)->getValue();


                    echo "<table border = '1'>";
                    /*while ($i < $totalLinhas) { 

                        echo "<tr>";
                        echo "<td>";

                        if ($dados == NULL) {                        
                            echo "NÃO HÁ DADOS";
                        }else{
                            for ($row=1; $row<=$totalLinhas; $row++){
                                for ($coluna=0; $coluna<=$totaColunas; $coluna++){
                                    
                                    echo $dados;
                                    
                                }
                            }
                        }
                        
                        echo "</td>";                
                        $i++;
                        
                    }*/

                    
                    $l=0;
                                        
                    $tabela = array (
                        array()
                    );
                    
                    for ($row=9; $row<=$totalLinhas; $row++){
                        echo "<tr>";
                        //implementado

                        $c=0;
                                                
                        for ($coluna=0; $coluna<=$totaColunas; $coluna++){
                            $dados = $sheet->getCellByColumnAndRow($coluna, $row)->getValue();
                            
                            if ($dados != null){
                                echo "<td>";
                                echo $dados;
                                echo "</td>";
                                
                                
                                $tabela[$l][$c] = $dados;

                                var_dump($tabela);
                                
                                //Instrução pro banco em poo
                                $c++;
                            }else{

                                $coluna++;
                                //echo "<td>";
                                //echo "F";
                                //echo "</td>";
                            }                            
                                                      
                                                        
                        }

                        echo "</tr>";

                        $l++;
                        
                       
                    }
                    echo "</table>";
                }
                    
            }    
                
        ?>

