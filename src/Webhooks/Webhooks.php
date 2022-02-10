<?php

namespace Mediatoolkit\ActiveCampaign\Webhooks;

use Mediatoolkit\ActiveCampaign\Resource;
/**
* Class Webhooks
* @package Mediatoolkit\ActiveCampaign\Webhooks
* @see https://developers.activecampaign.com/reference#webhooks
*/
class Webhooks extends Resource
{
    protected function getApiParameters($type, $itemData = null) {
        $parameters['endpoint'] = 'webhooks';
        if ($itemData && isset($itemData['itemData'])) {
            $parameters['postdata'] = $itemData['itemData'];
        }
        return $parameters;
    }

    /**
     * Delete a webhook
     * @see https://developers.activecampaign.com/reference#delete-webhook
     *
     * @param int $id
     * @return bool
     */
    public function delete(int $id)
    {
        $req = $this->client
            ->getClient()
            ->delete('/api/3/webhooks/' . $id);

        return 200 === $req->getStatusCode();
    }
}