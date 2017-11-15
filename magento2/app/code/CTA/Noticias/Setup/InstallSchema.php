<?php
declare(strict_types=1);

namespace CTA\Noticias\Setup;

use Magento\Framework\DB\Adapter\AdapterInterface;
use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup;

class InstallSchema implements Setup\InstallSchemaInterface
{
    /**
     * Installs DB schema for a module
     *
     * @param Setup\SchemaSetupInterface $setup
     * @param Setup\ModuleContextInterface $context
     * @return void
     */
    public function install(Setup\SchemaSetupInterface $setup, Setup\ModuleContextInterface $context): void
    {
        $installer = $setup;
        $tableName = 'cta_noticias';

        $installer->startSetup();

        if (! $installer->tableExists($tableName)) {
            $table = $installer->getConnection()->newTable(
                $installer->getTable($tableName)
            )->addColumn(
                'id',
                Table::TYPE_INTEGER,
                null,
                [
                    'identity' => true,
                    'nullable' => false,
                    'primary' => true,
                    'unsigned' => true,
                ]
            )->addColumn(
                'titulo',
                Table::TYPE_TEXT,
                255,
                ['nullable' => false]
            )
            ->addColumn('contenido', Table::TYPE_TEXT, '64k')
            ->addColumn('fechaPublicacion', Table::TYPE_TIMESTAMP)
            ->addColumn('autor', Table::TYPE_TEXT, 255)
            ->addColumn('foto', Table::TYPE_TEXT, 255)
            ->addColumn('url', Table::TYPE_TEXT, 255)
            ->addColumn('descripcionCorta', Table::TYPE_TEXT, 255)
            ->setComment('Tabla de noticias');

            $installer->getConnection()->createTable($table);

            $installer->getConnection()->addIndex(
                $installer->getTable($tableName),
                $installer->getIdxName(
                    $installer->getTable($tableName),
                    ['titulo', 'contenido'],
                    AdapterInterface::INDEX_TYPE_FULLTEXT
                ),
                ['titulo', 'contenido'],
                AdapterInterface::INDEX_TYPE_FULLTEXT
            );
        }

        $installer->endSetup();
    }
}