<!doctype html>

<html lang="es-co" class="no-js" version="HTML+RDFa 1.1" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="baseurl" content="<?php echo base_url() ?>" />
	<title>
	<?php echo $titulo; ?>
	</title>
	<link rel="shortcut icon" href="<?=str_replace("Home/", "", base_url()) .'assets/images/icono.ico';?>" type="image/vnd.microsoft.icon" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
		integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link
		href="https://fonts.googleapis.com/css2?family=Mukta:wght@500&family=Red+Rose:wght@300&family=Source+Sans+Pro:wght@200;400&family=Varta:wght@600&display=swap"
		rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
		integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
		</script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
	<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Mukta&display=swap">
	<link rel="stylesheet" href="<?= str_replace("Home/", "", base_url()) . 'assets/css/menu.css'; ?>" />
	<link rel="stylesheet" href="<?= str_replace("Home/", "", base_url()) . 'assets/css/menu.css'; ?>" />
	<style>
		@font-face {
			font-family: 'Roboto';
			src: url(FCPATH.'system/fonts/DancingScript-Medium.ttf');
		}	
	</style>
</head>

<body id="main_body">
	<div class="page-wrapper chiller-theme toggled">
		<a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
			<i class="fa fa-arrow-right"></i>
		</a>
		<div class="container-fluid" style="background-color: #EFF2FF;">
			<?php
			$this->load->view('navLeftSide');
			?>
			<main class="page-content">
				<section id="secHead">
					<a href="#secButton" class="scrolldown"></a>
				</section>
				<?php
				if (isset($view) && !empty($view)) {
					$this->load->view($view);
				} ?>
				<section id="secButton"></section>
			</main>
		</div>
	</div>
	<script type="text/javascript" src="<?= str_replace("Home/", "", base_url()) . 'assets/js/menu.js'; ?>"></script>
	<?php
	if (!empty($arrJS) && count($arrJS)) {
		foreach ($arrJS as $vJS) {
			echo "<script type='text/javascript' src='" . $vJS . "'></script>\n\t\t";
		}
	}
	if (isset($view) && !empty($view)) {
		if (file_exists(FCPATH . 'assets/js/' . $view . '.js')) {
			echo "<script type='text/javascript' src='" . base_url('assets/js/' . $view) . ".js' defer></script>\n\t";
		}
	}
	?>
	<script>
		$(function () {
			$('[data-toggle="tooltip"]').tooltip()
		})
	</script>
</body>

</html>