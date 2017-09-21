# Transport Perm API
[![Latest Stable Version](https://poser.pugx.org/axp-dev/transperm-api/v/stable)](https://packagist.org/packages/axp-dev/transperm-api)
[![Latest Unstable Version](https://poser.pugx.org/axp-dev/transperm-api/v/unstable)](https://packagist.org/packages/axp-dev/transperm-api)
[![License](https://poser.pugx.org/axp-dev/transperm-api/license)](https://packagist.org/packages/axp-dev/transperm-api)

PHP библиотека для получения расписания транспорта г. Перми.

## Оглавление
1. [Старт](#Старт)
    + [Composer](#Установка-через-composer)
    + [Инициализация](#Инициализация)
2. [Использование](#Использование)
    + [Список всех видов транспорта](#Список-всех-видов-транспорта)
    + [Вид транспорта](#Вид-транспорта)
    + [Маршруты остановки](#Маршруты-остановки)
    + [Ближайшие прибытия транспорта](#Ближайшие-прибытия-транспорта)
    + [Расписание движения транспорта по остановке](#Расписание-движения-транспорта-по-остановке)
    + [Расписание движения](#Расписание-движения)
    + [Онлайн расписание транспорта](#Онлайн-расписание-транспорта)
    + [Поиск](#Поиск)
    + [Новости](#Новости)
    + [Табло](#Табло)
3. [Автор](#Автор)
4. [Лицензия](#Лицензия)

## Старт
### Установка через composer
```
$ composer require axp-dev/transperm-api
```
### Инициализация
Все методы являются статичными. Вызывать можно без инициализации.

## Использование
### Список всех видов транспорта
```php
public static function getRouteTypesTree(string $date)
```
Название | Тип | Описание
---------|-----|----------------------
$date | string | Дата в формате `d.m.Y`

### Вид транспорта
```php
public static function getFullRoute(string $date, string $routeId)
```
Название | Тип | Описание
---------|-----|----------------------
$date | string | Дата в формате `d.m.Y`
$routeId | string | ID транспорта

### Маршруты остановки
```php
public static function getStoppointRoutes(string $date, string $stoppointId)
```
Название | Тип | Описание
---------|-----|----------------------
$date | string | Дата в формате `d.m.Y`
$stoppointId | string | ID остановки

### Ближайшие прибытия транспорта
```php
public static function getArrivalTimesVehicles(string $stoppointId)
```
Название | Тип | Описание
---------|-----|----------------------
$stoppointId | string | ID остановки

### Расписание движения транспорта по остановке
```php
public static function getStoppointTimeTable(string $date, string $stoppointId)
```
Название | Тип | Описание
---------|-----|----------------------
$date | string | Дата в формате `d.m.Y`
$stoppointId | string | ID остановки

### Расписание движения
```php
public static function getTimeTableH(string $date, string $routeId, string $stoppointId)
```
Название | Тип | Описание
---------|-----|----------------------
$date | string | Дата в формате `d.m.Y`
$routeId | string | ID транспорта


### Онлайн расписание транспорта
```php
public static function getMovingAutos(string $routeId)
```
Название | Тип | Описание
---------|-----|----------------------
$routeId | string | ID транспорта

### Поиск
```php
public static function search(string $query)
```
Название | Тип | Описание
---------|-----|----------------------
$query | string | Поисковой запрос

### Новости
```php
public static function getNews()
```

### Табло
```php
public static function getBoards()
```

## Автор
[Alexander Pushkarev](https://github.com/axp-dev), e-mail: [axp-dev@yandex.com](mailto:axp-dev@yandex.com)

## Лицензия
Основой Transport Perm API являет открытый исходный код, в соответствии [MIT license](https://opensource.org/licenses/MIT)