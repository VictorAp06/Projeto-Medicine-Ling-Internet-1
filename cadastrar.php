<?php

    include('conexao.php');

    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $cpf = mysqli_real_escape_string($conexao, $_POST['cpf']);
    $datanascimento = mysqli_real_escape_string($conexao, $_POST['date-birth']);
    $sexo = mysqli_real_escape_string($conexao, $_POST['rdsexo']);
    $estadocivil = mysqli_real_escape_string($conexao, $_POST['estado-civil']);
    $cidadenatal = mysqli_real_escape_string($conexao, $_POST['estados-brasil']);
    $profissao = mysqli_real_escape_string($conexao, $_POST['profissao']);
    $plano = mysqli_real_escape_string($conexao, $_POST['plano']);
    $registro = mysqli_real_escape_string($conexao, $_POST['registro']);
    $titular = mysqli_real_escape_string($conexao, $_POST['titular']);
    $acomodacao = mysqli_real_escape_string($conexao, $_POST['acomodacao']);
    $abrangencia = mysqli_real_escape_string($conexao, $_POST['abrangencia']);
    $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
    $telefone = mysqli_real_escape_string($conexao, trim($_POST['telefone']));

    $sql = "insert into contato (email, contato) values('$email', '$telefone');";

    if($conexao->query($sql) === TRUE){
        $id_contato = $conexao->insert_id;
        echo "New record created successfully. Last inserted ID is: " . $id_contato;
    } else {
        echo "Error: " . $sql . "<br>" . $conexao->error;
    }

    $sql = "insert into conveniomedico (plano, registro, acomodacao, abrangencia) values ('$plano', '$registro', '$acomodacao', '$abrangencia');";

    if($conexao->query($sql) === TRUE){
        $id_convenio = $conexao->insert_id;
        echo "New record created successfully. Last inserted ID is: " . $id_convenio;
    } else {
        echo "Error: " . $sql . "<br>" . $conexao->error;
    }

    $sql = "insert into paciente (id_convenio, id_contato, nome, cpf, nascimento, sexo, estado_civil, cidade_natal, uf, profissao) 
    values('$id_convenio', '$id_contato', '$nome', '$cpf', '$nascimento', '$sexo', '$estado_civil', '$cidade_natal', '$uf', '$profissao');";

    if($conexao->query($sql) === TRUE){
        $id_paciente = $conexao->insert_id;
        echo "New record created successfully. Last inserted ID is: " . $id_paciente;
    } else {
        echo "Error: " . $sql . "<br>" . $conexao->error;
    }

    $conexao->close();
?>