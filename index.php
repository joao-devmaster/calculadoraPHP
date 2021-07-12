<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: green;}
</style>
</head>
<link rel="stylesheet" href="calculadora.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
 <!-- Favicons -->
 <link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
 <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
 <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
 <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
 <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
 <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
 <meta name="theme-color" content="#7952b3">
<body style="background-color: white; ">  
<?php
error_reporting(0);
?>

<?php


// definir variáveis ​​e definir para valores vazios
$nameErr = $alturaErr = $pesoErr = "";

$name = $altura  = $peso = "";

// request que pega os valores das variaveis 
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["name"])) {
    $nameErr = "é necessario digitar o nome";
  } else {
    $name = test_input($_POST["name"]);
    // verificação 
    if (!preg_match("/^[a-zA-Z-' ]*$/",$nameErr)) {
    }
  }
  
  if (empty($_POST["altura"])) {
    $alturaErr = "é necessario digitar a altura";
  } else {
    $altura = test_input($_POST["altura"]);
    // validando formato de dados (altura)
    if (!preg_match("/^[a-zA-Z-' ]*$/",$alturaErr)) {
    }
  }
    
  if (empty($_POST["peso"])) {
    $pesoErr = "é necessario digitar o peso";
  } else {
    $peso = test_input($_POST["peso"]);
    // verificação do formato do peso
    if ($peso === null) {
      echo $pesoErr;
    }
  }

// logica para o calculo 
  $imcp = $altura * $altura;
  $imca = $peso / $imcp;


// codigo para formatar os numeros ex: 1.00000000 / 1.0 
  $imca = number_format($imca);

  
}
  
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
 <!-- formulario -->
<nav class="menu navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <div class="container">

              <a href="#home" >
                  
              </a>
              
              <button class="navbar-toggler" data-toggle="collapse" data-target="#nav-principal">
                <span class="navbar-toggler-icon"></span>
              </button>
      
              <div class="collapse navbar-collapse" id="nav-principal">

                <ul class="navbar-nav ">
                  <li class="nav-item">
                    <a href="#home" class="nav-cv nav-link mx-2 text-white">Home</a>
                  </li>
      
                </ul>
      
              </div>
            </div>
      
          </nav>
    <header class="text-center">
      <section class="py-5 text-center container">
        <div class="row py-lg-5">
          <div class="col-lg-6 col-md-8 mx-auto">
            <h1 style="color: black;"  class="fw-light">Calculadora de IMC</h1>
          </div>
        </div>
    </section>
    <header/>


<div class="container">
  <div class="row">
    <div class="col">
    <h3 class="title">O que é IMC ?</h3>
    <p class="fw-light" style=" color: black;text-align: justify;" >IMC é a sigla para Índice de Massa Corporal,que é um cálculo que serve para avaliar se a pessoa está dentro do seu peso ideal em relação à altura. Assim, de acordo com o valor do resultado de IMC, a pessoa pode saber se está dentro do peso ideal, acima ou abaixo do peso desejado.</p>
   
    </div>

    <div class="col">
    <h3 class="title03">Calcule seu IMC</h3>

    <form style="color: black; " method="post" action="calcular";?>

digite seu nome: <input class="form-control" type="text" name="name" value="<?php echo $name;?>">
<br><br>
digite sua altura (ex: 1.80): <input class="form-control" type="text" name="altura" value="<?php echo $altura;?>">
<br><br>
digite seu peso: <input class="form-control" type="text" name="peso" value="<?php echo $peso;?>">
<br><br>

<input class="btn btn-success" type="submit" name="submit" value="Submit" >   

</form>
    
    </div>
    <div class="col">

    <h3 class="title02">Resultado</h3>
 <!-- condiçoes para a resposta, de acordo com o valor do IMC -->
  
    <?php

      if ($imca < 18.5)
      {
        
            echo("$name, <b>seu IMC é: $imca</b>. Peso abaixo do normal, Procure se alimentar bem, ou procure um médico.");
      }


        else if (($imca > 18.5) && ($imca <= 25))
      {
              echo("$name, <b>seu IMC é: $imca</b>. Peso normal, Muito bem, continue se alimentando bem e praticando exercicios.");
      }


            else  if (($imca > 25) && ($imca < 30))
      {
              echo("$name, <b>seu IMC é: $imca</b>. você está Sobre o Peso, Procure fazer exercícios fisicos, e se alimentar de maneira adequada.");
      }


            else if (($imca > 30) && ($imca < 35))
      {
              echo("$name, <b>seu IMC é: $imca</b>. Grau de Obesidade I, Procure um médico");
      }


            else if (($imca > 35) && ($imca < 40))
      {
                echo("$name, <b>seu IMC é: $imca</b>. Grau de Obesidade II, Procure um médico");
      }


            else  if ($imca > 40)
      {
                echo("$name, <b>seu IMC é: $imca</b>. Obesidade Grau III, Procure um médico");
      }


      ?>
    </div>
  </div>
</div>

      
      <footer>
      <div  class="container">
        <div class="row">
          <div class="col">
            <p class="titfooter">desenvolvedor </p>
          <img class="imgphoto" src="./image/joao.jpeg" alt="foto">
          </div>
          <div class="col">
         
          </div>
          <div class="col">
          <img class="social1" src="./image/gh.png" alt="logo do github">

          </div>
        </div>
     </div>
      </footer>





 <!-- Bootstrap -->
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
  integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
  crossorigin="anonymous"></script>

</body>
</html>