create database TesteHelpp2
use TesteHelpp2

create table usuario
(
	rmUsuario numeric (6) primary key,
	nomeUsuario varchar (55) not null,
	emailUsuario varchar (55) not null,
	senhaUsuario varchar (55) not null,
	perfilUsuario varchar (50) not null
)
create table professor
(
	rmProfessor numeric (6) not null,
	usuario_rmUsuario numeric (6) NOT NULL, foreign key(usuario_rmUsuario) references usuario(rmUsuario),
	PRIMARY KEY(rmProfessor, usuario_rmUsuario)
)
create table gestor
(
	rmGestor numeric (6) not null,
	rmUsuario numeric (6) NOT NULL, foreign key(rmUsuario) references usuario(rmUsuario),
	cargoGestor varchar (50) not null,
	PRIMARY KEY(rmGestor, rmUsuario)
)
create table aluno
(
	rmAluno numeric (6) not null,
	rmUsuario numeric (6) NOT NULL, foreign key(rmUsuario) references usuario(rmUsuario),
	PRIMARY KEY(rmAluno, rmUsuario)
)

create table curso
(
	cod_curso int primary key,
	eixo_curso varchar (30) not null,
	nome_curso varchar (30) not null
)

create table turma
(
	cod_turma int primary key,
	cod_curso int NOT NULL, foreign key(cod_curso) references curso(cod_curso),
	nome_turma varchar (50) not null,
	semestre_turma varchar (15) not null,
	ano_turma varchar (4) not null
)

create table aluno_turma
(
	Aluno_Usuario_rmUsuario INT NOT NULL,
	rmAluno numeric(6) NOT NULL, foreign key(rmAluno) references aluno(rmAluno),
	codTurma int NOT NULL, foreign key(codTurma) references turma(cod_turma)
)

create table disciplina
(
	codDisciplina int primary key,
	nomeDisciplina varchar (30) not null,
	siglaDisciplina varchar(10) not null,
	codTurma int NOT NULL, foreign key(codTurma) references turma(cod_turma)
)

create table professor_disciplina
(
	professor_Usuario_rmUsuario INT NOT NULL,
    professor_rmProfessor numeric (6) NOT NULL, foreign key(professor_rmProfessor) references professor(rmProfessor),
	codDisciplina int NOT NULL, foreign key(codDisciplina) references disciplina(codDisciplina)
)

create table turma_disciplina
(
	codTurma int NOT NULL, foreign key(codTurma) references turma(cod_turma),
	codDisciplina int NOT NULL, foreign key(codDisciplina) references disciplina(codDisciplina)
)

create table pp
(
	aluno_rmAluno numeric (6) NOT NULL,	
	disciplina_codDisciplina int NOT NULL,
    gestor_rmGestor numeric(10) not null,
	cursoPP varchar (30) not null,
	semestrePP varchar (20) not null,
	anoPP numeric (4) not null,
	mencaoFinal char (2),
	seriePP varchar (10) not null,
	statusPP varchar (50) not null,
	disciplinaPP varchar (50) not null,
	habilidadePP VARCHAR (80) NOT NULL,
	conhecimentoPP VARCHAR (80) NOT NULL,
	tecnologiaPP VARCHAR (80) NOT NULL,
	dataTermino date,
	Primary key (aluno_rmAluno, disciplina_codDisciplina),
	constraint fk_rmGestor foreign key (gestor_rmGestor) references gestor(rmGestor),
	constraint fk_discPP foreign key (disciplina_codDisciplina) references disciplina(codDisciplina),
	constraint fk_alunoPP foreign key (aluno_rmAluno) references aluno(rmAluno)
)

create table atividade
(
	codAtividade numeric (10) primary key,
	PP_Disciplina_codDisciplina int NOT NULL,
	PP_Aluno_rmAluno numeric(6) NOT NULL,
	titulo_atividade varchar (50) not null,
	instrucao_atividade varchar (100) not null,
	data_conclusao date not null,
	forma_entrega varchar (50) not null,
	mencao_atividade varchar (10),
	status varchar (30) not null,
	arquivo varbinary (1000),
	constraint fk_disciplinaAtividade foreign key (pp_disciplina_codDisciplina) references pp(disciplina_codDisciplina),
	constraint fk_AlunoAtividade foreign key (PP_Aluno_rmAluno) references pp(aluno_rmAluno)
)


create table professor_pp
(
	rm_professor numeric(6) NOT NULL, foreign key(rm_professor) references professor(rmProfessor),
	cod_pp_rmAluno numeric(10) NOT NULL,
	cod_pp_codDisciplina numeric(10) NOT NULL, 
	foreign key(cod_pp_rmAluno) references pp(aluno_rmAluno),
	foreign key(cod_pp_codDisciplina) references pp(disciplina_codDisciplina)
)

/*INSERTS*/

select * from aluno

insert into usuario values ('180113', 'João Silva', 'joão.silva01@etec.sp.gov.br', '123456', 'professor');
insert into usuario values ('180114', 'Janaina Souza', 'janaina.souza02@etec.sp.gov.br', '101010', 'aluno');
insert into usuario values ('180115', 'Flávia Nascimento', 'flavia.nascimento03@etec.sp.gov.br', '545454', 'gestor');

insert into professor values ('180113', '180113');
insert into aluno values ('180114', '180114');
insert into gestor values ('180115', '180115', 'Orientadora Educacional');

insert into curso values ('1', 'Tecnologia', 'Desenvolvimento de Sistemas');
insert into curso values ('2', 'Tecnologia', 'Técnico em Eletrônica');
insert into curso values ('3', 'Logística', 'Técnico em Logística');

insert into turma values ('1', '1', '3AI', '2 semestre', '2020');
insert into turma values ('2', '2', '3AE', '2 semestre', '2020');
insert into turma values ('3', '3', '1AL', '1 semestre', '2019');

insert into disciplina values ('1', 'Lógica de Programação', 'LP', '1');
insert into disciplina values ('2', 'Aplicativos informatizados', 'AI', '2');
insert into disciplina values ('3', 'Técnicas em arduino', 'TA', '2');

insert into aluno_turma values ('180114', '180114', '1');

insert into professor_disciplina values ('180113', '180113', '1');

insert into turma_disciplina values ('1', '1');

insert into pp values ('180114', '1', '180115', '1', '2', '2019', '', '2 ano', 'Em aberto', 'Lógica de Programação',
	'Exemplo habilidade Exemplo habilidade, Exemplo habilidade Exemplo habilidade',
	'Exemplo conhecimento Exemplo conhecimento, Exemplo conhecimento Exemplo conhecimento',
	'Exemplo tecnologia Exemplo tecnologia, Exemplo tecnologia Exemplo tecnologia',
	'2020-11-20');

insert into atividade values ('1', '1', '180114', 'Exemplo Atividade', 'Fazer a atividade exemplo como estiver escrito', '2020-06-14', 'Pessoalmente', 'I', 'Não entregue', '');

insert into professor_pp values ('180113', '180114', '1');

