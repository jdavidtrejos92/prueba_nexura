<?php

    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET,PUT,POST,DELETE,OPTIONS');
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
	define("HOSTNAME", "atisoft.com.co");
	define("DATABASE", "atisoftc_ecoquimica");      
	define("USERNAME", "atisoftc_root");    
	define("PASSWORD", "mt8*fCYkgTSD");      

	$mysqli = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);

	// Hace la conexión a la base de datos
	if ($mysqli -> connect_error) {
    	die('Error de Conexión ('.$mysqli -> connect_error.')'.$mysqli -> connect_error);
	}
	else
    {
		Echo "Acceso Consedido";

	}


	//echo "<pre>".print_r($_REQUEST,true)."<pre>";exit;

    //echo($_SERVER['REQUEST_METHOD']);

		//if($_SERVER['REQUEST_METHOD'] == 'GET')   {

        	//$data=null;
            //$data=json_decode(file_get_contents("php://input"),true);
            $nombre=null;
            $direccion=null;
            $telefono=null;
            $correo=null;
            $observacion=null;

            /*$nombre=$_REQUEST['nombre'];
            $direccion=$_REQUEST['direccion'];
            $telefono=$_REQUEST['telefono'];
            $correo=$_REQUEST['correo'];
            $observacion=$_REQUEST['observacion'];*/
			
			$nombre="hola";
            $direccion="hola";
            $telefono="123";
            $correo="hola@gmail";
            $observacion="hola";


	            	$sql = "INSERT INTO cotizacion (nombre,direccion, telefono, correo, observacion) 
	            				VALUES ('".$nombre."','".$direccion."','".$telefono."','".$correo."','".$observacion."')";
	        	    $result = $mysqli -> query($sql);
	        	    //echo($sql);
	             
		   	        if($result == TRUE)
		            {		
		            	echo "Guardo";
		            		//$sql_consulta = "select * from gestion where codpropiedad ='".$codpropiedad."' limit 1";
	        	            //$result2 = $mysqli -> query($sql_consulta);

	        	            //echo($sql_consulta);
	        	            /*
		       	            while($row = $result2 -> fetch_array(MYSQLI_ASSOC))
		                    {
		                        $data6[] = array(

		                            'id_casa'   	 => $row['id_casa'],
		                            'codpropiedad'   => $row['codpropiedad'],
		                            'ciudad'   		 => $row['ciudad'],
		                            'pais'   		 => $row['pais'],
		                            'direccion'  	 => $row['direccion'],
		                            'telefono'  	 => $row['telefono'],
		                            'gestion'   	 => $row['gestion']

	                        	);
	                        	echo json_encode($data6);
		                    }
		                   
		                
		                      //echo($data);

		                    
		                    $data6[] = array(
	                            				'mensaje'   => 'Guardado Exitoso'
	                            			);
		                    echo json_encode($data6); */
		         			
			        }
		            else
		            {
		                 
						echo "No gurado";
						 /* $data6[] = array(
	                            				'mensaje'   => 'Error de guardado'
	                            			);
		                    echo json_encode($data6);*/
		            }

	     // }


?>