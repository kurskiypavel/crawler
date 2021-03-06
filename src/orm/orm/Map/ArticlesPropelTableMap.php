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
use orm\orm\ArticlesPropel;
use orm\orm\ArticlesPropelQuery;


/**
 * This class defines the structure of the 'articles' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class ArticlesPropelTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'orm.orm.Map.ArticlesPropelTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'articles';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\orm\\orm\\ArticlesPropel';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'orm.orm.ArticlesPropel';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 11;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 11;

    /**
     * the column name for the id field
     */
    const COL_ID = 'articles.id';

    /**
     * the column name for the slug field
     */
    const COL_SLUG = 'articles.slug';

    /**
     * the column name for the title field
     */
    const COL_TITLE = 'articles.title';

    /**
     * the column name for the subtitle field
     */
    const COL_SUBTITLE = 'articles.subtitle';

    /**
     * the column name for the source field
     */
    const COL_SOURCE = 'articles.source';

    /**
     * the column name for the content field
     */
    const COL_CONTENT = 'articles.content';

    /**
     * the column name for the rawhtml field
     */
    const COL_RAWHTML = 'articles.rawhtml';

    /**
     * the column name for the json_translateRU field
     */
    const COL_JSON_TRANSLATERU = 'articles.json_translateRU';

    /**
     * the column name for the datetime field
     */
    const COL_DATETIME = 'articles.datetime';

    /**
     * the column name for the url field
     */
    const COL_URL = 'articles.url';

    /**
     * the column name for the translated field
     */
    const COL_TRANSLATED = 'articles.translated';

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
        self::TYPE_PHPNAME       => array('Id', 'Slug', 'Title', 'Subtitle', 'Source', 'Content', 'Rawhtml', 'Json_translateRU', 'Datetime', 'Url', 'Translated', ),
        self::TYPE_CAMELNAME     => array('id', 'slug', 'title', 'subtitle', 'source', 'content', 'rawhtml', 'json_translateRU', 'datetime', 'url', 'translated', ),
        self::TYPE_COLNAME       => array(ArticlesPropelTableMap::COL_ID, ArticlesPropelTableMap::COL_SLUG, ArticlesPropelTableMap::COL_TITLE, ArticlesPropelTableMap::COL_SUBTITLE, ArticlesPropelTableMap::COL_SOURCE, ArticlesPropelTableMap::COL_CONTENT, ArticlesPropelTableMap::COL_RAWHTML, ArticlesPropelTableMap::COL_JSON_TRANSLATERU, ArticlesPropelTableMap::COL_DATETIME, ArticlesPropelTableMap::COL_URL, ArticlesPropelTableMap::COL_TRANSLATED, ),
        self::TYPE_FIELDNAME     => array('id', 'slug', 'title', 'subtitle', 'source', 'content', 'rawhtml', 'json_translateRU', 'datetime', 'url', 'translated', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Slug' => 1, 'Title' => 2, 'Subtitle' => 3, 'Source' => 4, 'Content' => 5, 'Rawhtml' => 6, 'Json_translateRU' => 7, 'Datetime' => 8, 'Url' => 9, 'Translated' => 10, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'slug' => 1, 'title' => 2, 'subtitle' => 3, 'source' => 4, 'content' => 5, 'rawhtml' => 6, 'json_translateRU' => 7, 'datetime' => 8, 'url' => 9, 'translated' => 10, ),
        self::TYPE_COLNAME       => array(ArticlesPropelTableMap::COL_ID => 0, ArticlesPropelTableMap::COL_SLUG => 1, ArticlesPropelTableMap::COL_TITLE => 2, ArticlesPropelTableMap::COL_SUBTITLE => 3, ArticlesPropelTableMap::COL_SOURCE => 4, ArticlesPropelTableMap::COL_CONTENT => 5, ArticlesPropelTableMap::COL_RAWHTML => 6, ArticlesPropelTableMap::COL_JSON_TRANSLATERU => 7, ArticlesPropelTableMap::COL_DATETIME => 8, ArticlesPropelTableMap::COL_URL => 9, ArticlesPropelTableMap::COL_TRANSLATED => 10, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'slug' => 1, 'title' => 2, 'subtitle' => 3, 'source' => 4, 'content' => 5, 'rawhtml' => 6, 'json_translateRU' => 7, 'datetime' => 8, 'url' => 9, 'translated' => 10, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
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
        $this->setName('articles');
        $this->setPhpName('ArticlesPropel');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\orm\\orm\\ArticlesPropel');
        $this->setPackage('orm.orm');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('slug', 'Slug', 'LONGVARCHAR', false, null, null);
        $this->addColumn('title', 'Title', 'LONGVARCHAR', false, null, null);
        $this->addColumn('subtitle', 'Subtitle', 'LONGVARCHAR', false, null, null);
        $this->addColumn('source', 'Source', 'LONGVARCHAR', false, null, null);
        $this->addColumn('content', 'Content', 'LONGVARCHAR', false, null, null);
        $this->addColumn('rawhtml', 'Rawhtml', 'LONGVARCHAR', false, null, null);
        $this->addColumn('json_translateRU', 'Json_translateRU', 'LONGVARCHAR', false, null, null);
        $this->addColumn('datetime', 'Datetime', 'VARCHAR', false, 50, null);
        $this->addColumn('url', 'Url', 'LONGVARCHAR', false, null, null);
        $this->addColumn('translated', 'Translated', 'BOOLEAN', false, 1, null);
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
        return $withPrefix ? ArticlesPropelTableMap::CLASS_DEFAULT : ArticlesPropelTableMap::OM_CLASS;
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
     * @return array           (ArticlesPropel object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = ArticlesPropelTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ArticlesPropelTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ArticlesPropelTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ArticlesPropelTableMap::OM_CLASS;
            /** @var ArticlesPropel $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ArticlesPropelTableMap::addInstanceToPool($obj, $key);
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
            $key = ArticlesPropelTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ArticlesPropelTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var ArticlesPropel $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ArticlesPropelTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(ArticlesPropelTableMap::COL_ID);
            $criteria->addSelectColumn(ArticlesPropelTableMap::COL_SLUG);
            $criteria->addSelectColumn(ArticlesPropelTableMap::COL_TITLE);
            $criteria->addSelectColumn(ArticlesPropelTableMap::COL_SUBTITLE);
            $criteria->addSelectColumn(ArticlesPropelTableMap::COL_SOURCE);
            $criteria->addSelectColumn(ArticlesPropelTableMap::COL_CONTENT);
            $criteria->addSelectColumn(ArticlesPropelTableMap::COL_RAWHTML);
            $criteria->addSelectColumn(ArticlesPropelTableMap::COL_JSON_TRANSLATERU);
            $criteria->addSelectColumn(ArticlesPropelTableMap::COL_DATETIME);
            $criteria->addSelectColumn(ArticlesPropelTableMap::COL_URL);
            $criteria->addSelectColumn(ArticlesPropelTableMap::COL_TRANSLATED);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.slug');
            $criteria->addSelectColumn($alias . '.title');
            $criteria->addSelectColumn($alias . '.subtitle');
            $criteria->addSelectColumn($alias . '.source');
            $criteria->addSelectColumn($alias . '.content');
            $criteria->addSelectColumn($alias . '.rawhtml');
            $criteria->addSelectColumn($alias . '.json_translateRU');
            $criteria->addSelectColumn($alias . '.datetime');
            $criteria->addSelectColumn($alias . '.url');
            $criteria->addSelectColumn($alias . '.translated');
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
        return Propel::getServiceContainer()->getDatabaseMap(ArticlesPropelTableMap::DATABASE_NAME)->getTable(ArticlesPropelTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(ArticlesPropelTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(ArticlesPropelTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new ArticlesPropelTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a ArticlesPropel or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or ArticlesPropel object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(ArticlesPropelTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \orm\orm\ArticlesPropel) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ArticlesPropelTableMap::DATABASE_NAME);
            $criteria->add(ArticlesPropelTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = ArticlesPropelQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ArticlesPropelTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ArticlesPropelTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the articles table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return ArticlesPropelQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a ArticlesPropel or Criteria object.
     *
     * @param mixed               $criteria Criteria or ArticlesPropel object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ArticlesPropelTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from ArticlesPropel object
        }

        if ($criteria->containsKey(ArticlesPropelTableMap::COL_ID) && $criteria->keyContainsValue(ArticlesPropelTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ArticlesPropelTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = ArticlesPropelQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // ArticlesPropelTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
ArticlesPropelTableMap::buildTableMap();
