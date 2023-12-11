<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>::Usuarios::</title>
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
                                <td>Creación de Usuario</td>
                            </tr>								
                        </table>
                    </div>
                    <div class="panel-body">
                        <?php
                            $Frm_atributos = array('id'=>'FormCrear', 'method'=>'post', 'action'=>"".str_replace("Home/", "", base_url())."");
                            $Frm_events = array('onsubmit'=>'return fnValidatePsw();'."");                            
                            $div_principal = "<div class='row justify-content-center alig-items-center' border=1>";            
                            $div_inicio = "<div class='form-group col-lg-6'>";
                            $div_inicio_right = "<div class='form-group col-lg-6 text-right'>";
                            $div_btns = "<div class='d-flex toolbar' style='margin-top:20px;'>";
                            $div_select = "<select style='width:250px;'>";
                            $div_select_fin = "</select>";
                            $div_cierre = "</div>";

                            echo form_open(str_replace("Home", "Inicio/crearUsuario", base_url()), array_merge($Frm_atributos, $Frm_events));
                                echo $div_principal;
                                    echo form_input(array('type'=>'hidden', 'name'=>'flowOption', 'id'=>'flowOption', 'class'=>'form-control', 'value'=>'0'));
                                    echo form_input(array('type'=>'hidden', 'name'=>'processRes', 'id'=>'processRes', 'class'=>'form-control', 'value'=>$processRes));
                                    echo form_input(array('type'=>'hidden', 'name'=>'checkState', 'id'=>'checkState', 'class'=>'form-control', 'value'=>'0'));

                                    echo $div_inicio;
                                    echo form_label("Usuario");            
                                    echo form_input(array('type'=>'text', 'name'=>'user', 'required'=>'true', 'class'=>'form-control', 'value'=>''));
                                    echo $div_cierre;

                                    echo $div_inicio;
                                    echo form_label("Contraseña");            
                                    echo form_input(array('type'=>'password', 'name'=>'password', 'id'=>'password', 'required'=>'true', 'class'=>'form-control', 'value'=>''));
                                    echo $div_cierre;
                                    
                                    echo $div_inicio;
                                    echo form_label("Confirmar");            
                                    echo form_input(array('type'=>'password', 'name'=>'password2', 'id'=>'password2', 'required'=>'true', 'class'=>'form-control', 'value'=>''));
                                    echo $div_cierre;

                                    echo $div_inicio;
                                    echo form_label("Ciudad");            
                                    $citys = array(
                                        0 => "Bogotá",
                                        1 => "Medellín",
                                        2 => "Cali",
                                        3 => "Manizales",
                                        4 => "Villavicencio",
                                        5 => "Cartagena",
                                        6 => "Nariño",
                                        7 => "Cucuta",
                                        8 => "Otra",
                                    );            
                                    echo form_dropdown(array('name'=>'ciudad', 'id'=>'ciudad', 'required'=>'true', 'style'=>'height:60%;vertical-align:middle', 'class'=>'form-control', 'options'=>$citys));
                                    echo $div_cierre;

                                    echo $div_inicio;
                                    echo $div_cierre;

                                    echo $div_inicio_right;
                                    echo form_label("Estado");
                                    echo form_checkbox(array('id'=>'estado', 'name'=>'estado', 'checked'=>'', 'style'=>'margin-left:10px;vertical-align:sub;margin-right: 10px'));
                                    echo form_submit(array('value'=>'Crear Usuario', 'id'=>'btnCrear', 'class'=>'btn btn-primary', 'style'=>'margin-right: 10px'));
                                    echo form_button(array('id'=>'BtnBuscar;', 'onClick'=>'fnCancel();', 'content'=>'Cancelar', 'name'=>'Cancelar', 'class'=>'btn btn-danger'));
                                    echo $div_cierre;
                                echo $div_cierre;
                            echo form_close();
                        ?> 
                    </div>
                </div>
            </div>
        </div>
		
        <div class="row">
			<div class="col-md-12">
                <div class="panel panel-default" style="margin-left:20px;margin-right:20px;margin-top:20px">
                    <div class="panel-heading" style="font-size: 12px">
                        <table style="width:100%;vertical-align:middle">
                            <tr>
                                <?= form_open(str_replace("Home", "Inicio/consultarUser", base_url()), $Frm_atributos);?>
                                <td><?= form_checkbox(array('id'=>'asociar', 'checked'=>'', 'style'=>'margin-right:10px;vertical-align:sub'));?>Asociar Cliente</td>
                            </tr>								
                        </table>
                    </div>
                    <div class="panel-body">
                        <?php
                                echo $div_principal;
                                    echo form_input(array('type'=>'hidden', 'name'=>'IdCli', 'id'=>'IdCli', 'class'=>'form-control', 'value'=>'0'));

                                    echo $div_inicio;
                                    echo form_label("Filtro por nombre");            
                                    echo form_input(array('type'=>'text', 'name'=>'filtro', 'class'=>'form-control', 'value'=>''));
                                    echo $div_cierre;

                                    echo $div_btns;
                                    echo form_submit(array('value'=>'Buscar', 'name'=>'Buscar', 'id'=>'btnBuscar', 'style'=>'height:70%;', 'class'=>'btn btn-success'));
                                    echo $div_cierre;
                                    
                                    echo $div_inicio;
                                    echo form_label("Nombre");            
                                    echo form_input(array('type'=>'text', 'name'=>'nombre', 'id'=>'nombre', 'required'=>'true', 'class'=>'form-control', 'disabled'=>'true', 'value'=>"$userSearch->nombre"));
                                    echo $div_cierre;

                                    echo $div_inicio;
                                    echo form_label("email");            
                                    echo form_input(array('type'=>'text', 'name'=>'email', 'id'=>'email', 'required'=>'true', 'class'=>'form-control',  'value'=>$userSearch->email, 'disabled'=>'true'));
                                    echo $div_cierre;

                                    echo $div_inicio;
                                    echo form_label("Dependencia");
                                    $array = array(
                                        0 => "Fabrica de Software",
                                        1 => "Dirección General",
                                        2 => "Oficina Sucursal Norte",
                                        3 => "Almacen Calle 13",
                                        4 => "Fabrica de Partes",
                                    );            
                                    echo form_dropdown(array('name'=>'dependencia', 'id'=>'dependencia', 'selected'=>(($userSearch->IdDependencia=="")?0:$userSearch->IdDependencia), 'required'=>'true', 'style'=>'height:60%;vertical-align:middle', 'class'=>'form-control', 'options'=>$array, 'disabled'=>'true'));
                                    echo $div_cierre;
                                    
                                    echo $div_inicio;
                                    echo form_label("Perfil");            
                                    echo form_input(array('type'=>'text', 'name'=>'perfil', 'id'=>'perfil', 'required'=>'true', 'class'=>'form-control', 'value'=>$userSearch->IdRol, 'disabled'=>'true'));
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
<script>
    let resultProcess = $('#processRes').val();
    if(resultProcess == true){
        $('#user').val("");
        $('#password').val("");
        $('#password2').val("");
        $('#ciudad').val("");
        $('#processRes').val(false);
        Swal.fire(
            'OPERACIÓN EXITOSA',
            'Usuario creado correctamente.',
            'success'
        );
    }

    $("#asociar").on("click",function(event){
        if( $('#asociar').prop('checked') ) {
            $("#nombre").removeAttr("disabled");
            $("#email").removeAttr("disabled");
            $("#dependencia").removeAttr("disabled");
            $("#perfil").removeAttr("disabled");
        }else{
            $("#nombre").prop('disabled', true);
            $("#email").prop('disabled', true);
            $("#dependencia").prop('disabled', true);
            $("#perfil").prop('disabled', true);
        }
    });

    $("#estado").on("click",function(event){
        $("#checkState").val(1);
    });
    
    function fnCancel(){
        event.preventDefault();
        $("#flowOption").val(1);
        $("#password").prop('disabled', true);
        $("#FormCrear").submit();
    }

    function fnValidatePsw(){
        if($("#password").val() == $("#password2").val()){
            return true;
        }else{
            Swal.fire(
                'CONFIRME LOS DATOS',
                'Las contraseñas no coinciden, vuelva a intentarlo',
                'error'
            );
            $("#password").val("");
            $("#password2").val("");
            return false;
        }
    }
</script>
</body>
</html>