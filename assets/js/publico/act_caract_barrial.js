$(function() {
  $('#localidad').change(function() {
    var id = $(this).val();
    $.ajax({
        url: base_url + 'formulario/listarUPZ/' + id,
        type: 'get',
        dataType: 'json'
      })
      .done(function(data) {
        if (data.code > 0) {
          toastr.error(data.message, 'Listar UPZ');
        } else {
          $('#upz').html('<option value="">Seleccione...</option>');
		  $('#upzC2').html('<option value="">Seleccione...</option>');
          $.each(data.list, function(key, value) {
            $('#upz').append('<option value="' + key + '">' + value + "</option>");
			$('#upzC2').append('<option value="' + key + '">' + value + "</option>");
          });
        }
      })
      .fail(function(jqXHR) {
        toastr.error(jqXHR.responseText, 'Agregar ficha');
      });
  });

  $('#btnLimpiar').click(function() {
    $('#frmBarrial')[0].reset();
  });

  $('#Consecutivo_fic').change(function() {
    $('#ficha').val('');
    if(($('#Consecutivo_fic').val() != '' && $('#Consecutivo_fic').val() >0)  && ($('#localidad').val() != '' && $('#localidad').val() >0 )){
      ficha = $('#subred').val()+$('#localidad').val()+'04'+$('#Consecutivo_fic').val();
      $('#ficha').val(ficha);
    } 
  });

  $('#localidad').change(function() {
    $('#ficha').val('');
    if(($('#Consecutivo_fic').val() != '' && $('#Consecutivo_fic').val() >0) && ($('#localidad').val() != '' && $('#localidad').val() >0)){
      ficha = $('#subred').val()+$('#localidad').val()+'04'+$('#Consecutivo_fic').val();
      $('#ficha').val(ficha);
    }else{
      $('#ficha').val();
    }
  });



  $('#Numero_eje_ppal').bloquearTexto();
  $('#Numero_eje_secundario').bloquearTexto();
  $('#Numero_placa').bloquearTexto();
  $('#gp_hombres_obs_trans_pub').bloquearTexto();
  $('#gp_mujeres_obs_trans_pub').bloquearTexto();
  $('#pdr_menores_d5_hom').bloquearTexto();
  $('#pdr_menores_d5_muj').bloquearTexto();
  $('#pdr_NNA_trab_calle_hom').bloquearTexto();
  $('#pdr_NNA_trab_calle_muj').bloquearTexto();
  $('#pdr_desplazado_hom').bloquearTexto();
  $('#pdr_desplazado_muj').bloquearTexto();
  $('#pdr_discapacidad_hom').bloquearTexto();
  $('#pdr_discapacidad_mujer').bloquearTexto();
  $('#pdr_recuperadores_hom').bloquearTexto();
  $('#pdr_recuperadores_muj').bloquearTexto();
  $('#pdr_persona_may_hom').bloquearTexto();
  $('#pdr_persona_may_muj').bloquearTexto();
  $('#pdr_habitante_calle_hom').bloquearTexto();
  $('#pdr_habitante_calle_muj').bloquearTexto();
  $('#pdr_etnico_hom').bloquearTexto();
  $('#pdr_etnico_muj').bloquearTexto();
  $('#pdr_migrante_hom').bloquearTexto();
  $('#pdr_migrante_muj').bloquearTexto();
  $('#pdr_vendedor_amb_hom').bloquearTexto();
  $('#pdr_vendedor_amb_muj').bloquearTexto();
  $('#pdr_trabajador_infor_hom').bloquearTexto();
  $('#pdr_trabajador_infor_muj').bloquearTexto();
  $('#pdr_gestantes').bloquearTexto();
  $('#pdr_LGBTI').bloquearTexto();
  $('#prc_sin_uso_tapabocas').bloquearTexto();
  $('#prc_sin_distancia_social').bloquearTexto();
  $('#prc_incumplimiento_norma').bloquearTexto();
  $('#prc_personas_con_animales').bloquearTexto();
  $('#fsr_pca_entidad_bancaria').bloquearTexto();
  $('#fsr_pca_plaza_mercado').bloquearTexto();
  $('#fsr_pca_sucursal_giro').bloquearTexto();
  $('#fsr_pca_IPS_centro_med').bloquearTexto();
  $('#prc_sin_uso_tapabocas').bloquearTexto();
  $('#prc_sin_distancia_social').bloquearTexto();
  $('#prc_incumplimiento_norma').bloquearTexto();
  $('#fsr_pca_supermercados').bloquearTexto();
  $('#fsr_pca_suminis_alimentos').bloquearTexto();
  $('#fsr_pca_droguerias').bloquearTexto();
  $('#fsr_pca_fabricas_industrias').bloquearTexto();
  $('#fsr_pca_paraderos_SITP').bloquearTexto();
  $('#fsr_parques').bloquearTexto();
  $('#fsr_actividades_dep_aut').bloquearTexto();
  $('#fsr_inst_y_org').bloquearTexto();
  $('#fsr_pcep_UTIS').bloquearTexto();
  $('#fsr_pcep_gimnasio_aire_lib').bloquearTexto();
  $('#fsr_pcep_consumo_SPA').bloquearTexto();
  $('#fa_am_acumulacion_residuos').bloquearTexto();
  $('#fa_am_acumulacion_escombros').bloquearTexto();
  $('#fa_am_puntos_animales_compania').bloquearTexto();
  $('#fa_am_puntos_animales_abandono').bloquearTexto();
  $('#fa_mov_flujo_alto_bici_patineta').bloquearTexto();
  $('#fa_mov_flujo_alto_vehiculo').bloquearTexto();

  $('#frmBarrial').validate({
    errorClass: 'invalid-feedback',
    rules: {
      fechaIngreso: { required: true },
      Consecutivo_fic: { required: true },
      ficha: { required: true },
      nombre_cuadrante: { required: true },
      localidad: { required: true },
      upz: { required: true },
      barrio: { required: true },
      rango_con_ini: { required: true },
      rango_con_fin: { required: true },
      Id_eje_ppal: { required: true },
      Numero_eje_ppal: { required: true },
      Numero_eje_secundario: { required: true },
      Numero_placa: { required: true }
    },
    messages: {
      fechaIngreso: { required: 'Seleccione la fecha de caracterización.' },
      ficha: { required: 'Digite la ficha.' },
      Consecutivo_fic: { required: 'Digite el número del consecutivo.' },
      nombre_cuadrante: { required: 'Digite el nombre del cuadrante.' },
      localidad: { required: 'Seleccione la localidad.' },
      upz: { required: 'Seleccione la UPZ.' },
      barrio: { required: 'Digite el Barrio.' },
      rango_con_ini: { required: 'Digite el rango conglomerado inicial.' },
      rango_con_fin: { required: 'Digite el rango conglomerado final.' },
      Id_eje_ppal: { required: 'Seleccione el eje principal.' },
      Numero_eje_ppal: { required: 'Digite el número de eje principal' },
      Numero_eje_secundario: { required: 'Digite el número de eje generador' },
      Numero_placa: { required: 'Digite el número de placa' }
    },
    errorPlacement: function(error, element) {
      element.after(error.attr('role', 'alert'));
    },
    highlight: function(element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function(element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });

  $('#btnAgregar').click(function() {
    if ($('#frmBarrial').valid() == false) {
      return false;
    }

    var frm = $('#frmBarrial').serialize();
    $.ajax({
        url: base_url + 'publico/carac_barrial/crearFicha',
        type: 'post',
        dataType: 'json',
        data: frm
      })
      .done(function(data) {
        if (data.code > 0) {
          toastr.error(data.message, 'Agregar ficha');
        } else {
          if (data.message.length > 0) {
            toastr.success(data.message, 'Agregar ficha');
          }
          setTimeout(function() {
            window.location = base_url + 'publico/carac_barrial';
          }, 2000);
        }
      })
      .fail(function(jqXHR) {
        toastr.error(jqXHR.responseText, 'Agregar ficha');
      });
  });

  $('#btnEditar').click(function() {
    
    if ($('#frmBarrial').valid() == false) {
      return false;
    }

    var frm = $('#frmBarrial').serialize();
    var idFicha = $('#idFicha').html();
    $.ajax({
        url: base_url + 'publico/carac_barrial/editarFicha',
        type: 'post',
        dataType: 'json',
        data: frm + '&idFich=' + idFicha
      })
      .done(function(data) {
        if (data.code > 0) {
          toastr.error(data.message, 'Editar ficha');
        } else {
          if (data.message.length > 0) {
            toastr.success(data.message, 'Editar ficha');
          }
          setTimeout(function() {
            window.location = base_url + 'publico/carac_barrial';
          }, 2000);
        }
      })
      .fail(function(jqXHR) {
        toastr.error(jqXHR.responseText, 'Editar ficha');
      });
  });
});