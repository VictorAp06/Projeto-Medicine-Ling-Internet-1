<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style-form.css">
    <title>Cadastro</title>
</head>
<body>
    <div class="main-container">
        <h1>Cadastro Paciente</h1>
        <form id="cadastro" action="cadastrar.php" method="POST">
                <div class="campo">
                    <label for="nome">Nome completo</label>
                    <input type="text" name="nome" id="nome" maxlength="100">
                    <span class="msg-erro msg-nome"></span>
                </div>
                <div class="campo">
                    <label for="cpf">CPF</label>
                    <input type="text" name="cpf" id="cpf" autocomplete="off" maxlength="14" onkeyup="mascara_cpf()">
                    <span class="msg-erro msg-cpf"></span>
                </div>
                <div class="campo">
                    <label for="date-birth">Data de Nascimento</label>
                    <input type="date" name="date-birth" id="date-birth">
                    <span class="msg-erro msg-date-birth"></span>
                </div>
                <div class="campo rdsexo">
                    <label for="rd-sexo">Sexo</label>
                    <p>
                        <input type="radio" name="rdsexo" value="M">Masculino
                        <input type="radio" name="rdsexo" value="F">Feminino
                    </p>
                    <span class="msg-erro msg-sexo"></span>
                </div>
                <div class="campo">
                    <label for="estado-civil">Estado Civil</label>
                    <select name="estado-civil" id="estado-civil">
                        <option value="Selecione" selected disabled>Selecione</option>
                        <option value="Solteiro">Solteiro</option>
                        <option value="Casado">Casado</option>
                        <option value="Divorciado">Divorciado</option>
                        <option value="Desquitado">Desquitado</option>
                        <option value="União Estável">União Estável</option>
                        <option value="Separado(a)">Separado(a)</option>
                        <option value="Viúvo(a)">Viúvo(a)</option>
                    </select>
                    <span class='msg-erro msg-estado-civil'></span>
                </div>
                <div class="campo">
                    <label for="cidade-natal">Cidade Natal</label>
                    <input type="text" name="cidade-natal" id="cidade-natal" maxlength="80">
                    <span class='msg-erro msg-cidade-natal'></span>
                </div>
                <div class="campo">
                    <label for="estados-brasil">UF</label>
                    <select name="estados-brasil" id="estados-brasil">
                        <option value="Selecione" selected disabled>Selecione</option>
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espírito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                    </select>
                    <span class='msg-erro msg-estados'></span>
                </div>
                <div class="campo">
                    <label for="profissao">Profissão</label>
                    <input type="text" name="profissao" id="profissao" maxlength="50">
                    <span class='msg-erro msg-profissao'></span>
                </div>
                <h2 class="campo titulo">Convênio Médico</h2>
                <div class="campo">
                    <label for="plano">Plano de Saúde</label>
                    <input type="text" name="plano" id="plano" maxlength="80">
                    <span class='msg-erro msg-plano'></span>
                </div>
                <div class="campo">
                    <label for="">Registro SUS</label>
                    <input type="text" name="registro" id="registro" maxlength="30">
                    <span class='msg-erro msg-registro'></span>
                </div>
                <div class="campo">
                    <label for="acomodacao">Acomodação</label>
                    <select name="acomodacao" id="acomodacao">
                        <option value="Selecione" selected disabled>Selecione</option>
                        <option value="Individual">Individual</option>
                        <option value="Coletiva">Coletiva</option>
                    </select>
                    <span class='msg-erro msg-acomodacao'></span>
                </div>
                <div class="campo">
                    <label for="abrangencia">Abrangência</label>
                    <select name="abrangencia" id="abrangencia">
                        <option value="Selecione" selected disabled>Selecione</option>
                        <option value="Regional">Regional</option>
                        <option value="Estadual">Estadual</option>
                        <option value="Nacional">Nacional</option>
                    </select>
                    <span class='msg-erro msg-abrangencia'></span>
                </div>
                <h2 class="campo titulo">Contato</h2>
                <div class="campo">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" maxlength="100">
                    <span class='msg-erro msg-email'></span>
                </div>
                <div class="campo">
                    <label for="telefone">Telefone</label>
                    <input type="text" name="telefone" id="telefone" maxlength="14">
                    <span class='msg-erro msg-telefone'></span>
                </div>
                <input type="submit" name="btn-submit" id="btn-submit" value="Cadastrar">
        </form>
    </div>
    <script src="js/script.js"></script>
</body>
</html>