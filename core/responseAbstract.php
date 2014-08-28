<?php
	abstract class Response{
		public static $responseCodes, $format_response;
		protected  static $response;

		public static function getResponse($codeError = NULL){//metodo getResponse el cual requiere minimo de 2 argumentos
			if($codeError != NULL){
				$numberOfArguments = func_num_args();//Se obtinene el numero de argumentos que se pasan al metodo

				if($numberOfArguments == 1 || $numberOfArguments == 2){//Verificar numero de argumentos se encuentre en el rango
					if (array_key_exists("$codeError", static::$responseCodes) ) {//Comprobar que el codigo de error existe

						if (self :: $format_response == 'json' || self :: $format_response == 'xml') {//Verificar que el valor contenido en el segundo argumento sea el establecido
							self :: $response['status'] = static :: $responseCodes[$codeError];//se genera la localidad status de response
							if ($numberOfArguments == 2) {//Si son tres argumentos recibidos y el tipo de dato es string, se crea el formato de respuesta
								if (is_string(func_get_arg(1))) {//se comprueba que el tercer argumento sea un string
								
									//Se define el formato de respuesta
									self :: $response['body'] = func_get_arg(1);//{"status": {"codeResponse": 100, "Message": "fdfdvvd"},"body": "Data"}
								}else{
									self :: $response['status'] = static :: $responseCodes [500];
									self :: $response['body'] = "El segundo parametro (" . func_get_arg(1) . ") del metodo getResponse no es un string.";
									return json_encode(static :: $response);//retorna  tipo de dato del tercer argumento incorrecto
								}
							}

							if (self :: $format_response == 'json') {//comprobar valor del segundo argumento es json

								echo json_encode(self :: $response);//retorna response en formato json	
								exit;					
							}else{//el valor del segundo argumento es xml							
								return self :: $response;					
							}
						}
						/*Si se requiere enviar un mesaje de error en caso de que el formato de respuesta no sea correcto
						else{
							self :: $response['status'] = static :: $responseCodes [500];
							self :: $response['body'] = "El valor del segundo parametro en la llamada al metodo getResponse es incorrecto.";
							return json_encode(static :: $response);		
						}*/	
					}else{		
						$stringErrors = '';
						foreach(static::$responseCodes as $error){
								$stringErrors .= $error['code'] . ":" . $error['message'] . ", ";
						}

						$stringErrors = substr($stringErrors, 0, -2);	

						self :: $response['status'] = static :: $responseCodes [500];
						self :: $response['body'] = "El codigo de error '" . $codeError . "' no existe. La lista disponible de errores es: " . $stringErrors;
						return json_encode(static :: $response);
					}			
				}else{
					self :: $response['status'] = static :: $responseCodes [500];
					self :: $response['body'] = "El metodo getResponse fue invocado con " . $numberOfArguments . " parametros, el numero maximo de parametros son 2, consulte la documentacion.";
					return json_encode(static :: $response);
				}			
			}else{
				self :: $response['status'] = static :: $responseCodes [500];
				self :: $response['body'] = "El metodo getResponse fue invocado sin parametros.";
				return json_encode(static :: $response);
			}

		}
	}
?>