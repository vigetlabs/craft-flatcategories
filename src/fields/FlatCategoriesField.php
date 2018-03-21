<?php
/**
 * Flat Categories plugin for Craft CMS 3.x
 *
 * Select categories without hierarchy
 *
 * @link      https://www.viget.com/
 * @copyright Copyright (c) 2018 Trevor Davis
 */

namespace viget\flatcategories\fields;

use viget\flatcategories\FlatCategories;

use Craft;
use craft\base\ElementInterface;
use craft\elements\Category;
use craft\base\Field;
use craft\fields\Categories;
use craft\fields\BaseRelationField;
use craft\helpers\ArrayHelper;
use craft\helpers\ElementHelper;

/**
 * @author    Trevor Davis
 * @package   FlatCategories
 * @since     2.0.0
 */
class FlatCategoriesField extends Categories
{
    public function __construct(array $config = [])
    {
        // Prevent error since this isn't used anymore
        unset($config['targetLocale']);
        parent::__construct($config);
    }

    // Static Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public static function displayName(): string
    {
        return Craft::t('flat-categories', 'Flat Categories');
    }

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->inputTemplate = '_includes/forms/elementSelect';
        $this->inputJsClass = null;
        $this->allowLimit = true;
        $this->limit = $this->branchLimit;
    }

    /**
     * @inheritdoc
     */
    public function normalizeValue($value, ElementInterface $element = null)
    {
        if (is_array($value)) {
            /** @var Category[] $categories */
            $categories = Category::find()
                ->id($value)
                ->status(null)
                ->enabledForSite(false)
                ->all();

            $value = ArrayHelper::getColumn($categories, 'id');
        }

        return BaseRelationField::normalizeValue($value, $element);
    }
}
