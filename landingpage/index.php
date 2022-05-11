<?php
    include('include/conecte.php');
    session_start();

	if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
	  unset($_SESSION['login']);
	  unset($_SESSION['senha']);
      $logado = "";
	}else{
	 
		$logado = $_SESSION['login'];
		
        $consulta  = $PDO->query("SELECT id, nome, sexo, idade, hobby, datanascimento, email, senha, tpusuario FROM desenvolvedores ORDER BY id desc;");
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);

        $sql_edita = $PDO->query("SELECT id, nome, sexo, idade, hobby, datanascimento, email, senha, tpusuario FROM desenvolvedores WHERE email = '".$logado . "'");
        $res_edita = $sql_edita->fetch(PDO::FETCH_ASSOC);

		$tpusu = $res_edita['tpusuario'];

	}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Landing PAGE Html5 Template">
    <meta name="keywords" content="landing,startup,flat">
    <meta name="author" content="Made By GN DESIGNS">
    <title><?=$titulo?></title>
    <link href="assets/js/plugins/bootsnav_files/skins/color.css" rel="stylesheet">
    <link href="assets/js/plugins/bootsnav_files/css/animate.css" rel="stylesheet">
    <link href="assets/js/plugins/bootsnav_files/css/bootsnav.css" rel="stylesheet">
    <link href="assets/js/plugins/bootsnav_files/css/overwrite.css" rel="stylesheet">
    <link href="assets/js/plugins/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="assets/js/plugins/owl-carousel/owl.theme.css" rel="stylesheet">
    <link href="assets/js/plugins/owl-carousel/owl.transitions.css" rel="stylesheet">
    <link href="assets/js/plugins/Magnific-Popup-master/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="assets/bootstrap-3.3.7/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/main.css?12" rel="stylesheet">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	<script type="text/javascript">
		function ocultarEntrar(){
		    $('#SignIn').modal('hide');
		}
		
		function mascara_data(campo, valor){
		  var mydata = '';
		  mydata = mydata + valor;
		  if (mydata.length == 2){
			mydata = mydata + '/';
			campo.value = mydata;
		  }
		  if (mydata.length == 5){
			mydata = mydata + '/';
			campo.value = mydata;
		  }
		}
 
	</script>
</head> 

