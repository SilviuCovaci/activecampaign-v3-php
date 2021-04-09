<?php

namespace Mediatoolkit\ActiveCampaign\Fields;

use Mediatoolkit\ActiveCampaign\Resource;

/**
 * Class Fields
 * @package Mediatoolkit\ActiveCampaign\Fields
 * @see https://developers.activecampaign.com/reference#fields
 */
class Fields extends Resource
{
    protected function getApiParameters($type, $itemData = null) {
        $parameters['endpoint'] = 'fields';
        return $parameters;                
    }    
}