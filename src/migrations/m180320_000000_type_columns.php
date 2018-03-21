<?php

namespace viget\flatcategories\migrations;

use Craft;
use craft\db\Migration;
use yii\db\Expression;

/**
 * m150403_184729_type_columns migration.
 */
class m180320_000000_type_columns extends Migration
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $componentTypes = [
            [
                'tables' => [
                    '{{%fields}}',
                ],
                'oldClass' => 'FlatCategories',
                'newClass' => 'viget\flatcategories\fields\FlatCategoriesField',
            ],
        ];

        foreach ($componentTypes as $componentType) {
            $columns = ['type' => $componentType['newClass']];
            $condition = ['type' => $componentType['oldClass']];

            foreach ($componentType['tables'] as $table) {
                if (Craft::$app->db->tableExists($table)) {
                    $this->alterColumn($table, 'type', $this->string()->notNull());
                    $this->update($table, $columns, $condition, [], false);
                }
            }
        }
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180320_000000_type_columns cannot be reverted.\n";

        return false;
    }
}
