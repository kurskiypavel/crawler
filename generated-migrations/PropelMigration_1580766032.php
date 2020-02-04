<?php

use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1580766032.
 * Generated on 2020-02-03 21:40:32 by pavelkurskiy
 */
class PropelMigration_1580766032
{
    public $comment = '';

    public function preUp(MigrationManager $manager)
    {
        // add the pre-migration code here
    }

    public function postUp(MigrationManager $manager)
    {
        // add the post-migration code here
    }

    public function preDown(MigrationManager $manager)
    {
        // add the pre-migration code here
    }

    public function postDown(MigrationManager $manager)
    {
        // add the post-migration code here
    }

    /**
     * Get the SQL statements for the Up migration
     *
     * @return array list of the SQL strings to execute for the Up migration
     *               the keys being the datasources
     */
    public function getUpSQL()
    {
        return array (
  'default' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `vg_article`;

CREATE TABLE `articles`
(
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `slug` TEXT,
    `title` TEXT,
    `subtitle` TEXT,
    `source` TEXT,
    `content` TEXT,
    `rawhtml` TEXT,
    `json_translateRU` TEXT,
    `datetime` VARCHAR(50),
    `url` TEXT,
    `translated` TINYINT(1),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

    /**
     * Get the SQL statements for the Down migration
     *
     * @return array list of the SQL strings to execute for the Down migration
     *               the keys being the datasources
     */
    public function getDownSQL()
    {
        return array (
  'default' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `articles`;

CREATE TABLE `vg_article`
(
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `slug` TEXT,
    `title` TEXT,
    `subtitle` TEXT,
    `source` TEXT,
    `content` TEXT,
    `rawhtml` TEXT,
    `json_translateRU` TEXT,
    `datetime` VARCHAR(50),
    `url` TEXT,
    `translated` TINYINT(1),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}