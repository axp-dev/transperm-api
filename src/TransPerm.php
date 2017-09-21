<?php

namespace AXP\TransPerm;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\ClientException;

/**
 * Class TransPerm
 *
 * @package AXP\TransPerm
 */
class TransPerm
{
    /**
     * Список конечных url api
     *
     * @var array
     */
    private static $endpoints = [
        'route-types-tree'          => 'http://www.map.gortransperm.ru/json/route-types-tree/%s/',
        'full-route'                => 'http://www.map.gortransperm.ru/json/full-route/%s/%d/',
        'stoppoint-routes'          => 'http://www.map.gortransperm.ru/json/stoppoint-routes/%s/%d',
        'arrival-times-vehicles'    => 'http://www.map.gortransperm.ru/json/arrival-times-vehicles/%d?_=%s',
        'stoppoint-time-table'      => 'http://www.map.gortransperm.ru/json/stoppoint-time-table/%d?_=%s',
        'time-table-h'              => 'http://www.map.gortransperm.ru/json/time-table-h/%s/%d/%d',
        'search'                    => 'http://www.map.gortransperm.ru/json/search?q=%s',
    ];

    /**
     * Список всех видов транспорта
     *
     * @param  string $date
     * @return array
     */
    public static function getRouteTypesTree(string $date)
    {
        return self::query(vsprintf(self::$endpoints['route-types-tree'], [$date]));
    }

    /**
     * HTTP запрос
     *
     * @param string $url
     * @return mixed
     * @throws TransPermException
     */
    protected static function query(string $url)
    {
        try {
            $client = new GuzzleClient();
            $response = $client->request('GET', $url);
            $result = json_decode($response->getBody(), true);

            return $result;
        } catch (ClientException $e) {
            throw new TransPermException($e->getMessage());
        }
    }
}