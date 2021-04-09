<?php

namespace Mediatoolkit\ActiveCampaign\Accounts;

use Mediatoolkit\ActiveCampaign\Resource;

/**
 * Class Accounts
 * @package Mediatoolkit\ActiveCampaign\Accounts
 * @see https://developers.activecampaign.com/reference#accounts
 */
class Accounts extends Resource
{
    protected function getApiParameters($method, $args = null) {
        $parameters['endpoint'] = 'accounts';
        if ($method == 'create' || $method == 'update') {
            $parameters['postdata'] = ['account'=> $args['itemData']];
        } 
                
        if ($method == 'update') {
            $parameters['endpoint'] .= '/'. $args['id'];
        }
        return $parameters;                
    }           
}