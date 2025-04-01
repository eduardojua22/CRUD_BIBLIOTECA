<?php
/**
 * Clase tipo fabrica de métodos
 */
class Controlador
{
	/*carga en memoria y retorna objeto tipo modeloFile.php.  */	
  public function modelo($modeloFile)
  {
    require_once("../app/modelos/".$modeloFile.".php");
	//print("modeloFile: ".$modeloFile."</br>");
	//var_dump(new $modeloFile());
	return new $modeloFile();
  }
   /*carga en memoria la vista*/
  public function vista($vista,$data=[])
  {
    if(file_exists("../app/vistas/".$vista.".php"))
	{
      require_once("../app/vistas/".$vista.".php");
    }
	else 
	{
      die("La vista no existe");
    }
  }
}
?>