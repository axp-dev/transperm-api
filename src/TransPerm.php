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
        'full-route'                => 'http://www.map.gortransperm.ru/json/full-route/%s/%s/',
        'stoppoint-routes'          => 'http://www.map.gortransperm.ru/json/stoppoint-routes/%s/%s',
        'arrival-times-vehicles'    => 'http://www.map.gortransperm.ru/json/arrival-times-vehicles/%s?_=%s',
        'stoppoint-time-table'      => 'http://www.map.gortransperm.ru/json/stoppoint-time-table/%s/%s?_=%s',
        'time-table-h'              => 'http://www.map.gortransperm.ru/json/time-table-h/%s/%s/%s',
        'search'                    => 'http://www.map.gortransperm.ru/json/search?q=%s',
        'get-moving-autos'          => 'http://www.map.gortransperm.ru/json/get-moving-autos/-%s-?_=%s',
        'news-links'                => 'http://www.map.gortransperm.ru/json/news-links?_=%s',
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
     * Вид транспорта
     *
     * @param string $date
     * @param string $routeId
     * @return array
     */
    public static function getFullRoute(string $date, string $routeId)
    {
        return self::query(vsprintf(self::$endpoints['full-route'], [$date, $routeId]));
    }

    /**
     * Маршруты остановки
     *
     * @param string $date
     * @param string $stoppointId
     * @return array
     */
    public static function getStoppointRoutes(string $date, string $stoppointId)
    {
        return self::query(vsprintf(self::$endpoints['stoppoint-routes'], [$date, $stoppointId]));
    }

    /**
     * Ближайшие прибытия транспорта
     *
     * @param string $stoppointId
     * @return array
     */
    public static function getArrivalTimesVehicles(string $stoppointId)
    {
        return self::query(vsprintf(self::$endpoints['arrival-times-vehicles'], [$stoppointId, time()]));
    }

    /**
     * Расписание движения транспорта по остановке
     *
     * @param string $date
     * @param string $stoppointId
     * @return array
     */
    public static function getStoppointTimeTable(string $date, string $stoppointId)
    {
        return self::query(vsprintf(self::$endpoints['stoppoint-time-table'], [$date, $stoppointId, time()]));
    }

    /**
     * Расписание движения
     *
     * @param string $date
     * @param string $routeId
     * @param string $stoppointId
     * @return array
     */
    public static function getTimeTableH(string $date, string $routeId, string $stoppointId)
    {
        return self::query(vsprintf(self::$endpoints['time-table-h'], [$date, $routeId, $stoppointId]));
    }

    /**
     * Поиск
     *
     * @param string $query
     * @return array
     */
    public static function search(string $query)
    {
        return self::query(vsprintf(self::$endpoints['search'], [$query]));
    }

    /**
     * Онлайн расписание транспорта
     *
     * @param string $routeId
     * @return array
     */
    public static function getMovingAutos(string $routeId)
    {
        return self::query(vsprintf(self::$endpoints['get-moving-autos'], [$routeId, time()]));
    }

    /**
     * Новости
     *
     * @return array
     */
    public static function getNews()
    {
        return self::query(vsprintf(self::$endpoints['news-links'], [time()]));
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