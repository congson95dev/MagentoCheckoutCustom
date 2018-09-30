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

            if ($installer->tableExists('sales_order_grid')) {
                $connection = $installer->getConnection();
                $tableName = $installer->getTable('sales_order_grid');

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

//          update existing data from table 1 to table 2
            
            if ($installer->tableExists('sales_order_grid')) {
                $connection = $installer->getConnection();
                $sales_order_grid = $installer->getTable('sales_order_grid');
                $sales_order = $installer->getTable('sales_order');

                $connection->query(
                    $connection->updateFromSelect(
                        $connection->select()
                            ->join(
                                $sales_order,
                                sprintf('%s.entity_id = %s.entity_id', $sales_order_grid, $sales_order),
                                'delivery_instruction'
                            ),
                        $sales_order_grid
                    )
                );

                $connection->query(
                    $connection->updateFromSelect(
                        $connection->select()
                            ->join(
                                $sales_order,
                                sprintf('%s.entity_id = %s.entity_id', $sales_order_grid, $sales_order),
                                'delivery_type'
                            ),
                        $sales_order_grid
                    )
                );

            }
        }

        $installer->endSetup();
    }
}
