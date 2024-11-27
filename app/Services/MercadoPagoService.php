<?php
namespace App\Services;
  // SDK de Mercado Pago
  use MercadoPago\Client\Common\RequestOptions;
  use MercadoPago\Client\Payment\PaymentClient;
  use MercadoPago\Exceptions\MPApiException;
  use MercadoPago\MercadoPagoConfig;
  use MercadoPago\client\Preference\PreferenceClient;
  
    class MercadoPagoService{
      public function createPreference($orderItems)
      {
        MercadoPagoConfig::setAccessToken("APP_USR-7464124130027784-111803-6f958c634df63581a2504911c7b85daa-2102350157");

        MercadoPagoConfig::SetRuntimeEnviroment(MercadoPagoConfig::LOCAL);
          
        $request_options = new RequestOptions();
        $request_options->setCustomHeaders(["X-Idempotency-Key: ".uniqid()]);

        $items = [];
        foreach ($orderItems as $item) {
            if ($item !== null && $item->product !== null) {
                error_log("Product Name: " . $item->product->name);

                $items[] = [
                    "id" => $item->product->id,
                    "title" => $item->product->name,
                    "quantity" => $item->quantity,
                    "currency_id" => "ARS",
                    "unit_price" => (float) $item->product->price, // Forzar a float
                ];
            }
        }
        
        $total = 0;
        $shipping = 0;
        foreach ($items as $item) {
            $total += $item['unit_price'] * $item['quantity'];
        }
        if ($total < 60000) {
            $shipping = 10000;
        }

        $client = new PreferenceClient();
        try{
            $preference = $client->create([
                "items" => $items,
                "statement_descriptor" => "Tienda-test",
                "external_reference" => $orderItems[0]->order_id,
                "back_urls" => [
                    "success" => "http://127.0.0.1:8000/checkout/completed",
                    "failure" => "http://127.0.0.1:8000/checkout/failed"
                ],
                "auto_return" => "approved",
                "binary_mode" => true,
                "shipments" => [
                    "mode" => "not_specified",
                    "cost" => $shipping,
                ],
            ]);
        return $preference;
        } catch (MPApiException $e) {
            print_r($e->getApiResponse()->getContent());
        } 
        }
    }
?>