<?php
/**
 * Inlin plugin for Craft CMS 3.x
 *
 * A simple plugin for inlining stuff in your templates.
 *
 * @link      https://www.vaersaagod.no
 * @copyright Copyright (c) 2017 André Elvan
 */

namespace aelvan\inlin;

use craft\base\Plugin;
use aelvan\inlin\variables\InlinVariable;
use craft\web\twig\variables\CraftVariable;

use yii\base\Event;


class Inlin extends Plugin
{

    public static $plugin;

    public function init()
    {
        parent::init();
        self::$plugin = $this;

        Event::on(CraftVariable::class, CraftVariable::EVENT_INIT, function(Event $event) {
            /** @var CraftVariable $variable */
            $variable = $event->sender;
            $variable->set('inlin', InlinVariable::class);
        });
    }

    protected function createSettingsModel()
    {
        return new \aelvan\inlin\models\Settings();
    }

}