<body style="padding-right:0px;">
    <div class="page-preloader">
        <div class="spinner">
            <div class="rect1"></div>
            <div class="rect2"></div>
            <div class="rect3"></div>
            <div class="rect4"></div>
            <div class="rect5"></div>
        </div>
    </div>

    <!--======================================== 

           Header

    ========================================-->
    <nav class="navbar navbar-default navbar-fixed white no-background bootsnav navbar-scrollspy" data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">


        <div class="container">


            <div class="navbar-header">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">

                    <i class="fa fa-bars"></i>

                </button>

                <a class="navbar-brand" href="#brand">

                    <img src="assets/img/logo.png" class="logo" alt="logo">

                </a>

            </div>
           

            <div class="collapse navbar-collapse" id="navbar-menu">

                <ul class="nav navbar-nav navbar-right">

                    <li class="active scroll"><a href="#home">Home</a></li>

                    <li class="scroll"><a href="#about">Sobre</a></li>

                    <li class="scroll"><a href="#services">Servi&ccedil;os</a></li>

                    <li class="scroll"><a href="#price">Planos</a></li>

                    <li class="scroll"><a href="#team">Equipe</a></li>

                    <li class="scroll"><a href="#clients">Clientes</a></li>

                    <?php if($logado != ""){ ?>
                    <li class="scroll"><a href="#users">&Aacute;rea do usu&aacute;rio</a></li>
                    <?php } ?>
                    <li class="scroll"><a href="#contact">Contato</a></li>

                    <li class="button-holder">

                    	<?php if($logado == ""){ ?>
                    		
                    		<button type="button" class="btn btn-blue navbar-btn" data-toggle="modal" data-target="#SignIn">Entrar</button>
                    	
                    	<?php }else{ ?>
                            	<a href="valida/logout.php" style="padding-top:0px"> 
                                    <button type="button" class="btn btn-blue navbar-btn" id="sair" >Sair</button> 
                                </a>
						<?php } ?>
                    </li>

                </ul>

            </div>

            

        </div>

    </nav>



    <!--//** Banner**//-->

    <section id="home">

        <div class="container">

            <div class="row">

                <div class="col-md-6 caption">

                    <h1>Bem Vindo!</h1>

                    <h2>

                           I am 

                            <span class="animated-text"></span>

                            <span class="typed-cursor"></span>

                        </h2>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni, quibusdam. Sit, quas tempora quia officia!</p>

                </div>

                <!-- LOGIN -->
                <div class="col-md-5 col-md-offset-1">

                    <form class="signup-form" method="post" action="valida/acao.php">
					
                        <h2 class="text-center">Cadastre-se</h2>

                        <hr>
                        <input type="hidden" name="id" value="0">
        				<input type="hidden" name="acao" value="inserir">

                        <div class="form-group">

                            <input type="text" required name="nome" id="nome" class="form-control" placeholder="Nome completo" required="required">

                        </div>

                        <div class="form-group">

                            <input type="email" required name="email" id="email" class="form-control" placeholder="Email" required="required">

                        </div>

                        <div class="form-group">

                            <input type="password" required name="senha" id="senha" class="form-control" placeholder="Senha" required="required">

                        </div>

                        <div class="form-group text-center">

                            <button type="submit" class="btn btn-blue btn-block">Inscrever</button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </section>


    <!--======================================== 

           Sobre

    ========================================-->
    <section id="about" class="section-padding">

        <div class="container">

            <h2>Sobre</h2>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio, optio.</p>

            <div class="row">

                <div class="col-md-4">

                    <div class="icon-box">

                        <i class="material-icons">favorite</i>

                        <h4>Simple To Use</h4>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas minima, dicta quaerat sit cupiditate eum mollitia.</p>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="icon-box">

                        <i class="material-icons">flash_on</i>

                        <h4>Powerful</h4>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas minima, dicta quaerat sit cupiditate eum mollitia.</p>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="icon-box">

                        <i class="material-icons">settings</i>

                        <h4>Easy To Customize</h4>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas minima, dicta quaerat sit cupiditate eum mollitia.</p>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!--======================================== 

           Story

    ========================================-->
    <section id="story">

        <div class="container-fluid">

            <div class="row">

                <!-- Img -->

                <div class="col-md-6 story-bg">

                </div>

                <!-- Story Caption -->

                <div class="col-md-6">

                    <div class="story-content">

                        <h2>Our Success Story</h2>

                        <p class="story-quote">

                            " Success is finding satisfaction in giving a little more than you take."

                        </p>

                        <div class="story-text">

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis amet consequatur incidunt, alias odit quisquam laborum nemo nisi, vel, tempora eligendi enim voluptate accusamus libero voluptas commodi ex rerum dolorem!</p>

                        </div>

                        <a href="#" class="btn btn-white">Learn More</a>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!--======================================== 

           Serviços

    ========================================-->
    <section id="services" class="section-padding">

        <div class="container">

            <h2>Servi&ccedil;os</h2>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio, optio.</p>

            <div class="row">

                <div class="col-md-3">

                    <div class="icon-box">

                        <i class="material-icons">thumb_up</i>

                        <h4>Great Quality</h4>

                        <p>Quality ipsum dolor sit amet, consectetur adipisicing elit. Beatae quod error quis.</p>

                    </div>

                </div>

                <div class="col-md-3">

                    <div class="icon-box">

                        <i class="material-icons">euro_symbol</i>

                        <h4>Best Price</h4>

                        <p>Price ipsum dolor sit amet, consectetur adipisicing elit. Beatae quod error quis.</p>

                    </div>

                </div>

                <div class="col-md-3">

                    <div class="icon-box">

                        <i class="material-icons">forum</i>

                        <h4>24/7 Support</h4>

                        <p>Support ipsum dolor sit amet, consectetur adipisicing elit. Beatae quod error quis.</p>

                    </div>

                </div>

                <div class="col-md-3">

                    <div class="icon-box">

                        <i class="material-icons">view_carousel</i>

                        <h4>UX/UI Design</h4>

                        <p>Quality ipsum dolor sit amet, consectetur adipisicing elit. Beatae quod error quis.</p>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!--======================================== 

           Features

    ========================================-->
    <section id="features">

        <div class="container">

            <div class="row">

                <div class="col-md-6">

                    <h2>Awesome Features</h2>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, repudiandae mollitia iure magni accusamus, alias veniam.</p>

                    <hr>

                    <div class="feat-media">

                        <!-- Feature -->

                        <div class="media">

                            <div class="media-left">

                                <a href="#">

                                    <i class="material-icons">monetization_on</i>

                                </a>

                            </div>

                            <div class="media-body">

                                <h4 class="media-heading">Easy On Your Wallet</h4>

                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti nam vel provident quae.</p>

                            </div>

                        </div>

                        <!-- Feature -->

                        <div class="media">

                            <div class="media-left">

                                <a href="#">

                                    <i class="material-icons">access_time</i>

                                </a>

                            </div>

                            <div class="media-body">

                                <h4 class="media-heading">Time Saver</h4>

                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti nam vel provident quae.</p>

                            </div>

                        </div>

                        <!-- Feature -->

                        <div class="media">

                            <div class="media-left">

                                <a href="#">

                                    <i class="material-icons">computer</i>

                                </a>

                            </div>

                            <div class="media-body">

                                <h4 class="media-heading">Fully Responsive</h4>

                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti nam vel provident quae.</p>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- Features Img -->

                <div class="col-md-6 col-md-push-2">

                    <img src="assets/img/dashboard.png" class="img-responsive" alt="feature">

                </div>

            </div>

        </div>

    </section>


    <!--======================================== 

           Plano

    ========================================-->
    <section id="price" class="section-padding">

        <div class="container">

            <h2>Escolha seu Plano</h2>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio, optio.</p>

            <div class="row">

                <!-- Pricing Start Here -->

                <div class="pricing-container">

                    <div class="col-md-4">

                        <!--== SINGLE USER: Plan ==-->

                        <div class="plan">

                            <div class="pricing-header">

                                <h3>Single User</h3>

                                <h3>

                                <span class="currency">$</span>

                                <span class="amount">20</span>

                                <span class="period">/mo</span>

                                </h3>

                            </div>

                            <div class="pricing-body">

                                <ul class="list-unstyled">

                                    <li><i class="material-icons">done</i><b>265MB</b> Memory</li>

                                    <li><i class="material-icons">done</i><b>1</b> User</li>

                                    <li><i class="material-icons">done</i><b>1</b> Website</li>

                                    <li><i class="material-icons">done</i><b>1</b> Domain</li>

                                    <li><i class="material-icons">done</i><b>Unlimeted</b> Bandwitch</li>

                                    <li><i class="material-icons">done</i><b>24/7</b> Support</li>

                                </ul>

                            </div>

                            <div class="pricing-footer">

                                <a href="#" class="btn btn-blue">Select</a>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-4">

                        <!--== MULTIPLE USER: Plan ==-->

                        <div class="plan active">

                            <div class="pricing-header">

                                <h3>Multiple Users</h3>

                                <h3>

                                <span class="currency">$</span>

                                <span class="amount">40</span>

                                <span class="period">/mo</span>

                                </h3>

                            </div>

                            <div class="pricing-body">

                                <ul class="list-unstyled">

                                    <li><i class="material-icons">done</i><b>512MB</b> Memory</li>

                                    <li><i class="material-icons">done</i><b>3</b> User</li>

                                    <li><i class="material-icons">done</i><b>5</b> Website</li>

                                    <li><i class="material-icons">done</i><b>7</b> Domain</li>

                                    <li><i class="material-icons">done</i><b>Unlimeted</b> Bandwitch</li>

                                    <li><i class="material-icons">done</i><b>24/7</b> Support</li>

                                </ul>

                            </div>

                            <div class="pricing-footer">

                                <a href="#" class="btn btn-blue">Select</a>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-4">

                        <!--== Developer: Plan ==-->

                        <div class="plan">

                            <div class="pricing-header">

                                <h3>Developer</h3>

                                <h3>

                                <span class="currency">$</span>

                                <span class="amount">60</span>

                                <span class="period">/mo</span>

                                </h3>

                            </div>

                            <div class="pricing-body">

                                <ul class="list-unstyled">

                                    <li><i class="material-icons">done</i><b>1024MB</b> Memory</li>

                                    <li><i class="material-icons">done</i><b>5</b> User</li>

                                    <li><i class="material-icons">done</i><b>10</b> Website</li>

                                    <li><i class="material-icons">done</i><b>10</b> Domain</li>

                                    <li><i class="material-icons">done</i><b>Unlimeted</b> Bandwitch</li>

                                    <li><i class="material-icons">done</i><b>24/7</b> Support</li>

                                </ul>

                            </div>

                            <div class="pricing-footer">

                                <a href="#" class="btn btn-blue">Select</a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!--======================================== 

           Time

    ========================================-->
    <section id="team" class="section-padding">

        <div class="container">

            <h2>Time de Profissionais</h2>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio, optio.</p>

            <div class="row">

                <div class="col-md-6 col-lg-3">

                    <!--**Team-Member**-->

                    <div class="thumbnail team-member">

                        <img src="assets/img/team-1.jpg" class="img-responsive img-circle" alt="team-1">

                        <div class="caption">

                            <h4>Adam White</h4>

                            <h6>Founder Ceo</h6>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

                            <hr>

                            <div class="team-social">

                                <ul class="liste-unstyled">

                                    <li><a href="#facebook"><i class="fa fa-facebook"></i></a></li>

                                    <li><a href="#twitter"><i class="fa fa-twitter"></i></a></li>

                                    <li><a href="#linkedin"><i class="fa fa-linkedin"></i></a></li>

                                    <li><a href="#instagram"><i class="fa fa-instagram"></i></a></li>

                                </ul>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-md-6 col-lg-3">

                    <!--**Team-Member**-->

                    <div class="thumbnail team-member">

                        <img src="assets/img/team-2.jpg" class="img-responsive img-circle" alt="team-2">

                        <div class="caption">

                            <h4>Jasmine Doe</h4>

                            <h6>Web Designer</h6>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

                            <hr>

                            <div class="team-social">

                                <ul class="liste-unstyled">

                                    <li><a href="#facebook"><i class="fa fa-facebook"></i></a></li>

                                    <li><a href="#twitter"><i class="fa fa-twitter"></i></a></li>

                                    <li><a href="#linkedin"><i class="fa fa-linkedin"></i></a></li>

                                    <li><a href="#instagram"><i class="fa fa-instagram"></i></a></li>

                                </ul>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-md-6 col-lg-3">

                    <!--**Team-Member**-->

                    <div class="thumbnail team-member">

                        <img src="assets/img/team-3.jpg" class="img-responsive img-circle" alt="team-3">

                        <div class="caption">

                            <h4>Mike White</h4>

                            <h6>Developer</h6>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

                            <hr>

                            <div class="team-social">

                                <ul class="liste-unstyled">

                                    <li><a href="#facebook"><i class="fa fa-facebook"></i></a></li>

                                    <li><a href="#twitter"><i class="fa fa-twitter"></i></a></li>

                                    <li><a href="#linkedin"><i class="fa fa-linkedin"></i></a></li>

                                    <li><a href="#instagram"><i class="fa fa-instagram"></i></a></li>

                                </ul>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-md-6 col-lg-3">

                    <!--**Team-Member**-->

                    <div class="thumbnail team-member">

                        <img src="assets/img/team-4.jpg" class="img-responsive img-circle" alt="team-4">

                        <div class="caption">

                            <h4>Jarl Doe</h4>

                            <h6>Photographer</h6>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

                            <hr>

                            <div class="team-social">

                                <ul class="liste-unstyled">

                                    <li><a href="#facebook"><i class="fa fa-facebook"></i></a></li>

                                    <li><a href="#twitter"><i class="fa fa-twitter"></i></a></li>

                                    <li><a href="#linkedin"><i class="fa fa-linkedin"></i></a></li>

                                    <li><a href="#instagram"><i class="fa fa-instagram"></i></a></li>

                                </ul>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!--======================================== 

           Clientes

    ========================================-->
    <section id="clients" class="section-padding">

        <div class="container">

            <div class="row">

                <h2>Clientes que confiam em n&oacute;s</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio, optio.</p>

                <!--// Clients Images //-->

                <div class="clients-images">

                    <div id="owl-clients">

                        <div class="item"><img src="assets/img/clients/c_logo01.png" class="center-block" alt="client"></div>

                        <div class="item"><img src="assets/img/clients/c_logo02.png" class="center-block" alt="client"></div>

                        <div class="item"><img src="assets/img/clients/c_logo03.png" class="center-block" alt="client"></div>

                        <div class="item"><img src="assets/img/clients/c_logo04.png" class="center-block" alt="client"></div>

                        <div class="item"><img src="assets/img/clients/c_logo05.png" class="center-block" alt="client"></div>

                        <div class="item"><img src="assets/img/clients/c_logo06.png" class="center-block" alt="client"></div>

                    </div>

                </div>

                <!--// Clients Testimonials //-->

                <div id="owl-testimonials">

                    <div class="item">

                        <i class="material-icons">mood</i>

                        <p class="quote">Vivamus quam neque, aliquet ac faucibus ut, vestibulum. Nulla quis laoreet diam. Donec sed egestas ex, nec facilisis ante. Vivamus imperdiet odio. Cras luctus interdum sodales. Quisque quis odio dui.</p>

                        <h4>-John Doe, Company inc.</h4>

                    </div>

                    <div class="item">

                        <i class="material-icons">mood</i>

                        <p class="quote">Vivamus quam neque, aliquet ac faucibus ut, vestibulum. Nulla quis laoreet diam. Donec sed egestas ex, nec facilisis ante. Vivamus imperdiet odio. Cras luctus interdum sodales. Quisque quis odio dui.</p>

                        <h4>-Jarl Doe, Company inc.</h4>

                    </div>

                    <div class="item">

                        <i class="material-icons">mood</i>

                        <p class="quote">Vivamus quam neque, aliquet ac faucibus ut, vestibulum. Nulla quis laoreet diam. Donec sed egestas ex, nec facilisis ante. Vivamus imperdiet odio. Cras luctus interdum sodales. Quisque quis odio dui.</p>

                        <h4>-Adam Doe, Company inc.</h4>

                    </div>

                </div>

            </div>

        </div>

    </section>



    <!--======================================== 

           ÁREA DO USUÁRIO

    ========================================-->

    <?php if($logado != ""){ ?>

    <section id="newsletter">

        <div class="container">

            <div class="row">

                <h3>&Aacute;REA DO USU&Aacute;RIO</h3>

            </div>

        </div>

    </section>


    <section id="users" class="section-padding about">

        <div class="container">

            <h2 style="text-align:center">&Aacute;rea do usu&aacute;rio</h2>

            <p style="text-align:center">Usu&aacute;rios cadastrados no sistema</p>

            <div class="row">

                <div class="col-md-4">

                    <div class="icon-box">

                        <h4>NOME</h4>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="icon-box">

                        <h4>EMAIL</h4>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="icon-box">

                        <p> &nbsp; </p>

                    </div>

                </div>

            </div>
            
            <div class="row">
            <form class="signup-form" method="post" action="valida/acao.php">
			<?php foreach ($resultado as $row) { 
			
				$dtbanco      =  explode("-",$row['datanascimento']);
				$dtnascimento = $dtbanco[2]."/".$dtbanco[1]."/".$dtbanco[0]; 
				
			?> 
			<div class="row">   
					
				<div class="col-md-4">
					<div class="icon-box">
						<p><?=$row['nome']?></p>
					</div>
				</div>

				<div class="col-md-4">
					<div class="icon-box">
						<p><?=$row['email']?></p>
					</div>
				</div>

				<div class="col-md-4">
					<div class="icon-box">
					
					<?php if($tpusu == 'M'){?>    
						 
						 <button type="button" data-toggle="modal" class="btn_editar" data-target="#EditarCadastro<?=$row['id']?>" >
							<img src="assets/img/editar.png" alt="Editar" title="Editar" /> 
						 </button> &nbsp;&nbsp;
						 
						 <a id="btnExcluir" onclick="return confirm('Tem certeza que deseja excluir o usu&aacute;rio: <?=$row['nome']?>?');" href="valida/acao.php?acao=excluir&id=<?=$row['id']?>">	
							<img src="assets/img/excluir.png" alt="Excluir" title="Excluir" />
						 </a> 
						
					<?php } else if(($logado == $row['email']) && ($row['tpusuario'] == 'G')){  ?>
						
						 <button type="button" data-toggle="modal" class="btn_editar" data-target="#EditarCadastro<?=$row['id']?>" >
							<img src="assets/img/editar.png" alt="Editar" title="Editar" /> 
						 </button> 
						
					<?php } ?>    

					</div>
				</div>

			</div> 

			<!-- INICIO MODAL EDITAR CADASTRO -->
			<div class="modal fade" id="EditarCadastro<?=$row['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="padding-right:0px;">

				<div class="modal-dialog" role="document">

					<div class="modal-content">

						<div class="modal-header">

							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

							<h4 class="modal-title text-center" id="myModalLabel">Editar Cadastro </h4>

						</div>

						<div class="modal-body">

							<form class="signup-form" method="post" action="valida/acao.php">
								<input type="hidden" name="acao" value="editar">
							    <input type="hidden" name="id"   value="<?=$row['id']?>">
								<div class="form-group">
									<input type="text" class="form-control" name="nome" placeholder="Nome" value="<?=$row['nome']?>" required="required">
								</div>
								<div class="form-group">
									<input type="radio" name="sexo" id="sexoF" value="F" <?php if($row['sexo'] == 'F'){?> checked <?php } ?> ><label for="sexoF"> Feminino &nbsp;&nbsp; </label>
									<input type="radio" name="sexo" id="sexoM" value="M" <?php if($row['sexo'] == 'M'){?> checked <?php } ?> ><label for="sexoM"> Masculino </label>
								</div>
								<div class="form-group">
									<input type="text" class="form-control" name="idade" placeholder="Idade" value="<?=$row['idade']?>" maxlength="3" size="3" required="required">
								</div>
								<div class="form-group">
									<input type="text" class="form-control" name="hobby" placeholder="Hobby" value="<?=$row['hobby']?>" required="required">
								</div>
								<div class="form-group">
									<input type="text" class="form-control" name="datanascimento" placeholder="Data Nascimento" value="<?=$dtnascimento?>"
										   required="required" onkeyup="mascara_data(this, this.value)" maxlength="10">
								</div>
								<div class="form-group">
									<input type="email" class="form-control" name="email" placeholder="Email" value="<?=$row['email']?>" readonly="readonly" >
								</div>
								<div class="form-group">
									<input type="password" class="form-control" name="senha" placeholder="Senha" value="<?=$row['senha']?>" required="required">
								</div>
								 
								<div class="form-group">
								<?php if($tpusu == 'M'){?> 
									<input type="radio" name="tpusuario" id="usuM" value="M" <?php if($row['tpusuario'] == 'M'){?> checked <?php } ?> ><label for="usuM"> Usu&aacute;rio Master &nbsp;&nbsp; </label>
							    <?php } ?>								
								<input type="radio" name="tpusuario" id="usuG" value="G" <?php if($row['tpusuario'] == 'G'){?> checked <?php } ?> ><label for="usuG"> Usu&aacute;rio Geral </label>
								</div>
								
								<div class="form-group text-center">

									<button type="submit" class="btn btn-blue btn-block" href="valida/acao.php?acao=editar&id=<?=$row['id']?>">Salvar</button>

									
								</div>
							</form>

						</div>

					</div>

				</div>

			</div>
			<!-- FINAL MODAL EDITAR CADASTRO -->
			
			<?php } ?> 
			</form> 
			            
			
            </div>

        </div>

    </section>

    <?php } ?>


    <!--======================================== 

           Contato

    ========================================-->
    <section id="contact" class="section-padding">

        <div class="container">

            <h2>Contato</h2>

            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr</p>

            <p>sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>

        </div>

        <!-- Contact Info -->

        <div class="container contact-info">

            <div class="row">

                <div class="col-md-4">

                    <div class="icon-box">

                        <i class="material-icons">place</i>

                        <h4>Address</h4>

                        <p>PABox 13592, Lorem Street Ipsum Dolor, Victoria 8007, USA</p>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="icon-box">

                        <i class="material-icons">phone</i>

                        <h4>Call Us On</h4>

                        <p>1-834-527-6940</p>

                        <p>1-834-527-6940</p>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="icon-box">

                        <i class="material-icons">email</i>

                        <h4>Email us on</h4>

                        <p>lorem@xyz.com</p>

                        <p>lorem@xyz.com</p>

                    </div>

                </div>

            </div>

        </div>

        <!-- Google Map -->

        <div id="map"></div>

    </section>


    <!--======================================== 

           RODAPÉ

    ========================================-->
    <footer>

        <div class="container">

            <div class="row">

                <div class="footer-caption">

                    <img src="assets/img/logo.png" class="img-responsive center-block" alt="logo">

                    <hr>

                    <h5 class="pull-left">Ka&iacute;sa Fernanda, &copy;<?=date('Y'); ?> Todos os direitos reservados</h5>

                    <ul class="liste-unstyled pull-right">

                        <li><a href="#facebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>

                        <li><a href="#twitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>

                        <li><a href="#linkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>

                        <li><a href="#instagram" title="Instagram"><i class="fa fa-instagram"></i></a></li>

                    </ul>

                </div>

            </div>

        </div>

    </footer>


    <!-- LOGIN -->
    <div class="modal fade" id="SignIn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    <h4 class="modal-title text-center" id="myModalLabel">Entrar</h4>

                </div>

                <div class="modal-body">

                    <form class="signup-form" method="post" action="valida/acao.php">
                    	<input type="hidden" name="id" value="0">
						<input type="hidden" name="acao" value="login">	
                        <div class="form-group">

                            <input type="text" class="form-control" name="email" placeholder="Email" required="required">

                        </div>

                        <div class="form-group">

                            <input type="password" class="form-control" name="senha" placeholder="Senha" required="required">

                        </div>

                        <div class="form-group text-center">

                            <button type="submit" class="btn btn-blue btn-block">Entrar</button>

                        </div>

                    </form>

                </div>


            </div>

        </div>

    </div>
   

    </div> 


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <script src="assets/bootstrap-3.3.7/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

    <script src="assets/js/plugins/owl-carousel/owl.carousel.min.js"></script>

    <script src="assets/js/plugins/bootsnav_files/js/bootsnav.js"></script>

    <script src="assets/js/plugins/typed.js-master/typed.js-master/dist/typed.min.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js"></script>

    <script src="assets/js/plugins/Magnific-Popup-master/Magnific-Popup-master/dist/jquery.magnific-popup.js"></script>

    <script src="assets/js/main.js"></script>

</body>



</html>
