<?php

namespace orm\orm\Map;

use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;
use orm\orm\VgArticleRu;
use orm\orm\VgArticleRuQuery;


/**
 * This class defines the structure of the 'vg_article_ru' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class VgArticleRuTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'orm.orm.Map.VgArticleRuTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'vg_article_ru';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\orm\\orm\\VgArticleRu';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'orm.orm.VgArticleRu';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 7;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 7;

    /**
     * the column name for the id field
     */
    const COL_ID = 'vg_article_ru.id';

    /**
     * the column name for the title field
     */
    const COL_TITLE = 'vg_article_ru.title';

    /**
     * the column name for the subtitle field
     */
    const COL_SUBTITLE = 'vg_article_ru.subtitle';

    /**
     * the column name for the source field
     */
    const COL_SOURCE = 'vg_article_ru.source';

    /**
     * the column name for the content field
     */
    const COL_CONTENT = 'vg_article_ru.content';

    /**
     * the column name for the datetime field
     */
    const COL_DATETIME = 'vg_article_ru.datetime';

    /**
     * the column name for the url field
     */
    const COL_URL = 'vg_article_ru.url';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'Title', 'Subtitle', 'Source', 'Content', 'Datetime', 'Url', ),
        self::TYPE_CAMELNAME     => array('id', 'title', 'subtitle', 'source', 'content', 'datetime', 'url', ),
        self::TYPE_COLNAME       => array(VgArticleRuTableMap::COL_ID, VgArticleRuTableMap::COL_TITLE, VgArticleRuTableMap::COL_SUBTITLE, VgArticleRuTableMap::COL_SOURCE, VgArticleRuTableMap::COL_CONTENT, VgArticleRuTableMap::COL_DATETIME, VgArticleRuTableMap::COL_URL, ),
        self::TYPE_FIELDNAME     => array('id', 'title', 'subtitle', 'source', 'content', 'datetime', 'url', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Title' => 1, 'Subtitle' => 2, 'Source' => 3, 'Content' => 4, 'Datetime' => 5, 'Url' => 6, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'title' => 1, 'subtitle' => 2, 'source' => 3, 'content' => 4, 'datetime' => 5, 'url' => 6, ),
        self::TYPE_COLNAME       => array(VgArticleRuTableMap::COL_ID => 0, VgArticleRuTableMap::COL_TITLE => 1, VgArticleRuTableMap::COL_SUBTITLE => 2, VgArticleRuTableMap::COL_SOURCE => 3, VgArticleRuTableMap::COL_CONTENT => 4, VgArticleRuTableMap::COL_DATETIME => 5, VgArticleRuTableMap::COL_URL => 6, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'title' => 1, 'subtitle' => 2, 'source' => 3, 'content' => 4, 'datetime' => 5, 'url' => 6, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('vg_article_ru');
        $this->setPhpName('VgArticleRu');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\orm\\orm\\VgArticleRu');
        $this->setPackage('orm.orm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('title', 'Title', 'LONGVARCHAR', false, null, null);
        $this->addColumn('subtitle', 'Subtitle', 'LONGVARCHAR', false, null, null);
        $this->addColumn('source', 'Source', 'LONGVARCHAR', false, null, null);
        $this->addColumn('content', 'Content', 'LONGVARCHAR', false, null, null);
        $this->addColumn('datetime', 'Datetime', 'VARCHAR', false, 50, null);
        $this->addColumn('url', 'Url', 'LONGVARCHAR', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? VgArticleRuTableMap::CLASS_DEFAULT : VgArticleRuTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (VgArticleRu object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = VgArticleRuTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = VgArticleRuTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + VgArticleRuTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = VgArticleRuTableMap::OM_CLASS;
            /** @var VgArticleRu $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            VgArticleRuTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = VgArticleRuTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = VgArticleRuTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var VgArticleRu $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                VgArticleRuTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(VgArticleRuTableMap::COL_ID);
            $criteria->addSelectColumn(VgArticleRuTableMap::COL_TITLE);
            $criteria->addSelectColumn(VgArticleRuTableMap::COL_SUBTITLE);
            $criteria->addSelectColumn(VgArticleRuTableMap::COL_SOURCE);
            $criteria->addSelectColumn(VgArticleRuTableMap::COL_CONTENT);
            $criteria->addSelectColumn(VgArticleRuTableMap::COL_DATETIME);
            $criteria->addSelectColumn(VgArticleRuTableMap::COL_URL);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.title');
            $criteria->addSelectColumn($alias . '.subtitle');
            $criteria->addSelectColumn($alias . '.source');
            $criteria->addSelectColumn($alias . '.content');
            $criteria->addSelectColumn($alias . '.datetime');
            $criteria->addSelectColumn($alias . '.url');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(VgArticleRuTableMap::DATABASE_NAME)->getTable(VgArticleRuTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(VgArticleRuTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(VgArticleRuTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new VgArticleRuTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a VgArticleRu or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or VgArticleRu object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(VgArticleRuTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \orm\orm\VgArticleRu) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(VgArticleRuTableMap::DATABASE_NAME);
            $criteria->add(VgArticleRuTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = VgArticleRuQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            VgArticleRuTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                VgArticleRuTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the vg_article_ru table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return VgArticleRuQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a VgArticleRu or Criteria object.
     *
     * @param mixed               $criteria Criteria or VgArticleRu object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(VgArticleRuTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from VgArticleRu object
        }

        if ($criteria->containsKey(VgArticleRuTableMap::COL_ID) && $criteria->keyContainsValue(VgArticleRuTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.VgArticleRuTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = VgArticleRuQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // VgArticleRuTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
VgArticleRuTableMap::buildTableMap();
