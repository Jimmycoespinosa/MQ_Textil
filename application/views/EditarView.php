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
                                <td>Registrar y Editar Aplicación</td>
                            </tr>								
                        </table>
                    </div>
                    <div class="panel-body">
                        <?php
                            $Frm_atributos = array('method'=>'post', 'action'=>"".str_replace("Home/", "", base_url())."");
                            $div_principal = "<div class='row justify-content-center alig-items-center' border=1>";            
                            $div_inicio = "<div class='form-group col-lg-4'>";
                            $div_btns = "<div class='d-flex align-items-right toolbar' style='margin-top:20px;'>";
                            $div_cierre = "</div>";

                            echo form_open(str_replace("Home", "Inicio/updateApp", base_url()), $Frm_atributos);
                                echo $div_principal;
                                    echo $div_inicio;
                                    echo form_label("Id");            
                                    echo form_input(array('type'=>'text', 'name'=>'Id', 'required'=>'true', 'readonly'=>'true', 'class'=>'form-control w-20 p-3', 'value'=>$appEdit->Id));
                                    echo $div_cierre;

                                    echo $div_inicio;
                                    echo form_label("Nombre");            
                                    echo form_input(array('type'=>'text', 'name'=>'nombre', 'required'=>'true', 'class'=>'form-control', 'value'=>$appEdit->nombre));
                                    echo $div_cierre;

                                    echo $div_inicio;
                                    echo form_label("Dependencia");            
                                    echo form_input(array('type'=>'text', 'name'=>'dependencia', 'required'=>'true', 'class'=>'form-control', 'value'=>$appEdit->dependencia));
                                    echo $div_cierre;

                                    echo $div_inicio;
                                    echo form_label("Ciudad");            
                                    echo form_input(array('type'=>'text', 'name'=>'ciudad', 'required'=>'true', 'class'=>'form-control', 'value'=>$appEdit->ciudad));
                                    echo $div_cierre;
                                    
                                    echo $div_inicio;
                                    echo form_label("URL");            
                                    echo form_input(array('type'=>'text', 'name'=>'urlConect', 'required'=>'true', 'class'=>'form-control', 'value'=>$appEdit->urlConect));
                                    echo $div_cierre;
                                    
                                    echo $div_inicio;
                                    echo $div_cierre;

                                    echo $div_btns;
                                    echo form_submit(array('value'=>'Actualizar', 'class'=>'btn btn-primary', 'style'=>'margin-right: 10px'));
                                    echo form_submit(array('value'=>'Cancelar','name'=>'Cancelar', 'class'=>'btn btn-danger'));
                                    echo $div_cierre;
                                echo $div_cierre;
                            echo form_close();        
                        ?> 
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>