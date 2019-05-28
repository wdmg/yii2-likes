<?php

namespace wdmg\likes;

/**
 * @author          Alexsander Vyshnyvetskyy <alex.vyshnyvetskyy@gmail.com>
 * @copyright       Copyright (c) 2019 W.D.M.Group, Ukraine
 * @license         https://opensource.org/licenses/MIT Massachusetts Institute of Technology (MIT) License
 */

use yii\base\BootstrapInterface;
use Yii;
use wdmg\likes\components\Likes;


class Bootstrap implements BootstrapInterface
{
    public function bootstrap($app)
    {
        // Get the module instance
        $module = Yii::$app->getModule('likes');

        // Get URL path prefix if exist
        if (isset($module->routePrefix)) {
            $app->getUrlManager()->enableStrictParsing = true;
            $prefix = $module->routePrefix . '/';
        } else {
            $prefix = '';
        }

        // Add module URL rules
        $app->getUrlManager()->addRules(
            [
                $prefix . '<module:likes>/' => '<module>/likes/index',
                $prefix . '<module:likes>/<controller:\w+>/' => '<module>/<controller>',
                $prefix . '<module:likes>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
                [
                    'pattern' => $prefix . '<module:likes>/',
                    'route' => '<module>/likes/index',
                    'suffix' => '',
                ], [
                    'pattern' => $prefix . '<module:likes>/<controller:\w+>/',
                    'route' => '<module>/<controller>',
                    'suffix' => '',
                ], [
                    'pattern' => $prefix . '<module:likes>/<controller:\w+>/<action:\w+>',
                    'route' => '<module>/<controller>/<action>',
                    'suffix' => '',
                ],
            ],
            true
        );

        // Configure options component
        $app->setComponents([
            'likes' => [
                'class' => Likes::className()
            ]
        ]);
    }
}