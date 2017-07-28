<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class POS extends CI_Controller
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
		$this->load->model('bo/model_admin');
		$this->load->model('bo/model_mercancia');
		$this->load->model('bo/model_inventario');
		$this->load->model('bo/modelo_logistico');
		$this->load->model('bo/modelo_cedi');
		$this->load->model('bo/general');
		$this->load->model('cemail');
	}

	function index()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{																		// logged in
			redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		$style=$this->modelo_dashboard->get_style($id);
		$this->template->set("cajero",$usuario[0]->nombre." ".$usuario[0]->apellido);
		$data = array("user2" => $usuario[0]->nombre."<br/>".$usuario[0]->apellido);
		$this->template->set("style",$style);

		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/CEDI/header',$data);
        $this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/CEDI/pos/caja');
	}
	
	function new_item()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
	
		$style=$this->modelo_dashboard->get_style($id);
		
		$this->template->build('website/CEDI/pos/crearItem');
	}
	
	function ver_cobro()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		$descuento = $_POST['desc'];
	
		$almacen  = $this->modelo_cedi->getUsuarioId($id);
		$users = $this->modelo_cedi->getClientes();
		$id_temporal = $this->modelo_cedi->setIdTemporal ( $id, $almacen[0]->cedi );
		$puntos = $this->modelo_cedi->sumaPuntosTemporal($id_temporal);
		$total = $this->modelo_cedi->getTotalNeto($id_temporal);		
		$iva = $this->modelo_cedi->setImpuesto($almacen[0]->id_pais,$total);
		$total -= ($total * $descuento)/100;		
		
		$this->template->set("valor",$total);
		$this->template->set("puntos",$puntos);
		$this->template->set("total",$total+$iva);
		$this->template->set("iva",$iva);
		$this->template->set("descuento",$descuento);
		$this->template->set("users",$users);
		$style=$this->modelo_dashboard->get_style($id);
	
		$this->template->build('website/CEDI/pos/verContado');
	}
	
	function emailFactura(){
		
		$email = $_POST['email'];
		$venta = $_POST['venta'];
		
		
		
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
		redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		$empresa=$this->model_admin->get_empresa_multinivel();
		$items = $this->modelo_cedi->getVenta($venta);
		$cajero = $usuario[0]->nombre." ".$usuario[0]->apellido;
		$user = $this->general->get_username($items[0]->cliente);
		$cliente = $user[0]->user_id."<br/>".$user[0]->nombre."<br/>".$user[0]->apellido;
		
		
		
		$guion = (($empresa[0]->fijo)&&($empresa[0]->movil)) ? ' - ' : '';
		$fecha = date('Y-m-d h:i:s');
		
		$neto = 0;
		$item_html='';
		
		foreach ($items as $item){
			$neto += $item->valor;
			$descripcion = $item->nombre." ".$item->codigo_barras;
			$item_html.='<tr>
						<td colspan="3"><hr style="padding: 0 !important;margin: 0 !important;" /></td>
					</tr>
					<tr>
						<td style="text-align:left; min-width:100px">'.$descripcion.'</td>
						<td style="text-align:right; min-width:100px">'.$item->cantidad.'</td>
						<td style="text-align:right; min-width:100px">$ '.number_format($item->valor,2).'</td>
					</tr>';
			
		}
		
		$articulos = 0;
		foreach ($items as $item){
			$articulos += $item->cantidad;
		}
		
		$subtotal = $item->valor_total-$item->iva;
		$direccion = $empresa[0]->provincia.", ".$empresa[0]->ciudad;		
		
		$dialogo = '';
		
		if($email&&$venta){
		
			$body = '<table width="310px" border="0" >
					<tr>
						<td colspan="3" >
							<div align="center">
								<img src="/logo.png" alt="" width="200px"/>
							</div>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<br/><strong>'.$empresa[0]->nombre.'</strong>
							<br/>Nit: '.$empresa[0]->id_tributaria.'
							<br/>
							<br/>Tel: '.$empresa[0]->fijo.$guion.$empresa[0]->movil.'
							<br>'.$direccion.'
						</td>
                                                <td><div align="right">ID CLIENTE: '.$cliente.'</div></td>
					</tr>
					<tr>
						<td ></td>
						<td colspan="2"><div align="right">'.$fecha.'</div></td>
					</tr>
					<tr>
						<td colspan="3">CAJERO: '.$cajero.'</td>
					</tr>
					<tr>
						<td colspan="3"><br/><br/></td>
					</tr>
					<tr>
						<td colspan="3">
							<table width="100%">
								<tr>
									<td style="text-align:left; min-width:100px">DESCRIPCION</td>
									<td style="text-align:right; min-width:100px">CANT</td>
									<td style="text-align:right; min-width:100px">IMPORTE</td>
								</tr>
									'.$item_html.'
								<tr>
									<td colspan="3"><hr style="padding: 0 !important;margin: 0 !important;" /></td>
								</tr>
								<tr>
									<td colspan="3"><hr style="padding: 0 !important;margin: 0 !important;" /></td>
								</tr>
								<tr>
									<td colspan="2" style="text-align:right">TOTAL SUMA:</td>
									<td style="text-align:right"><strong>$ '.number_format($neto,2).'</strong></td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td colspan="3"><br/></td>
					</tr>
					<tr >
						<td colspan="3">
							<table width="100%">
								<td style="text-align:center">
									NO. DE ARTICULOS: <strong>'.$articulos.'</strong><br/>
									PUNTOS: <strong>'.$item->total_puntos.'</strong>
								</td>
								<td style="text-align:center">
									SUBTOTAL: <strong>$ '.number_format($subtotal,2).'</strong><br/>
									IVA: <strong>$ '.number_format($item->iva,2).'</strong><br/>
									TOTAL: <strong>$ '.number_format($item->valor_total,2).'</strong>
								</td>
							</table>
						</td>
					</tr>
					<tr>
						<td colspan="3">
							<div style="text-align:center">
								<br/><br/>
								<strong>* VENTA AL '.$items[0]->costo.' *</strong>
								<br/><br/>
								FIRMA DEL CLIENTE
								<br/><br/>
								________________________________________
								<br/><br/>
								GRACIAS POR SU COMPRA
								<br/>
								'.$item->id_venta.'
							</div>
						</td>
					</tr>
					</table>';
			
			//echo $body;exit();
			
			$data = array(
					'email' => $email,
					'nombres' => $cliente,
					'factura' => $body
			);
			
			$mail = $this->cemail->send_email(11, $email, $data);
			
			$dialogo = $mail ? "Email Enviado" : "Falló envio de Email";
		
		}else{
			$dialogo = "ERROR: No se ha axenado ninguna factura";
		}
		
		$style=$this->modelo_dashboard->get_style($id);
		$data = array("user" => $usuario[0]->nombre."<br/>".$usuario[0]->apellido);
		
		$this->template->set("style",$style);
		$this->template->set("dialogo",$dialogo);
		
		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/CEDI/header',$data);
        $this->template->set_partial('footer', 'website/bo/footer');
		$this->template->build('website/CEDI/pos/emailFactura');
		
		
	}
	
	function facturar()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
	
		$saldo =  $_POST['saldo'];
		$pago = $_POST['pago'];
		$iva = $_POST['iva'] ? $_POST['iva'] : 0;
		$descuento = $_POST['desc'] ? $_POST['desc'] : 0;
		
		if(!$saldo||!$pago){
			redirect('/CEDI/POS');
		}
		
		
		$almacen  = $this->modelo_cedi->getUsuarioId($id);
		
		$id_temporal = $this->modelo_cedi->setIdTemporal ( $id, $almacen[0]->cedi );
		
		$pedidos = $this->modelo_cedi->getTemporal ($id_temporal);
		
		$user = $pedidos[0]->cliente;
		
		$email = $this->modelo_cedi->getCliente($user);
		
		$datos = $this->modelo_cedi->registrarVenta($id_temporal,$pago,$user,$descuento,$iva);
		
		$style=$this->modelo_dashboard->get_style($id);
		$this->template->set("cajero",$usuario[0]->nombre." ".$usuario[0]->apellido);
		$data = array("user" => $usuario[0]->nombre."<br/>".$usuario[0]->apellido);
		
		$empresa=$this->model_admin->get_empresa_multinivel();
		
		$this->template->set("cliente",$email);
		$this->template->set("empresa",$empresa);
		$this->template->set("items",$datos);
		$this->template->set("style",$style);
		$this->template->set("saldo",$saldo);
		$this->template->set("pago",$pago);

		$this->template->set_theme('desktop');
        $this->template->set_layout('website/main');
        $this->template->set_partial('header', 'website/CEDI/header',$data);
        $this->template->set_partial('footer', 'website/bo/footer');
	
		$this->template->build('website/CEDI/pos/factura');
	}
	
	function descuento()
	{
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		$item =  $_POST['item'];
		$this->template->set("item",$item);
		
		$style=$this->modelo_dashboard->get_style($id);
	
		$this->template->build('website/CEDI/pos/descontar');
	}
	
	function descontar(){
	
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
	
		$item =  $_POST['item'];
		$descuento =  $_POST['descuento'];
		$tipo =  $_POST['tipo'];
		
		
		$almacen  = $this->modelo_cedi->getUsuarioId($id);
	
		$id_temporal = $this->modelo_cedi->setIdTemporal ( $id, $almacen[0]->cedi );
	
		$this->modelo_cedi->setDescuento($id_temporal,$item,$descuento,$tipo);
	
		$pedidos = $this->modelo_cedi->getTemporal ($id_temporal);
		
		$this->printItems($pedidos);
	
	}
	
	function setCosto(){
	
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
	
		$costo =  $_POST['costo'];	
	
		$almacen  = $this->modelo_cedi->getUsuarioId($id);
	
		$id_temporal = $this->modelo_cedi->setIdTemporal ( $id, $almacen[0]->cedi );
	
		$this->modelo_cedi->updateTemporal($id_temporal,'costo',$costo);
	
		$pedidos = $this->modelo_cedi->getTemporal ($id_temporal);
	
		$this->printItems($pedidos);
	
	}
	
	function existeProducto(){
		
		$id = $_POST['item'];
		$user = $_POST['user'];
		$user = substr($user, 3);
		$user = explode(" ", $user);
		$user = $user[0];
		
		$cliente = $this->modelo_cedi->getCliente($user);
		
		if(!$cliente){
			echo "";exit();
		}
		
		$red= $cliente[0]->id_red;
		//echo $red;exit();
		$producto = $this->model_mercancia->getProductoBy($id,$red);
		
		if($producto){
			foreach ($producto as $item){
				echo "<option value='ID:".$item->id_mercancia." [".$item->sku_2."] ".strtoupper($item->nombre)." # ".$item->codigo_barras."'>";
			}
		}else{
			echo "";exit();
		}
				
		
	}
	
	function existeUser(){
	
		$id = $_POST['item'];
		$user = $this->modelo_cedi->getClienteBy($id);
		if($user){
			foreach ($user as $item){
				echo "<option value='ID:".$item->user_id." ".strtoupper($item->nombre." ".$item->apellido)." [".$item->red."]'>";
			}
		}else{
			echo "";exit();
		}
	
	
	}
	
	function cargarProducto(){
	
		$item = $_POST['item'];
		$item = substr($item, 3);
		$item = explode(" ", $item);
		$item = $item[0];
	
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
	
		$almacen  = $this->modelo_cedi->getUsuarioId($id);
	
		$productos = $this->model_inventario->Obtener_Producto_Almacen($almacen[0]->cedi,$item);
	
		if(($productos) && ($productos[0]->cantidad > $productos[0]->inventario)){
				
			$pedidos = $this->modelo_cedi->setItemPOS($productos[0]->item,$id,$almacen[0]->cedi);
				
			$this->printItems($pedidos);
	
		}
	
	}
	
	function cargarUser(){
		
		$item = $_POST['item'];
		$item = substr($item, 3);
		$item = explode(" ", $item);
		$item = $item[0];
		
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		$almacen  = $this->modelo_cedi->getUsuarioId($id);		
		
		$id_temporal = $this->modelo_cedi->setIdTemporal ( $id, $almacen[0]->cedi );
		
		$this->modelo_cedi->updateTemporal( $id_temporal, 'cliente', $item);				
		
		echo "OK";
	}
	
	function setCantidad(){
		
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
		redirect('/auth');
		}
		
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
		
		
		$almacen  = $this->modelo_cedi->getUsuarioId($id);
		
		$id_temporal = $this->modelo_cedi->setIdTemporal ( $id, $almacen[0]->cedi );
		
		
		$factor = $_POST['factor'];
		$item =  $_POST['item'];
					
		$temporal = $this->modelo_cedi->getTemporalItem($id_temporal,$item);
		
		$limite =  $temporal[0]->inventario - $temporal[0]->minimo;
		
		$cantidad = $temporal[0]->cantidad;		
		($factor == '+') ? $cantidad++ : $cantidad--;
		$puntos = $temporal[0]->puntos_comisionables * $cantidad;
		
		($cantidad>$limite) ? '' : $this->modelo_cedi->updateTemporalItem($item, $id_temporal, 'cantidad', $cantidad);
		($cantidad>$limite) ? '' : $this->modelo_cedi->updateTemporalItem($item, $id_temporal, 'puntos', $puntos);
		($cantidad>0)  ? '' : $this->modelo_cedi->deleteTemporalItem($item, $id_temporal);		
		
		$pedidos = $this->modelo_cedi->getTemporal ($id_temporal);
		
		$this->printItems($pedidos);
		
	}
	
	function setNeto(){
	
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
	
		$descuento = $_POST['valor'];
	
		$almacen  = $this->modelo_cedi->getUsuarioId($id);
	
		$id_temporal = $this->modelo_cedi->setIdTemporal ( $id, $almacen[0]->cedi );
	
		$neto = $this->modelo_cedi->getTotalNeto($id_temporal);
		
		$neto -= ($neto * $descuento)/100;
		
		echo "Neto: $ ".number_format($neto,2);
	
	}
	
	function setArt(){
	
		if (!$this->tank_auth->is_logged_in())
		{																		// logged in
			redirect('/auth');
		}
	
		$id=$this->tank_auth->get_user_id();
		$usuario=$this->general->get_username($id);
	
	
		$almacen  = $this->modelo_cedi->getUsuarioId($id);
	
		$id_temporal = $this->modelo_cedi->setIdTemporal ( $id, $almacen[0]->cedi );
		
		$art = $this->modelo_cedi->getTotalArticulos($id_temporal);
		
		echo $art." Articulos en venta";
	
	}
	
	private function printItems($temporal){
	
		foreach ($temporal as $producto){
				
			$existencia = ($producto->inventario > $producto->minimo) ?	($producto->inventario - $producto->minimo) : 0;
			
			$precio = $this->modelo_cedi->calcularPrecio($producto);
			
			$puntos = ($producto->puntos_comisionables*$producto->cantidad);
			
			echo '<tr id="item'.$producto->item .'">
					<td>'.$producto->codigo_barras .'</td>
					<td>'.$producto->nombre .'</td>
					<td>
						$ '.number_format($precio,2) .'
					</td>
					<td>
						'.$producto->cantidad.'
					</td>
					<td >
						'.$puntos .'
					</td>
					<td >
						$ '.number_format(($precio*$producto->cantidad),2) .'
					</td>
					<td>'.$existencia.'</td>
					<td>
						<button type="button" class="btn btn-danger" 
							onclick="cantidad('.$producto->item .',`-`)">
							<i class="fa fa-minus"></i>
						</button>
						<button type="button" class="btn btn-success"
							onclick="descuento('.$producto->item .')">
							<i class="fa fa-dollar"></i>
						</button>
						<button type="button" class="btn btn-primary"
							onclick="cantidad('.$producto->item .',`+`)">
							<i class="fa fa-plus"></i>
						</button>
					</td>
				</tr>';
		}
		
	}
	
}
