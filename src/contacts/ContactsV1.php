<?php

namespace Mediatoolkit\ActiveCampaign\Contacts;

//use Mediatoolkit\ActiveCampaign\Contacts;

/**
 * Class Contacts
 * @package Mediatoolkit\ActiveCampaign\Contacts
 * @see https://developers.activecampaign.com/reference#contact
 */
class ContactsV1 extends Contacts {

    private function getUrl($method, $params = "") {
        $url = "/admin/api.php?";
        $url .= 'api_key=' . $this->client->getApiToken();
        $url .= '&api_output=json';
        $url .= "&api_action={$method}&{$params}";
        return $url;
    }

    public function list(array $filter)
    {
        $url = $this->getUrl("contact_list", http_build_query($filter));
        
        $req = $this->client->getClient()->get($url);
        return $req->getBody()->getContents();
    }

    function add($postData) {
        $url = $this->getUrl("contact_add");
        
        $req = $this->client
            ->getClient()
            ->request('POST', $url, ['form_params' => $postData, 
                                     'headers' => ['Content-Type' => 'application/x-www-form-urlencoded'],
                                    ]);
 
        return $req->getBody()->getContents();
	}

    function edit($id, $postData) {
        $url = $this->getUrl("contact_edit", "overwrite=1");
        if ($id) {
            $postData['id'] = $id;
        }
        $req = $this->client
            ->getClient()
            ->request('POST', $url, ['form_params' => $postData, 
                                     'headers' => ['Content-Type' => 'application/x-www-form-urlencoded'],
                                    ]);
 
        return $req->getBody()->getContents();
	}
}