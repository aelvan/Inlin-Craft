<?php
namespace craft\plugins\inlin;

use \craft\app\base\Plugin;

class Inlin extends Plugin
{
    public static $plugin;

    /**
     * Inlin constructor.
     * 
     * @param string $id
     * @param null $parent
     * @param array $config
     */
    public function __construct($id, $parent = null, $config = [])
    {
        static::$plugin = $this;
        static::setInstance($this);

        parent::__construct($id, $parent, $config);
    }

    /**
     * Registers Inlin template variables
     * 
     * @return string
     */
    public function getVariableDefinition()
    {
        return 'craft\plugins\inlin\variables\InlinVariable';
    }

}