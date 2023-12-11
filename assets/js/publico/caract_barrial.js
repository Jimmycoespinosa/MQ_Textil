$(function() {
  var fileTable = $('#fileTable').DataTable({
    'processing': true,
    'ajax': base_url + 'publico/carac_barrial/listadoJsonRpBarrial',
    'columns': [
      { 'data': 'accion' },
      { 'data': 'Id_fic', 'className': 'dt-body-center' },
      { 'data': 'FechaIngreso', 'className': 'dt-body-center' },
      { 'data': 'Ficha_fic', 'className': 'dt-body-center' },
      { 'data': 'nombre_cuadrante', 'className': 'dt-body-center' },
      { 'data': 'Id_localidad', 'className': 'dt-body-center' },
      { 'data': 'Id_upz', 'className': 'dt-body-center' },
      { 'data': 'barrio', 'className': 'dt-body-center' },
      { 'data': 'direccion', 'className': 'dt-body-center' },
      { 'data': 'rango_con_ini', 'className': 'dt-body-center' },
      { 'data': 'rango_con_fin', 'className': 'dt-body-center' },
      { 'data': 'gp_hombres_obs_trans_pub', 'className': 'dt-body-center' },
      { 'data': 'gp_mujeres_obs_trans_pub', 'className': 'dt-body-center' },
      { 'data': 'pdr_menores_d5_hom', 'className': 'dt-body-center' },
      { 'data': 'pdr_menores_d5_muj', 'className': 'dt-body-center' },
      { 'data': 'pdr_nna_trab_calle_hom', 'className': 'dt-body-center' },
      { 'data': 'pdr_nna_trab_calle_muj', 'className': 'dt-body-center' },
      { 'data': 'pdr_desplazado_hom', 'className': 'dt-body-center' },
      { 'data': 'pdr_desplazado_muj', 'className': 'dt-body-center' },
      { 'data': 'pdr_discapacidad_hom', 'className': 'dt-body-center' },
      { 'data': 'pdr_discapacidad_mujer', 'className': 'dt-body-center' },
      { 'data': 'pdr_recuperadores_hom', 'className': 'dt-body-center' },
      { 'data': 'pdr_recuperadores_muj', 'className': 'dt-body-center' },
      { 'data': 'pdr_persona_may_hom', 'className': 'dt-body-center' },
      { 'data': 'pdr_persona_may_muj', 'className': 'dt-body-center' },
      { 'data': 'pdr_habitante_calle_hom', 'className': 'dt-body-center' },
      { 'data': 'pdr_habitante_calle_muj', 'className': 'dt-body-center' },
      { 'data': 'pdr_etnico_hom', 'className': 'dt-body-center' },
      { 'data': 'pdr_etnico_muj', 'className': 'dt-body-center' },
      { 'data': 'pdr_migrante_hom', 'className': 'dt-body-center' },
      { 'data': 'pdr_migrante_muj', 'className': 'dt-body-center' },
      { 'data': 'pdr_vendedor_amb_hom', 'className': 'dt-body-center' },
      { 'data': 'pdr_vendedor_amb_muj', 'className': 'dt-body-center' },
      { 'data': 'pdr_trabajador_infor_hom', 'className': 'dt-body-center' },
      { 'data': 'pdr_trabajador_infor_muj', 'className': 'dt-body-center' },
      { 'data': 'pdr_gestantes', 'className': 'dt-body-center' },
      { 'data': 'pdr_LGBTI', 'className': 'dt-body-center' },
      { 'data': 'prc_sin_uso_tapabocas', 'className': 'dt-body-center' },
      { 'data': 'prc_con_guantes', 'className': 'dt-body-center' },
      { 'data': 'prc_sin_distancia_social', 'className': 'dt-body-center' },
      { 'data': 'prc_incumplimiento_norma', 'className': 'dt-body-center' },
      { 'data': 'prc_personas_con_animales', 'className': 'dt-body-center' },
      { 'data': 'fsr_pca_entidad_bancaria', 'className': 'dt-body-center' },
      { 'data': 'fsr_pca_plaza_mercado', 'className': 'dt-body-center' },
      { 'data': 'fsr_pca_sucursal_giro', 'className': 'dt-body-center' },
      { 'data': 'fsr_pca_ips_centro_med', 'className': 'dt-body-center' },
      { 'data': 'fsr_pca_venta_calle_pas_com', 'className': 'dt-body-center' },
      { 'data': 'fsr_pca_supermercados', 'className': 'dt-body-center' },
      { 'data': 'fsr_pca_suminis_alimentos', 'className': 'dt-body-center' },
      { 'data': 'fsr_pca_droguerias', 'className': 'dt-body-center' },
      { 'data': 'fsr_pca_otros_servicios', 'className': 'dt-body-center' },
      { 'data': 'fsr_pca_fabricas_industrias', 'className': 'dt-body-center' },
      { 'data': 'fsr_pca_paraderos_SITP', 'className': 'dt-body-center' },
      { 'data': 'fsr_parques', 'className': 'dt-body-center' },
      { 'data': 'fsr_actividades_dep_aut', 'className': 'dt-body-center' },
      { 'data': 'fsr_inst_y_org', 'className': 'dt-body-center' },
      { 'data': 'fsr_pcep_UTIS', 'className': 'dt-body-center' },
      { 'data': 'fsr_pcep_gimnasio_aire_lib', 'className': 'dt-body-center' },
      { 'data': 'fsr_pcep_consumo_spa', 'className': 'dt-body-center' },
      { 'data': 'fa_am_acumulacion_residuos', 'className': 'dt-body-center' },
      { 'data': 'fa_am_acumulacion_escombros', 'className': 'dt-body-center' },
      { 'data': 'fa_am_calidad_aire', 'className': 'dt-body-center' },
      { 'data': 'fa_am_manten_lugar', 'className': 'dt-body-center' },
      { 'data': 'fa_am_puntos_animales_compania', 'className': 'dt-body-center' },
      { 'data': 'fa_am_puntos_animales_abandono', 'className': 'dt-body-center' },
      { 'data': 'fa_mov_flujo_alto_bici_patineta', 'className': 'dt-body-center' },
      { 'data': 'fa_mov_flujo_alto_vehiculo', 'className': 'dt-body-center' }
    ],
    'language': {
      'url': base_url + 'assets/plugins/datatables/datatables.locale-es.json'
    },
    'bFilter': true,
    'bInfo': false,
    'info': true,
    'ordering': false,
    'paging': true,
    'pageLength': 25,
    'responsive': true,
    'searching': true
  });

  $('#btn-filtrar').click(function() {
    $(this).search();
  });

  $.fn.search = function() {
    let frm = generarURLserialize('formFilter');
    fileTable.ajax.url(base_url + 'publico/carac_barrial/listadoJsonRpBarrial/' + frm).load();
  };

  $('#btnFile').click(function() {
    //$('#mdlFile #frmFile')[0].reset();
    //$('#mdlFile').modal('show');
    window.location.replace(base_url + 'publico/carac_barrial/agregar');
  });

  $('#btnRefesh').click(function() {
    fileTable.ajax.reload();
  });

  $('#fileTable').on('click', '.edit-file', function() {
    var id = $(this).data('id');
    window.location.replace(base_url + 'publico/carac_barrial/editar/' + id);
  });

  $('#mdlFile #btnSaveFile').click(function() {
    var frm = $('#mdlFile #frmFile').serialize();
    $.ajax({
        url: base_url + 'publico/carac_barrial/add',
        type: 'post',
        dataType: 'json',
        data: frm
      })
      .done(function(data) {
        if (data.code > 0) {
          toastr.error(data.message, 'Agregar ficha');
          // setTimeout(recargar, 2000);
        } else {
          toastr.success(data.message, 'Agregar ficha');
        }
      })
      .fail(function(jqXHR) {
        toastr.error(jqXHR.responseText, 'Agregar ficha');
      });
  });

  $('#btn-enviar-NNA-1').click(function(e) {
    if (base_url = 'undefined') {
      base_url = '';
    }

    //var mes = $("#mes").val();
    //var anio = $("#anio").val();
    //var subred = $("#subredes").val();

    //if(mes.length > 0 && anio.length > 0) {
    //window.location = base_url + 'reportes/generaReporte/'+mes+'/'+anio+'/'+subred;
    window.location = base_url + 'carac_barrial/generaReporteBarrial/';
    //} else {
    //	alertify.alert("No hay datos");
    //}
  });
});