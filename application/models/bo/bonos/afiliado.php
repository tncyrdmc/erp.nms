<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class afiliado extends CI_Model
{


	//Usuario
	private $id_usuario;
	private $username;
	private $created;

	//Afiliacion
	private $id_afiliacion;
	private $id_red;
	private $id_padre;
	private $id_sponsor;
	private $lado_red;

	private $idAfiliadosRed=array();
	
	private $totalAfiliados=0;
	private $totalCompras=0;
	private $totalVentas=0;
	private $totalPuntosComisionables=0;
	
	//BONO BINARIOS 
	private $id_bono=0;
	private $tipoDeBono="NO";
	private $id_bono_historial=0;
	/*
	 * Estado
	 * Esta dando bono:DAR
	 * Se le esta repartiendo bono : REC
	 */
	private $estado="DAR";

	function __construct()
	{
		parent::__construct();
		
	}
	
	function setUpAfiliado($id_afiliado){
		$q=$this->db->query("SELECT id as id_afiliado,username,created FROM users where id=".$id_afiliado);
		$datosAfiliado=$q->result();
		
		$this->setIdUsuario(intval($datosAfiliado[0]->id_afiliado));
		$this->setUsername($datosAfiliado[0]->username);
		$this->setCreated($datosAfiliado[0]->created);
		
		$q=$this->db->query("SELECT id as id_afiliacion,id_red,id_afiliado,
							debajo_de as id_padre,directo as id_sponsor,lado as lado_red 
							FROM afiliar where id_afiliado=".$id_afiliado);
		
		$datosAfiliacion=$q->result();
		$this->setIdAfiliacion(intval($datosAfiliacion[0]->id_afiliacion));
		$this->setIdRed(intval($datosAfiliacion[0]->id_red));
		$this->setIdPadre(intval($datosAfiliacion[0]->id_padre));
		$this->setIdSponsor(intval($datosAfiliacion[0]->id_sponsor));
		$this->setLadoRed(intval($datosAfiliacion[0]->lado_red));
	}
	
	function nuevoAfiliado($datosUsuario){

		$this->setIdUsuario($datosUsuario["id_usuario"]);
		$this->setUsername($datosUsuario["username"]);
		$this->setCreated($datosUsuario["created"]);
		$this->setIdAfiliacion($datosUsuario["id_afiliacion"]);
		$this->setIdRed($datosUsuario["id_red"]);
		$this->setIdPadre($datosUsuario["id_padre"]);
		$this->setIdSponsor($datosUsuario["id_sponsor"]);
		$this->setLadoRed($datosUsuario["lado_red"]);

	}
	
	function ingresarUsuario() {
		$this->insertarUsuario($this->id_usuario,$this->username,
										  $this->created,$this->id_afiliacion,$this->id_red,
										  $this->id_padre,$this->id_sponsor,$this->lado_red);
	}
	
	function limpiarUsuarios() {
		$this->eliminarUsuarios();
	}
	
	function insertarUsuario($id_usuario,$username,$created,$id_afiliacion,$id_red,$id_padre,$id_sponsor,$lado_red){
		$datos = array(
				'id' => $id_usuario,
				'username'   => $username,
				'password'=>'$2a$08$ElY1rT.xjiuiY3fVfbS7O.hFK4KXFi6OJlQHZx1WagLcOngcfShLS',
				'email'=>$username.'@g.com',
				'activated'=>1,
				'banned'=>'0',
				'created'    => $created
		);
		$this->db->insert('users',$datos);
		
		$datos = array(
				'id' => $id_afiliacion,
				'id_red'   => $id_red,
				'debajo_de'    => $id_padre,
				'id_afiliado'    => $id_usuario,
				'directo' => $id_sponsor,
				'lado' => $lado_red
		);
		$this->db->insert('afiliar',$datos);
		
		$datos = array(
				'user_id' => $id_usuario,
				'id_sexo'   => '1',
				'id_edo_civil'    => '1',
				'id_tipo_usuario'    => '2',
				'id_estudio'    => '1',
				'id_ocupacion'    => '1',
				'id_tiempo_dedicado'    => '1',
				'id_estatus'    => '1',
				'id_fiscal'    => '1',
				'keyword'    => '1',
				'paquete' => '0',
				'nombre' => $username,
				'apellido' => " ",
				'estatus'    => 'ACT',
				'fecha_nacimiento' => "1980-01-01"
				
		);
		$this->db->insert('user_profiles',$datos);

		
		$datos = array(
				'id_user' => $id_usuario,
				'id_perfil'   => '2'
		
		);
		$this->db->insert('cross_perfil_usuario',$datos);
		
		$datos = array(
				'id_usuario' => $id_usuario,
				'bg_color'   => '#03b4db',
				'btn_1_color'   => '#7e7e7e',
				'btn_2_color'   => '#2c3640'
		
		);
		$this->db->insert('estilo_usuario',$datos);
		
		$datos = array(
				'id_user' => $id_usuario,
		
		);
		$this->db->insert('coaplicante',$datos);
		
		$datos = array(
				'id_user' => $id_usuario,
				'pais' => 'COL'
		
		);
		$this->db->insert('cross_dir_user',$datos);
		
		$datos = array(
				'id_user' => $id_usuario,
				'estatus' => 'DES',
				'activo' => 'No'
		
		);
		$this->db->insert('billetera',$datos);
		
		$datos = array(
				'id_user' => $id_usuario,
				'id_rango' => '1',
				'entregado' => '1',
				'estatus' => 'ACT'
		
		);
		$this->db->insert('cross_rango_user',$datos);
		
		$datos = array(
				'id_img' => $id_usuario,
				'url' => '/template/img/empresario.jpg',
				'nombre_completo' => 'empresario.jpg',
				'nombre' => 'empresario',
				'extencion' => 'jpg',
				'estatus' => 'ACT'
		
		);
		$this->db->insert('cat_img',$datos);
		
		$datos = array(
				'id_user' => $id_usuario,
				'id_img' => $id_usuario
		
		);
		$this->db->insert('cross_img_user',$datos);
	}

	function eliminarUsuarios(){
		$id=1000;
		$this->db->query("delete from users where id >= ".$id);
		$this->db->query("delete from user_profiles where user_id not in (select id from users)");
		$this->db->query("delete from afiliar where id_afiliado not in (select id from users)");
		$this->db->query("delete from cross_perfil_usuario where id_user not in (select id from users)");
		$this->db->query("delete from estilo_usuario where id_usuario not in (select id from users)");
		$this->db->query("delete from coaplicante where id_user not in (select id from users)");
		$this->db->query("delete from cross_tel_user where id_user not in (select id from users)");
		$this->db->query("delete from cross_dir_user where id_user not in (select id from users)");
		$this->db->query("delete from billetera where id_user not in (select id from users)");
		$this->db->query("delete from cross_rango_user where id_user not in (select id from users)");
		$this->db->query("delete from cross_img_user where id_user not in (select id from users)");
		$this->db->query("delete from cat_img where id_img not in (select id_img from cross_img_user)");
	}

	function eliminarRemanentes(){
		$this->db->query('delete from comisionPuntosRemanentes where id >= 1');
	}
	
	function getAfiliados($id_afiliado,$red,$tipo,$nivel){
		
		$this->getCantidadDeAfiliadosDebajoDe($id_afiliado,$red,$tipo,$nivel);

		return $this->getTotalAfiliados();
	}
	
	function getAfiliadosIntervaloDeTiempo($id_afiliado,$red,$tipo,$tipoDeBusquedaEnLaRed,$nivel,$fechaInicio,$fechaFin){
	    
	    if($tipoDeBusquedaEnLaRed=="EQU"){
	        
	        if($tipo == "DIRECTOS"){
	            return $this->getAfiliadosEquitativoDirectos( $id_afiliado,$red,$fechaInicio,$fechaFin);
	        }else{
	            return $this->getAfiliadosEquitativoRed($id_afiliado,0,$red,$fechaInicio,$fechaFin);
	        }
	        
	    }else if($tipoDeBusquedaEnLaRed=="DEB") {
	        
	        return $this->getAfiliadosPataDebil ($id_afiliado,$red,$tipo,$nivel);
	        
	    }
	    
	    
	}
	
	private function getAfiliadosEquitativoDirectos($id_afiliado,$red,$fechaInicio,$fechaFin) {
	    
	    $query = "SELECT
						    COUNT(*) AS directos
						FROM
						    users u,
						    afiliar a
						WHERE
						    u.id = a.id_afiliado
						    AND a.directo = ".$id_afiliado."
						    AND a.id_red = ".$red."
						    AND u.created BETWEEN '".$fechaInicio."' AND '".$fechaFin." 23:59:59';";
	    
	    $q=$this->db->query($query);
	    
	    $datos= $q->result();
	    
	    $this->setTotalAfiliados($datos[0]->directos);
	    
	    return $this->getTotalAfiliados();
	}
	
	
	private function getAfiliadosPataDebil($id_afiliado,$red,$tipo,$nivel) {
	    $totalPata1=0;
	    $totalPata2=0;
	    $this->setTotalAfiliados(0);
	    
	    $idAfiliadopata1=$this->getAfiliadoDirectoPorPosicion($id_afiliado,$red,0);
	    
	    if($this->getDirectoAfiliado($idAfiliadopata1,$red)==$id_afiliado)
	        $totalPata1=1;
	        
	    $this->getCantidadDeAfiliadosDebajoDeHijo($idAfiliadopata1,$id_afiliado,$red,$tipo,$nivel);
	        
	    $totalPata1+=$this->getTotalAfiliados();
	        
	    $this->setTotalAfiliados(0);
	        
	    $idAfiliadopata2=$this->getAfiliadoDirectoPorPosicion($id_afiliado,$red,1);
	        
	    if($this->getDirectoAfiliado($idAfiliadopata2,$red)==$id_afiliado)
	       $totalPata2=1;
	            
	    $this->getCantidadDeAfiliadosDebajoDeHijo($idAfiliadopata2,$id_afiliado,$red,$tipo,$nivel);
	    $totalPata2+=$this->getTotalAfiliados();
	            
	            
	    if($totalPata1>=$totalPata2)
	       return $totalPata2;
	                
	    return $totalPata1;
	}
	
	function getCantidadDeAfiliadosDebajoDe($id_afiliado,$red,$tipo,$nivel){
	
		if($tipo=='DIRECTOS'){
			$q=$this->db->query("select count(*) as directos
							from afiliar A
							where A.directo = ".$id_afiliado." and A.id_red = ".$red);
			$datos= $q->result();
			$this->setTotalAfiliados($datos[0]->directos);
			return true;
		}
	
	
		$q=$this->db->query("select A.id_afiliado
							from afiliar A
							where A.debajo_de = ".$id_afiliado." and A.id_red = ".$red);
	
		$datos= $q->result();
	
		foreach ($datos as $dato){
	
			if ($dato!=NULL){
				$this->setTotalAfiliados($this->totalAfiliados+1);
				$this->getCantidadDeAfiliadosDebajoDe($dato->id_afiliado,$red,$tipo,$nivel);
			}
		}
	}

	function getCantidadDeAfiliadosDebajoDeHijo($id_afiliado,$id_padre,$red,$tipo,$nivel){
	
		$q=$this->db->query("select A.id_afiliado,A.directo
							from afiliar A
							where A.debajo_de = ".$id_afiliado." and A.id_red = ".$red);
	
		$datos= $q->result();
	
		foreach ($datos as $dato){
	
			if ($dato!=NULL){
				
				if($tipo=="DIRECTOS"){

					if(($dato->directo==$id_padre))
						$this->setTotalAfiliados($this->totalAfiliados+1);
				}
				else{
					$this->setTotalAfiliados($this->totalAfiliados+1);
				}
					$this->getCantidadDeAfiliadosDebajoDeHijo($dato->id_afiliado,$id_padre,$red,$tipo,$nivel);
			}
		}
	}


	function getAfiliadosDebajoDe($id_afiliado,$red,$tipo,$nivel,$limite){
		if($limite>0||$nivel==0){
			$limite--;
			
			$datos=$this->getAfiliadosDebajoDeBaseDeDatos ($id_afiliado, $red ,$tipo);

			foreach ($datos as $dato){
				if ($dato!=NULL){
					array_push($this->idAfiliadosRed,$dato->id_afiliado);
					$this->setIdAfiliadosRed($this->idAfiliadosRed);
					$this->getAfiliadosDebajoDe($dato->id_afiliado,$red,$tipo,$nivel,$limite);
				}
			}
		}
	}
	
	function getAfiliadosDebajoDeBaseDeDatos($id_afiliado, $red ,$tipo) {

		if($tipo=="RED"){
			
			$q=$this->db->query("select A.id_afiliado as id_afiliado
								from afiliar A
								where A.debajo_de = ".$id_afiliado." and A.id_red = ".$red);
		
			$datos= $q->result();
		}else if($tipo=="DIRECTOS"){
			$q=$this->db->query("select A.id_afiliado as id_afiliado
								from afiliar A
								where A.directo = ".$id_afiliado." and A.id_red = ".$red);
				
			$datos= $q->result();

		}else {
			$datos=null;
		}
		
		return $datos;
	}
	
	function getAfiliadosArribaDeBaseDeDatos($id_afiliado, $red ,$tipo) {
	
		if($tipo=="RED"){
				
			$q=$this->db->query("select A.debajo_de as id_afiliado
								from afiliar A
								where A.id_afiliado = ".$id_afiliado." and A.id_red = ".$red);
	
			$datos= $q->result();

		}else if($tipo=="DIRECTOS"){
			$q=$this->db->query("select A.directo as id_afiliado
								from afiliar A
								where A.id_afiliado = ".$id_afiliado." and A.id_red = ".$red);
	
			$datos= $q->result();
	
		}else {
			$datos=null;
		}
	
		return $datos;
	}

	function getComprasPersonales($id_afiliado,$id_red){
		$q=$this->db->query("SELECT sum(costo_total) as total FROM venta v,cross_venta_mercancia cvm,items i
							 where (v.id_venta=cvm.id_venta)
							 and  (i.id=cvm.id_mercancia)
							 and(v.id_user=".$id_afiliado.")
							 and (i.red=".$id_red.")");
		$datos= $q->result();
		
		if($datos[0]->total==null)
			return 0;
		else
			return $datos[0]->total;

	}
	
	function getComprasPersonalesIntervaloDeTiempo($id_afiliado,$id_red,$fechaInicio,$fechaFin,$id_tipo_mercancia,$id_mercancia,$datosVenta){

		$datos=array();

		if($datosVenta=="COSTO")
			$datos=$this->getValorTotalDelasComprasPersonalesIntervalosDeTiempo($id_afiliado,$id_red,$id_tipo_mercancia,$id_mercancia,$fechaInicio,$fechaFin);
		
		else if($datosVenta=="PUNTOS")
			$datos=$this->getPuntosTotalesPersonalesIntervalosDeTiempo ($id_afiliado,$id_red,$id_tipo_mercancia,$id_mercancia,$fechaInicio,$fechaFin );

		if($datos==null)
			return 0;

		return $datos;
	}
	
	function getPuntosTotalesPersonalesIntervalosDeTiempo($id_afiliado,$id_red,$id_tipo_mercancia,$id_mercancia,$fechaInicio,$fechaFin) {
	    
	    $cualquiera="0";$where ="";$valor=0;
	    
	    if($id_mercancia!==$cualquiera){
	        $where .= "AND i.id in ($id_mercancia) ";
	    }
	    
	    if($id_tipo_mercancia!==$cualquiera){
	        $where .= "AND i.id_tipo_mercancia in ($id_tipo_mercancia) ";
	    }
	    
	    $valor_cedi = $this->getValorVentaCedi($id_afiliado, $id_red, $fechaInicio, $fechaFin,"PUNTOS",$where);
	    
	    $valor+=$valor_cedi;
	    
	    $valor_cart = $this->getValorVentaCart($id_afiliado, $id_red, $fechaInicio, $fechaFin,"PUNTOS", $where);
	    
	    $valor+=$valor_cart;
	    
	    return $valor;
	    
	}
	
	function getValorTotalDelasComprasPersonalesIntervalosDeTiempo($id_afiliado,$id_red,$id_tipo_mercancia,$id_mercancia,$fechaInicio,$fechaFin) {
	    
	    $cualquiera="0";$where ="";$valor=0;
	    
	    if($id_mercancia!==$cualquiera){
	        $where .= "AND i.id in ($id_mercancia) ";
	    }
	    
	    if($id_tipo_mercancia!==$cualquiera){
	        $where .= "AND i.id_tipo_mercancia in ($id_tipo_mercancia) ";
	    }
	    
	    $valor_cedi = $this->getValorVentaCedi($id_afiliado, $id_red, $fechaInicio, $fechaFin,"COSTO",$where);
	    
	    $valor+=$valor_cedi;
	    
	    $valor_cart = $this->getValorVentaCart($id_afiliado, $id_red, $fechaInicio, $fechaFin,"COSTO", $where);
	    
	    $valor+=$valor_cart;
	    
	    return $valor;
	    
	}
	
	private function getValorVentaCart($id_afiliado, $id_red, $fechaInicio, $fechaFin,$tipo='PUNTOS', $where = '')
	{
	    $puntos = "(CASE WHEN SUM(i.puntos_comisionables * cvm.cantidad)
        				 THEN SUM(i.puntos_comisionables * cvm.cantidad)
        				 ELSE 0 END)";
	    
	    $costo = "(CASE WHEN SUM(cvm.costo_unidad * cvm.cantidad)
						THEN SUM(cvm.costo_unidad * cvm.cantidad)
						ELSE 0 END)";
	    
	    $set = ($tipo=="PUNTOS") ? $puntos : $costo;
	    
	    $cart = "(SELECT
        				   ".$set." cart
        				FROM
        				    venta v,
        				    cross_venta_mercancia cvm,
        				    items i
        				WHERE
        				    v.id_venta = cvm.id_venta
        					AND i.id = cvm.id_mercancia
        				    AND v.id_user in (".$id_afiliado.")
        				    AND i.red = ".$id_red."
        				    AND v.id_estatus = 'ACT'
        				    AND v.fecha BETWEEN '".$fechaInicio."' AND '".$fechaFin." 23:59:59' $where
        			)";
	    
	    
	    $query = "SELECT ".$cart." total";
	    $q=$this->db->query($query);
	    $q= $q->result();
	    
	    $valor_cart = isset($q)&&isset($q[0]->total) ? $q[0]->total : 0;
	    return $valor_cart;
	    
	}
	
	private function getValorVentaCedi($id_afiliado, $id_red, $fechaInicio, $fechaFin,$tipo='PUNTOS', $where = '')
	{
	    $puntos = "(CASE WHEN SUM(p.puntos) THEN SUM(p.puntos) ELSE 0 END)";
	    $costo = "(CASE WHEN SUM(p.valor/p.cantidad) THEN SUM(p.valor/p.cantidad) ELSE 0 END)";
	    
	    $set = ($tipo=="PUNTOS") ? $puntos : $costo;
	    
	    $cedi = "(SELECT
								".$set." cedi
							FROM
								pos_venta o,
								venta v,
							    pos_venta_item p,
							    items i
							WHERE
								i.id = p.item
								AND i.red = ".$id_red."
								AND p.id_venta = o.id_venta
								AND o.id_venta = v.id_venta
								AND v.id_user in (".$id_afiliado.")
								AND v.id_estatus = 'ACT'
								AND v.fecha BETWEEN '".$fechaInicio."' AND '".$fechaFin." 23:59:59' $where
						)";
	    
	    $query = "SELECT ".$cedi." total";
	    $q=$this->db->query($query);
	    $q= $q->result();
	    
	    $valor_cedi = isset($q)&&isset($q[0]->total) ? $q[0]->total : 0;
	    return $valor_cedi;
	}	

	function getPuntosTotalesPersonalesView($id_afiliado,$id_red,$fechaInicio,$fechaFin,$id_tipo_mercancia,$id_mercancia,$vista = "vb_bonos_totales") {
		
		$isView = $this->isViewBonos ($vista);#($id_afiliado!=1);
		
		if(!$isView){
			
			$cualquiera="0";$where ="";$valor=0;
			
			if($id_mercancia!==$cualquiera){
				$where .= "AND i.id in ($id_mercancia) ";
			}
			
			if($id_tipo_mercancia!==$cualquiera){
				$where .= "AND i.id_tipo_mercancia in ($id_tipo_mercancia) ";
			}
			
			$cedi = $this->getQueryCedi( $id_red, $fechaInicio, $fechaFin,"PUNTOS",$where);
			
			$cart = $this->getQueryCart( $id_red, $fechaInicio, $fechaFin,"PUNTOS", $where);
			
			$this->newViewBonos ( $cedi, $cart,$vista );
			
		}
		
		$valor = $this->getViewBonoId ( $id_afiliado,$vista );
		
		return $valor;
		
	}
	
	function getValorComprasPersonalesView($id_afiliado,$id_red,$fechaInicio,$fechaFin,$id_tipo_mercancia,$id_mercancia,$vista = "vb_bonos_totales") {
		
		$isView = $this->isViewBonos ($vista);#($id_afiliado!=1);
		
		if(!$isView){
			
			$cualquiera="0";$where ="";$valor=0;
			
			if($id_mercancia!==$cualquiera){
				$where .= "AND i.id in ($id_mercancia) ";
			}
			
			if($id_tipo_mercancia!==$cualquiera){
				$where .= "AND i.id_tipo_mercancia in ($id_tipo_mercancia) ";
			}
			
			$cedi = $this->getQueryCedi( $id_red, $fechaInicio, $fechaFin,"COSTO",$where);
			
			$cart = $this->getQueryCart( $id_red, $fechaInicio, $fechaFin,"COSTO",$where);
			
			$this->newViewBonos ( $cedi, $cart ,$vista);
			
		}
		
		$valor = $this->getViewBonoId ( $id_afiliado,$vista );
		
		return $valor;
		
	}
	
	private function getQueryCart( $id_red, $fechaInicio, $fechaFin, $tipo, $where) {
		$puntos = "(CASE WHEN SUM(i.puntos_comisionables * cvm.cantidad)
        				 THEN SUM(i.puntos_comisionables * cvm.cantidad)
        				 ELSE 0 END)";
		
		$costo = "(CASE WHEN SUM(cvm.costo_unidad * cvm.cantidad)
						THEN SUM(cvm.costo_unidad * cvm.cantidad)
						ELSE 0 END)";
		
		$set = ($tipo=="PUNTOS") ? $puntos : $costo;
		
		$cart = "(SELECT
        				   ".$set." cart
        				FROM
        				    venta v,
        				    cross_venta_mercancia cvm,
        				    items i
        				WHERE
        				    v.id_venta = cvm.id_venta
        					AND i.id = cvm.id_mercancia
        				    AND v.id_user in (u.id)
        				    AND i.red = ".$id_red."
        				    AND v.id_estatus = 'ACT'
        				    AND v.fecha BETWEEN '".$fechaInicio."' AND '".$fechaFin." 23:59:59' $where
        			)";
		return $cart;
	}
	
	private function getQueryCedi( $id_red, $fechaInicio, $fechaFin, $tipo, $where) {
		$puntos = "(CASE WHEN SUM(p.puntos) THEN SUM(p.puntos) ELSE 0 END)";
		$costo = "(CASE WHEN SUM(p.valor/p.cantidad) THEN SUM(p.valor/p.cantidad) ELSE 0 END)";
		
		$set = ($tipo=="PUNTOS") ? $puntos : $costo;
		
		$cedi = "(SELECT
								".$set." cedi
							FROM
								pos_venta o,
								venta v,
							    pos_venta_item p,
							    items i
							WHERE
								i.id = p.item
								AND i.red = ".$id_red."
								AND p.id_venta = o.id_venta
								AND o.id_venta = v.id_venta
								AND v.id_user in (u.id)
								AND v.id_estatus = 'ACT'
								AND v.fecha BETWEEN '".$fechaInicio."' AND '".$fechaFin." 23:59:59' $where
						)";
		return $cedi;
	}
	
	private function getViewBonoId($id_afiliado,$vista = "vb_bonos_totales") {
		$query = "SELECT * FROM $vista WHERE id = $id_afiliado";
		
		$q=$this->db->query($query);
		$q= $q->result();
		
		if(!$q)
			return 0;
			
		return $q[0]->total;
	}
	
	
	private function newViewBonos($cedi, $cart,$vista = "vb_bonos_totales") {
		
		$query = "CREATE TABLE IF NOT EXISTS $vista (
					    id INT NOT NULL,
					    total FLOAT DEFAULT 0
					)";
		
		$q=$this->db->query($query);
		
		$query = "TRUNCATE $vista";
		
		$q=$this->db->query($query);
		
		$query = "INSERT INTO $vista
					SELECT
					    u.id,
					    $cedi + $cart total
					FROM
					    users u,
						user_profiles p
					WHERE
						p.user_id = u.id
						AND p.id_tipo_usuario = 2
					GROUP BY
						u.id";
					    
		$q=$this->db->query($query);
	}
	
	function dropViewBonos() {
		
		$query = "SELECT * FROM information_schema.TABLES
					WHERE table_name like 'vb_%'";
		
		$q=$this->db->query($query);
		$q= $q->result();
		
		foreach ($q as $dato){
			
			$tabla = $dato->TABLE_NAME;
			
			$query = "DROP TABLE IF EXISTS $tabla";
		
			$q=$this->db->query($query);			
			
		}		
		
	}
	
	private function isViewBonos($vista = "vb_bonos_totales") {
		$query = "SELECT * FROM information_schema.TABLES
					WHERE table_name = '$vista'";
		
		$q=$this->db->query($query);
		$q= $q->result();
		return $q;
	}	
	
	private function separarMercanciasConsulta($mercancias){
		$mercancias =explode(", ", $mercancias);
		
		$i=0;
		$consulta="";
		
		foreach ($mercancias as $mercancia){
			if($mercancia==="0")
				return "0";
			else if($i==0)
				$consulta.="(i.id=".$mercancia.")";
			else 
				$consulta.="or (i.id=".$mercancia.")";
			$i++;
		}
		
		return $consulta;
	}
	
	function getVentasTodaLaRed($id_afiliado,$red,$tipo,$condicionRed,$nivel,$fechaInicio,$fechaFin,$id_tipo_mercancia,$id_mercancia,$datoVenta){

		if($condicionRed=="EQU"){
			$limite=$nivel;
			return $this->getVentasTodaLaRedEquilibrada( $id_afiliado, $red,$tipo,$nivel,$fechaInicio,$fechaFin,$limite,$id_tipo_mercancia,$id_mercancia,$datoVenta);

		}else if($condicionRed=="DEB") {
			return $this->getVentasTodaLaRedPataDebil($id_afiliado, $red,$tipo,$nivel,$fechaInicio,$fechaFin,$id_tipo_mercancia,$id_mercancia,$datoVenta)["total"];

		}
	}
	
	function getAfiliadosPorNivel($id_afiliado,$red,$nivel,$tipo,$limite,$verticalidad){

			$datos=$this->getAfiliadosPorVerticalidad ( $id_afiliado, $red ,$tipo,$verticalidad );

			foreach ($datos as $dato){

				if($nivel==$limite){
					array_push($this->idAfiliadosRed,$dato->id_afiliado);
				}
				else if ($dato!=NULL){
					$this->getAfiliadosPorNivel($dato->id_afiliado,$red,$nivel,$tipo,$limite+1,$verticalidad);
				}
			}
	}
	
	private function getAfiliadosPorVerticalidad($id_afiliado, $red ,$tipo,$verticalidad) {
		if($verticalidad=="DESC"){
			$datos=$this->getAfiliadosDebajoDeBaseDeDatos ($id_afiliado, $red ,$tipo);
		}else if($verticalidad=="ASC"){
			$datos=$this->getAfiliadosArribaDeBaseDeDatos ($id_afiliado, $red ,$tipo);
		}else {
			return array();
		}
		
		if($datos==NULL)
			return array();
		return $datos;
	}
	
	private function getVentasTodaLaRedPataDebil($id_afiliado, $red,$tipo,$nivel,$fechaInicio,$fechaFin,$id_tipo_mercancia,$id_mercancia,$datoVenta) {

		$patas = $this->getPatasAfiliadoPorRedEnIntervaloDeTiempo ( $id_afiliado,$red,$nivel,$fechaInicio,$fechaFin,$id_tipo_mercancia,$id_mercancia,$datoVenta );
		
		$esUnBonoBinario=$this->getTipoDeBono();

		if(($esUnBonoBinario=="SI")&&($this->getEstado()=="DAR")){
			$this->setRemanenteDePuntos($patas,$id_afiliado,$this->getIdBono());
		}
		
		$pataMasdebil = $this->getValorPataMasDebil ( $patas );
		return $pataMasdebil;
	}
	
	private function setRemanenteDePuntos($patas,$id_afiliado,$id_bono){
		$pataDebil=$this->getValorPataMasDebil($patas);
		$id_pata_debil=$pataDebil["id_pata"];
		$total_pata_debil=$pataDebil["total"];

		$patasRemanentes=array();

		foreach ($patas as $pata){
			if($pata["id_pata"]!=$id_pata_debil){
				$pata["total"]=($pata["total"]-$total_pata_debil);
				$pata["id_usuario"]=$id_afiliado;
				$pata["id_bono"]=$id_bono;
				$pata["id_bono_historial"]=$this->getIdBonoHistorial();
				$pata["fecha"]=date('Y-m-d');
				array_push($patasRemanentes, $pata);
			}
		}

		foreach ($patasRemanentes as $patas){
	
			$this->db->insert('comisionPuntosRemanentes',$patas);
		}

	}
	
	private function getValorPataMasDebil($patas) {
		$pataMasdebil=array(
					'id_pata' => $patas[0]["id_pata"],
					'total'   => $patas[0]["total"]
			);
		
		foreach ($patas as $pata){
			
			if($pataMasdebil["total"]>=$pata["total"]){
				$pataMasdebil=$pata;
			}
		}
		return $pataMasdebil;
	}
	
	private function getPatasAfiliadoPorRedEnIntervaloDeTiempo($id_afiliado,$red,$nivel,$fechaInicio,$fechaFin,$id_tipo_mercancia,$id_mercancia,$datoVenta) {
		$q=$this->db->query("SELECT frontal FROM tipo_red where id=".$red);
		$datos=$q->result();
		
		$frontalidad=$datos[0]->frontal;

		$patas=array();
		
		for ($i=1;$i<=$frontalidad;$i++){

			$this->setIdAfiliadosRed(array());
			$posicionEnRed=$i-1;

			$idAfiliadopata=$this->getAfiliadoDirectoPorPosicion($id_afiliado,$red,$posicionEnRed);
			$totalPata=$this->getVentasTodaLaRedPata($idAfiliadopata, $red ,"RED","DEB",$nivel,$fechaInicio,$fechaFin,$id_tipo_mercancia,$id_mercancia,$datoVenta);
			$totalPata+=$this->getComprasPersonalesIntervaloDeTiempo($idAfiliadopata, $red,$fechaInicio,$fechaFin,$id_tipo_mercancia,$id_mercancia,$datoVenta);

				$remanente=$this->getPatasPuntosRemanentesAfiliadoBonoPorPata($this->getIdBono(), $id_afiliado,$i);
				$pata = array(
						'id_pata' => $i,
						'total'   => $totalPata+$remanente
				);

			array_push($patas, $pata);
		}
		return $patas;
	}

	function getVentasTodaLaRedEquilibrada($id_afiliado, $red,$tipo,$nivel,$fechaInicio,$fechaFin,$limite,$id_tipo_mercancia,$id_mercancia,$datosVenta) {
		$total=0;
		
		$this->getAfiliadosDebajoDe($id_afiliado,$red,$tipo,$nivel,$limite);

		if(!$this->getIdAfiliadosRed())
			return $total;
		
		$id_afiliado = implode(",", $this->getIdAfiliadosRed());
		#foreach ($this->getIdAfiliadosRed() as $id_afiliado){
			$total+=$this->getComprasPersonalesIntervaloDeTiempo($id_afiliado, $red,$fechaInicio,$fechaFin,$id_tipo_mercancia,$id_mercancia,$datosVenta);
		#}
		return $total;
	}

	function getVentasTodaLaRedPata($id_afiliado,$red,$tipo,$condicionRed,$nivel,$fechaInicio,$fechaFin,$id_tipo_mercancia,$id_mercancia,$datoVenta){
	
		$limite=$nivel-1;
		return $this->getVentasTodaLaRedEquilibrada ( $id_afiliado, $red,$tipo,$nivel,$fechaInicio,$fechaFin,$limite,$id_tipo_mercancia,$id_mercancia,$datoVenta);
	
	}
	
	function getAfiliadoDirectoPorPosicion($id_afiliado,$red,$lado){
		$q=$this->db->query("select A.id_afiliado as id_afiliado
							from afiliar A
							where A.debajo_de = ".$id_afiliado." and A.lado='".$lado."' and A.id_red = ".$red);

		$datos= $q->result();
		if($datos==null)
			return 0;
		
		return intval($datos[0]->id_afiliado);
	}
	
	function getDirectoAfiliado($id_afiliado,$red){
		$q=$this->db->query("select A.directo as id_afiliado
							from afiliar A
							where A.id_afiliado = ".$id_afiliado." and A.id_red = ".$red);
	
		$datos= $q->result();
		if($datos==null)
			return 0;
	
		return intval($datos[0]->id_afiliado);
	}
	
	function getPatasPuntosRemanentesAfiliadoBono($id_bono,$id_afiliado){
		$q=$this->db->query("SELECT id_usuario,id_bono,total,id_pata FROM comisionPuntosRemanentes 
							 where (id_usuario='".$id_afiliado."') and id_bono=".$id_bono." order by id desc limit 0,1");
	
		return $q->result();
	}
	
	function getPatasPuntosRemanentesAfiliadoBonoPorPata($id_bono,$id_afiliado,$id_pata){
		$q=$this->db->query("SELECT id_usuario,id_bono,total,id_pata FROM comisionPuntosRemanentes
							 where (id_usuario='".$id_afiliado."') and id_bono=".$id_bono." and id_pata=".$id_pata." order by id desc limit 0,1");
		$datos=$q->result();
		if($datos==null)
			return 0;
		return $datos[0]->total;
	}
	
	public function getIdUsuario() {
		return $this->id_usuario;
	}
	public function setIdUsuario($id_usuario) {
		$this->id_usuario = $id_usuario;
		return $this;
	}
	public function getUsername() {
		return $this->username;
	}
	public function setUsername($username) {
		$this->username = $username;
		return $this;
	}
	public function getCreated() {
		return $this->created;
	}
	public function setCreated($created) {
		$this->created = $created;
		return $this;
	}
	public function getIdAfiliacion() {
		return $this->id_afiliacion;
	}
	public function setIdAfiliacion($id_afiliacion) {
		$this->id_afiliacion = $id_afiliacion;
		return $this;
	}
	public function getIdRed() {
		return $this->id_red;
	}
	public function setIdRed($id_red) {
		$this->id_red = $id_red;
		return $this;
	}
	public function getIdPadre() {
		return $this->id_padre;
	}
	public function setIdPadre($id_padre) {
		$this->id_padre = $id_padre;
		return $this;
	}
	public function getIdSponsor() {
		return $this->id_sponsor;
	}
	public function setIdSponsor($id_sponsor) {
		$this->id_sponsor = $id_sponsor;
		return $this;
	}
	public function getLadoRed() {
		return $this->lado_red;
	}
	public function setLadoRed($lado_red) {
		$this->lado_red = $lado_red;
		return $this;
	}
	public function getTotalAfiliados() {
		return $this->totalAfiliados;
	}
	public function setTotalAfiliados($totalAfiliados) {
		$this->totalAfiliados = $totalAfiliados;
		return $this;
	}
	public function getTotalCompras() {
		return $this->totalCompras;
	}
	public function setTotalCompras($totalCompras) {
		$this->totalCompras = $totalCompras;
		return $this;
	}
	public function getTotalVentas() {
		return $this->totalVentas;
	}
	public function setTotalVentas($totalVentas) {
		$this->totalVentas = $totalVentas;
		return $this;
	}
	public function getTotalPuntosComisionables() {
		return $this->totalPuntosComisionables;
	}
	public function setTotalPuntosComisionables($totalPuntosComisionables) {
		$this->totalPuntosComisionables = $totalPuntosComisionables;
		return $this;
	}
	public function getIdAfiliadosRed() {
		return $this->idAfiliadosRed;
	}
	public function setIdAfiliadosRed($idAfiliadosRed) {
		$this->idAfiliadosRed = $idAfiliadosRed;
		return $this;
	}
	public function getTipoDeBono() {
		return $this->tipoDeBono;
	}
	public function setTipoDeBono($tipoDeBono) {
		$this->tipoDeBono = $tipoDeBono;
		return $this;
	}
	public function getIdBono() {
		return $this->id_bono;
	}
	public function setIdBono($id_bono) {
		$this->id_bono = $id_bono;
		return $this;
	}

	public function getIdBonoHistorial() {
		return $this->id_bono_historial;
	}
	public function setIdBonoHistorial($id_bono_historial) {
		$this->id_bono_historial = $id_bono_historial;
	}
	public function getEstado() {
		return $this->estado;
	}
	public function setEstado($estado) {
		$this->estado = $estado;
		return $this;
	}
	
	
	

}
