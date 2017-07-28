<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class comisionesPagadas extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->load->model('bo/modelo_dashboard');
		$this->load->model('bo/general');
		$this->load->model('bo/modelo_comercial');
		$this->load->model('ov/model_perfil_red');
		$this->load->model('model_cat_tipo_usuario');
		$this->load->model('model_cat_sexo');
		$this->load->model('model_cat_edo_civil');
		$this->load->model('model_cat_estudios');
		$this->load->model('model_cat_ocupacion');
		$this->load->model('model_cat_estatus_afiliado');
		$this->load->model('model_cat_tiempo_dedicado');
		$this->load->model('model_cat_usuario_fiscal');
		$this->load->model('model_users');
		$this->load->model('model_user_profiles');
		$this->load->model('model_coaplicante');
		$this->load->model('bo/model_admin');
		$this->load->model('bo/model_mercancia');
		$this->load->model('ov/modelo_compras');
		$this->load->model('modelo_cobros');
		$this->load->model('model_excel');
		$this->load->model('cemail');
		$this->load->model('model_servicio');
	}

	function index(){
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
		$id=$this->tank_auth->get_user_id();
		
		if(!$this->general->isAValidUser($id,"administracion"))
		{
			redirect('/auth/logout');
		}

		$usuario=$this->general->get_username($id);
		
		$style=$this->modelo_dashboard->get_style(1);
	
		$this->template->set("usuario",$usuario);
		$this->template->set("style",$style);
		$this->template->set_theme('desktop');
		$this->template->set_layout('website/main');
		$this->template->set_partial('header', 'website/bo/header');
		$this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/bo/administracion/comisionesPagadas/listar');
	}
	
	function reporte_comisionesPagadas()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
	
		if(!$this->general->isAValidUser($id,"comercial"))
		{
			redirect('/auth/logout');
		}

		$total_neto = 0;
	
	
		$comisionesPagadas = $this->model_servicio->listar_cobros_comisiones($_POST['startdate'],$_POST['finishdate']);

		$id=$this->tank_auth->get_user_id();
		echo
		"<table id='datatable_fixed_column1' class='table table-striped table-bordered table-hover' width='100%'>
				<thead id='tablacabeza'>
					<th data-class='expand'>ID Cobro</th>
					<th data-hide='phone,tablet'>Fecha</th>
					<th data-hide='phone,tablet'>Afiliado</th>
					<th data-hide='phone,tablet'>Email</th>
					<th data-hide='phone,tablet'>Banco</th>
					<th data-hide='phone,tablet'>Cuenta</th>
					<th data-hide='phone,tablet'>Titular</th>
					<th data-hide='phone,tablet'>Clabe</th>
					<th data-hide='phone,tablet'>Valor</th>
					<th data-hide='phone,tablet'>Estado</th>
					<th data-hide='phone,tablet'>Accion</th>
				</thead>
				<tbody>";
		
		if ($_POST['startdate']!=""){
			foreach($comisionesPagadas as $pago)
			{
		$estado="Pendiente";
		if($pago->id_estatus==2)
			$estado="Pagado";
		
		echo "<tr>
			<td class='sorting_1'>".$pago->id_cobro."</td>
			<td>".$pago->fecha."</td>
			<td>".$pago->usuario."</td>
			<td>".$pago->email."</td>
			<td>".$pago->banco."</td>
			<td>".$pago->cuenta."</td>
			<td>".$pago->titular."</td>
			<td>".$pago->clabe."</td>
			<td>".$pago->monto."</td>
			<td>".$estado."</td>
			<td><a title='Eliminar' style='cursor: pointer;' class='txt-color-red' onclick='eliminar(".$pago->id_cobro.");'>
				<i class='fa fa-trash-o fa-3x'></i>
				</a>
			</td>
			</tr>";
					
				$total_neto = $total_neto + $pago->monto;
					
			}
	
			echo "<tr>
			<td class='sorting_1'></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			</tr>";
				
			echo "<tr>
			<td class='sorting_1'><b>TOTALES</b></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td><b> $	".number_format($total_neto, 2, '.', '')."</b></td>
			<td></td>
			<td></td>
			</tr>";
		}
		echo "</tbody>
		</table><tr class='odd' role='row'>";
	}
	
	function kill_cobros()
	{
		$this->model_admin->kill_cobro($_POST['id']);
		echo "Se ha eliminado el cobro de las comisiones.";
	}
}
