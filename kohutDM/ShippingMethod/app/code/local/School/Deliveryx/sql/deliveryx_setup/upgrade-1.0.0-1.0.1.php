<?php
$installer = $this;
$installer->startSetup();

$tableEntities = [
    'deliveryx/offices_decimal',
    'deliveryx/offices_int',
    'deliveryx/offices_text',
    'deliveryx/offices_varchar',
    'deliveryx/offices_char',
    'deliveryx/offices_datetime',
];

$connection = $installer->getConnection();

foreach ($tableEntities as $tableEntity) {
    $tableName = $installer->getTable($tableEntity);

    if ($connection->isTableExists($tableName)) {
        $connection->addIndex(
            $tableName,
            $installer->getIdxName(
                $tableEntity,
                array('entity_id', 'attribute_id', 'store_id'),
                Varien_Db_Adapter_Interface::INDEX_TYPE_UNIQUE
            ),
            array('entity_id', 'attribute_id', 'store_id'),
            Varien_Db_Adapter_Interface::INDEX_TYPE_UNIQUE
        );
    }
}

$installer->endSetup();
