<?php

	namespace app\controllers;
	use app\models\mainModel;

	class productoController extends mainModel
    {
                          /*----------  Controlador registrar producto  ----------*/
		public function registrarProductoControlador(){

			# Almacenando datos#
		    $nombre=$this->limpiarCadena($_POST['usuario_nombre']);
		    $apellido=$this->limpiarCadena($_POST['usuario_apellido']);

		    $producto=$this->limpiarCadena($_POST['producto_usuario']);
		    $cantidad=$this->limpiarCadena($_POST['cantidad_producto']);
		    


		    # Verificando campos obligatorios #
		    if($nombre=="" || $apellido=="" || $producto=="" || $cantidad=="" ){
		    	$alerta=[
					"tipo"=>"simple",
					"titulo"=>"Ocurrió un error inesperado",
					"texto"=>"No has llenado todos los campos que son obligatorios",
					"icono"=>"error"
				];
				return json_encode($alerta);
		        exit();
		    }



		    $producto_datos_reg=[
				[
					"campo_nombre"=>"usuario_nombre",
					"campo_marcador"=>":Nombre",
					"campo_valor"=>$nombre
				],
				[
					"campo_nombre"=>"usuario_apellido",
					"campo_marcador"=>":Apellido",
					"campo_valor"=>$apellido
				],
				[
					"campo_nombre"=>"producto_usuario",
					"campo_marcador"=>":Producto",
					"campo_valor"=>$producto
				],
				[
					"campo_nombre"=>"cantidad_producto",
					"campo_marcador"=>":Cantidad",
					"campo_valor"=>$cantidad
				],
			];

			$registrar_producto=$this->guardarDatos("formulario",$producto_datos_reg);

			if($registrar_producto->rowCount()==1){
				$alerta=[
					"tipo"=>"limpiar",
					"titulo"=>"Producto Registrado",
					"texto"=>"El usuario ".$nombre." ".$apellido." ha registrado con exito".$producto." Con cantidad de:".$cantidad,
					"icono"=>"success"
				];
			}else{
				
				$alerta=[
					"tipo"=>"simple",
					"titulo"=>"Ocurrió un error inesperado",
					"texto"=>"No se pudo registrar el producto, por favor intente nuevamente",
					"icono"=>"error"
				];
			}

			return json_encode($alerta);
        }


}
		

		

    