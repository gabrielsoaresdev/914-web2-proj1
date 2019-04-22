<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="pt-br">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">

		<title>Hello, world!</title>
	</head>
    <body class="bg-primary">

    	<div class="container">
    		<div class="row">
    			<div id="logo" class="col-sm mx-3 rounded-bottom bg-white">
    				<img src="img/logo.png"/>
    			</div>
    		</div>
    		<div class="row">
	    		<div class="col-sm mx-3 text-white text-center">
	    			<h4>Vários produtos esperando por você!</h4>
	    		</div>
    		</div>
    		<div class="row">
    			<div class="col-sm card m-3">
    				<h3>Faça Login!</h3>
    				<form id="form_login" action="script_login.php" method="POST" enctype="">
    					<div class="form-group">
	    					<input class="form-control" type="email" name="login" placeholder="nome@exemplo.com" required="">
    					</div>
    					<div class="form-group">
	    					<input type="password" class="form-control" name="senha" placeholder="Digite a senha aqui..." required="">
    					</div>
    					<div class="form-group">
    						<input type="submit" class="btn btn-primary" value="Entrar"/>
    					</div>
    				</form>
    			</div>

    			<div class="col-sm card m-3">
			    	<h3>Cadastre-se para acessar!</h3>
    				<a class="btn btn-primary my-3" href="#">Cadastre-se como cliente!</a>
    				<a class="btn btn-primary my-3" href="#">Cadastre-se como administrador!</a>
    			</div>
    		</div>
    	</div>

    	<footer class="text-white text-center">
    		&copy, 2019
    	</footer>

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	    <script src="js/bootstrap.min.js"></script>
  
    </body>
</html>
