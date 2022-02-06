<?php 
    include("conexion.php");


	if($_POST['modo'] == 'selecrol'){	
		$sql = "SELECT r.id,r.nombre FROM empleado_rol as er
					INNER JOIN roles as r
					ON r.id = er.rol_id
				WHERE er.empleado_id= ".$_POST['id']."";      				
			$result = $mysqli -> query($sql);			
			while($row = $result -> fetch_array(MYSQLI_ASSOC))
                   {
                       $data[] = array(
						   'id'   => $row['id'],
                           'nombre'   => utf8_encode($row['nombre']),
                        );                        
                   }
			echo json_encode($data);	
	}	
	
		if($_POST['modo'] == 'eliminarrol'){	
			$sql1 = "DELETE FROM empleado_rol WHERE empleado_id = ".$_POST['idmod'].""; 
			$result1 = $mysqli -> query($sql1);
					 if($result1 = true){						
						echo json_encode(array('message'=> 'Eliminado'));										
					}else{
						echo json_encode(array('message'=> 'Error al eliminar los roles'));
					}	
	}

    if($_POST['modo'] == 'inser'){

            $nombre = trim($_POST['nombre']);
			$correo = trim($_POST['correo']);
			$sexo2 = trim($_POST['sexo2']);
            $area = trim($_POST['area']);            
            $observacion = trim($_POST['observacion']);
            $boletin = trim($_POST['boletin']);
            
			if ($boletin == ""){
				$boletin = 0;
			}
			
			
			//inserta tabla empleado
            $sql = "INSERT INTO empleado (nombre,email,sexo, area_id, boletin, descripcion) 
            VALUES ('".$nombre."','".$correo."','".$sexo2."',".$area.",".$boletin.",'".$observacion."')";
        	
			$result = $mysqli -> query($sql);				
			
			
            if($result = true){
				
                echo json_encode(array('message'=> 'Guardado'));
				
								
            }else{
				echo json_encode(array('message'=> 'Error al guardar'));
			} 

			
    }
	
	if($_POST['modo'] == 'edit'){

            $idmod = trim($_POST['idmod']);
            $nombre = trim($_POST['nombre']);
			$correo = trim($_POST['correo']);
			$sexo2 = trim($_POST['sexo2']);
            $area = trim($_POST['area']);            
            $observacion = trim($_POST['observacion']);
            $boletin = trim($_POST['boletin']);
            
			if ($boletin == ""){
				$boletin = 0;
			}
            $sql = "UPDATE empleado SET nombre = '".$nombre."' ,email= '".$correo."',sexo= '".$sexo2."', area_id=".$area.", boletin=".$boletin.", descripcion='".$observacion."' 
					WHERE id= ".$idmod." ";    
        	
			$result = $mysqli -> query($sql);						
            if($result = true){		
                echo json_encode(array('message'=> 'Guardado'));					
            }else{
				echo json_encode(array('message'=> 'Error al guardar'));
			} 

			
    }

	
	if($_POST['modo'] == 'editarrol'){	
			$cod = substr($_POST['id'],4);
				
				 if (($cod != 'tin')||($cod != "")){					
					$sql2 = "INSERT INTO empleado_rol (empleado_id,rol_id) VALUES (".$_POST['idmod'].",".$cod.");";

					$result2 = $mysqli -> query($sql2);					
					$cod = "";
					$sql2 = "";					
					 if($result2 = true){					
						echo json_encode(array('message'=> 'Guardado'));										
					}else{
						echo json_encode(array('message'=> 'Error al guardar los roles'));
					}
				}	

	}
	if($_POST['modo'] == 'insertarrol'){	
			$sql2 = "SELECT MAX(id) as cons FROM empleado";
			$result2 = $mysqli -> query($sql2);				
			while($row = $result2 -> fetch_array(MYSQLI_ASSOC))
                   {
                       $data2[] = array(
						   'cons'   => $row['cons'],						   
                        );                        
                   }
			$cod = substr($_POST['id'],4);			
		if (($cod != 'tin')||($cod != "")){			
			$sql2 = "INSERT INTO empleado_rol (empleado_id,rol_id) VALUES (".$data2[0]['cons'].",".$cod.");";			
        	$result2 = $mysqli -> query($sql2);			
			$cod = "";
			$sql2 = "";			
			 if($result2 = true){				
                echo json_encode(array('message'=> 'Guardado'));								
            }else{
				echo json_encode(array('message'=> 'Error al guardar los roles'));
			}
		}	
	}
	
	

	if($_POST['modo'] == 'selec'){	
		$sql = "SELECT * FROM empleado WHERE id= ".$_POST['id']."";        	
			$result = $mysqli -> query($sql);			
			while($row = $result -> fetch_array(MYSQLI_ASSOC))
                   {
                       $data[] = array(
						   'id'   => $row['id'],
                           'nombre'   => utf8_encode($row['nombre']),
                           'email'   => utf8_encode($row['email']),
                           'sexo'   => $row['sexo'],
                           'area_id'   => $row['area_id'],
                           'boletin'   => $row['boletin'],
                           'descripcion'   => utf8_encode($row['descripcion']),
                        );                     
                   }
			echo json_encode($data);
	}
	if($_POST['modo'] == 'delete'){	
		$sql = "SELECT * FROM empleado WHERE id= ".$_POST['id']."";        	
			$result = $mysqli -> query($sql);			
		if($result = true){
            $sql2 = "DELETE FROM empleado WHERE id= ".$_POST['id']."";         	
			$result2 = $mysqli -> query($sql2);					
            echo json_encode(array('message'=> 'eliminado'));							
		}else{
			echo json_encode(array('message'=> 'Error eliminar empleado'));
		} 

	}

	
	

?>