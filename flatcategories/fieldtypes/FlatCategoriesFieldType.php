<?php
/**
 * Flat Categories plugin for Craft CMS
 *
 * FlatCategories FieldType
 *
 * @author    Trevor Davis
 * @copyright Copyright (c) 2018 Trevor Davis
 * @link      https://www.viget.com/
 * @package   FlatCategories
 * @since     1.0.0
 */

namespace Craft;

class FlatCategoriesFieldType extends CategoriesFieldType
{
    // Properties
    // =========================================================================

    /**
     * Template to use for field rendering.
     *
     * @var string
     */
    protected $inputTemplate = '_includes/forms/elementSelect';

    /**
     * The JS class that should be initialized for the input.
     *
     * @var string|null $inputJsClass
     */
    protected $inputJsClass;

    // Public Methods
    // =========================================================================

    /**
     * @return mixed
     */
    public function getName()
    {
        return Craft::t('Flat Categories');
    }

    /**
     * @inheritDoc IFieldType::onAfterElementSave()
     *
     * @return null
     */
    public function onAfterElementSave()
    {
        $categoryIds = $this->element->getContent()->getAttribute($this->model->handle);

        // Make sure something was actually posted
        if ($categoryIds !== null)
        {
            // Removed the code from the Categories fieldtype that filled in the gaps for ancestor categories

            craft()->relations->saveRelations($this->model, $this->element, $categoryIds);
        }
    }
}
