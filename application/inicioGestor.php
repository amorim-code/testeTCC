<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/navbar.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet" />
    <title>Início</title>
    <script src="https://kit.fontawesome.com/43a2aaa0b4.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav>
        <div class="logo">
            <img src="img/helpp.png" />
        </div>
        <ul class="nav-links">
            <li><a href="#" class="inicio"><i class="fas fa-home"></i><span>Início</span></a></li>
            <li><a href="#" class="config"><i class="fas fa-cog"></i><span>Configurações</span></a></li>
            <li><a href="#" class="sair"><i class="fas fa-power-off"><span>Sair</span></i></a></li>
            <li><a href="#" class="dark-mode"><i class="fas fa-adjust"></i></a></li>
        </ul>
        <div class="burguer" id="burger">
            <div class="linha1"></div>
            <div class="linha2"></div>
            <div class="linha3"></div>
        </div>
    </nav>

    <section class="conteudo-gestor">
        <div class="dados-user">
            <ul>
                <li>Olá, Flávia</li>
                <li>RM: 120001</li>
                <li>Cargo: Gestor(a)</li>
            </ul>
        </div>
        <div class="tabela-pps" cellspacing="0">
            <table id="tabelaPPs">
                <tr>
                    <th class="headerRM">RM</th>
                    <th class="headerNomeAluno">Aluno</th>
                    <th class="headerSerieMod">Série/Módulo</th>
                    <th class="headerMateria">Matéria da PP</th>
                    <th class="headerSemestre">Semestre</th>
                    <th class="headerProfessor">Professores</th>
                    <th class="headerConcluiu">Concluiu em</th>
                    <th class="headerMencao">Menção</th>
                </tr>
                <tr>
                    <td class="celulaRM">177571</td>
                    <td class="celulaAluno">Artur Barbosa Gomes</td>
                    <td class="celulaSerie">2ª Série</td>
                    <td class="celulaMateria">Técnicas de programação para internet I e II</td>
                    <td class="celulaSemestre">2º Sem/2019</td>
                    <td class="celulaProfessor">Adriano Milanez e Marco Antonio</td>
                    <td class="celulaConcluiu"></td>
                    <td class="celulaMencao"></td>
                </tr>

            </table>
            <button class="importarPPs">Importar</button>
        </div>
    </section>

    <script src="js/app.js"></script>
</body>

</html>