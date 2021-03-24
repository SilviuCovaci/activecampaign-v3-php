<?php

namespace Mediatoolkit\ActiveCampaign\Contacts;

//use Mediatoolkit\ActiveCampaign\Contacts;

/**
 * Class Contacts
 * @package Mediatoolkit\ActiveCampaign\Contacts
 * @see https://developers.activecampaign.com/reference#contact
 */
class ContactsV1 extends Contacts {

    public function list(array $filter)
    {
        //$url = $this->client->getApiUrl()
        $url ='';
        $url .= "/admin/api.php?";
        $url .= 'api_key=' . $this->client->getApiToken();
        $url .= '&api_action=contact_list';
        $url .= '&api_output=json';
        
        $url .= '&' . http_build_query($filter);
        $req = $this->client
            ->getClient()
            ->get($url);
 
        
        return $req->getBody()->getContents();
    }
}