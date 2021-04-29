<?php
    include('conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style-table.css">
    <title>Consulta Paciente</title>
</head>
<body>

<table cellspacing="0">
		
		<tr>
			<td colspan = "7"> <h2> Pacientes Cadastrados </h2></td>
		</tr>
		
		<tr> 
            <td><b><cite>Nome</cite></b></td> 
			<td><b><cite>Cpf</cite></b></td>
			<td><b><cite>Plano de Saúde</cite> </b></td>
            <td><b><cite>Email</cite></b></td> 
            <td><b><cite>Telefone</cite></b></td>
            <td><b><cite>Editar</a></cite> </b></td>
            <td><b><cite>Excluir</a></cite> </b></td>
		</tr>
		
        <?php 
            $sql = "SELECT paciente.id, paciente.nome, paciente.cpf, conveniomedico.plano, contato.email, contato.contato FROM paciente INNER JOIN contato ON paciente.id_contato = contato.id INNER JOIN conveniomedico ON paciente.id_convenio = conveniomedico.id;";

            $resultado = mysqli_query($conexao, $sql);

            while($dados = mysqli_fetch_array($resultado)):
        ?>
		<tr>
			<td><?php echo $dados['nome']; ?></td>
			<td><?php echo $dados['cpf']; ?></td>
            <td><?php echo $dados['plano']; ?></td>
			<td><?php echo $dados['email']; ?></td>
            <td><?php echo $dados['contato']; ?></td>
            <td><b><a href="editar.php?id=<?php echo $dados['id'];?>">Editar</a></b></td>
            <td><b><a href="excluir.php">Excluir</a></b></td>
		</tr>
        <?php endwhile; ?>
</table>
</body>
</html>