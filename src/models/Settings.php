<?php
/**
 * Inlin plugin for Craft CMS 3.x
 *
 * A simple plugin for inlining stuff in your templates.
 *
 * @link      https://www.vaersaagod.no
 * @copyright Copyright (c) 2017 André Elvan
 */

namespace aelvan\inlin\models;

use craft\base\Model;

class Settings extends Model
{
    public $publicRoot = null;
}