<?php
require __DIR__ .'/../../vendor/autoload.php';
require __DIR__ .'/../../constantes.php';

class MercadoPago {

    function __construct() {
        MercadoPago\SDK::setIntegratorId('dev_24c65fb163bf11ea96500242ac130004');
        MercadoPago\SDK::setPublicKey(__publickey__);
        MercadoPago\SDK::setAccessToken(__token__);
    }

    /**
     * Configura la preferencia según tu producto o servicio:
     * Crea un objeto de preferencia.
     * @param type $external_reference
     * @return \MercadoPago\Preference
     */
    static function crearPreferencia($external_reference) {
        $preferencia = new MercadoPago\Preference();
        $preferencia->payment_methods = array(
            "excluded_payment_types" => array(
                array("id" => "atm")
            ),
            "excluded_payment_methods" => array(
                array("id" => "amex")
            ),
            "installments" => 6
        );
        $preferencia->back_urls = array(
            "success" => __PathUrl__.'estados/success.php',
            "failure" => __PathUrl__.'estados/failure.php',
            "pending" => __PathUrl__.'estados/pending.php'
        );
        $preferencia->auto_return = "approved";
        $preferencia->notification_url = __PathUrl__.'notificacion.php/1ogudgk1';
        $preferencia->external_reference = $external_reference;
        return $preferencia;
    }
    
    /**
     * Cargamos los datos del pagador
     * @param type $nombre
     * @param type $email
     * @param array $telefono [0 => area_codigo, 1 => numero]
     * @param array $domicilio [0 => nombre calles, 1 => numero de la casa, 3 => codigo postal]
     */
    static function crearPagador($nombre, $apellido, $email, array $telefono, array $domicilio) {
        $pagador = new MercadoPago\Payer();
        $pagador->name = $nombre;
        $pagador->surname = $apellido;
        $pagador->email = $email;
        $pagador->phone = array(
            'area_code' => $telefono[0],
            'number' => $telefono[1]
        );
        $pagador->address = array(
            'street_name' => $domicilio[0],
            'street_number' => $domicilio[1],
            'zip_code' => $domicilio[3]
        );
        return $pagador;
    }
  
    /**
     * Configura la preferencia según tu producto o servicio:
     * Crea un objeto item con los siguientes parametros:
     * @param int $id
     * @param type $titulo
     * @param int $cantidad
     * @param float $precioUnitario
     * @param type $descripcion
     * @param type $referencia
     * @param type $imagen
     * @return \MercadoPago\Item
     */
    static function crearItemPreferencia(int $id, $titulo, int $cantidad, float $precioUnitario, 
        $descripcion = '', $imagen = ''
    ) {
        $item = new MercadoPago\Item();
        $item->id = $id;
        $item->title = $titulo;
        $item->description = $descripcion;
        $item->picture_url = __PathUrl__. $imagen;
        $item->quantity = $cantidad;
        $item->unit_price = $precioUnitario;
        return $item;
    }

    /**
     * Configura la preferencia según tu producto o servicio:
     * Cargamos el item antes creado y se lo agregamos
     * a la preferencia.
     * @param type $preferencia
     * @param type $item
     */
    static function guardarPreferencia($preferencia, $item) {
        $preferencia->items = array($item);
        $preferencia->save();
    }

    /**
     * Suma el checkout a tu sitio
     * Por último, suma el siguiente código para mostrar el botón de pago de tu Checkout 
     * Mercado Pago en el lugar que quieras que aparezca.
     * @param \MercadoPago\Preference $preferencia
     */
    static function formulario(\MercadoPago\Preference $preferencia) {
        echo '<!doctype html> '
        . '<html lang="es"> '
        . '<head> '
        . '<title>Pagar</title> '
        . '</head> '
        . '<body> '
        . '<a href="'.$preferencia->init_point.'">Pagar la compra</a> '
        . '</body> '
        . '</html>';
    }

}
