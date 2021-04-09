<?php

namespace Mediatoolkit\ActiveCampaign\Fields;

use Mediatoolkit\ActiveCampaign\Resource;

/**
 * Class AccountFields
 * @package Mediatoolkit\ActiveCampaign\Fields
 * @see https://developers.activecampaign.com/reference#fields
 */
class AccountFields extends Resource
{
    protected function getApiParameters($type, $itemData = null) {
        $parameters['endpoint'] = 'accountCustomFieldMeta';
        return $parameters;                
    }
}