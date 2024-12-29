<?php 

namespace App\Controllers;

class RajaOngkir extends BaseController
{
    private $apiKey = '00987c6f6c2434878864ea98e400406c';

    public function provinces()
    {
        $response = $this->callRajaOngkir('province');
        return $this->response->setJSON($response);
    }

    public function cities($provinceId)
    {
        $response = $this->callRajaOngkir("city?province=$provinceId");
        return $this->response->setJSON($response);
    }

    public function ongkir($cityId, $weight, $courier)
    {
        $data = [
            'origin' => '399', // ID kota asal
            'destination' => $cityId,
            'weight' => $weight,
            'courier' => $courier
        ];

        $response = $this->callRajaOngkir('cost', $data, 'POST');

        // Debug log untuk memeriksa respons
        log_message('debug', 'Ongkir response: ' . json_encode($response));

        if (isset($response['rajaongkir']['results'][0]['costs'])) {
            return $this->response->setJSON([
                'rajaongkir' => [
                    'results' => [[
                        'costs' => [
                            $response['rajaongkir']['results'][0]['costs'][0]
                        ]
                    ]]
                ]
            ]);
        }

        return $this->response->setJSON(['error' => 'Layanan pengiriman tidak tersedia']);
    }

    
        public function getProvinces()
    {
        $response = $this->callRajaOngkir('province', [], 'GET');
        return $response['rajaongkir']['results'] ?? [];
    }

    public function getCities($provinceId)
    {
        $response = $this->callRajaOngkir('city', ['province' => $provinceId], 'GET');
        return $response['rajaongkir']['results'] ?? [];
    }

    private function callRajaOngkir($endpoint, $data = [], $method = 'GET')
    {
        $client = \Config\Services::curlrequest();
        $options = [
            'headers' => [
                'key' => $this->apiKey,
            ],
        ];

        if ($method === 'POST') {
            $options['form_params'] = $data;
        }

        $response = $client->request($method, "https://api.rajaongkir.com/starter/$endpoint", $options);
        return json_decode($response->getBody(), true);
    }
}