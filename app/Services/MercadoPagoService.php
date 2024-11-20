<?php
namespace App\Services;
  // SDK de Mercado Pago
  use MercadoPago\MercadoPagoConfig;
  use MercadoPago\client\Preference\PreferenceClient;
  
  class MercadoPagoService
  {
      public function createPreference($orderItems)
      {
          MercadoPagoConfig::setAccessToken("APP_USR-7464124130027784-111803-6f958c634df63581a2504911c7b85daa-2102350157");
          
          $client = new PreferenceClient();
  
          foreach ($orderItems as $orderItem) {
              $items[] = [
                  'title' => $orderItem->product->name,
                  'quantity' => $orderItem->quantity,
                  'currency_id' => 'ARS',
                  'unit_price' => $orderItem->product->price,
              ];
          }
  
          $preference = $client->create([
              'items' => $items,
              'external_reference' => "gerotrolo",
          ]);
  
          return $preference;
      }
  }
?>