<?php
/**
 * clase que gestiona el desgloce de la url y controla el flujo por 
 * i)omisión ii)elementos url-encontrados.
 * atiende a los tipos de petición: 
 * i) nula/vacia, invoca al controlador Libros, método index y parametros[] y renderiza vista principal
 * ii) atiende a los elementos controlador,método-parametros[] encontrados en la url. 
 * separarURL() retorna arreglo asociativo de los componentes de la URL del cliente.
 */
class Control
{
	/*define controlador por omisión*/
  protected $controlador = "Libros";//define controlador principal
  protected $metodo = "index";//define método del controlador principal
  protected $parametros=[];//argumentos para el método
  
  function __construct()
  {
    $url=$this->separarURL();// retorna arreglo de los componentes de la URL
	
	/*instancia componente controaldor encontrado en la URL-petición*/
    if ($url!="" && file_exists("../app/controladores/".ucwords($url[0]).".php"))
	{
      $this->controlador=ucwords($url[0]);
      unset($url[0]);
    }
	/*carga en memoria controlador: i)encontrado el la url, ii)por omisión*/
    require_once("../app/controladores/".ucwords($this->controlador).".php");
    $this->controlador = new $this->controlador;

    /*recupera componente método encontrado en la url*/
    if (isset($url[1]))
	{
      if (method_exists($this->controlador, $url[1])) 
	  {
        $this->metodo=$url[1];
        unset($url[1]);
      }
    }
	/*retorna arreglo con elementos:controlador-método-argumento por:
	i)omisión ii) encontrados en la url*/
      $this->parametros=$url ? array_values($url) : [];
	  //var_dump($this->parametros);	//imprime elementos de la url encontrados
	  call_user_func_array(
		[$this->controlador, $this->metodo], 
		$this->parametros
    );
  }
	/*retorna arreglo de los componentes de la URL del cliente*/
  private function separarURL()
  {
    $url="";
    if (isset($_GET["url"]))
	{
      $url = rtrim($_GET["url"],"/");
      $url = filter_var($url,FILTER_SANITIZE_URL);
      $url = explode("/",$url);
    }
    return $url;
  }
}
?>