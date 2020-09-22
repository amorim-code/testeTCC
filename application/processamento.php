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
                    
                    echo "<table border = '1'>";
                    for ($row=1; $row<=$totalLinhas; $row++){
                        echo "<tr>";
                        //implementado
                        for ($coluna=0; $coluna<=$totaColunas; $coluna++){
                            $dados = $sheet->getCellByColumnAndRow($coluna, $row)->getValue();
                            if (!empty($dados)){

                                $realRow = $row--;
                                $array[$realRow][$coluna] = $dados;

                                var_dump($array);

                                //echo "<td>";
                                //echo $dados;
                                //echo "</td>";
                                
                                //Instrução pro banco em poo
                            }
                        }
                        echo "</tr>";
                    }
                    echo "</table>";
                }
                    
            }    
                
        ?>

