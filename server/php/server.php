<?php

// SDK do Mercado Pago
require __DIR__ .  '/vendor/autoload.php';
// Adicione as credenciais
MercadoPago\SDK::setAccessToken('PROD_ACCESS_TOKEN');

$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

switch($path){
    case '':
    case '/':
        require __DIR__ . '/../../client/index.html';
        break;
    case '/create_preference':
        $json = file_get_contents("php://input");
        $data = json_decode($json);

        // Cria um objeto de preferência
        $preference = new MercadoPago\Preference();

        // Cria um item na preferência
        $item = new MercadoPago\Item();
        $item->title = 'Meu produto';
        $item->quantity = 1;
        $item->unit_price = 75.56;
        $preference->items = array($item);
        $preference->save();
        $preference->items = array($item);

        $preference->back_urls = array(
            "success" => "http://localhost:8080/feedback",
            "failure" => "http://localhost:8080/feedback", 
            "pending" => "http://localhost:8080/feedback"
        );
        $preference->auto_return = "approved"; 

        $preference->save();

        $response = array(
            'id' => $preference->id,
        ); 
        echo json_encode($response);
        break;        
    case '/feedback':
        $respuesta = array(
            'Payment' => $_GET['payment_id'],
            'Status' => $_GET['status'],
            'MerchantOrder' => $_GET['merchant_order_id']        
        ); 
        echo json_encode($respuesta);
        break;
    //Server static resources
    default:
        $file = __DIR__ . '/../../client' . $path;
        $extension = end(explode('.', $path));
        $content = 'text/html';
        switch($extension){
            case 'js': $content = 'application/javascript'; break;
            case 'css': $content = 'text/css'; break;
            case 'png': $content = 'image/png'; break;
        }
        header('Content-Type: '.$content);
        readfile($file);          
}
