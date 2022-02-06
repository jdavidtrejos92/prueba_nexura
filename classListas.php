<?php

	include("conexion.php");

	class Listas{

		        public function listaRoles($mysqli){

						$sql = "SELECT * FROM roles ";        	
							$result = $mysqli -> query($sql);			
							while($row = $result -> fetch_array(MYSQLI_ASSOC))
				                   {
				                       $data[] = array(
										   'id'   => $row['id'],
				                           'nombre'   => utf8_encode($row['nombre']),						   
				                        );   
				                   }
							echo json_encode($data);
							//echo print_r($data,true);							
		        }
				
				public function listaEmpleados($mysqli){

						$sql = "SELECT
								em.id,
								em.nombre,
								em.email,
								case when em.sexo = 'M' then 'Masculino' else 'Femenino' end as sexo,
								em.area_id,
								case when em.boletin = '1' then 'Si' else 'No' end as boletin,
								em.descripcion,
								a.nombre as Area
								FROM empleado as em
								INNER JOIN areas as a
													ON a.id = em.area_id;";        	
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
									   'area'   => utf8_encode($row['Area']),						   
									);                        
							   }
							    echo json_encode($data);
				}
				
				public function listaAreas($mysqli){
						
							$sql = "SELECT * FROM areas ";        	
								$result = $mysqli -> query($sql);			
								while($row = $result -> fetch_array(MYSQLI_ASSOC))
									   {
										   $data4[] = array(
											   'id'   => $row['id'],
											   'nombre'   => utf8_encode($row['nombre']),						   
											);                        
									   }
								echo json_encode($data4);
						
				}
				
				
				
				
	};
	
	$obj = new Listas;

	if($_POST['modo'] == 'consrol')
	{
			$obj->listaRoles($mysqli);
	}
	
	if($_POST['modo'] == 'consul')
	{
			$obj->listaEmpleados($mysqli);
	}
	
	if($_POST['modo'] == 'consultarar')
	{
			$obj->listaAreas($mysqli);
	}
		
?>