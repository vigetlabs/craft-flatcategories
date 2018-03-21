<?php
/**
 * Flat Categories plugin for Craft CMS 3.x
 *
 * Select categories without hierarchy
 *
 * @link      https://www.viget.com/
 * @copyright Copyright (c) 2018 Trevor Davis
 */

namespace viget\flatcategories;

use viget\flatcategories\fields\FlatCategoriesField as FlatCategoriesFieldField;

use Craft;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\events\PluginEvent;
use craft\services\Fields;
use craft\events\RegisterComponentTypesEvent;

use yii\base\Event;

/**
 * Class FlatCategories
 *
 * @author    Trevor Davis
 * @package   FlatCategories
 * @since     2.0.0
 *
 */
class FlatCategories extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var FlatCategories
     */
    public static $plugin;

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $schemaVersion = '2.0.0';

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        Event::on(
            Fields::class,
            Fields::EVENT_REGISTER_FIELD_TYPES,
            function (RegisterComponentTypesEvent $event) {
                $event->types[] = FlatCategoriesFieldField::class;
            }
        );

        Craft::info(
            Craft::t(
                'flat-categories',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }

    // Protected Methods
    // =========================================================================

}
