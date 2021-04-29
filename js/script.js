function mascara_cpf() {
    var cpf = document.getElementById('cpf');
    if (cpf.value.length == 3 || cpf.value.length == 7) {
        cpf.value += ".";
    } 
    if (cpf.value.length == 11){
        cpf.value += "-";
    }
}

var form = document.getElementById("atualiza-cadastro");

if(form.addEventListener) {
  form.addEventListener("submit", validaCadastro);
} 

var form = document.getElementById("cadastro");

if(form.addEventListener) {
  form.addEventListener("submit", validaCadastro);
} 

function validaCadastro(evento){

  var nome = document.getElementById('nome');
  var cpf = document.getElementById('cpf');
  var nasc = document.getElementById('date-birth');
  var estadocivil = document.getElementById('estado-civil');
  var cidade = document.getElementById('cidade-natal');
  var estados = document.getElementById('estados-brasil');
  var profissao = document.getElementById('profissao');
  var plano = document.getElementById('plano');
  var registro = document.getElementById('registro');
  var acomodacao = document.getElementById('acomodacao');
  var telefone = document.getElementById('telefone');
  var email = document.getElementById('email');
  var filtro = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
  var erro = 0;
  
  campo_nome = document.querySelector('.msg-nome');
  if(nome.value == '') {
    campo_nome.innerHTML = "Favor preencher o nome";
    erro += 1;
  } else {
    campo_nome.style.display = 'none';
  }
  
  campo_cpf = document.querySelector('.msg-cpf');
  if(cpf.value == '') {
    campo_cpf.innerHTML = "Favor preencher o CPF";
    erro += 1;
  } else {
    campo_cpf.style.display = 'none';
  }

  campo_data = document.querySelector('.msg-date-birth');
  if(nasc.value == '') {
    campo_data.innerHTML = "Favor preencher a data de nascimento";
    erro += 1;
  } else {
    campo_data.style.display = 'none';
  }

  var radios = document.getElementsByName('rdsexo');
  campo_sexo = document.querySelector('.msg-sexo');
  var aux = 0;
  for (var i = 0; i < radios.length; i++) {
      if (radios[i].checked) {
        aux = 1;
      } 
  }

  if(aux == 0){
    campo_sexo.innerHTML = "Favor selecione o sexo";
    erro += 1;
  } else {
    campo_sexo.style.display = 'none';
  }

  campo_periodo = document.querySelector('.msg-estado-civil');
  if( estadocivil.value == 'Selecione') {
    campo_periodo.innerHTML = "Favor selecionar um estado civil";
    erro += 1;
  } else {
    campo_periodo.style.display = 'none';
  }

  campo_cidade = document.querySelector('.msg-cidade-natal');
  if(cidade.value == '') {
    campo_cidade.innerHTML = "Favor preencher a cidade de nascimento";
    erro += 1;
  } else {
    campo_cidade.style.display = 'none';
  }

  campo_estados = document.querySelector('.msg-estados');
  if( estados.value == 'Selecione') {
    campo_estados.innerHTML = "Favor selecionar UF";
    erro += 1;
  } else {
    campo_estados.style.display = 'none';
  }

  campo_profissao = document.querySelector('.msg-profissao');
  if(profissao.value == '') {
    campo_profissao.innerHTML = "Favor preencher a profissão";
    erro += 1;
  } else {
    campo_profissao.style.display = 'none';
  }

  campo_plano = document.querySelector('.msg-plano');
  if(plano.value == '') {
    campo_plano.innerHTML = "Favor preencher o plano de Saúde";
    erro += 1;
  } else {
    campo_plano.style.display = 'none';
  }

  campo_registro = document.querySelector('.msg-registro');
  if(registro.value == '') {
    campo_registro.innerHTML = "Favor preencher o registro de Saúde";
    erro += 1;
  } else {
    campo_registro.style.display = 'none';
  }

  campo_acomodacao = document.querySelector('.msg-acomodacao');
  if(acomodacao.value == 'Selecione') {
    campo_acomodacao.innerHTML = "Favor selecione a acomodação";
    erro += 1;
  } else {
    campo_acomodacao.style.display = 'none';
  }

  campo_abrangencia = document.querySelector('.msg-abrangencia');
  if(abrangencia.value == 'Selecione') {
    campo_abrangencia.innerHTML = "Favor selecione a abrangência";
    erro += 1;
  } else {
    campo_abrangencia.style.display = 'none';
  }

  caixa_email = document.querySelector('.msg-email');
  if(email.value == ''){
      caixa_email.innerHTML = "Favor preencher o E-mail";
      caixa_email.style.diplay = 'block';
      erro += 1;
  }else if(filtro.test(email.value)){
    caixa_email.style.display = 'none';
  }else{
    caixa_email.innerHTML = "Formato do E-mail inválido";
    caixa_email.style.display = 'block';
    contErro += 1;
  }

  campo_telefone = document.querySelector('.msg-telefone');
  if(telefone.value == '') {
    campo_telefone.innerHTML = "Favor adicionar o telefone";
    erro += 1;
  } else {
    campo_telefone.style.display = 'none';
  }

    if(erro > 0){
      evento.preventDefault();
    }

}