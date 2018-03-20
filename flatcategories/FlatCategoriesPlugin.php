<?php
/**
 * Flat Categories plugin for Craft CMS
 *
 * Select categories without hierarchy
 *
 * @author    Trevor Davis
 * @copyright Copyright (c) 2018 Trevor Davis
 * @link      https://www.viget.com/
 * @package   FlatCategories
 * @since     1.0.0
 */

namespace Craft;

class FlatCategoriesPlugin extends BasePlugin
{
    /**
     * @return mixed
     */
    public function init()
    {
        parent::init();
    }

    /**
     * @return mixed
     */
    public function getName()
    {
         return Craft::t('Flat Categories');
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return Craft::t('Select categories without hierarchy');
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return '1.0.0';
    }

    /**
     * @return string
     */
    public function getSchemaVersion()
    {
        return '1.0.0';
    }

    /**
     * @return string
     */
    public function getDeveloper()
    {
        return 'Trevor Davis';
    }

    /**
     * @return string
     */
    public function getDeveloperUrl()
    {
        return 'https://www.viget.com/';
    }
}
