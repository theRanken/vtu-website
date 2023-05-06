<?php
require_once dirname(__DIR__) . "/api.class.php";

class Exam extends BaseApiClient
{
    /**
     * returns a list of exam types 
     *
     * @param string $serviceID
     * @return string|boolean
     */
    public function get_types(string $serviceID):string|bool
    {
        $url = $this->api . "service-variations";
        $config = [
            'query' => [
                'serviceID' => $serviceID 
            ]
        ];
        $request = $this->client->request('GET', $url, $config);

        $response = (string) $request->getBody();
        $body = json_decode($response,true);

        if($body["response_description"] != "000")
            return  json_encode("We're sorry something went wrong!");

        $content = $body["content"];
        return json_encode($content);

    }
    /**
     * Returns Payment data with receipt
     *
     * @param string $user
     * @param string $service
     * @param string $variation
     * @param string $phone
     * @return string|boolean
     */
    public function buy_scratch_card($user, string $service, string $variation, string $phone):string|bool
    {
        $url = $this->api . "pay";
        $config = [
            'headers' => [
                "Authorization" => $this->getBasicAuthHeaderValue()
            ],
            'form_params' => [
                'request_id' => BaseApiClient::request_id(),
                'serviceID' => $service, 
                'variation_code' => $variation,
                'phone' => $phone, 
            ]
        ];
        $request = $this->client->request('POST', $url, $config);

        $response = (string) $request->getBody();
        $body = json_decode($response,true);

        if($body["code"] != "000")
            return  json_encode("We're sorry something went wrong!");


        $content = $body["content"];
        return json_encode($content);
    }
   
}


$exam = new Exam($con, [
    'debug' => true,
    'live_url' => "https://vtpass.com/api/",
    'sandbox_url' => "https://sandbox.vtpass.com/api/",
]);