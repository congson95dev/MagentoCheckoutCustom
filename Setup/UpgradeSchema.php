<?php
namespace Aht\MagentoCheckoutCustom\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\DB\Adapter\AdapterInterface;
use Magento\Framework\DB\Ddl\Table;

class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        if (version_compare($context->getVersion(), '1.1.0', '<')) {
//            don't have to use this table :(
            if ($installer->tableExists('delivery_checkout')) {
                $connection = $installer->getConnection();
                $tableName = $installer->getTable('delivery_checkout');

                $connection->addColumn(
                    $tableName,
                    'cart_id',
                    [
                        'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        'nullable' => false,
                        'comment' => 'Cart ID'
                    ]
                );
            }

            if ($installer->tableExists('quote')) {
                $connection = $installer->getConnection();
                $tableName = $installer->getTable('quote');

                $connection->addColumn(
                        $tableName,
                        'delivery_instruction',
                        [
                            'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                            'nullable' => false,
                            'comment' => 'Delivery Instruction'
                        ]
                    );
                $connection->addColumn(
                        $tableName,
                        'delivery_type',
                        [
                            'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                            'nullable' => false,
                            'comment' => 'Delivery Type'
                        ]
                    );
            }

            if ($installer->tableExists('sales_order')) {
                $connection = $installer->getConnection();
                $tableName = $installer->getTable('sales_order');

                $connection->addColumn(
                    $tableName,
                    'delivery_instruction',
                    [
                        'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        'nullable' => false,
                        'comment' => 'Delivery Instruction'
                    ]
                );
                $connection->addColumn(
                    $tableName,
                    'delivery_type',
                    [
                        'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        'nullable' => false,
                        'comment' => 'Delivery Type'
                    ]
                );
            }
        }

        $installer->endSetup();
    }
}
