<?php
/**
 * Routes configuration.
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * It's loaded within the context of `Application::routes()` method which
 * receives a `RouteBuilder` instance `$routes` as method argument.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

/** @var \Cake\Routing\RouteBuilder $routes */
$routes->setRouteClass(DashedRoute::class);

$routes->scope('/', function (RouteBuilder $builder) {

    $builder->connect('/users', ['controller' => 'Users', 'action' => 'index']);

    $builder->connect('api/images/*', ['controller' => 'Images', 'action' => 'get']);

    $builder->connect('/', ['controller' => 'Images', 'action' => 'index']);
    $builder->connect('/add', ['controller' => 'Images', 'action' => 'add']);
    $builder->connect('/delete', ['controller' => 'Images', 'action' => 'delete']);
    $builder->connect('/view/**', ['controller' => 'Images', 'action' => 'view']);

    $builder->connect('/page/{page}', ['controller' => 'Images', 'action' => 'index'])
        ->setPatterns(['page' => '\d+'])
        ->setPass(['page']);

    $builder->connect('/pages/*', 'Pages::display');

    $builder->fallbacks();
});
