<?php

    include('conexao.php');

    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $cpf = mysqli_real_escape_string($conexao, $_POST['cpf']);
    $datanascimento = mysqli_real_escape_string($conexao, $_POST['date-birth']);
    $sexo = mysqli_real_escape_string($conexao, $_POST['rdsexo']);
    $estadocivil = mysqli_real_escape_string($conexao, $_POST['estado-civil']);
    $cidadenatal = mysqli_real_escape_string($conexao, $_POST['cidade-natal']);
    $uf = mysqli_real_escape_string($conexao, $_POST['estados-brasil']);
    $profissao = mysqli_real_escape_string($conexao, $_POST['profissao']);
    $plano = mysqli_real_escape_string($conexao, $_POST['plano']);
    $registro = mysqli_real_escape_string($conexao, $_POST['registro']);
    $acomodacao = mysqli_real_escape_string($conexao, $_POST['acomodacao']);
    $abrangencia = mysqli_real_escape_string($conexao, $_POST['abrangencia']);
    $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
    $telefone = mysqli_real_escape_string($conexao, trim($_POST['telefone']));
    $id = mysqli_real_escape_string($conexao, trim($_POST['id']));

    $sql = "select id_convenio, id_contato from paciente where id = '$id'";
    $resultado = mysqli_query($conexao, $sql);
    $dados = mysqli_fetch_array($resultado);
    $id_contato = $dados['id_contato'];
    $id_convenio = $dados['id_convenio'];

    $sql = "update contato set email='$email', contato='$telefone' where contato.id = '$id_contato';";

    if($conexao->query($sql) === TRUE){
        echo "<br>"."Contato atualizado com Sucesso"."<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conexao->error;
    }

    $sql = "update conveniomedico set plano='$plano', registro='$registro', acomodacao='$acomodacao', abrangencia='$abrangencia' where conveniomedico.id = '$id_convenio';";

    if($conexao->query($sql) === TRUE){
        echo "<br>"."Plano de Saúde atualizado com Sucesso"."<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conexao->error;
    }

    $sql = "update paciente set nome='$nome', cpf='$cpf', nascimento='$datanascimento', sexo='$sexo', estado_civil='$estadocivil', cidade_natal='$cidadenatal', uf='$uf', profissao='$profissao' where paciente.id = '$id';";

    if($conexao->query($sql) === TRUE){
        echo "<br>"."Informações Gerais Atualizadas com Sucesso"."<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conexao->error;
    }

    $conexao->close();
?>