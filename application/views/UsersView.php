<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>::Aplicaciones::</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="description" content="UTIS">
    <meta name="author" content="UTIS">
    <link rel="shortcut icon" href="<?=str_replace("Home/", "", base_url()) .'assets/images/icono.ico';?>" type="image/vnd.microsoft.icon" />
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,700' rel='stylesheet'
        type='text/css'>
    <script src="https://use.fontawesome.com/a5a3b89abb.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script type="text/javascript" src="/GESI_sistemas/js/bootstrap-datepicker.js"></script>
</head>  
<body> 
<div class="row" style="margin-top:5px;font-size:12px;">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading" style="background-color:#31353D;color:#FFFFFF;" >
				<div class="row">
				<div class="col-md-12">
					<table>
						<tr>
						<td>
						<em><b><font face="Dancing Script">APLICACIONES DEL ENTORNO - Microservicios MQ Textil</font></b></em>
						</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="panel-body">
		
		<div class="row">
			<div class="col-md-12">
                <div class="panel panel-default" style="margin-left:20px;margin-right:20px;margin-top:20px">
                    <div class="panel-heading" style="font-size: 12px">
                        <table style="width:100%;vertical-align:middle">
                            <tr>
                                <td>Filtros de Búsqueda</td>
                            </tr>								
                        </table>
                    </div>
                    <div class="panel-body">
                        <form name="BuscaAppForm" action="" method="POST">
                            <div class="row">
                                <div class="col-md-3">
                                    Filtro por nombre<br>
                                    <input type="text" name="filtro" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <br>
                                    <input type="submit" value="Consultar" class="btn btn-success">
                                </div>
                            </div>
                        </form>
                    </div>
                    <br>
                </div>
                <div class="row" style="margin-top:20px;">
                    <div class="col-md-12">
                        <br>
                        <table class="table">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Dependencia</th>
                                <th scope="col">Ciudad</th>
                                <th scope="col">URL</th>
                                <th scope="col" style="text-align: center;">Acciones</th>
                            </tr>
                            <?php
                            foreach($apps as $app){
                                echo "<tr scope='row'>";
                                echo "<td style='vertical-align:middle'>".$app->Id."</td>";
                                echo "<td style='vertical-align:middle'>".$app->nombre."</td>";
                                echo "<td style='vertical-align:middle'>".$app->dependencia."</td>";
                                echo "<td style='vertical-align:middle'>".$app->ciudad."</td>";
                                echo "<td style='vertical-align:middle'>".$app->urlConect."</td>";
                                echo "<td scope='col' style='text-align: center;'>";
                            ?>
                                <a href="<?php echo str_replace("Home/", "", base_url()) .'Inicio/editApp';?>/<?php echo $app->Id; ?>" class="btn btn-warning" 'role="button" ><i class="bi bi-pencil-square"></i></a>
                                <a href="<?php echo str_replace("Home/", "", base_url()) .'Inicio/deleteApp';?>/<?php echo $app->Id; ?>" class="btn btn-danger" 'role="button" ><i class="bi bi-trash"></i></a>
                                <a href="<?php echo $app->urlConect;?>" class="btn btn-success" 'role="button" target="_blank"><i class="fa fa-paper-plane"></i></a>
                            <?php
                                echo "</td>";
                                echo "</tr>";
                            }
                        ?>                
                        </table>
                        <!-- IMPLEMENTACIÓN PAGINACIÓN -->
                        <div class="row text-center">
                            <div class="col-md-12">
                                <nav aria-label="...">
                                    <ul class="pagination">
                                        <?php
                                            $prev = $current_page-1;
                                            $next = $current_page+1;
                                            if($prev <= 0){
                                                $prev = 1;
                                            }
                                            if($next >= $last_page){
                                                $next = $last_page;
                                            }                            
                                        ?>
                                        <?php if($current_page <= 1){?>
                                            <li class="page-item disabled">
                                        <?php }else{?>
                                            <li class="page-item">                                            
                                        <?php }?>
                                                <a class="page-link" href="<?php echo str_replace("Home/", "", base_url()) .'Inicio/aplicaciones/'.$prev;?>" tabindex="-1">Anterior</a>
                                            </li>
                                        <?php for($i=1; $i <= $last_page; $i++){?>
                                            <?php if($i == $current_page){?>
                                                <li class="page-item active">
                                                <a class="page-link" href="<?php echo str_replace("Home/", "", base_url()) .'Inicio/aplicaciones/'.$i;?>"><?php echo $i;?><span class="sr-only">(current)</span></a>
                                            <?php }else{?>
                                                <li class="page-item"><a class="page-link" href="<?php echo str_replace("Home/", "", base_url()) .'Inicio/aplicaciones/'.$i;?>"><?php echo $i;?></a></li>                            
                                            <?php }                           
                                        }?>
                                        </li>
                                        <?php if($current_page >= $last_page){?>
                                            <li class="page-item disabled">
                                        <?php }else{?>
                                            <li class="page-item">
                                        <?php }?>
                                            <a class="page-link" href="<?php echo str_replace("Home/", "", base_url()) .'Inicio/aplicaciones/'.$next;?>">Siguiente</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>