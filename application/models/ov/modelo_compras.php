<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class modelo_compras extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('ov/model_perfil_red');
		$this->load->model('/ov/general');
		$this->load->model('/bo/bonos/afiliado');
	}
	
	function get_red($id)
	{
		$q=$this->db->query("SELECT id_red FROM red WHERE estatus like 'ACT' and id_usuario=".$id);
		return $q->result();
	}
	function reporte_afiliados($id_usuario)
	{
		$q=$this->db->query('SELECT a.id,tr.nombre as nombreRed, a.username usuario, a.created creacion, b.nombre nombre, b.apellido apellido, a.email email, 
		c.descripcion sexo, d.descripcion edo_civil FROM users a, user_profiles b, cat_sexo c, cat_edo_civil d , afiliar e, tipo_red tr WHERE a.created>=NOW() - INTERVAL 1 MONTH 
		and a.id=b.user_id and b.id_sexo=c.id_sexo and b.id_edo_civil=d.id_edo_civil and b.id_tipo_usuario=2 and e.id_afiliado=a.id and tr.id=e.id_red and e.debajo_de='.$id_usuario.'');
		return $q->result();
	}
	
	function is_afiliado_activo($id_afiliado,$fecha)
	{
				
			if(($this->general->isActived($id_afiliado)==0)&&
					(($this->general->isActivedAfiliacionesPuntosPersonales($id_afiliado,$fecha))==true)){
				return true;
			}
	
		return false;
	}
	
	function reporte_afiliados_activos($id_afiliado,$fecha)
	{
		$usuario=new $this->afiliado;
		$q=$this->db->query('select id,profundidad from tipo_red');
		$redes= $q->result();
		
		$afiliadosEnLaRed=array();
		
		foreach ($redes as $red){
			$usuario->getAfiliadosDebajoDe($id_afiliado,$red->id,"RED",0,$red->profundidad);
			array_push($afiliadosEnLaRed, $usuario->getIdAfiliadosRed());
		}

		
		$afiliadosActivos=array();

		foreach ($afiliadosEnLaRed[0] as $afiliados){
			
			if(($this->general->isActived($afiliados)==0)&& 
					(($this->general->isActivedAfiliacionesPuntosPersonales($afiliados,$fecha))==true)){
				$q=$this->db->query('SELECT a.id, a.username usuario, b.nombre nombre, b.apellido apellido,a.email
									FROM users a, user_profiles b WHERE a.id=b.user_id and b.id_tipo_usuario=2 and a.id='.$afiliados.'');
				
				$afiliado=$q->result();
				array_push($afiliadosActivos,$afiliado);
			}
			
		}

		return $afiliadosActivos;
	}
	
	function reporte_afiliados_inactivos($id_afiliado,$fecha)
	{
		$usuario=new $this->afiliado;
		$q=$this->db->query('select id,profundidad from tipo_red');
		$redes= $q->result();
		 
		$afiliadosEnLaRed=array();
		
		foreach ($redes as $red){
			$usuario->getAfiliadosDebajoDe($id_afiliado,$red->id,"RED",0,$red->profundidad);
			array_push($afiliadosEnLaRed, $usuario->getIdAfiliadosRed());
		}

		
		$afiliadosActivos=array();

		foreach ($afiliadosEnLaRed[0] as $afiliados){
			
			if(($this->general->isActived($afiliados)==0)&& 
					(($this->general->isActivedAfiliacionesPuntosPersonales($afiliados,$fecha))==true)){

			}else {
				$q=$this->db->query('SELECT a.id, a.username usuario, b.nombre nombre, b.apellido apellido,a.email
									FROM users a, user_profiles b WHERE a.id=b.user_id and b.id_tipo_usuario=2 and a.id='.$afiliados.'');
				
				$afiliado=$q->result();
				array_push($afiliadosActivos,$afiliado);
			}
			
		}

		return $afiliadosActivos;
	}
	
	function traer_afiliados($id)
	{
		$q=$this->db->query('select A.id_afiliado, concat(UP.nombre," ",UP.apellido) nombre, U.email,A.id_red as id_red
from afiliar A, user_profiles UP, users U
where A.debajo_de = '.$id.' and A.id_afiliado = UP.user_id and A.id_afiliado = U.id group by(U.id) order by id_red');
		
		return $q->result();
	}
	
	function traer_afiliados_red($id, $id_red)
	{
		$q=$this->db->query('select A.id_afiliado, concat(UP.nombre," ",UP.apellido) nombre, U.email
from afiliar A, user_profiles UP, users U
where A.debajo_de = '.$id.' and A.id_afiliado = UP.user_id and A.id_afiliado = U.id and A.id_red = '.$id_red.' group by(U.id)');
		return $q->result();
	}
	
	function traer_afiliados_red_frontalidad_profundidad($id, $id_red,$frontalidad)
	{
		$q=$this->db->query('select A.id_afiliado, concat(UP.nombre," ",UP.apellido) nombre, U.email
from afiliar A, user_profiles UP, users U
where A.debajo_de = '.$id.' and A.id_afiliado = UP.user_id and A.id_afiliado = U.id and A.id_red = '.$id_red.' and (A.lado<'.$frontalidad.' or 0='.$frontalidad.') group by(U.id) order by id_red,A.lado');
		return $q->result();
	}
	
	function traer_afiliados_estadisticas($id,$id_red)
	{
		$q=$this->db->query('select UP.id_sexo, 
(YEAR(CURDATE())-YEAR(UP.fecha_nacimiento)) - (RIGHT(CURDATE(),5)<RIGHT(UP.fecha_nacimiento,5)) edad,
UP.id_edo_civil, UP.id_ocupacion, UP.id_tiempo_dedicado, U.id id_afiliado
from afiliar A, user_profiles UP, users U
where A.debajo_de = '.$id.' and A.id_afiliado = UP.user_id and A.id_afiliado = U.id and A.id_red="'.$id_red.'"');
		return $q->result();
	}
	
	function traer_telefonos($id)
	{
		$q=$this->db->query('select * from cross_tel_user where id_user='.$id);
		return $q->result();
	}
	
	function traer_fotos()
	{
		$q=$this->db->query('select CIU.id_user, CI.url from cross_img_user CIU, cat_img CI where CIU.id_img = CI.id_img');
		return $q->result();
	}
	
	function traer_compras($id, $inicio, $fin)
	{
		$q=$this->db->query("select sum(costo) compras from venta where id_user=".$id." and fecha between '".$inicio."' and '".$fin."' and id_estatus='ACT'");
		return $q->result();
	}
	
	function traer_impuestos($id, $inicio, $fin)
	{
		$q=$this->db->query("select sum(impuesto) impuestos from venta where id_user=".$id." and fecha between '".$inicio."' and '".$fin."' and id_estatus=2");
		return $q->result();
	}
	
	function traer_mis_compras_productos($id, $inicio, $fin)
	{
		$q=$this->db->query("select TR.nombre red, P.nombre, M.costo costo_unitario, CVM.cantidad, V.costo, V.impuesto
	from venta V, cross_venta_mercancia CVM, mercancia M, producto P, tipo_red TR, cat_grupo_producto CGP
	where V.id_user = ".$id." and CVM.id_venta = V.id_venta and CVM.id_mercancia = M.id
	and V.fecha between '".$inicio."' and '".$fin."' and M.sku = P.id and M.id_tipo_mercancia = 1 and
	P.id_grupo = CGP.id_grupo and CGP.id_red = TR.id and V.id_estatus='ACT'");
		return $q->result();
	}
	
	function traer_mis_compras_servicios($id, $inicio, $fin)
	{
		$q=$this->db->query("select TR.nombre red, S.nombre, M.costo costo_unitario, CVM.cantidad, V.costo, V.impuesto 
	from venta V, cross_venta_mercancia CVM, mercancia M, servicio S, tipo_red TR, cat_grupo_producto CGP
	where V.id_user = ".$id." and CVM.id_venta = V.id_venta and CVM.id_mercancia = M.id 
	and V.fecha between '".$inicio."' and '".$fin."' and M.sku = S.id and M.id_tipo_mercancia = 2 and 
	S.id_red = CGP.id_grupo and CGP.id_red = TR.id and V.id_estatus='ACT'");
		return $q->result();
	}
	
	function traer_mis_compras_combinados($id, $inicio, $fin)
	{
		$q=$this->db->query("select TR.nombre red, C.nombre, M.costo costo_unitario, CVM.cantidad, V.costo, V.impuesto 
	from venta V, cross_venta_mercancia CVM, mercancia M, combinado C, tipo_red TR, cat_grupo_producto CGP
	where V.id_user = ".$id." and CVM.id_venta = V.id_venta and CVM.id_mercancia = M.id 
	and V.fecha between '".$inicio."' and '".$fin."' and M.sku = C.id and M.id_tipo_mercancia = 3 and
	C.id_red = CGP.id_grupo and CGP.id_red = TR.id and V.id_estatus='ACT'");
		return $q->result();
	}
	
	function get_productos()
	{
		$q=$this->db->query('Select a.nombre, a.descripcion, b.id, b.costo, b.costo_publico, b.fecha_alta, d.descripcion grupo, d.id_grupo, a.nombre img from producto a, 
		mercancia b, cat_grupo_producto d where a.id=b.sku and d.id_grupo=a.id_grupo and b.id_tipo_mercancia=1 
		and b.estatus like "ACT" order by d.descripcion');
		return $q->result();
	}
	function get_productos_red($idCategoriaRed, $pais)
	{
		$query = 'SELECT 
					    a.nombre,
					    a.descripcion,
					    a.inventario,
					    (select 
								(case when (max(i.cantidad)-a.inventario > 0)&&(i.cantidad) then max(i.cantidad)-a.inventario else 0 end) c 
					        from
					            inventario i,
								cedi c
					        where 
									i.id_mercancia = a.id
									and c.id_cedi = i.id_almacen
									and c.tipo = "A"
									order by i.cantidad desc) existencia,
					    b.id,
					    b.costo,
					    b.costo_publico,
					    b.fecha_alta,
					    d.descripcion grupo,
					    d.id_grupo,
					    a.nombre img,
					    d.id_red,
					    b.puntos_comisionables,
						a.max_venta,
						b.id_tipo_mercancia
					FROM
					    producto a,
					    mercancia b,
					    cat_grupo_producto d
					WHERE
					    a.id = b.sku and d.id_grupo = a.id_grupo
					        and b.id_tipo_mercancia = 1
					        and b.estatus like "ACT"
					        and (b.pais = "'.$pais.'" or b.pais = "AAA")
					        and a.id_grupo = '.$idCategoriaRed.'
					order by d.descripcion';
		$q=$this->db->query($query);
		$produc =  $q->result();

		return $produc;
	}
	function get_grupo_prod()
	{
		$q=$this->db->query("SELECT id_grupo, descripcion from cat_grupo_producto");
		return $q->result();
	}
	function get_grupo_productos($id)
	{
		$q=$this->db->query('Select a.nombre, a.descripcion, b.id, b.costo, b.costo_publico, b.fecha_alta, d.descripcion grupo, d.id_grupo from producto a, 
		mercancia b, cat_grupo_producto d where a.id=b.sku and d.id_grupo=a.id_grupo and b.id_tipo_mercancia=1 
		and b.estatus like "ACT" and d.id_grupo='.$id.' order by d.descripcion');
		return $q->result();
	}
	function get_promocion_prod()
	{
		$q=$this->db->query('Select a.nombre producto, f.nombre, f.descripcion, b.id id_merc, f.id_promocion, f.costo prom_costo,b.costo, b.costo_publico, b.fecha_alta, 
		a.nombre img from producto a, mercancia b, promocion f where a.id=b.sku and b.id_tipo_mercancia=1 
		and f.id_mercancia=b.id and f.inicio<NOW() and f.fin>NOW() and b.estatus like "ACT" and f.estatus like "ACT"');
		return $q->result();
	}
	function get_promocion_serv()
	{
		$q=$this->db->query('Select a.nombre servicio,f.nombre, f.descripcion, b.id id_merc, f.id_promocion, f.costo prom_costo,b.costo, b.costo_publico, b.fecha_alta, 
		a.nombre img from servicio a, mercancia b, promocion f where a.id=b.sku and b.id_tipo_mercancia=2 
		and f.id_mercancia=b.id and f.inicio<NOW() and f.fin>NOW() and b.estatus like "ACT" and f.estatus like "ACT"');
		return $q->result();
	}
	function get_promocion_comb()
	{
		$q=$this->db->query('SELECT d.id, a.nombre combinado, a.descuento, d.costo, d.fecha_alta, h.nombre, 
		h.descripcion, h.id_promocion, h.costo prom_costo, a.nombre img from combinado a, mercancia d, cross_combinado e, 
		promocion h where a.id=e.id_combinado and d.sku=a.id and d.estatus="ACT" and a.estatus="ACT" 
		and h.estatus="ACT" and d.id_tipo_mercancia=3 and h.id_mercancia=d.id and h.inicio<NOW() and h.fin>NOW()');
		return $q->result();
	}
	function get_producto_espec($busqueda)
	{
		$q=$this->db->query('SELECT d.id, a.nombre, a.descripcion, b.tipo_producto, c.username, d.costo, e.comision, d.fecha_alta, f.ruta from producto a, users c, 
		cat_tipo_producto b, mercancia d, cat_proveedor e, archivo f where a.id=d.sku and d.id_tipo_mercancia=1 and d.id_proveedor=e.id and a.concepto=b.id 
		and d.estatus like "ACT" and e.id_usuario=c.id and a.img=f.id_archivo and (a.nombre like "'.$busqueda.'%" or a.nombre like "%'.$busqueda.'" 
		or a.nombre like "%'.$busqueda.'%")');
		return $q->result();
	}
	function get_servicios()
	{
		$q=$this->db->query('Select a.nombre, a.descripcion, b.id, b.costo, b.costo_publico, b.fecha_alta, a.nombre img from servicio a, mercancia b 
		where a.id=b.sku and b.id_tipo_mercancia=2 and b.estatus like "ACT"');
		return $q->result();
	}
	
	function get_servicios_red($idCategoriaRed,$pais)
	{
		$q=$this->db->query('Select a.nombre, a.descripcion, b.id, b.costo, b.costo_publico, b.fecha_alta, a.nombre img,a.id_red, b.puntos_comisionables 
		from servicio a, mercancia b
		where a.id=b.sku and b.id_tipo_mercancia= 2 and b.estatus like "ACT" and a.id_red= '.$idCategoriaRed.' and (b.pais = "'.$pais.'" or b.pais = "AAA")');
		$servicios_bd =  $q->result();

		return $servicios_bd;
	}
	function get_servicio_espec($busqueda)
	{
		$q=$this->db->query('SELECT d.id, a.nombre, a.descripcion, b.tipo_servicio, c.username, d.costo, e.comision, d.fecha_alta, f.ruta from servicio a, users c, 
		cat_tipo_servicio b, mercancia d, cat_proveedor e, archivo f where a.id=d.sku and d.id_tipo_mercancia=2 and d.id_proveedor=e.id and a.concepto=b.id 
		and d.estatus like "ACT" and e.id_usuario=c.id and a.img=f.id_archivo and (a.nombre like "'.$busqueda.'%" or a.nombre like "%'.$busqueda.'" 
		or a.nombre like "%'.$busqueda.'%")');
		return $q->result();
	}	
	function get_combinados()
	{
		$q=$this->db->query('SELECT d.id, a.nombre, a.descripcion, a.descuento, a.id id_combinado, d.costo, d.fecha_alta, a.nombre img from combinado a, mercancia d, cross_combinado 
		e where a.id=e.id_combinado and d.sku=a.id and d.estatus="ACT" and d.id_tipo_mercancia=3');
		return $q->result();
	}
	function get_combinados_red($idCategoriaRed,$pais)
	{
		$q=$this->db->query('SELECT d.id, a.nombre, a.descripcion, a.descuento, a.id id_combinado, d.costo, d.costo_publico,d.fecha_alta,d.puntos_comisionables, a.nombre img, a.id_red from combinado a, mercancia d, cross_combinado
		e where a.id=e.id_combinado and d.sku=a.id and d.estatus="ACT" and d.id_tipo_mercancia=3 and a.id_red='.$idCategoriaRed.' and (d.pais = "'.$pais.'" or d.pais = "AAA") group by (d.id)');
		$combinados_bd =  $q->result();

		return $combinados_bd;
	}
	
	function get_paquetes_inscripcion_red($idCategoriaRed,$pais)
	{
		$q=$this->db->query('SELECT d.id, a.nombre, a.descripcion, a.id_paquete, d.costo, d.costo_publico,d.fecha_alta,d.puntos_comisionables, a.nombre img, a.id_red 
								from paquete_inscripcion a, mercancia d, cross_paquete
								e where a.id_paquete=e.id_paquete 
								and d.sku=a.id_paquete 
								and d.estatus="ACT" 
								and d.id_tipo_mercancia=4 and a.id_red='.$idCategoriaRed.' 
								and (d.pais = "'.$pais.'" or d.pais = "AAA") group by (d.id)');
		$paquete_bd =  $q->result();

		return $paquete_bd;
	}
	
	function get_membresias_red($idCategoriaRed,$pais)
	{
		$q=$this->db->query('Select a.nombre, a.descripcion, b.id, b.costo, b.costo_publico, b.fecha_alta, a.nombre img,a.id_red,b.puntos_comisionables
		from membresia a, mercancia b
		where a.id=b.sku and b.id_tipo_mercancia= 5 and b.estatus like "ACT" and a.id_red= '.$idCategoriaRed.' and (b.pais = "'.$pais.'" or b.pais = "AAA")');
		$membresia_bd =  $q->result();
	
		return $membresia_bd;
	}
	
	function get_paquetes_inscripcion($pais, $id_usuario)
	{
		$q=$this->db->query('SELECT d.id, a.nombre, a.Descripcion, a.id_paquete, d.costo, d.costo_publico,d.fecha_alta, a.nombre img, a.id_red 
from paquete_inscripcion a, mercancia d, cross_paquete e, afiliar af
where a.id_paquete = e.id_paquete and d.sku= a.id_paquete and d.estatus="ACT" and af.id_red = a.id_red and d.id_tipo_mercancia= 4  and (d.pais = "'.$pais.'" or d.pais="AAA") group by (d.id)');
		$combinados_bd =  $q->result();
		$combinados = array();
		foreach ($combinados_bd as $combinado){
			if(!$this->ComprobarCompraMercancia($id_usuario, $combinado->id)){
				array_push($combinados, $combinado);

		}
		return $combinados_bd;
	}
	}
	
	function get_combinado_espec($busqueda)
	{
		$q=$this->db->query('SELECT e.id, a.nombre, b.descripcion d_prod, b.nombre n_prod, c.descripcion d_serv, c.nombre n_serv, d.username, e.costo, e.fecha_alta, 
		f.comision, g.ruta from combinado a, producto b, servicio c, users d, mercancia e, cat_proveedor f, archivo g where a.id=e.sku and e.id_tipo_mercancia=3 and 
		e.id_proveedor=f.id and f.id_usuario=d.id and a.id_servicio=c.id and a.id_producto=b.id and e.estatus like "ACT" and a.img=g.id_archivo and 
		(a.nombre like "'.$busqueda.'%" or a.nombre like "%'.$busqueda.'" or a.nombre like "%'.$busqueda.'%")');
		return $q->result();
	}
	
	function getMinimoInventario($id){
		$posicion = $this->get_tipo_mercancia_atual($id);
		$tipo = array(
			1 => 'productos',	
			2 => 'servicios',
			3 => 'combinados',
			4 => 'paquete',
			5 => 'membresia',
		);
		$function = 'detalles_'.$tipo[$posicion[0]->id_tipo_mercancia];
		$detalles = $this->$function($id);
		return $detalles[0]->inventario;
	}
	
	function detalles_productos($i)
	{
		$q=$this->db->query('SELECT *
		FROM producto a, mercancia b WHERE a.id=b.sku and b.id='.$i);
		return $q->result();
	}
	
	function detalles_membresia($i)
	{
		$q=$this->db->query('SELECT b.id,a.nombre,a.descripcion,b.costo_publico,b.costo,b.puntos_comisionables from membresia a, mercancia b where a.id=b.sku and b.id='.$i);
		return $q->result();
	}
	
	function detalles_servicios($i)
	{
		$q=$this->db->query('SELECT b.id,a.nombre,a.descripcion,b.costo_publico,b.costo,b.puntos_comisionables from servicio a, mercancia b where a.id=b.sku and b.id='.$i);
		return $q->result();
	}
	
	function comb_espec($i)
	{
		$q_sku=$this->db->query('SELECT sku FROM mercancia where id='.$i);
		$sku_res=$q_sku->result();
		$sku=$sku_res[0]->sku;
		$q=$this->db->query('SELECT * from combinado where id='.$sku);
		return $q->result();
	}
	
	function comb_paquete($i)
	{
		$q_sku=$this->db->query('SELECT sku FROM mercancia where id='.$i);
		$sku_res=$q_sku->result();
		$sku=$sku_res[0]->sku;
		$q=$this->db->query('SELECT * from paquete_inscripcion where id_paquete ='.$sku);
		return $q->result();
	}
	
	function detalles_combinados($i)
	{
		$combinado=$this->db->query('SELECT d.id,e.id_combinado as id_combinado,a.nombre, a.descripcion,d.costo, d.costo_publico,d.puntos_comisionables from combinado a, mercancia d, cross_combinado
		e where a.id=e.id_combinado and d.sku=a.id and d.estatus="ACT" and d.id_tipo_mercancia=3 and d.id='.$i.' group by (d.id)');
		$combinado=$combinado->result();

		$q1=$this->db->query('SELECT * FROM cross_combinado where id_combinado='.$combinado[0]->id_combinado);
		$mercanciaCombinado=$q1->result();
		$descripcionMercancias="";
		foreach($mercanciaCombinado as $mercancia)
		{
	
			if($mercancia->id_tipo_mercancia==1)
			{
				$qp=$this->db->query('SELECT a.nombre as nombre
										FROM producto a, mercancia b WHERE a.id=b.sku and b.id='.$mercancia->id_mercancia);
				$prod=$qp->result();
				$descripcionMercancias.="✓ ".$mercancia->cantidad." ".$prod[0]->nombre."";
			}
			
			if($mercancia->id_tipo_mercancia==2)
			{
				$qp=$this->db->query('SELECT a.nombre as nombre 
										from servicio a, mercancia b where a.id=b.sku and b.id='.$mercancia->id_mercancia);
				$prod=$qp->result();
				$descripcionMercancias.=" ✓ ".$mercancia->cantidad." ".$prod[0]->nombre."";
			}

		}

		$descripcionMercancias="(".$descripcionMercancias.")</p><p>".$combinado[0]->descripcion;
		$combinado[0]->descripcion=$descripcionMercancias;
		return $combinado;
	}
	
	function detalles_paquete($i)
	{
		$paquete=$this->db->query('SELECT d.id, a.nombre, a.descripcion, a.id_paquete, d.costo, d.costo_publico,d.fecha_alta, a.nombre img, a.id_red 
								from paquete_inscripcion a, mercancia d, cross_paquete
								e where a.id_paquete=e.id_paquete 
								and d.sku=a.id_paquete 
								and d.estatus="ACT" 
								and d.id_tipo_mercancia=4 and d.id='.$i.' group by (d.id)');
		$paquete=$paquete->result();

		$q1=$this->db->query('SELECT * FROM cross_paquete where id_paquete='.$paquete[0]->id_paquete);
		$mercanciaPaquete=$q1->result();
		$descripcionMercancias="";

		foreach($mercanciaPaquete as $mercancia)
		{
	
			if($mercancia->id_tipo_mercancia==1)
			{
				$qp=$this->db->query('SELECT a.nombre as nombre
										FROM producto a, mercancia b WHERE a.id=b.sku and b.id='.$mercancia->id_mercancia);
				$prod=$qp->result();
				$descripcionMercancias.=" ✓ ".$mercancia->cantidad." ".$prod[0]->nombre."";
			}
			
			if($mercancia->id_tipo_mercancia==2)
			{
				$qp=$this->db->query('SELECT a.nombre as nombre 
										from servicio a, mercancia b where a.id=b.sku and b.id='.$mercancia->id_mercancia);
				$prod=$qp->result();
				$descripcionMercancias.=" ✓ ".$mercancia->cantidad." ".$prod[0]->nombre."";
			}

		}

		$descripcionMercancias="(".$descripcionMercancias.")</p><p>".$paquete[0]->descripcion;
		$paquete[0]->descripcion=$descripcionMercancias;
		return $paquete;
	}

	function costo_merc($id)
	{
		$q=$this->db->query('Select costo, costo_publico from mercancia where id='.$id);
		return $q->result();	
	}
	function detalles_prom_prod($i)
	{
		$q=$this->db->query('Select a.nombre producto, a.peso, a.alto, a.ancho, a.profundidad, a.diametro, f.nombre, f.descripcion, f.costo prom_costo, 
		b.costo, b.id, f.id_promocion from producto a, mercancia b, promocion f where a.id=b.sku and f.id_mercancia=b.id and f.id_promocion='.$i);
		return $q->result();
	}
	function detalles_prom_serv($i)
	{
		$q=$this->db->query('Select a.nombre servicio, a.fecha_inicio, a.fecha_fin, f.nombre, f.descripcion, f.costo prom_costo,b.costo, b.id, f.id_promocion
		from servicio a, mercancia b, promocion f where a.id=b.sku and f.id_mercancia=b.id and f.id_promocion='.$i);
		return $q->result();
	}
	function detalles_prom_comb($i)
	{
		$q=$this->db->query('Select a.nombre combinado, b.nombre servicio, c.nombre producto, d.nombre, d.descripcion, f.id, d.id_promocion, f.costo, d.costo prom_costo 
		from combinado a, servicio b, producto c, promocion d, cross_combinado e, mercancia f where a.id=e.id_combinado and b.id=e.id_servicio and c.id=e.id_producto 
		and f.sku=a.id and d.id_mercancia=f.id and d.id_promocion='.$i);
		return $q->result();
		
	}
	function prom_espec($i)
	{
		$q=$this->db->query('SELECT a.*, b.nombre promo, b.descripcion promo_des from combinado a, promocion b, mercancia c 
		where a.id=b.sku and c.id_mercancia=b.id and c.id_promocion='.$i);
		return $q->result();
	}
	function get_distribuidores($i)
	{
		$q=$this->db->query('SELECT a.id, a.costo, a.comision, a.impuesto, b.username from cat_distribuidor a, users b, mercancia c, cross_merc_dist e where e.id_mercancia=c.id 
		and e.id_distribuidor=a.id and b.id=a.id_usuario and c.id='.$i);
		return $q->result();
	}
	function get_imagenes($i)
	{
		$q=$this->db->query('Select a.url from cat_img a, mercancia b, cross_merc_img c where a.id_img=c.id_cat_imagen and b.id=c.id_mercancia and b.id='.$i);
		return $q->result();
	}
	
	function get_img($i)
	{
		$q=$this->db->query('Select a.url from cat_img a, mercancia b, cross_merc_img c where a.id_img=c.id_cat_imagen and b.id=c.id_mercancia and b.id='.$i.' limit 1');
		return $q->result();
	}
	
	function get_img_prom($i)
	{
		$q=$this->db->query('SELECT a.url FROM cat_img a, promocion b, cross_img_promo c WHERE c.id_promo=b.id_promocion and a.id_img=c.id_img 
		and b.id_promocion='.$i.' limit 1');
		return $q->result();
	}
	function get_limite_compras($tipoMercancia,$i)
	{
			$q=$this->db->query("select 
								    a.min_venta,
								    a.max_venta,
								    a.inventario,
								    (select 
								            (case
								                    when
								                        (max(i.cantidad) - a.inventario > 0)
								                            && (i.cantidad)
								                    then
								                        max(i.cantidad) - a.inventario
								                    else 0
								                end) c
								        from
								            inventario i,
								            cedi c
								        where
								            i.id_mercancia = b.id
								                and c.id_cedi = i.id_almacen
								                and c.tipo = 'A'
								        order by i.cantidad desc) existencia
								from
								    producto a,
								    mercancia b
								where
								    a.id = b.sku and b.id =".$i);
			return $q->result();
	}
	function get_costo($i)
	{
		$q=$this->db->query('SELECT costo from cat_distribuidor where id='.$i);
		return $q->result();
	}
	function get_comision($i)
	{
		$q=$this->db->query('SELECT a.id_usuario from compras_reportes where id='.$i);
	}



	function get_estatus($id)
	{
		$q=$this->db->query('SELECT * from billetera where id_user='.$id);
		return $q->result();
	}
	function crea_pswd($id)
	{
		$pswd=strlen($_POST['password']).strrev($_POST['password']);
		$pswd=md5($pswd).$pswd;
		$pswd=md5(strrev($pswd));
		$this->db->query('update billetera set pswd="'.$pswd.'", estatus="ACT" where id_user='.$id);
	}
	function get_afiliados($id)
	{
		/*$q=$this->db->query("select *,(select nombre from user_profiles where user_id=id_afiliado) afiliado,
		(select apellido from user_profiles where user_id=id_afiliado) afiliado_p from afiliar where id_afiliador=".$id);
		return $q->result();*/
		$q=$this->db->query("select *,(select nombre from user_profiles where user_id=id_afiliado) afiliado,
			(select apellido from user_profiles where user_id=id_afiliado) afiliado_p
			,(select nombre from user_profiles where user_id=debajo_de) debajo_de_n,
			(select apellido from user_profiles where user_id=debajo_de) debajo_de_p 
			from afiliar where id_red=".$id);
		return $q->result();
	}
	function get_compras_usr($start,$end,$usr)
	{
		$q=$this->db->query("select a.id_venta, a.costo, a.fecha, b.descripcion, c.username from venta a, cat_estatus b, users c where a.id_user=".$usr." and a.id_user=c.id 
		and a.id_estatus=b.id_estatus and a.fecha>'".$start."' and a.fecha<'".$end."' order by a.fecha ASC");
		return $q->result();
	}
	function get_compras($start,$end,$id_red)
	{
		$q=$this->db->query("select a.id_venta, a.costo, a.fecha, b.descripcion, c.username from venta a, cat_estatus b, users c , afiliar d where a.id_user=c.id 
		and a.id_estatus=b.id_estatus and a.fecha>'".$start."' and a.fecha<'".$end."' and c.id=d.id_afiliado and d.id_red=".$id_red." order by a.fecha ASC ");
		return $q->result();
	}
    function estadistica_sex($i)
    {
        $q=$this->db->query("SELECT id_sexo, COUNT( id_sexo ) 
        FROM user_profiles
        GROUP BY id_sexo");
	}
   	function get_puntos_comisionables($id)
   	{
   		$q=$this->db->query("select puntos_comisionables from mercancia where id=".$id);
		return $q->result();
   	}
	function insert_comision($venta,$puntos)
	{
		$q=$this->db->query("insert into comision values (".$venta.",".$puntos.")");
	}
	
	function get_cantidad_almacen($id)
	{
		$q=$this->db->query("SELECT a.cantidad - a.bloqueados as cantidad, p.id FROM inventario a, cedi b, mercancia m, producto p 
		WHERE a.id_almacen = b.id_cedi and b.tipo = 'A' and b.id_cedi = 1 and m.sku = p.id and m.id = ".$id." and 
		m.sku = a.id_mercancia");
		return $q->result();
	}
	
	function get_cantidad_carrito_temporal($id)
	{
		$q=$this->db->query("SELECT cve.cantidad

					FROM cross_venta_mercancia cve, carrito_temporal ct
			
					WHERE ct.id_venta = cve.id_venta and cve.id_mercancia = ".$id);
		return $q->result();
	}
	
	function update_inventario($id,$qty)
	{
		$inventario_q=$this->db->query("SELECT a.id_inventario, a.cantidad FROM inventario a, almacen b WHERE a.id_mercancia=".$id." and a.id_almacen=b.id_almacen and b.web=1");
		$inventario_res=$inventario_q->result();
		$id_inventario=$inventario_res[0]->id_inventario;
		$actual=($inventario_res[0]->cantidad)*1;
		$restantes=$actual-$qty;
		$this->db->query("update inventario set cantidad=".$restantes." where id_inventario=".$id_inventario);
	}
	function new_movimiento($id,$qty)
	{
		$inventario_q=$this->db->query("SELECT a.id_inventario, a.cantidad FROM inventario a, almacen b WHERE a.id_mercancia=".$id." and a.id_almacen=b.id_almacen and b.web=1");
		$inventario_res=$inventario_q->result();
		$id_inventario=$inventario_res[0]->id_inventario;
	}
	function get_impuestos_merca($id)
	{
		$q=$this->db->query("Select id_impuesto from cross_merc_impuesto where id_mercancia=".$id);
		$res_imp=$q->result();
		$impuestos=Array();
		$i=0;
		foreach($res_imp as $imp)
		{
			$q2=$this->db->query("Select porcentaje from cat_impuesto where id_impuesto=".$imp->id_impuesto);
			$res2=$q2->result();
			$impuestos[$i]=$res2[0]->porcentaje;
			$i++;
		}
		return $impuestos;
	}
	function salida_por_venta($id,$qty,$user,$venta)
	{
		$q=$this->db->query("SELECT costo from mercancia where id=".$id);
		$res_q=$q->result();
		$costo=$res_q[0]->costo;
		$importe=$costo;
		$total=$costo;
		$subtotal=$costo*$qty;
		$q=$this->db->query("Select id_impuesto from cross_merc_impuesto where id_mercancia=".$id);
		$res_imp=$q->result();
		foreach($res_imp as $imp)
		{
			$q2=$this->db->query("Select porcentaje from cat_impuesto where id_impuesto=".$imp->id_impuesto);
			$res2=$q2->result();
			$impuestos[$i]=$res2[0]->porcentaje;
			$i++;
		}
		foreach($impuestos as $desc)
		{
			$mas=($desc*$costo)/100;
			$total=$total+$mas;
		}
		$q_alm=$this->db->query("SELECT id_almacen from almacen where web=1");
		$alm_res=$q_alm->result();
		$origen=$alm_res[0]->id_almacen;
		$q_user=$this->db->query("SELECT username from users where id=".$user);
		$user_res=$q_user->result();
		$usuario=$user_res[0]->username;
		$clave="VENTA".$user.$usuario;
		$dato_mov=array(
			"id_tipo"		=> 2,
			"entrada"		=> 0,
			"keyword"		=> $clave,
			"origen"		=> $origen,
			"destino"		=> $usuario,
			"id_mercancia"	=> $id,
			"cantidad"		=> $qty,
			"id_impuesto"	=> 1,
			"subtotal"		=> $subtotal,
			"importe"		=> $importe,
			"total"			=> $total,
			"id_estatus"	=> 1
		);
		$this->db->insert("movimiento",$dato_mov);
		$insert_mov=$this->db->insert_id();
		$dato_surtido=array(
			"id_almacen_origen"	=> $origen,
			"id_movimiento"		=> $insert_mov,
			"estatus"			=> 1,
			"id_venta"			=> $venta
		);
		$this->db->insert("surtido",$dato_surtido);
	}
	function get_pais()
	{
		/*7= español 3=inglés*/
		$q=$this->db->query("select Code, Name, Code2 from Country ");
		return $q->result();
	}
	
	function BancosPagoUsuario($id){
		$q = $this->db->query("select pais from cross_dir_user where id_user=".$id);
		$pais = $q->result();
		$pais = $pais[0]->pais;
		$q = $this->db->query("select * from cat_banco where (id_pais='".$pais."' or id_pais='AAA')  and estatus = 'ACT'");
		$bancos = $q->result();
		return $bancos;
	}
	
	function BancosPagoComprador($id){
		$q = $this->db->query("select id_pais from comprador where dni=".$id);
		$pais = $q->result();
		$pais = $pais[0]->id_pais;
		$q = $this->db->query("select * from cat_banco where id_pais='".$pais."' and estatus = 'ACT'");
		$bancos = $q->result();
		return $bancos;
	}
	
	function get_direccion_comprador($id)
	{
		$q=$this->db->query("SELECT a.*,b.nombre, b.apellido, b.keyword, c.email FROM cross_dir_user a, user_profiles b, users c 
		WHERE c.id=a.id_user and c.id=b.user_id and c.id=".$id);
		return $q->result();
	}
	
	function get_telefonos_comprador($id){
		$q = $this->db->query("SELECT numero FROM cross_tel_user where estatus = 'ACT' and id_user = ".$id." limit 1;");
		$telfonos = $q->result();
		
		return $telfonos[0]->numero;
	}
	
	function hacer_compra()
	{
/*
		if(!isset($_GET["usr"]))
		{
			$id_user=$this->tank_auth->get_user_id();
		}
		else
		{
			$id_user=$_GET["usr"];
		}
		$dato_venta=array(
			"id_user" 			=> $id_user,
			"id_estatus"		=> 3,
			"costo" 			=> $this->cart->total(),
			"id_metodo_pago" 	=> $_POST["pago"]
		);
		$this->db->insert("venta",$dato_venta);
		$venta = $this->db->insert_id();
		if($_GET["tipo"]==3)
		{
			$this->db->query("insert into autocompra (fecha,id_usuario) values ('".$_POST['startdate']."',".$id_user.")");
		}

		$dato_envio=array(
			"id_venta"	=> $venta,
			"nombre" 	=> $_POST["nombre_envio"],
			"apellido" 	=> $_POST["apellido_envio"],
			"cp" 		=> $_POST["cp_envio"],
			"id_pais" 	=> $_POST["pais_envio"],
			"estado" 	=> $_POST["estado_envio"],
			"municipio"	=> $_POST["municipio_envio"],
			"colonia" 	=> $_POST["colonia_envio"],
			"calle" 	=> $_POST["calle_envio"],
			"correo" 	=> $_POST["correo_envio"],
			"compania" 	=> $_POST["compania_envio"],
			"celular" 	=> $_POST["celular_envio"],
			"info_ad"	=> $_POST["info_envio"]
		);
		
		$this->db->insert("cross_venta_envio",$dato_envio);
		
		$dato_fact=array(
			"id_venta"	=> $venta,
			"nombre" 	=> $_POST["nombre_fac"],
			"apellido" 	=> $_POST["apellido_fac"],
			"rfc"		=> $_POST["rfc_fac"],
			"cp" 		=> $_POST["cp_fac"],
			"id_pais" 	=> $_POST["pais_fac"],
			"estado" 	=> $_POST["estado_fac"],
			"municipio"	=> $_POST["municipio_fac"],
			"colonia" 	=> $_POST["colonia_fac"],
			"calle" 	=> $_POST["calle_fac"],
			"correo" 	=> $_POST["correo_fac"],
			"compania" 	=> $_POST["compania_fac"],
			"celular" 	=> $_POST["celular_fac"]
		);
		$this->db->insert("cross_venta_factura",$dato_fact);
		$puntos=0;
		foreach($this->cart->contents() as $items)
		{
			$dato_cross_venta=array(
				"id_mercancia" 	=> $items['id'],
				"id_venta"		=> $venta,
				"cantidad"		=> $items['qty'],
				"id_promocion"	=> $items['options']['prom_id']
			);
			$this->db->insert("cross_venta_mercancia",$dato_cross_venta);
			$puntos_q=$this->db->query("select puntos_comisionables from mercancia where id=".$items['id']);
			$puntos_res=$puntos_q->result();
			$puntos=$puntos+($puntos_res[0]->puntos_comisionables*$items['qty']);
			$inventario_q=$this->db->query("SELECT a.id_inventario, a.cantidad FROM inventario a, almacen b 
			WHERE a.id_mercancia=".$items['id']." and a.id_almacen=b.id_almacen and b.web=1");
			$inventario_res=$inventario_q->result();
			$id_inventario=$inventario_res[0]->id_inventario;
			$actual=($inventario_res[0]->cantidad)*1;
			$restantes=$actual-$items['qty'];
			$this->db->query("update inventario set cantidad=".$restantes." where id_inventario=".$id_inventario);
			$q=$this->db->query("SELECT costo from mercancia where id=".$items['id']);
			$res_q=$q->result();
			$costo=$res_q[0]->costo;
			$importe=$costo;
			$total=$costo;
			$subtotal=$costo*$items['qty'];
			$q=$this->db->query("Select id_impuesto from cross_merc_impuesto where id_mercancia=".$items['id']);
			$res_imp=$q->result();
			$i=0;
			foreach($res_imp as $imp)
			{
				$q2=$this->db->query("Select porcentaje from cat_impuesto where id_impuesto=".$imp->id_impuesto);
				$res2=$q2->result();
				$impuestos[$i]=$res2[0]->porcentaje;
				$i++;
			}
			foreach($impuestos as $desc)
			{
				$mas=($desc*$costo)/100;
				$total=$total+$mas;
			}
			$q_alm=$this->db->query("SELECT id_almacen from almacen where web=1");
			$alm_res=$q_alm->result();
			$origen=$alm_res[0]->id_almacen;
			$q_user=$this->db->query("SELECT username from users where id=".$id_user);
			$user_res=$q_user->result();
			$usuario=$user_res[0]->username;
			$clave="VENTA".$id_user.$usuario;
			$dato_mov=array(
				"id_tipo"		=> 2,
				"entrada"		=> 0,
				"keyword"		=> $clave,
				"origen"		=> $origen,
				"destino"		=> $usuario,
				"id_mercancia"	=> $items['id'],
				"cantidad"		=> $items['qty'],
				"id_impuesto"	=> 1,
				"subtotal"		=> $subtotal,
				"importe"		=> $importe,
				"total"			=> $total,
				"id_estatus"	=> 1
			);
		
			$this->db->insert("movimiento",$dato_mov);
			$insert_mov=$this->db->insert_id();
			$dato_surtido=array(
				"id_almacen_origen"	=> $origen,
				"id_movimiento"		=> $insert_mov,
				"estatus"			=> 1,
				"id_venta"			=> $venta
			);
			$this->db->insert("surtido",$dato_surtido);
		}
		$dato_comision=array(
			"id_venta"	=> $venta,
			"puntos"	=> $puntos
		);
		$this->db->insert("comision",$dato_comision);
		switch($_POST["pago"])
		{
			case "5":
				break;
			case "1":
				$fecha=$_POST['ano_taj_c']."-".$_POST['mes_taj_c']."-10";
				$fecha=date("Y-m-t", strtotime($fecha));
				if(isset($_POST["salvar_taj_c"]))
				{
					$status="ACT";
				}
				else 
				{
					$status="DES";
				}
				
				$dato_taj=array(
					"tipo_tarjeta"		=> $_POST["pago"],
					"id_usuario"		=> $id_user,
					"id_banco"			=> $_POST["banco_taj_c"],
					"cuenta"			=> $_POST["numero_taj_c"],
					"fecha_vencimiento"	=> $fecha,
					"titular"			=> $_POST["titular_taj_c"],
					"codigo_seguridad"	=> $_POST["code_taj_c"],
					"estatus"			=> $status
				);
				$this->db->insert("tarjeta",$dato_taj);
				break;
			case "2":
				$fecha=$_POST['ano_taj']."-".$_POST['mes_taj']."-10";
				$fecha=date("Y-m-t", strtotime($fecha));
				if(isset($_POST["salvar_taj"]))
				{
					$status="ACT";
				}
				else 
				{
					$status="DES";
				}
				
				$dato_taj=array(
					"tipo_tarjeta"		=> $_POST["pago"],
					"id_usuario"		=> $id_user,
					"id_banco"			=> $_POST["banco_taj"],
					"cuenta"			=> $_POST["numero_taj"],
					"fecha_vencimiento"	=> $fecha,
					"titular"			=> $_POST["titular_taj"],
					"codigo_seguridad"	=> $_POST["code_taj"],
					"estatus"			=> $status
				);
				$this->db->insert("tarjeta",$dato_taj);
				break;
			case "3":
				break;
		}
		$this->cart->destroy();
	*/	
	}
	
	function CostoMercancia($id){
		
		$mercancia = $this->db->query("select costo from mercancia where id=".$id);
		$mercancia = $mercancia->result();
		return $mercancia[0]->costo;
	}
	function get_tipo_mercancia_atual($id){
		$q = $this->db->query("SELECT id_tipo_mercancia FROM mercancia where id=".$id);
		return  $q->result();
	}
	function CostoPublicoMercancia($id){
	
		$mercancia = $this->db->query("select costo_publico from mercancia where id=".$id);
		$mercancia = $mercancia->result();
		return $mercancia[0]->costo_publico;
	}
	
	function getCostosImpuestos($id_pais_usuario,$id_mercancia){
		$costos = $this->db->query("SELECT m.id,m.costo,m.costo_publico,m.iva,ci.descripcion as tipoImpuesto,
									m.costo*(ci.porcentaje/100)as costoImpuesto,
									m.pais,CONCAT(ci.porcentaje,'% de ',ci.descripcion) as nombreImpuesto FROM mercancia m ,cat_impuesto ci ,cross_merc_impuesto cmi
									where(m.id=cmi.id_mercancia)
									and (ci.id_impuesto=cmi.id_impuesto)
									and(m.id=".$id_mercancia.")
									group by ci.id_impuesto,ci.descripcion");
		
		$costosImpuestos=$costos->result();
		
		
		// No existen impuestos en la mercancia
		if($costosImpuestos==null)
			return $this->setNoImpuestoMercancia($id_mercancia);
		
		// Existen impuestos en la mercancia pero no existen impuesto en el pais
		if(!$this->getImpuestosPais($id_pais_usuario))
			return $this->setNoImpuestoMercancia($id_mercancia);
		
		// Coge los impuesto dependiendo el pais del afiliado
		if($costosImpuestos[0]->tipoImpuesto=="IVA"&&$costosImpuestos[0]->pais=="AAA"){
			
			return $this->getImpuestoMercanciaPorPaisUsuario($id_mercancia,$id_pais_usuario);
		}
		
		return $costos->result();

	}
	
	private function getImpuestosPais($id_pais){
		$q = $this->db->query("SELECT * FROM cat_impuesto where id_pais='".$id_pais."'");
		return  $q->result();
	}
	
	private function setNoImpuestoMercancia($id_mercancia) {
		$costos = $this->db->query("SELECT m.id,m.costo,m.costo_publico,'MAS' as iva,
									0 as costoImpuesto,' ' as nombreImpuesto,
									'AAA' as pais,'' as nombreIMpuesto,'' as id_impuesto FROM mercancia m
									where(m.id=".$id_mercancia.")
									");
		return $costos->result();
	}

	 private function getImpuestoMercanciaPorPaisUsuario($id_mercancia,$id_pais_usuario) {
	
		 $costos = $this->db->query("SELECT m.id,m.costo,m.costo_publico,m.iva,ci.descripcion as nombreImpuesto,
										m.costo*(ci.porcentaje/100) as costoImpuesto,
										ci.id_pais,CONCAT(ci.porcentaje,'% de ',ci.descripcion) as nombreImpuesto,
										ci.id_impuesto FROM mercancia m ,cat_impuesto ci ,cross_merc_impuesto cmi
										where(m.id=cmi.id_mercancia)
										and(m.id=".$id_mercancia.")
										and ci.id_pais='".$id_pais_usuario."' and ci.descripcion='IVA'
										group by ci.id_impuesto,ci.descripcion");
	 	return $costos->result();
	}
	
	
/*	function getCostosNoImpuestos($id_mercancia){
		$costos = $this->db->query("SELECT m.id,m.costo,m.costo_publico,'MAS' as iva,
									0 as costoImpuesto,
									'AAA' as pais,'' as nombreIMpuesto,'' as id_impuesto FROM mercancia m
									where(m.id=".$id_mercancia.")
									");
		return $costos->result();
	}*/
	
/*	
	function ImpuestoMercancia($id_mercancia, $costo){
		$total = 0;
		$mercancia = $this->db->query("select id_tipo_mercancia as id_tipo,costo from mercancia where id =".$id_mercancia);
		$mercancia = $mercancia->result();
		
		$impuestos = array();
		if($mercancia[0]->id_tipo == '4'){
			
			$productos = $this->db->query("Select cp.id_producto, cp.id_servicio from cross_paquete cp, mercancia m where cp.id_paquete = m.sku and m.id =".$id_mercancia);
			$productosServicios = $productos->result();
			
			foreach ($productosServicios as $detalle){
				if($detalle->id_producto != 0){
					$q = $this->db->query("Select ci.porcentaje, m.costo from cat_impuesto ci, cross_merc_impuesto cmi, producto p, mercancia m 
						where ci.id_impuesto = cmi.id_impuesto and cmi.id_mercancia = m.id and p.id = m.sku and p.id = ".$detalle->id_producto);
					$impuesto_producto = $q->result();
					array_push($impuestos, $impuesto_producto);
				}
				if($detalle->id_servicio != 0){
					$q = $this->db->query("Select ci.porcentaje, m.costo from cat_impuesto ci, cross_merc_impuesto cmi, servicio s, mercancia m
						where ci.id_impuesto = cmi.id_impuesto and cmi.id_mercancia = m.id and s.id = m.sku and s.id = ".$detalle->id_servicio);
					$impuesto_servicio = $q->result();
					array_push($impuestos, $impuesto_servicio);
				}
			}
			$mas = 0;
			foreach($impuestos as $desc)
			{
				$mas = ($desc[0]->porcentaje* $desc[0]->costo)/100;
				$total=$total+$mas;
			}
			
		}else{
			$q = $this->db->query("Select ci.porcentaje from cat_impuesto ci, cross_merc_impuesto cmi where ci.id_impuesto = cmi.id_impuesto and cmi.id_mercancia = ".$id_mercancia);
			$impuestos = $q->result();
			
			foreach($impuestos as $desc)
			{
				$mas = ($desc->porcentaje*$mercancia[0]->costo)/100;
				$total=$total+$mas;
			}
		}
		return $total;
	}
	*/


	
	function registrar_venta($id_usuario, $costo, $id_metodo, $transacion, $firma, $fecha, $impuesto)
	{
	/*	
		$dato_venta=array(
				"id_user" 			=> $id_usuario,
				"id_estatus"		=> 2,
				"costo" 			=> $costo,
				"impuesto"			=> $impuesto,
				"id_metodo_pago" 	=> $id_metodo,
				"id_transacion"     => $transacion,
				"firma"				=> $firma,
				"fecha" 			=> $fecha
		);
		$this->db->insert("venta",$dato_venta);
		$venta = $this->db->insert_id();
		return $venta;*/
	}
	
	function registrar_envio($venta, $id_usuario, $datos_envio){
		
		$dato_envio = array(
				"id_venta"	=> $venta,
				"nombre" 	=> $datos_envio[0]->nombre,
				"apellido" 	=> $datos_envio[0]->apellido,
				"cp" 		=> $datos_envio[0]->cp,
				"id_pais" 	=> $datos_envio[0]->id_pais,
				"estado" 	=> $datos_envio[0]->estado,
				"municipio"	=> $datos_envio[0]->municipio,
				"colonia" 	=> $datos_envio[0]->colonia,
				"calle" 	=> $datos_envio[0]->calle,
				"correo" 	=> $datos_envio[0]->email,
				"proveedor_mensajeria" 	=> $datos_envio[0]->id_proveedor,
				"celular" 	=> $datos_envio[0]->telefono,
				"info_ad"	=> ""
		);
		
		
		$this->db->insert("cross_venta_envio",$dato_envio);
		
		return mysql_error();
	}
	
/*	function registrar_factura($venta, $id_usuario, $datos_envio){	
		$usuario =$this->model_perfil_red->datos_perfil($id_usuario);
		
		$dato_fact=array(
				"id_venta"	=> $venta,
				"nombre" 	=> $datos_envio[0]->nombre,
				"apellido" 	=> $datos_envio[0]->apellido,
				"rfc"		=> $usuario[0]->user_id.time(),
				"cp" 		=> $datos_envio[0]->cp,
				"id_pais" 	=> $datos_envio[0]->id_pais,
				"estado" 	=> $datos_envio[0]->estado,
				"municipio"	=> $datos_envio[0]->municipio,
				"colonia" 	=> $datos_envio[0]->colonia,
				"calle" 	=> $datos_envio[0]->calle,
				"correo" 	=> $datos_envio[0]->email,
				"compania" 	=> "",
				"celular" 	=> $datos_envio[0]->telefono
		);
		$this->db->insert("cross_venta_factura",$dato_fact);
		
	}*/
	
	function registrar_factura_datos_usuario($venta, $nombre,$apellido,$rfc,$codigoPostal,$pais,
											 $estado,$municipio,$colonia,$calle,$correo,$compania,$celular){
	
	$dato_fact=array(
				"id_venta"	=> $venta,
				"nombre" 	=> $nombre,
				"apellido" 	=> $apellido,
				"rfc"		=> $rfc,
				"cp" 		=> $codigoPostal,
				"id_pais" 	=> $pais,
				"estado" 	=> $estado,
				"municipio"	=> $municipio,
				"colonia" 	=> $colonia,
				"calle" 	=> $calle,
				"correo" 	=> $correo,
				"compania" 	=> $compania,
				"celular" 	=> $celular
		);
		$this->db->insert("factura",$dato_fact);
	}
	
	
	function registrar_venta_mercancia($id_mercancia, $venta, $cantidad,$costo,$impuesto,$nombreImpuesto){
		$dato_cross_venta=array(
				"id_mercancia" 	=> $id_mercancia,
				"id_venta"		=> $venta,
				"cantidad"		=> $cantidad,
				"costo_unidad"		=> $costo,
				"impuesto_unidad"		=> $impuesto,
				"costo_total"		=> (($costo+$impuesto)*$cantidad),
				"nombreImpuesto"	=> $nombreImpuesto
		);
		$this->db->insert("cross_venta_mercancia",$dato_cross_venta);
	}
	
	function insertar_comision_web_personal($id_afiliado, $id_venta, $id_comprador, $valor){
		$dato_cross_venta=array(
				"id_afiliado" 	=> $id_afiliado,
				"id_venta"		=> $id_venta,
				"id_comprador"		=> $id_comprador,
				"valor"	=> $valor
		);
		$this->db->insert("comision_web_personal",$dato_cross_venta);
	}
	
	function registrar_ventaConsignacion($id_usuario, $fecha){
		$dato_venta=array(
				"id_user" 			=> $id_usuario,
				"id_estatus"		=> 'DES',
				"id_metodo_pago" 	=> 'BANCO',
				"fecha" 			=> $fecha
		);
		$this->db->insert("venta",$dato_venta);
		$venta = $this->db->insert_id();
		return $venta;
	}
	
	function registrar_venta_pago_online($id_usuario, $tipo,$fecha){
		$dato_venta=array(
				"id_user" 			=> $id_usuario,
				"id_estatus"		=> 'ACT',
				"id_metodo_pago" 	=> $tipo,
				"fecha" 			=> $fecha
		);
		$this->db->insert("venta",$dato_venta);
		$venta = $this->db->insert_id();
		return $venta;
	}

	function registrar_venta_pago_online_des($id_usuario, $tipo,$fecha){
		$dato_venta=array(
				"id_user" 			=> $id_usuario,
				"id_estatus"		=> 'DES',
				"id_metodo_pago" 	=> $tipo,
				"fecha" 			=> $fecha
		);
		$this->db->insert("venta",$dato_venta);
		$venta = $this->db->insert_id();
		return $venta;
	}
	
	function  registrar_pago_online ($id_venta,$id,$identificado_transacion,$fecha,$referencia,
									 	$metodo_pago,$estado,$respuesta,$moneda,$medio_pago){
		$dato_venta=array(
				"id_venta" => $id_venta,
				"id_usuario" => $id,
				"transaction_id"=> $identificado_transacion,
				"fecha" => $fecha,
				"reference_sale" => $referencia,
				"payment_method_id" => $metodo_pago,
				"state_pol" => $estado,
				"response_code_pol" => $respuesta,
				"currency" => $moneda,
				"payment_method_name" => $medio_pago
		);
		$this->db->insert("pago_online_transaccion",$dato_venta);
		$venta = $this->db->insert_id();
		return $venta;
	}
	
	function registrar_pago_online_proceso($id_usuario, $contenido_carrito,$carrito){
		$dato_venta=array(
				"id_usuario" 			=> $id_usuario,
				"contenido_carrito"		=> $contenido_carrito,
				"carrito"		=> $carrito
		);
		$this->db->insert("pago_online_proceso",$dato_venta);
		$id_pago_proceso = $this->db->insert_id();
		return $id_pago_proceso;
	}
	
	function getContenidoCarritoPagoOnlineProceso($id){
		$q = $this->db->query("SELECT id_usuario,contenido_carrito as contenido,carrito as carrito FROM pago_online_proceso where id=".$id.";");
		return $q->result();
	}
	
	function getContenidoCarritoPagoOnlineProcesoIN($in){
		$q = $this->db->query("SELECT id,contenido_carrito as contenido,carrito as carrito FROM pago_online_proceso where id in (".$in.");");
		return $q->result();
	}

	function registrar_cross_comprador_ventaConsignacion($id_comprador, $id_venta , $id_afiliado){
		$dato_venta=array(
				"id_comprador" 			=> $id_comprador,
				"id_venta"		=> $id_venta,
				"id_afiliado" 			=> $id_afiliado,
				"estado"			=> "Pendiente"
		);
		$this->db->insert("cross_comprador_venta",$dato_venta);
	}
	
	/*function registrar_impuestos($id_mercancia){
		$q = $this->db->query("SELECT costo from mercancia where id=".$id_mercancia);
		$mercancia=$q->result();
		$costo = $mercancia[0]->costo;
		
		$total = 0;
		$q = $this->db->query("Select ci.porcentaje from cat_impuesto ci, cross_merc_impuesto cmi where ci.id_impuesto = cmi.id_impuesto and cmi.id_mercancia = ".$id_mercancia);
		$impuestos = $q->result();
		$i=0;
		
		foreach($impuestos as $desc)
		{
			$mas=($desc->porcentaje*$costo)/100;
			$total=$total+$mas;
		}
		return $total;
	}*/
	
	function registrar_movimiento($id_usuario, $id_mercancia, $cantidad, $subtotal, $total, $venta, $puntos)
	{
	/*	
		//$q_alm=$this->db->query("SELECT id_almacen from almacen where web=1");
		//$alm_res = $q_alm->result();
		//$origen = $alm_res[0]->id_almacen;
		$origen = 1;
		$q_user = $this->db->query("SELECT username from users where id=".$id_usuario);
		$user_res = $q_user->result();
		$usuario = $user_res[0]->username;
		$clave="VENTA".$id_usuario.$usuario;
		$dato_mov=array(
						"id_tipo"		=> 2,
						"entrada"		=> 0,
						"keyword"		=> $clave,
						"origen"		=> $origen,
						"destino"		=> $usuario,
						"id_mercancia"	=> $id_mercancia,
						"cantidad"		=> $cantidad,
						"id_impuesto"	=> 1,
						"subtotal"		=> $subtotal,
						"importe"		=> $total,
						"total"			=> $total,
						"id_estatus"	=> 1
				);
				
				$this->db->insert("movimiento",$dato_mov);
				$insert_mov = $this->db->insert_id();
				
				$dato_surtido=array(
						"id_almacen_origen"	=> $origen,
						"id_movimiento"		=> $insert_mov,
						"estatus"			=> 1,
						"id_venta"			=> $venta
				);
				$this->db->insert("surtido",$dato_surtido);*/
	}
	
	function ObtenerCategoriaMercancia($id_mercancia){
		$q = $this->db->query("select id_tipo_mercancia, sku from mercancia where id =".$id_mercancia);
		$mercancia = $q->result();
		
		if($mercancia[0]->id_tipo_mercancia == 1){
			$q = $this->db->query("SELECT id_grupo as id_grupo FROM producto where id =".$mercancia[0]->sku);
		}elseif ($mercancia[0]->id_tipo_mercancia == 2){
			$q = $this->db->query("SELECT id_red as id_grupo FROM servicio where id=".$mercancia[0]->sku);
		}elseif($mercancia[0]->id_tipo_mercancia == 3) {
			$q = $this->db->query("SELECT id_red as id_grupo FROM combinado where id=".$mercancia[0]->sku);
		}elseif($mercancia[0]->id_tipo_mercancia == 4) {
			$q = $this->db->query("SELECT id_red as id_grupo FROM paquete_inscripcion where id_paquete=".$mercancia[0]->sku);
		}elseif($mercancia[0]->id_tipo_mercancia == 5) {
			$q = $this->db->query("SELECT id_red as id_grupo FROM membresia where id=".$mercancia[0]->sku);
		}
		$categoria = $q->result();
		
		$red=$this->ConsultarIdRedMercancia($categoria[0]->id_grupo);

		return $red; 
	}
	
	function obtenerPlanDeCompensacion($id_red){
		$q = $this->db->query("SELECT plan FROM tipo_red where id=".$id_red);
		return $q->result();
	}
	
	function Red($id){
		$q = $this->db->query("SELECT * FROM tipo_red where id=".$id);	
		return $q->result();
	}
	
	function CalcularComisionVenta($venta,$afiliado,$puntos,$valor_puntos, $id_red_mercancia){
		
		$datos = array(
				'id_venta' => $venta,
				'id_afiliado' => $afiliado,
				'puntos' => $puntos,
				'valor' => $valor_puntos,
				'id_red' => $id_red_mercancia
		);

		$this->db->insert('comision', $datos);
	}
	
	function ValorComision($id_red){
		$q = $this->db->query("SELECT * FROM valor_comisiones where id_red =".$id_red." group by profundidad order by profundidad");
		return $q->result();
	}
	
	function RegistrarPagoBanco($id_usuario, $id_banco, $id_venta, $valor){
		$datos = array(
				'id_usuario' => $id_usuario,
				'id_banco'	=> $id_banco,
				'id_venta' 	=> $id_venta,
				'valor'		=> $valor,
				'estatus'	=> 'DES'
		);
		$this->db->insert('cuenta_pagar_banco_historial', $datos);
		
		$q = $this->db->query("SELECT * FROM cat_banco where id_banco =".$id_banco);
		return $q->result();
	}
	
	function RegsitrarVentaWebPersonal($id_afiliado, $id_comprador, $id_venta){
		$datos = array(
				'id_comprador' => $id_comprador,
				'id_afiliado'	=> $id_afiliado,
				'id_venta' 	=> $id_venta,
				'estado'	=> 'Pendiente'
		);
		
		$this->db->insert('cross_comprador_venta', $datos);
		
	}
	function actualizarVenta($id_venta,$id_estatus,$metodo_pago, $id_transaccion ,$firma ){
		$datos = array(
				'id_estatus'	=> $id_estatus,
				'id_metodo_pago' 	=> $metodo_pago,
				'firma'	=> $firma,
				'id_transacion'=> $id_transaccion
		);
		
		$this->db->update('venta', $datos, array('id_venta' => $id_venta));
	}
	function actualizarcrossCompradorVenta($id_venta,$estado){
		$datos = array(
				'estado'	=> $estado
		);
		
		$this->db->update('cross_comprador_venta', $datos, array( 'id_venta ' => $id_venta) );
	}
	function ConsultarIdCategoriaMercancia($id_red){
		$q = $this->db->query("select id_grupo from cat_grupo_producto where id_red = ".$id_red);
		$red = $q->result();
		return $red[0]->id_grupo;
	}
	
	function ConsultarIdRedMercancia($id_categoria_mercancia){
		$q = $this->db->query("select id_red from cat_grupo_producto where id_grupo = ".$id_categoria_mercancia);
		$red = $q->result();
		return $red[0]->id_red;
	}
	
	function consultarMercancia($id_venta){
		$q = $this->db->query("select M.id, CVM.costo_total as costo,CVM.costo_unidad as costo_unidad, M.costo_publico, CVM.cantidad, M.puntos_comisionables, M.id_tipo_mercancia
							from cross_venta_mercancia CVM, mercancia M 
							where CVM.id_venta = ".$id_venta."  and CVM.id_mercancia=M.id;");
		$mercancia = $q->result();
		return $mercancia;
	}
	
	function consultarMercanciaTotalVenta($id_venta){
		$q = $this->db->query("select M.id, CVM.costo_total as costo,(CVM.costo_unidad*CVM.cantidad) as costo_unidad_total,CVM.costo_unidad as costo_unidad, M.costo_publico, CVM.cantidad, M.puntos_comisionables, M.id_tipo_mercancia
							from cross_venta_mercancia CVM, mercancia M
							where CVM.id_venta = ".$id_venta."  and CVM.id_mercancia=M.id;");
		$mercancia = $q->result();
		return $mercancia;
	}
	
	function consultar_tipo_mercancia($id_venta){
		
		$q = $this->db->query("select M.id, M.costo, M.costo_publico, CVM.cantidad ,M.puntos_comisionables ,M.id_tipo_mercancia,CVM.id_mercancia,M.sku
							from cross_venta_mercancia CVM, mercancia M 
							where CVM.id_venta = ".$id_venta."  and CVM.id_mercancia=M.id and M.id_tipo_mercancia='4'");
		$mercancia = $q->result();
		return $mercancia;
	}
	function consultar_puntos_paquete($id_paquete){
		$q = $this->db->query("SELECT * FROM paquete_inscripcion where id_paquete=".$id_paquete);
		$puntos = $q->result();
		return $puntos;
	}
	function set_comision_afiliado($id_venta,$id_red_mercancia,$id_afiliado,$valor_comision){
		$dato=array(
				"id_venta"       => $id_venta ,
				"id_afiliado"    => $id_afiliado,
				"id_red"         => $id_red_mercancia ,
				"puntos"         => 0,
				"valor"          => $valor_comision,
		
		);
		
		$this->db->insert("comision",$dato);
	}
	
	function set_puntos_padre($id_afiliado,$puntos){
		$q = $this->db->query("SELECT * FROM puntos_padre where id_user=".$id_afiliado);
		$p_paquete = $q->result();
		if($p_paquete==null){
			$dato=array(
					"id_user"       => $id_afiliado,
					"puntos"     =>  $puntos,
			);
			$this->db->insert("puntos_padre",$dato);
		}else{
			$dato=array(
					"puntos"     =>  $p_paquete[0]->puntos+$puntos,
			);
			$this->db->where('id_user',$id_afiliado);
			$this->db->update("puntos_padre", $dato);
		}
		
	}
	
	function consultar_Afiliado($id_venta){
		$q = $this->db->query("select * from venta where id_venta =".$id_venta);
		$mercancia = $q->result();
		return $mercancia;
	}
	
	function ComprovarCompraProducto($id_usuario, $id_red, $frecuencia){
		if ($frecuencia=='Mensual'){
		$mes = date("m");
		$consulta = "and MONTH(v.fecha) = ".$mes;	
		}
		
		else if ($frecuencia=='Anual'){
			$ano = date("Y");
			$consulta = "and YEAR(v.fecha) = ".$ano;
		}
		
		$q = $this->db->query("select count(*) as cantidad from venta v, cross_venta_mercancia cvm, servicio s, mercancia m , cat_grupo_producto cgp 
		where v.id_venta = cvm.id_venta and cvm.id_mercancia = m.id and m.sku = s.id and m.id_tipo_mercancia = 2 and s.id_red = cgp.id_grupo and cgp.id_red = ".$id_red." and v.id_user = ".$id_usuario." and v.id_estatus=2 ".$consulta);
		$servicio = $q->result();
		
		if($servicio[0]->cantidad > 0){
			return true;
		}
		
		$q = $this->db->query("select count(*) as cantidad from venta v, cross_venta_mercancia cvm, producto s, mercancia m, cat_grupo_producto cgp 
		where v.id_venta = cvm.id_venta and cvm.id_mercancia = m.id and m.sku = s.id and m.id_tipo_mercancia = 1 and s.id_grupo = cgp.id_grupo and cgp.id_red = ".$id_red." and v.id_user = ".$id_usuario." and v.id_estatus=2 ".$consulta);
		$producto = $q->result();
		if($producto[0]->cantidad > 0){
			return true;
		}
		
		$q = $this->db->query("select count(*) as cantidad from venta v, cross_venta_mercancia cvm, combinado s, mercancia m, cat_grupo_producto cgp 
		where v.id_venta = cvm.id_venta and cvm.id_mercancia = m.id and m.sku = s.id and m.id_tipo_mercancia = 3 and s.id_red = cgp.id_grupo and cgp.id_red = ".$id_red." and v.id_user = ".$id_usuario." and v.id_estatus=2 ".$consulta);
		$producto = $q->result();
		if($producto[0]->cantidad > 0){
			return true;
		}
		
		return false;
	}
	
	function ComprobarCompraMercancia($id_usuario, $id_mercancia){
		$mes = date("m");
		$q = $this->db->query("select count(*) as cantidad 
			from venta v, cross_venta_mercancia cvm, mercancia m
			where v.id_venta = cvm.id_venta and cvm.id_mercancia = m.id and m.id = ".$id_mercancia."  and v.id_user = ".$id_usuario." and month(v.fecha)= ".$mes);
		$mercancia = $q->result();
		if($mercancia[0]->cantidad > 0){
			return true;
		}else{
			return false;
		}
	}
	
	function ComprovarCompraProductoRed($id_usuario, $id_categoria){
		$mes = date("m");
		$q = $this->db->query("select count(*) as cantidad from venta v, cross_venta_mercancia cvm, servicio s, mercancia m
		where v.id_venta = cvm.id_venta and cvm.id_mercancia = m.id and m.sku = s.id and m.id_tipo_mercancia = 2 and s.id_red = ".$id_categoria." and v.id_user = ".$id_usuario." and v.id_estatus=2");
		$servicio = $q->result();
		if($servicio[0]->cantidad > 0){
			return true;
		}
	
		$q = $this->db->query("select count(*) as cantidad from venta v, cross_venta_mercancia cvm, producto s, mercancia m
		where v.id_venta = cvm.id_venta and cvm.id_mercancia = m.id and m.sku = s.id and m.id_tipo_mercancia = 1 and s.id_grupo = ".$id_categoria." and v.id_user = ".$id_usuario." and v.id_estatus=2");
		$producto = $q->result();
		if($producto[0]->cantidad > 0){
			return true;
		}
	
		$q = $this->db->query("select count(*) as cantidad from venta v, cross_venta_mercancia cvm, combinado s, mercancia m
		where v.id_venta = cvm.id_venta and cvm.id_mercancia = m.id and m.sku = s.id and m.id_tipo_mercancia = 3 and s.id_red = ".$id_categoria." and v.id_user = ".$id_usuario." and v.id_estatus=2");
		$producto = $q->result();
		if($producto[0]->cantidad > 0){
			return true;
		}
	
		return false;
	}
	
	function buscarProveedorTarifaCiudad($id_ciudad){
		$q = $this->db->query("select pt.id, pt.tarifa, p.razon_social from proveedor_tarifas pt, proveedor_mensajeria p where pt.id_proveedor = p.id and pt.ciudad =".$id_ciudad);
		return $q->result();		
	}
	
	function consultarTarifa($id){
		$q = $this->db->query("select * from proveedor_tarifas where id =".$id);
		return $q->result();
	}
	
	function guardarDatosEnvio($datos){
		$this->db->insert('user_envio', $datos);
	}
	
	function consultarCostoEnvio($id){
		$q = $this->db->query("select costo from user_envio where id_user =".$id);
		return $q->result();
	}
	
	function consultarEnvio($id){
		$q = $this->db->query("select * from user_envio where id_user =".$id);
		return $q->result();
	}
	
	function EliminarEnvioHistorial($id){
		$this->db->query("delete from user_envio where id_user =".$id);
	}
	function VerificarCompraPaquete($id){
		$q = $this->db->query("SELECT m.id FROM cross_venta_mercancia cvm, venta v, mercancia m 
		where v.id_estatus = 2 and cvm.id_venta = v.id_venta and cvm.id_mercancia = m.id and m.id_tipo_mercancia = 4 and v.id_user = ".$id);
		
		$mercnacias_id = $q->result();
		
		if(isset($mercnacias_id[0]->id)){
			return true;
		}else{
			return false;
		}
	}
	function set_nivel_red_actual($user,$nivel){
		$dato=array(
				"nivel_en_red"     =>  $nivel,
		);
		$this->db->where('user_id',$user);
		$this->db->update("user_profiles", $dato);

	}
	
	function get_nivel_actual($id){
		$q = $this->db->query("SELECT n.nombre,n.idnivel,u.user_id  FROM user_profiles u 
				              ,niveles_afiliado n where u.nivel_en_red=n.idnivel and u.user_id=".$id);
		return $q->result();
	}
	function  get_descuento_por_nivel_actual($id){
		$q = $this->db->query("SELECT n.porcentage_venta FROM user_profiles u
				              ,niveles_afiliado n where u.nivel_en_red=n.idnivel and u.user_id=".$id);
		return $q->result();
	}
	function  tipo_mercancia($id){
		$q = $this->db->query("SELECT id FROM mercancia where id_tipo_mercancia='4' and sku=".$id);
		return $q->result();
	}
	function get_productos_venta($id_venta){
		$q = $this->db->query("SELECT * FROM cross_venta_mercancia where id_venta=".$id_venta);
		return $q->result();
	}
	function get_datos_producto($id_producto){
		$q = $this->db->query("SELECT * FROM mercancia where id=".$id_producto);
		return $q->result();
	}
	
	function esProducto($id_mercancia){
		$q = $this->db->query("SELECT sku, id_tipo_mercancia FROM mercancia where id=".$id_mercancia);
		$mercancia = $q->result();
		
		if($mercancia[0]->id_tipo_mercancia == 1){
			return true;
		}elseif($mercancia[0]->id_tipo_mercancia == 2){
			return false;
		}elseif($mercancia[0]->id_tipo_mercancia == 3){
			return $this->tieneProductosCombinado($mercancia[0]->sku);
		}elseif($mercancia[0]->id_tipo_mercancia == 4){
			return $this->tieneProductosPaquete($mercancia[0]->sku);
		}
	}
	
	function tieneProductosCombinado($id) {
		$q = $this->db->query("SELECT count(id_producto) as producto FROM cross_combinado where id_producto <> 0 and id_combinado=".$id);
		$cantidad_productos = $q->result();
		if($cantidad_productos[0]->producto > 0){
			return true;
		}else{
			return false;
		}
	}
	
	function tieneProductosPaquete($id) {
		$q = $this->db->query("SELECT count(id_producto) as producto FROM cross_paquete where id_producto <> 0 and id_paquete=".$id);
		$cantidad_productos = $q->result();
		if($cantidad_productos[0]->prodicto > 0){
			return true;
		}else{
			return false;
		}
	}
	function get_user_venta($id_venta){
		$q = $this->db->query("SELECT id_user FROM venta where id_venta=".$id_venta);
		return $q->result();

	}
	
	function get_datos_venta($id_venta){
		$q = $this->db->query("SELECT * FROM venta where id_venta=".$id_venta);
		return $q->result();
	
	}
	
	function get_mercancia_venta($id_venta){
		$q = $this->db->query("SELECT * FROM cross_venta_mercancia where id_venta=".$id_venta);
		return $q->result();	
	}
	function get_mercancia_venta_inventario($id_venta){
		$q = $this->db->query("SELECT 
								    c.*
								FROM
								    cross_venta_mercancia c,
									mercancia m
								where
									m.id = c.id_mercancia and
									m.id_tipo_mercancia = 1 and
								    c.id_venta = ".$id_venta);
		return $q->result();
	}
	function get_tipo_mercancia($id_mercancia){
		$q = $this->db->query("SELECT id_tipo_mercancia FROM mercancia where id=".$id_mercancia);
		return $q->result();
	
	}
	
	function get_venta($id){
		$q = $this->db->query("select * from venta where id_venta = ".$id);
		return $q->result();
	
	}
	
}