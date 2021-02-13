<?php

namespace wdmg\likes;

/**
 * Yii2 User likes
 *
 * @category        Module
 * @version         0.0.12
 * @author          Alexsander Vyshnyvetskyy <alex.vyshnyvetskyy@gmail.com>
 * @link            https://github.com/wdmg/yii2-likes
 * @copyright       Copyright (c) 2019 - 2021 W.D.M.Group, Ukraine
 * @license         https://opensource.org/licenses/MIT Massachusetts Institute of Technology (MIT) License
 *
 */

use Yii;
use wdmg\base\BaseModule;
use wdmg\likes\components\Likes;

/**
 * Likes module definition class
 */
class Module extends BaseModule
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'wdmg\likes\controllers';

    /**
     * {@inheritdoc}
     */
    public $defaultRoute = "likes/index";

    /**
     * @var string, the name of module
     */
    public $name = "Likes";

    /**
     * @var string, the description of module
     */
    public $description = "System of accounting user likes";

    /**
     * @var string the module version
     */
    private $version = "0.0.12";

    /**
     * @var integer, priority of initialization
     */
    private $priority = 10;


    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // Set version of current module
        $this->setVersion($this->version);

        // Set priority of current module
        $this->setPriority($this->priority);
    }

    /**
     * {@inheritdoc}
     */
    public function dashboardNavItems($options = false)
    {
        $items = [
            'label' => $this->name,
            'url' => [$this->routePrefix . '/'. $this->id],
            'icon' => 'fa fa-fw fa-thumbs-up',
            'active' => in_array(\Yii::$app->controller->module->id, [$this->id])
        ];
        return $items;
    }

    /**
     * {@inheritdoc}
     */
    public function bootstrap($app)
    {

        parent::bootstrap($app);

        // Configure likes component
        $app->setComponents([
            'likes' => [
                'class' => Likes::class
            ]
        ]);
    }
}