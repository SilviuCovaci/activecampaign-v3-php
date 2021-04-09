<?php

namespace Mediatoolkit\ActiveCampaign\Accounts;

use Mediatoolkit\ActiveCampaign\Resource;

/**
 * Class Accounts
 * @package Mediatoolkit\ActiveCampaign\Accounts
 * @see https://developers.activecampaign.com/reference#accounts
 */
class AccountsContacts extends Resource
{
    protected function getApiParameters($method, $args = null) {
        $parameters['endpoint'] = 'accountContacts';
        if ($method == 'create' || $method == 'update') {
            $parameters['postdata'] = ['accountContact'=> $args['itemData']];
        } 
                
        if ($method == 'update') {
            $parameters['endpoint'] .= '/'. $args['id'];
        }
        return $parameters;                
    }

    /**
     * Create an account-contact link
     * @see https://developers.activecampaign.com/reference#create-an-association-1
     *
     * @param int $accountId
     * @param int $contactId
     * @param string $jobTitle
     * @return string
     */
    public function createAssociation(int $accountId, int $contactId, string $jobTitle)
    {
        return $this->create(["contact" => $contactId,
                       "account"=> $accountId,
                       "jobTitle" => $jobTitle]);        
    }

    /**
     * Update an account-contact link
     * @see https://developers.activecampaign.com/reference#update-an-association-1
     *
     * @param int $id
     * @param int $accountId
     * @param int $contactId
     * @param string $jobTitle
     * @return string
     */
    public function updateAssociation(int $id, int $accountId, int $contactId, string $jobTitle)
    {
        return $this->update($id, ["contact" => $contactId,
                                   "account"=> $accountId,
                                   "jobTitle" => $jobTitle]);        

    }
}