<?php
/**
 * Resource.php
 * Date: 08/01/2019
 * Time: 11:12
 */

namespace Mediatoolkit\ActiveCampaign;


class Resource
{

    /**
     * @var Client
     */
    protected $client;

    /**
     * Resource constructor.
     * @param $client Client
     */
    public function __construct($client)
    {
        $this->client = $client;
    }

    protected function getApiParameters($method, $args = null) {
        throw new \Exception('getApiParameters not defined!');
    }

    protected function api($requestMethod, $apiMethod, $bodyParameters) {
        $url = 'api/3/' . $apiMethod;
        //echo "[$requestMethod]:$url<br><pre>";print_r($bodyParameters);exit;
        $options = [];
        $requestMethod = strtoupper($requestMethod);
        if ($requestMethod == 'GET') {
            $options['query'] = $bodyParameters;
        } else {
            $options['json'] = $bodyParameters;
        }
        $req = $this->client
            ->getClient()
            ->request($requestMethod, $url, $options);

        return $req->getBody()->getContents();
    }

    /**
     * List all items
     * @see https://developers.activecampaign.com/reference#list-all-contacts
     * @see https://developers.activecampaign.com/reference#list-all-accounts
     * @see https://developers.activecampaign.com/reference#retrieve-fields-1
     * @see https://developers.activecampaign.com/reference#retrieve-fields-1
     *
     * @param array $query_params
     * @param int $limit
     * @param int $offset
     * @return string
     */
    public function listAll(array $query_params = [], int $limit = 20, int $offset = 0)
    {
        $query_params = array_merge($query_params, [
            'limit' => $limit,
            'offset' => $offset
        ]);        

        $parameters = $this->getApiParameters('listAll');
        return $this->api('GET', $parameters['endpoint'], $query_params);             
    }

    
    /**
     * Create an item
     * @see https://developers.activecampaign.com/reference#create-a-contact
     *
     * @param int $id
     * @param array $itemData
     * @return string
     */
    public function create(array $itemData)
    {
        $parameters = $this->getApiParameters('create', compact('itemData'));

        return $this->api('POST', $parameters['endpoint'], $parameters['postdata']);        
    }

    /**
     * Update an item
     * @see https://developers.activecampaign.com/reference#update-a-contact
     *
     * @param int $id
     * @param array $itemData
     * @return string
     */
    public function update(int $id, array $itemData)
    {
        $parameters = $this->getApiParameters('update', compact('id', 'itemData'));

        return $this->api('PUT', $parameters['endpoint'] , $parameters['postdata']);              
    }   
}