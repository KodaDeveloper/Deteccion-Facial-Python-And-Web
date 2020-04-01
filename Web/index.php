<?php 

include 'bd/conn.php';

  if (isset($_POST["name"])) {
    $nome = $_POST["name"];
    $sobrenome = $_POST["sobrenome"];
    $imagem = $_FILES['imagem']['tmp_name'];
    $tamanho = $_FILES['imagem']['size'];
    $tipo = $_FILES['imagem']['type'];
    $nome_img = $_FILES['imagem']['name'];
    $diretorio = "img";
    $arquivo_temporario = $_FILES['imagem']['tmp_name'];
    move_uploaded_file($arquivo_temporario, $diretorio."/".$nome_img);
  
   
    



    $inserir = "INSERT INTO reconhecimento ";
    $inserir .= "(nome,sobrenome,imagem,tamanho,tipo,nome_img)";
    $inserir .= "VALUES ";
    $inserir .= "('$nome','$sobrenome','$imagem','$tamanho','$tipo','$nome_img')";

    $op_inserir = mysqli_query($conecta, $inserir);
    if (!$op_inserir) {
      die("Error ao inserir");
    }
  }

  $consult = "SELECT * FROM reconhecimento ORDER BY id DESC ";
  $reconhecimento = mysqli_query($conecta,$consult);
  $reconhecimento2 = mysqli_query($conecta,$consult);

  if (!$reconhecimento) {
    die("Error consulta");
  }


  $row = $reconhecimento2 -> fetch_assoc();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Koda Developer</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="fonts/font-awesome.min.css">
  <link rel="icon" type="imagem/png" href="img/logo.png" />
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="https://kit.fontawesome.com/2463b1ceea.js" crossorigin="anonymous"></script>
 

</head>

<body>


<main class="main">


  <section class="main-section container">

      <div class="text-center">
        <h1 style="color:#ffaa00 "><i class="fas fa-laptop-code"></i></h1>
        <h1 class="tittle-main-section">Koda <span style="color: #ffaa00">Developer <i class="fas fa-code"></i></span></h1>
        <h4 class="desc-main-section">É com codigo que escrevo a minha história.</h4>
      </div>

    <div class="section-one">

      <div class="triangle">

        <center>
          
        </center>

      </div>

    </div>
  </section>





</main>


<section class="container">
  <div class="col-md-6" style="padding-top: 5%;">
    <div class="panel panel-color">
      <div class="panel-heading text-center">
        <h3>Cadastro</h3>
      </div>
      <div class="panel-body text-center">
            
           <form action="index.php" method="post" enctype="multipart/form-data">

              <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
              <label for="sobrenome">Sobrenome:</label>
              <input type="text" class="form-control" id="sobrenome" name="sobrenome">
            </div>
            <div class="file-input">
              <input type="hidden" name="MAX_FILE_SIZE" value="99999999"/>
              <div><input class="input-custom" name="imagem" type="file"/></div>
            </div>
            <br>

            <button class="btn btn-custom" type="submit">Enviar</button>

           </form>

      </div>
    </div>
  </div>

   <div class="col-md-6" style="padding-top: 5%;">
    <div class="panel panel-color">
      <div class="panel-heading text-center">
        <h3>Ultimo registro:</h3>
      </div>
      <div class="panel-body text-center">
         
       
          <p>ID: <?php echo $row['id']; ?></p>
          <p>Nome: <?php echo $row['nome']; ?></p>
          <p>Sobrenome: <?php echo $row['sobrenome']; ?></p>
          <p class="text-center">
            Imagem:
          </p>
           <center>
             <img width="300" height="240" src="img/<?php echo $row['nome_img']; ?>">
           </center>

        

      </div>
    </div>
  </div>


     <div class="col-md-12" style="padding-top: 5%;">
    <div class="panel panel-color">
      <div class="panel-heading text-center">
        <h3>Registros Aprovados:</h3>
        <h6>IMGRC: Imagem Reconhecida</h6>
      </div>
      <div class="panel-body text-center">
         <?php while ($registro = mysqli_fetch_assoc($reconhecimento)) {
         ?>
         
        <div class="col-md-3">
          
       
          <p>ID: <?php echo $registro['id']; ?></p>
          <p>Nome: <?php echo $registro['nome']; ?></p>
          <p>Sobrenome: <?php echo $registro['sobrenome']; ?></p>
          <p>Status: <?php echo $registro['status']; ?></p>
          <p>Quantidade de Rostos: <?php echo $registro['qt_rosto']; ?></p>
          <p class="text-center">
            Imagem:
          </p>
             <img width="220" height="240" src="img/<?php echo $registro['nome_img']; ?>">
          

          
        </div>
<?php } ?>
      </div>
    </div>
  </div>
  
</section>






 
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>


</body>
</html>
