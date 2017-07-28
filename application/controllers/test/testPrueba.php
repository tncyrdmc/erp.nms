<?php
class testPrueba extends CI_Controller {
	
	// ASSERT
	//$this->unit->run('Valor','Esperado','Nombre del Tets');
	/*
	$this->unit->run($valor,'is_bool','Prueba 2');
	$this->unit->run($valor,'is_true','Prueba 3');
	$this->unit->run($valor,'is_false','Prueba 4');
	$this->unit->run($valor,'is_int','Prueba 5');
	$this->unit->run($valor,'is_numeric','Prueba 6');
	$this->unit->run($valor,'is_float','Prueba 7');
	$this->unit->run($valor,'is_double','Prueba 8');
	$this->unit->run($valor,'is_array','Prueba 9');
	$this->unit->run($valor,'is_null','Prueba 10');
	 */
	
	public function __construct() {
		parent::__construct();
		$this->load->library('unit_test');
		$this->load->model('palindromo');

	}
	
	public function index(){
		
		$this->testConvertirTextoEnArray();
		$this->testInvertirFrase();
		$this->testNoEsPalindromo();
		$this->testEsPalindromo();
	}
	
	public function testConvertirTextoEnArray(){

		$array=$this->palindromo->setFrase("iglesia");
		echo $this->unit->run(array('i','g','l','e','s','i','a'), $array, 'Test Invertir Texto Iglesia');
	}
	
	public function testInvertirFrase(){
		
		$esperado=$this->palindromo->invertirFrase("iglesia");
		echo $this->unit->run('aiselgi', $esperado, 'Test Invertir Texto Iglesia');

		$esperado=$this->palindromo->invertirFrase("pepe");
		echo $this->unit->run('epep', $esperado, 'Test Invertir Texto Pepe');
		
		$esperado=$this->palindromo->invertirFrase("prueba con texto grande");
		echo $this->unit->run('ednarg otxet noc abeurp', $esperado, 'Test Invertir Texto Grande espacios');

	}
	
	public function testNoEsPalindromo(){
	
		$esperado=$this->palindromo->esPalindromo("iglesia");
		echo $this->unit->run(false, $esperado, 'Test No es palindromo');
		
		$esperado=$this->palindromo->esPalindromo("marcel");
		echo $this->unit->run(false, $esperado, 'Test No es palindromo');
	
	}
	
	public function testEsPalindromo(){
	
		$esperado=$this->palindromo->esPalindromo("ana");
		echo $this->unit->run(true, $esperado, 'Test Es palindromo');
		
		$esperado=$this->palindromo->esPalindromo("aman a panama");
		echo $this->unit->run(true, $esperado, 'Test Es palindromo Espacions Diferentes');
		
		$esperado=$this->palindromo->esPalindromo("La ruta nos aporto otro paso natural");
		echo $this->unit->run(true, $esperado, 'Test Es palindromo Espacions Diferentes');
	
	}
}
