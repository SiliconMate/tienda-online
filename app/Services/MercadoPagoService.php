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
                $items[] = [
                    "id" => $item->product->id,
                    "title" => $item->product->title,
                    "quantity" => $item->quantity,
                    "unit_price" => (float) $item->product->price // Forzar a float
                ];
            }
        }
        $client = new PreferenceClient();
        try{
            $preference = $client->create([
                "items" => $items,
                "statement_descriptor" => "Tienda-test",
                "external_reference" => "Test",
            ]);
            // $preference = $client->create([
            //     "items" => [
            //         [
            //             "id" => "1234",
            //             "title" => "Test",
            //             "quantity" => 1,
            //             "unit_price" => 10.0
            //         ]
            //     ],
            //     "statement_descriptor" => "Tienda-test",
            //     "external_reference" => "Test",
            // ]); 
        return $preference;
        } catch (MPApiException $e) {
            print_r($e->getApiResponse()->getContent());
        } 
        }
    }
?>