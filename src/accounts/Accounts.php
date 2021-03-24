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
    /**
     * Update an account
     * @see https://developers.activecampaign.com/reference#update-a-contact
     *
     * @param int $id
     * @param array $account
     * @return string
     */
    public function update(int $id, array $account)
    {
        $req = $this->client
            ->getClient()
            ->put('/api/3/accounts/' . $id, [
                'json' => [
                    'account' => $account
                ]
            ]);

        return $req->getBody()->getContents();
    }

    /**
     * List all accounts
     * @see https://developers.activecampaign.com/reference#list-all-accounts
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

        $req = $this->client
            ->getClient()
            ->get('/api/3/accounts', [
                'query' => $query_params
            ]);

        return $req->getBody()->getContents();
    }
}