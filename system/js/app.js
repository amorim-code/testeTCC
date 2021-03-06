function modalLogin(modalID) {
  const modal = document.getElementById(modalID);
  if (modal) {
    modal.classList.add("mostrar");
    modal.addEventListener("click", (e) => {
      if (e.target.className == "botao") {
        modal.classList.remove("mostrar");
      }
    });
  }
}

function modalAlert(modalID) {
  const modal = document.getElementById(modalID);
  var input = document.getElementById("uploadPPs");
  if(modal){
  input.addEventListener("change", () => {
    modal.classList.add("mostrar");
    nome = input.files[0].name;
    document.getElementById("spnAviso").innerHTML =
      "Tem certeza que deseja enviar o arquivo " + nome + "?";
    modal.addEventListener("click", (e) => {
      if (e.target.className == "botao") {
        input.value = "";
        modal.classList.remove("mostrar");
      }
    });
  });
}
}

function modalAtiv(modalID) {
  const modal = document.getElementById(modalID);
  const atividade = document.getElementById("atividade");
  if (modal) {
    atividade.addEventListener("click", (e) => {
      modal.classList.add("mostrar");
      modal.addEventListener("click", (e) => {
        if (e.target.className == "botao") {
          modal.classList.remove("mostrar");
        }
      });
    });
  }
}

function modalDocAluno(modalID) {
  const modal = document.getElementById(modalID);
  const tabela = document.getElementById("tabelaProfsPP");
    tabela.addEventListener("click", (e) => {
      console.log(e.target);
      if (e.target.className == "celulaNomeAluno") {
        modal.classList.add("mostrar");
        modal.addEventListener("click", (e)=>{
          if(e.target.className == "botao-fechar" || e.target == modal){
            modal.classList.remove("mostrar");
          }
        });
      }
    });
  
}

function modalAtivAluno(modalID) {
  const modal = document.getElementById(modalID);
  const tabela = document.getElementById("tabelaAtividade");
  if (modal) {
    tabela.addEventListener("click", (e) => {
      if (e.target.className == "nomeAluno") {
        modal.classList.add("mostrar");
        modal.addEventListener("click", (e) => {
          if (e.target.className == "botao-fechar" || e.target == modal) {
            modal.classList.remove("mostrar");
          }
        });
      }
    });
  }
}

function alteraLabel() {
  var input = document.getElementById("upload");
  if (input) {
    input.addEventListener("change", () => {
      if (input.files.length > 0) {
        var nome = "Não há arquivo selecionado. Selecionar arquivo...";
        nome = input.files[0].name;
        document.getElementById("label").innerHTML = nome;
      }
    });
  }
}

window.onscroll = scroll;

function scroll() {
  var scrollTop = window.pageYOffset;
  if (scrollTop > 30) {
    try {
      document.getElementById("navbar-helpp").id = "depois";
    } catch (e) {
      false;
    }
  } else {
    try {
      document.getElementById("depois").id = "navbar-helpp";
    } catch (e) {
      false;
    }
  }
}

const navSlide = () => {
  const burger = document.querySelector(".burguer");
  const nav = document.querySelector(".nav-links");
  const tela = document.getElementById("tela");
  const tela2 = document.getElementById("tela2");
  const rodape = document.getElementById("rodape");
  if (nav) {
    burger.addEventListener("click", () => {
      nav.classList.add("nav-active");
      tela.addEventListener("click", (e) => {
        if (e.target !== nav) {
          nav.classList.remove("nav-active");
        }
      });
      tela2.addEventListener("click", (e) => {
        if (e.target !== nav) {
          nav.classList.remove("nav-active");
        }
      });
      rodape.addEventListener("click", (e) => {
        if (e.target !== nav) {
          nav.classList.remove("nav-active");
        }
      });
    });
  }
};
const app = () => {
  navSlide();
  modalLogin("modal-aviso");
  modalAtiv("modal-atividade");
  modalAtivAluno("modal-atividade-aluno");
  alteraLabel();
  modalAlert("modal-alert-import");
  modalDocAluno("modal-doc-aluno");
  scroll();
};

app();
