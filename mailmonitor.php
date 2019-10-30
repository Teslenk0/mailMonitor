#!/usr/bin/php
<?php
    require("getMail.php"); 
    /* PARA UTILIZAR SIMPLE XML HAY QUE DESCARGAR EL MODULO XML
    */
    while (true) {
        //CARGO EL ARCHIVO EN LA VARIABLE
        $data = simplexml_load_file("datos.xml") or die("Error al cargar configuracion");

        //SACO EL HOST Y EL PUERTO
	$wait = $data->wait;
	$host = $data->host;
        $port = $data->port;
        foreach($data->children() as $usuario) {
		if($usuario->email != ""){
            		mailChecker($usuario->email,$usuario->password,$data->host,$port); 
		}	        
	}
        exec("sleep {$wait}");
    }    
?>