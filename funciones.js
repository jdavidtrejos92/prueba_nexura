function start(){
	//console.log('Hola Mundo');
	var tiporol;
	$.ajax({

		    type: 'POST',
		    url: 'http://localhost:88/prueba_nexura/formulario/classListas.php',
		    dataType : 'json',
		    data: {
		    		modo:'consrol'
		    	  },
		    success: function(data){ 
            
		    	console.log(data);
				tiporol = data;
		    	
				  $("#rol1").html("");  
					  for(var i=0; i<data.length; i++){ 
						var tr = "<tr><label><td><input type='checkbox' id='roll"+data[i].id+"'> "+data[i].nombre+"</td></label></tr>";
						$("#rol1").append(tr)

					  }
					  
					

		    },
		    error: function(){
		    	var objeto= {Respuesta:"Error A"};
		    	console.log(objeto);
		    }
	});
	

	$.ajax({

		    type: 'POST',
		    url: 'http://localhost:88/prueba_nexura/formulario/classListas.php',
		    dataType : 'json',
		    data: {
		    		modo:'consul'
		    	  },
		    success: function(data){ 
            
		    	console.log(data);
				  $("#cuerpo").html("");  
					  for(var i=0; i<data.length; i++){ 
						var tr = "<tr> <td>"+data[i].nombre+"</td>"+"<td>"+data[i].email+"</td>"+"<td>"+data[i].sexo+"</td>"+"<td>"+data[i].area+"</td>"+"<td>"+data[i].boletin+"</td>"+"<td><input type='button'  class='btn2'  onclick='seleccionar("+data[i].id+")'></input></td>"+"<td><input type='button' class='btn1'  onclick='eliminar("+data[i].id+")'></input></td></a></td></tr>";
						$("#cuerpo").append(tr)

					  }
		    },
		    error: function(){
		    	var objeto= {Respuesta:"Error B"};
		    	console.log(objeto);
		    }
	});

	$.ajax({

		    type: 'POST',
		    url: 'http://localhost:88/prueba_nexura/formulario/classListas.php',
		    dataType : 'json',
		    data: {
		    		modo:'consultarar'
		    	  },
		    success: function(data4){
			
			$("#areasempleado").html("");
                        $.each(data4,
                        function(key, val) {
							$("#areasempleado").append('<option value="' + val.id + '">'+val.nombre+'</option>');})


		    },
		    error: function(){
		    	var objeto= {Respuesta:"Error C"};
		    	console.log(objeto);
		    }
	});	
	
	
}


	function limp() {
      	location.reload();
		document.getElementById("formulario").reset();
    }
	
	function cerrar() {
      	 window.close();
    }
	
    function crearemp(){	
		
				idmod=document.getElementById("idmod").value;
				nombre=document.getElementById("nombre").value;
				correo=document.getElementById("correo").value;
				
				sexo2="";
				if (document.getElementById('r1').checked) {
					  sexo2 = document.getElementById('r1').value;
					}else if(document.getElementById('r2').checked){
						sexo2 = document.getElementById('r2').value;
					}
				
				area=document.getElementById("areasempleado").value;
				observacion=document.getElementById("observacion").value;
				
				boletin="";
				if (document.getElementById('boletin').checked) {
					  boletin = document.getElementById('boletin').value;
				}else{
					boletin = 0;
				}
				
				
					if(nombre == ""){
						swal("Alerta!","El campo Nombre es obligatorio!","warning");
						return;
					}else{
						if(correo == ""){
							swal("Alerta!","El campo correo es obligatorio!","warning");
							return;
						}else{	
							if(sexo2 == ""){
									swal("Alerta!","El campo sexo es obligatorio!","warning");
									return;
							}else{
								if(area == ""){
										swal("Alerta!","El campo area es obligatorio!","warning");
										return;
								}else{
									if(observacion == ""){
											swal("Alerta!","El campo Descripción es obligatorio!","warning");
											return;
									}
								}
							}
						}
					}
		
			if(idmod == "" ){

				$.ajax({

							type: 'POST',
							url: 'http://localhost:88/prueba_nexura/formulario/crudEmpleados.php',
							
							dataType : 'json',
							data: {
									modo:'inser',
									nombre : nombre,
									correo : correo,
									sexo2 : sexo2,
									area : area,
									observacion : observacion,
									boletin : boletin
								  },
								  
							success: function(data){

									  $("input:checkbox:checked").each(   
											function() {
												console.log($(this)[0].id);
												
												$.ajax({

														type: 'POST',
														url: 'http://localhost:88/prueba_nexura/formulario/crudEmpleados.php',
														dataType : 'json',
														data: {
																modo:'insertarrol',
																id: $(this)[0].id
															  },
														success: function(data){ 
														
															
														},
														error: function(){
															var objeto= {Respuesta:"Error IV"};
															console.log(objeto);
														}
												});
												
											}
										);
									
									if(data.message == "Guardado"){
										swal("Buen Trabajo!", "Se Creo Empleado con exito!");
										
										location.reload();										
									}
							},
								error: function(){
									var objeto= {Respuesta:"Error al ejecutar"};
									console.log(objeto);
							}
							
				}); 
				
			}else{

				$.ajax({

							type: 'POST',
							url: 'http://localhost:88/prueba_nexura/formulario/crudEmpleados.php',
							
							dataType : 'json',
							data: {
									modo:'edit',
									idmod : idmod,
									nombre : nombre,
									correo : correo,
									sexo2 : sexo2,
									area : area,
									observacion : observacion,
									boletin : boletin
								  },
								  
							success: function(data){
							
									$.ajax({

												type: 'POST',
												url: 'http://localhost:88/prueba_nexura/formulario/crudEmpleados.php',
												dataType : 'json',
												data: {
														modo:'eliminarrol',
														idmod : idmod,
														id: $(this)[0].id
													  },
												success: function(data){
													
													
												},
												error: function(){
													var objeto= {Respuesta:"Error IV"};
													console.log(objeto);
												}
										});

													  $("input:checkbox:checked").each( 
																						  
															function() {
																console.log($(this)[0].id);
																												
																$.ajax({

																		type: 'POST',
																		url: 'http://localhost:88/prueba_nexura/formulario/crudEmpleados.php',
																		dataType : 'json',
																		data: {
																				modo:'editarrol',
																				idmod : idmod,
																				id: $(this)[0].id
																			  },
																		success: function(data){
																			
																			console.log($(this)[0].id);
																			
																		},
																		error: function(){
																			var objeto= {Respuesta:"Error IV"};
																			console.log(objeto);
																		}
																});
																
															}
														);

							

									
									if(data.message == "Guardado"){
										swal("Buen Trabajo!", "Se modifico empleado con exito!");
										document.getElementById("formulario").reset();
										start();
										
									}

							},
								error: function(){
									var objeto= {Respuesta:"Error al ejecutar"};
									console.log(objeto);
							}
							
				}); 	
			
			}
	}

	
	var rolc="";
	function seleccionar(id){

		document.getElementById("formulario").reset();	
		$.ajax({
						type: 'POST',
							url: 'http://localhost:88/prueba_nexura/formulario/crudEmpleados.php',
							
							dataType : 'json',
							data: {
									modo:'selec',
									id : id
								  },
								  
							success: function(data){
							
								rolc = '1';
								console.log(data);
								document.getElementById('idmod').value = data[0].id;
								document.getElementById('nombre').value = data[0].nombre;
								document.getElementById('correo').value = data[0].email;
								document.getElementById('observacion').value = data[0].descripcion;
								
								if(data[0].sexo == 'M'){
									var r1 = true;
									var r2 = false;
									
								}else{
									var r1 = false;
									var r2 = true;
								}
								
								document.getElementById('r1').checked = r1;
								document.getElementById('r2').checked = r2;
								
								document.getElementById('areasempleado').value = data[0].area_id;
								
								if(data[0].boletin == '1'){
									var boletin = true;
									
								}else{
									var boletin = false;
								}
								 
								document.getElementById('boletin').checked = boletin;
		
										$.ajax({
												type: 'POST',
													url: 'http://localhost:88/prueba_nexura/formulario/crudEmpleados.php',
													
													dataType : 'json',
													data: {
															modo:'selecrol',
															id : id
														  },
														  
														  
													success: function(data){ 

																console.log(data);
																for(var i=0; i<data.length; i++){ 
																	console.log(data[i].nombre);
																	console.log("roll"+data[i].id);
																	document.getElementById("roll"+data[i].id).checked = true;
																
																}
						
													
															if(data.message == "Guardado"){
																document.getElementById("formulario").reset();
															}
													},
														error: function(){
															var objeto= {Respuesta:"Error al ejecutar"};
															console.log(objeto);
													}
										});

								
									if(data.message == "Guardado"){
										document.getElementById("formulario").reset();
									}
							},
								error: function(){
									var objeto= {Respuesta:"Error al ejecutar"};
									console.log(objeto);
							}
		
		});
				
	}

	function eliminar(id){

		var opction =false;
		swal({
			  title: "Estas Seguro?",
			  text: "Desea Eliminar el Empleado seleccionado!",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {
						    
			  if (willDelete) {
				
							$.ajax({
								type: 'POST',
									url: 'http://localhost:88/prueba_nexura/formulario/crudEmpleados.php',
									
									dataType : 'json',
									data: {
											modo:'delete',
											id : id
										  },
										  
									success: function(data){
									
										if(data.message == "eliminado"){
												swal("Buen Trabajo!", "Se Elimino empleado con exito!");
												location.reload();
												document.getElementById("formulario").reset();
												
												
										}
									
									},
										error: function(){
											var objeto= {Respuesta:"Error al ejecutar"};
											console.log(objeto);
									}
				
					
							});
			    
				swal("Poof! tu empleado fue eliminado!", {
				  icon: "success",
				});
			  } else {
			    
				swal("Tu operacion de cancelo!");
			  }
			});
	
		
	}
	
	
