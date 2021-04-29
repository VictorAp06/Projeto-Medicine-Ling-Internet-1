<?php 
    include('conexao.php');

    if(isset($_GET['id'])):
        $id = mysqli_real_escape_string($conexao, $_GET['id']);

        $sql = "select * from paciente where id = '$id'";
        $resultado = mysqli_query($conexao, $sql);
        $dados = mysqli_fetch_array($resultado);

        $sql = "SELECT  conveniomedico.plano, conveniomedico.registro, conveniomedico.acomodacao, conveniomedico.abrangencia FROM paciente INNER JOIN conveniomedico ON paciente.id_convenio = conveniomedico.id
        where '$id' = paciente.id";
        $resultado = mysqli_query($conexao, $sql);
        $dados_convenio = mysqli_fetch_array($resultado);

        $sql = "SELECT  contato.email, contato.contato FROM paciente INNER JOIN contato ON paciente.id_contato = contato.id
        where '$id' = paciente.id";
        $resultado = mysqli_query($conexao, $sql);
        $dados_contato = mysqli_fetch_array($resultado);
    endif;
?>

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
        <h1>Atualizar Cadastro Paciente</h1>
        <form id="atualiza-cadastro" action="update.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $dados['id'];?>">
                <div class="campo">
                    <label for="nome">Nome completo</label>
                    <input type="text" name="nome" id="nome" maxlength="100" value="<?php echo $dados['nome'];?>">
                    <span class="msg-erro msg-nome"></span>
                </div>
                <div class="campo">
                    <label for="cpf">CPF</label>
                    <input type="text" name="cpf" id="cpf" autocomplete="off" maxlength="14" onkeyup="mascara_cpf()" value="<?php echo $dados['cpf'];?>">
                    <span class="msg-erro msg-cpf"></span>
                </div>
                <div class="campo">
                    <label for="date-birth">Data de Nascimento</label>
                    <input type="date" name="date-birth" id="date-birth" value="<?php echo $dados['nascimento'];?>">
                    <span class="msg-erro msg-date-birth"></span>
                </div>
                <div class="campo rdsexo">
                    <label for="rd-sexo">Sexo</label>
                    <p>
                        <input type="radio" name="rdsexo" value="M" <?=($dados['sexo'] == 'M')?'checked':''?>>Masculino
                        <input type="radio" name="rdsexo" value="F" <?=($dados['sexo'] == 'F')?'checked':''?>>Feminino
                    </p>
                    <span class="msg-erro msg-sexo"></span>
                </div>
                <div class="campo">
                    <label for="estado-civil">Estado Civil</label>
                    <select name="estado-civil" id="estado-civil">
                        <option value="Selecione" selected disabled>Selecione</option>
                        <option value="Solteiro" <?=($dados['estado_civil'] == 'Solteiro')?'selected':''?>>Solteiro</option>
                        <option value="Casado" <?=($dados['estado_civil'] == 'Casado')?'selected':''?>>Casado</option>
                        <option value="Divorciado" <?=($dados['estado_civil'] == 'Divorciado')?'selected':''?>>Divorciado</option>
                        <option value="Desquitado" <?=($dados['estado_civil'] == 'Desquitado')?'selected':''?>>Desquitado</option>
                        <option value="União Estável" <?=($dados['estado_civil'] == 'União Estável')?'selected':''?>>União Estável</option>
                        <option value="Separado(a)" <?=($dados['estado_civil'] == 'Separado(a)')?'selected':''?>>Separado(a)</option>
                        <option value="Viúvo(a)" <?=($dados['estado_civil'] == 'Viúvo(a)')?'selected':''?>>Viúvo(a)</option>
                    </select>
                    <span class='msg-erro msg-estado-civil'></span>
                </div>
                <div class="campo">
                    <label for="cidade-natal">Cidade Natal</label>
                    <input type="text" name="cidade-natal" id="cidade-natal" maxlength="80" value="<?php echo $dados['cidade_natal'];?>">
                    <span class='msg-erro msg-cidade-natal'></span>
                </div>
                <div class="campo">
                    <label for="estados-brasil">UF</label>
                    <select name="estados-brasil" id="estados-brasil">
                        <option value="Selecione" selected disabled>Selecione</option>
                        <option value="AC" <?=($dados['uf'] == 'AC')?'selected':''?>>Acre</option>
                        <option value="AL" <?=($dados['uf'] == 'AL')?'selected':''?>>Alagoas</option>
                        <option value="AP" <?=($dados['uf'] == 'AP')?'selected':''?>>Amapá</option>
                        <option value="AM" <?=($dados['uf'] == 'AM')?'selected':''?>>Amazonas</option>
                        <option value="BA" <?=($dados['uf'] == 'BA')?'selected':''?>>Bahia</option>
                        <option value="CE" <?=($dados['uf'] == 'CE')?'selected':''?>>Ceará</option>
                        <option value="DF" <?=($dados['uf'] == 'DF')?'selected':''?>>Distrito Federal</option>
                        <option value="ES" <?=($dados['uf'] == 'ES')?'selected':''?>>Espírito Santo</option>
                        <option value="GO" <?=($dados['uf'] == 'GO')?'selected':''?>>Goiás</option>
                        <option value="MA" <?=($dados['uf'] == 'MA')?'selected':''?>>Maranhão</option>
                        <option value="MT" <?=($dados['uf'] == 'MT')?'selected':''?>>Mato Grosso</option>
                        <option value="MS" <?=($dados['uf'] == 'MS')?'selected':''?>>Mato Grosso do Sul</option>
                        <option value="MG" <?=($dados['uf'] == 'MG')?'selected':''?>>Minas Gerais</option>
                        <option value="PA" <?=($dados['uf'] == 'PA')?'selected':''?>>Pará</option>
                        <option value="PB" <?=($dados['uf'] == 'PB')?'selected':''?>>Paraíba</option>
                        <option value="PR" <?=($dados['uf'] == 'PR')?'selected':''?>>Paraná</option>
                        <option value="PE" <?=($dados['uf'] == 'PE')?'selected':''?>>Pernambuco</option>
                        <option value="PI" <?=($dados['uf'] == 'PI')?'selected':''?>>Piauí</option>
                        <option value="RJ" <?=($dados['uf'] == 'RJ')?'selected':''?>>Rio de Janeiro</option>
                        <option value="RN" <?=($dados['uf'] == 'RN')?'selected':''?>>Rio Grande do Norte</option>
                        <option value="RS" <?=($dados['uf'] == 'RS')?'selected':''?>>Rio Grande do Sul</option>
                        <option value="RO" <?=($dados['uf'] == 'RO')?'selected':''?>>Rondônia</option>
                        <option value="RR" <?=($dados['uf'] == 'RR')?'selected':''?>>Roraima</option>
                        <option value="SC" <?=($dados['uf'] == 'SC')?'selected':''?>>Santa Catarina</option>
                        <option value="SP" <?=($dados['uf'] == 'SP')?'selected':''?>>São Paulo</option>
                        <option value="SE" <?=($dados['uf'] == 'SE')?'selected':''?>>Sergipe</option>
                        <option value="TO" <?=($dados['uf'] == 'TO')?'selected':''?>>Tocantins</option>
                    </select>
                    <span class='msg-erro msg-estados'></span>
                </div>
                <div class="campo">
                    <label for="profissao">Profissão</label>
                    <input type="text" name="profissao" id="profissao" maxlength="50" value="<?php echo $dados['profissao'];?>">
                    <span class='msg-erro msg-profissao'></span>
                </div>
                <h2 class="campo titulo">Convênio Médico</h2>
                <div class="campo">
                    <label for="plano">Plano de Saúde</label>
                    <input type="text" name="plano" id="plano" maxlength="80" value="<?php echo $dados_convenio['plano'];?>">
                    <span class='msg-erro msg-plano'></span>
                </div>
                <div class="campo">
                    <label for="">Registro SUS</label>
                    <input type="text" name="registro" id="registro" maxlength="30" value="<?php echo $dados_convenio['registro'];?>">
                    <span class='msg-erro msg-registro'></span>
                </div>
                <div class="campo">
                    <label for="acomodacao">Acomodação</label>
                    <select name="acomodacao" id="acomodacao">
                        <option value="Selecione" selected disabled>Selecione</option>
                        <option value="Individual" <?=($dados_convenio['acomodacao'] == 'Individual')?'selected':''?>>Individual</option>
                        <option value="Coletiva" <?=($dados_convenio['acomodacao'] == 'Coletiva')?'selected':''?>>Coletiva</option>
                    </select>
                    <span class='msg-erro msg-acomodacao'></span>
                </div>
                <div class="campo">
                    <label for="abrangencia">Abrangência</label>
                    <select name="abrangencia" id="abrangencia">
                        <option value="Selecione" selected disabled>Selecione</option>
                        <option value="Regional" <?=($dados_convenio['abrangencia'] == 'Regional')?'selected':''?>>Regional</option>
                        <option value="Estadual" <?=($dados_convenio['abrangencia'] == 'Estadual')?'selected':''?>>Estadual</option>
                        <option value="Nacional" <?=($dados_convenio['abrangencia'] == 'Nacional')?'selected':''?>>Nacional</option>
                    </select>
                    <span class='msg-erro msg-abrangencia'></span>
                </div>
                <h2 class="campo titulo">Contato</h2>
                <div class="campo">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" maxlength="100" value="<?php echo $dados_contato['email'];?>">
                    <span class='msg-erro msg-email'></span>
                </div>
                <div class="campo">
                    <label for="telefone">Telefone</label>
                    <input type="text" name="telefone" id="telefone" maxlength="14" value="<?php echo $dados_contato['contato'];?>">
                    <span class='msg-erro msg-telefone'></span>
                </div>
                <input type="submit" name="btn-submit" id="btn-submit" value="Atualizar Cadastro">
        </form>
    </div>
    <script src="js/script.js"></script>
</body>
</html>