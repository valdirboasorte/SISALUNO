<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Professor</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<header>
        <h1>Sistema Aluno</h1>
        <img src="../imagem/pokebola-verde.png" alt="">
    </header>
    <main>
    <img src="../imagem/joia.png" alt="joia">
    <img src="../imagem/joia-2.png" alt="joia-2">
    <div class="box">
        <h1>Parabéns</h1>
        <article>
        <?php
##permite acesso as variaves dentro do aquivo conexao
require_once('../conexao.php');



##cadastrar
if(isset($_GET['cadastrar'])){
        ##dados recebidos pelo metodo GET
        $nomedisciplina = $_GET["nome"];
        $ch = $_GET["ch"];
        $semestre = $_GET["semestre"];
        $idprofessor = $_GET["professor"];
        $nota1 = $_GET["nota1"];
        $nota2 = $_GET["nota2"];
        $media = ($_GET["nota2"] + $_GET["nota1"]) / 2;

        ##codigo SQL
        $sql = "INSERT INTO disciplina(nomedisciplina, ch, semestre, idprofessor, Nota1, Nota2, Media) 
                VALUES('$nomedisciplina', '$ch', '$semestre', '$idprofessor', '$nota1', '$nota2', '$media')";

        ##junta o codigo sql a conexao do banco
        $sqlcombanco = $conexao->prepare($sql);

        ##executa o sql no banco de dados
        if($sqlcombanco->execute())
            {
                echo " <strong>OK!</strong> a disciplina
                $nomedisciplina foi Incluido com sucesso!!!"; 
                echo " <button class='button-voltar'><a href='../index.html'>voltar</a></button>";
            }

        }
#######alterar
if(isset($_POST['update'])){

    ##dados recebidos pelo metodo POST
    $nome = $_POST["nome"];
    $ch = $_POST["ch"];
    $semestre = $_POST["semestre"];
    $idprofessor = $_POST["professor"];
    $Nota1 = $_POST["Nota1"];
    $Nota2 = $_POST["Nota2"];
    $Media = ($_POST["Nota1"] + $_POST["Nota2"]) / 2;
    $id = $_POST["id"];
   
      ##codigo sql
    $sql = "UPDATE  disciplina SET nomedisciplina   = :nome, ch = :ch, semestre = :semestre, idprofessor = :idprofessor, Nota1 = :Nota1, Nota2 = :Nota2, Media = :Media WHERE id= :id ";
   
    ##junta o codigo sql a conexao do banco
    $stmt = $conexao->prepare($sql);

    ##diz o paramentro e o tipo  do paramentros
    $stmt->bindParam(':id',$id, PDO::PARAM_INT);
    $stmt->bindParam(':nome',$nome, PDO::PARAM_STR);
    $stmt->bindParam(':ch',$ch, PDO::PARAM_STR);
    $stmt->bindParam(':semestre',$semestre, PDO::PARAM_STR);
    $stmt->bindParam(':idprofessor',$idprofessor, PDO::PARAM_INT);
    $stmt->bindParam(':Nota1',$Nota1, PDO::PARAM_INT);
    $stmt->bindParam(':Nota2',$Nota2, PDO::PARAM_INT);
    $stmt->bindParam(':Media',$Media, PDO::PARAM_INT);
    $stmt->execute();
 


    if($stmt->execute())
        {
            echo " <strong>OK!</strong> a disciplina
             $nome foi Alterada com sucesso!!!"; 

            echo " <button class='button-voltar'><a href='listadisciplina.php'>voltar</a></button>";
        }

}        


##Excluir
if(isset($_GET['excluir'])){
    $id = $_GET['id'];
    $sql ="DELETE FROM `disciplina` WHERE id={$id}";
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    if($stmt->execute())
        {
            echo " <strong>OK!</strong> a disciplina
             $id foi excluido!!!"; 

            echo " <button class='button-voltar'><a href='listadisciplina.php'>voltar</a></button>";
        }

}

        
?>
        </article>
    </div>
  </main>
  <footer>
    <p>Valdir Neto</p>
    <p>If Baiano - Campus Guanambi</p>
  </footer>
    </main>
</body>
</html>