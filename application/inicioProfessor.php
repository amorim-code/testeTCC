<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="css/navbar.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet" />
    <title>Início</title>
    <script src="https://kit.fontawesome.com/43a2aaa0b4.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav id="navbar-helpp">
        <div class="logo">
            <img src="img/helpp.png" />
        </div>
        <ul class="nav-links">
            <li><a href="#" class="inicio"><i class="fas fa-home"></i><span class="spanInicio">Início</span></a></li>
            <li><a href="#" class="ativid"><i class="fas fa-file-alt"></i><span class="spanAtiv">Atividades</span></a></li>
            <li><a href="#" class="ativid"><i class="far fa-plus-square"></i><span class="spanCriarAtiv">Criar atividade</span></a></li>
            <li><a href="#" class="config"><i class="fas fa-cog"></i><span class="spanConfig">Configurações</span></a></li>
            <li><a href="#" class="sair"><i class="fas fa-power-off"><span class="spanSair">Sair</span></i></a></li>

        </ul>
        <div class="burguer" id="burger">
            <div class="linha1"></div>
            <div class="linha2"></div>
            <div class="linha3"></div>
        </div>
    </nav>

    <section class="conteudo" id="tela">
        <div class="dados-user">
            <ul>
                <li>Olá, Agatha</li>
                <li>RM: 100365</li>
                <li>Cargo: Professor(a)</li>
            </ul>
        </div>
        <div class="retangulo-pp">
            <div class="div-filtro">
                <form class="filtro-pp">
                    <div class="div-turma">
                        <label for="filtro_turma1" class="lbl_filtro_turma1">
                            <h1>Turma:</h1>
                        </label>
                        <select class="filtro-turma1" name="filtro_turma1" id="filtro_turma1">
                            <option value="1">Química</option>
                            <option value="2">Física</option>
                        </select>
                    </div>
                    <div class="div-disciplina">
                        <label for="filtro_disciplina">
                            <h1>Disciplina:</h1>
                        </label>
                        <select class="filtro_disciplina1" name="filtro_disciplina" id="filtro_disciplina1">
                            <option>TPI</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="tabelaPpProf">
                <table class="tabela-pps-prof" id="tabelaProfsPP">
                    <tr>
                        <th class="headerTurmaPP">Turma PP</th>
                        <th class="headerAluno">Aluno</th>
                        <th class="headerDisciplina">Disciplina</th>
                        <th class="headerTurmaAtual">Turma Atual</th>
                        <th class="headerEstado">Status</th>
                    </tr>
                    <tr>
                        <td class="celulaTurmaPP">2Ae</td>
                        <td class="celulaNomeAluno">Emanuel Lopes Miranda</td>
                        <td class="celulaDisciplina">Química</td>
                        <td class="celulaTurmaAtual">3Ae</td>
                        <td class="celulaEstado">Em andamento</td>
                    </tr>
                </table>
            </div>
            <button class="consultarpp">Consultar PP's</button>
        </div>
    </section>
    <div class="Atividade-titulo">
        <h1>Atividades recebidas</h1>
    </div>
    <section class="atividades_prof" id="tela2">
        <div class="filtro-atividades">
            <form>
                <div class="div-turma1">
                    <label for="filtro-turma2">
                        <h1>Turma:</h1>
                    </label>
                    <select name="filtro-turma2" class="filtro-turma2" id="filtro-turma2">
                        <option value="1">3Ai</option>
                        <option value="2">2Be</option>
                        <option value="3">1Bi</option>
                    </select>
                </div>
                <div class="div-materia">
                    <label for="filtro-materia">
                        <h1>Matéria:</h1>
                    </label>
                    <select name="filtro-materia" class="filtro-materia" id="filtro-materia">
                        <option value="1">Química</option>
                        <option value="2">Física</option>
                    </select>
                </div>
                <div class="div-atividade">
                    <label for="filtro-atividade">
                        <h1>Atividade:</h1>
                    </label>
                    <select name="filtro-atividade" class="filtro-atividade" id="filtro-atividade">
                        <option value="1">Ánions e Cátions</option>
                    </select>
                </div>
                <a class="btnCadastrarAtividade" href="cadastrarAtiv.php">Cadastrar atividade</a>
                <input type="submit" class="btnConsultar" value="Consultar">
            </form>
        </div>
        <div class="tabela-atividades" cellspacing="0">
            <table id="tabelaAtividade">
                <tr>
                    <th class="headerNome">Nome</th>
                    <th class="headerStatus">Status</th>
                </tr>
                <tr>
                    <td class="celulaNome"><span class="nomeAluno">Joao Vitor Belarmino Dias Silva</span></td>
                    <td class="celulaStatus">Entregue</td>
                </tr>
                <tr>
                    <td class="celulaNome"><span class="nomeAluno">Geovana Miranda Mélo</span></td>
                    <td class="celulaStatus">Entregue</td>
                </tr>
                <tr>
                    <td class="celulaNome"><span class="nomeAluno">Henrique Nunes</span></td>
                    <td class="celulaStatus">Entregue</td>
                </tr>
            </table>
        </div>

    </section>
    <footer id="rodape">
        <div class=rodape-imagem><img src="img/rodape-imagem.png" /></div>
        <div class="rodape">
            <div class="rodape2">
                <a href="https://www.crowntech.rf.gd" target="_blank"><img src="img/crowntech.png" class="logo-rodape" /></a>
                <div class="endereco">
                    <i class="fas fa-map-marker-alt"></i><br />
                    <span class="endereco">R. Alcântara, 113 - Vila Guilherme, São Paulo - SP, 02110-010</span>
                </div>
                <div class="fone">
                    <i class="fas fa-phone-alt"></i><br />
                    <span class="telefone"> (11) 2905-1128<br />
                        (11) 2905-1125</span>
                </div>
                <div class="redes-sociais">
                    <a href="https://www.linkedin.com/crowntech" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    <a href="https://www.twitter.com/crowntech" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.instagram.com/crowntech_" target="_blank"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <div class="modal-container" id="modal-doc-aluno">
        <div class="modal-doc30">
            <h1 class="titulodomodal" style="font-size:30px; font-weight:900">Manuela Duarte Pereira</h1>
            <div class="traco"></div>
            <div class="conteudo-modal">
                <div class="linha-um-doc30">
                    <span class="dados-pp">PP em: ...<br />Química</span>
                    <div class="tabela-ativ-geral">
                        <table class="tabela-atividades-pp" id="tabela-ativ-pp">
                            <tr>
                                <th class="headerAtividade">Atividade</th>

                                <th class="headerMencaoGeral">Menção</th>
                            </tr>
                            <tr>
                                <td class="celulaAtividadeNome">Atividade 1</td>
                                <td class="celulaMencaoGeral">MB</td>
                            </tr>
                            <tr>
                                <td class="celulaAtividadeNome">Atividade 2</td>
                                <td class="celulaMencaoGeral">B</td>
                            </tr>
                        </table>
                    </div>
                    <div class="Status-Mencao-PP">
                        <h1 class="statusPP">Concluída</h1>
                        <h3 class="mencaoFinal">Menção final: MB</h3>
                    </div>
                </div>
                <div class="requerimentos">
                    <div class="competencias">
                        <h3 class="titulo-competencias">Competências</h3>
                        <div class="traco"></div>
                        <div class="spn-requerimentos">
                            <span>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Mollitia in, molestias perspiciatis omnis illo sunt est enim, quidem corporis, nisi aliquid incidunt sequi delectus vel ipsum. Eligendi ullam tempora placeat?</span>
                        </div>
                    </div>
                    <div class="competencias">
                        <h3 class="titulo-competencias">Habilidades</h3>
                        <div class="traco"></div>
                        <div class="spn-requerimentos">
                            <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam fugit ipsum obcaecati porro, iusto odio?</span>
                        </div>
                    </div>
                    <div class="competencias">
                        <h3 class="titulo-competencias">Base(s) Tecnológica(s) ou Cientifíca</h3>
                        <div class="traco"></div>
                        <div class="spn-requerimentos">
                            <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam odit, temporibus harum sunt debitis quod. Ipsa adipisci repudiandae amet quasi.</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="botao12">
                <a class="botao-editar" href="#">Editar</a>
                <button class="botao-fechar">Fechar</button>
            </div>
        </div>
    </div>
    <div class="modal-container" id="modal-atividade-aluno">
        <div class="modal-atividade">
            <h1 class="titulodomodal">João Vitor Belarmino</h1>
            <div class="traco"></div>
            <div class="conteudo-modal">
                <span class="prazo-para">Prazo de entrega: 27/05/2020 até 23:59.</span>
                <h2 class="entregue-em">Entregue em 16/05/2020 às 13:11.</h2>
                <div class="materiais">
                    <a href="#" download="NomeAtividade.txt" class="label">Atividade</a>
                    <i class="fas fa-download"></i>
                </div>
            </div>
            <div class="botao12">
                <button class="botao-fechar">Fechar</button>
            </div>

        </div>
    </div>
    <script src="js/app.js"></script>
</body>

</html>