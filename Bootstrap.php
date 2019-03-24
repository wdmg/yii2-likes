<?php

namespace wdmg\likes;

use yii\base\BootstrapInterface;
use Yii;


class Bootstrap implements BootstrapInterface
{
    public function bootstrap($app)
    {
        // Get the module instance
        $module = Yii::$app->getModule('likes');

        // Get URL path prefix if exist
        $prefix = (isset($module->routePrefix) ? $module->routePrefix . '/' : '');

        // Add module URL rules
        $app->getUrlManager()->addRules(
            [
                $prefix . '<module:likes>/' => '<module>/default/index',
                $prefix . '<module:likes>/<controller>/' => '<module>/<controller>',
                $prefix . '<module:likes>/<controller>/<action>' => '<module>/<controller>/<action>',
                $prefix . '<module:likes>/<controller>/<action>' => '<module>/<controller>/<action>',
            ],
            true
        );
    }
}