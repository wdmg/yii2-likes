<?php

namespace wdmg\likes;

/**
 * Yii2 User likes
 *
 * @category        Module
 * @version         0.0.7
 * @author          Alexsander Vyshnyvetskyy <alex.vyshnyvetskyy@gmail.com>
 * @link            https://github.com/wdmg/yii2-likes
 * @copyright       Copyright (c) 2019 W.D.M.Group, Ukraine
 * @license         https://opensource.org/licenses/MIT Massachusetts Institute of Technology (MIT) License
 *
 */

use Yii;
use wdmg\base\BaseModule;

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
    private $version = "0.0.7";

    /**
     * @var integer, priority of initialization
     */
    private $priority = 10;


    public function bootstrap($app)
    {
        parent::bootstrap($app);

        // Configure options component
        $app->setComponents([
            'likes' => [
                'class' => Likes::className()
            ]
        ]);
    }
}