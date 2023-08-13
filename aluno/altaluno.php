<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Aluno</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../formulario.css">
</head>
<body>
  <header>
    <h1>Sistema Aluno</h1>
    <img src="../imagem/pokebola-verde.png" alt="">
  </header>
  <main>
  <img src="../imagem/tartaruga.png" alt="tartaruga">
  <img src="../imagem/michelangelo.png" alt="michelangelo">
  <?php
    require_once('../conexao.php');

   $id = $_POST['id'];

   ##sql para selecionar apens um aluno
   $sql = "SELECT * FROM aluno where id = :id";
   
   # junta o sql a conexao do banco
   $retorno = $conexao->prepare($sql);

   ##diz o paramentro e o tipo  do paramentros
   $retorno->bindParam(':id',$id, PDO::PARAM_INT);

   #executa a estrutura no banco
   $retorno->execute();

  #transforma o retorno em array
   $array_retorno=$retorno->fetch();
   
   ##armazena retorno em variaveis
   $nome = $array_retorno['nome'];
   $idade = $array_retorno['idade'];
   $datanascimento = $array_retorno['datanascimento'];
   $endereco = $array_retorno['endereco'];
   $estatus = $array_retorno['estatus'];

  ?>

<form method="POST" action="crudaluno.php">
      <label for="nome">Nome: </label>
      <input type="text" name="nome" value="<?php echo $nome?>" required>
  
      <label for="idade">Idade: </label>
      <input type="text" name="idade" value="<?php echo $idade?>" required>
  
      <label for="datanascimento">Data de Nascimento: </label>
      <input type="date" name="datanascimento" value="<?php echo $datanascimento?>" required>
  
      <label for="endereco">Endereço: </label>
      <input type="text" name="endereco" value="<?php echo $endereco?>" required>
  
      <label for="estatus"> Status: </label>
      <select name="estatus" required>
        <option value="A">Ativo</option>
        <option value="D">Desativo</option>
      </select>

      <input type="hidden" name="id" id="" value="<?php echo $id ?>">

      <div>
        <input type="submit" name="update" value="Alterar" class="btn">
      </div>

      <div>
        <button class="button"><a href="listaalunos.php">voltar</a></button>
      </div>
    </form>
  </main>
  <footer>
    <p>Valdir Neto</p>
        <p>If Baiano - Campus Guanambi</p>
  </footer>
</body>
</html>