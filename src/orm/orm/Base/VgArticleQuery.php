<?php

namespace orm\orm\Base;

use \Exception;
use \PDO;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;
use orm\orm\VgArticle as ChildVgArticle;
use orm\orm\VgArticleQuery as ChildVgArticleQuery;
use orm\orm\Map\VgArticleTableMap;

/**
 * Base class that represents a query for the 'vg_article' table.
 *
 *
 *
 * @method     ChildVgArticleQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildVgArticleQuery orderBySlug($order = Criteria::ASC) Order by the slug column
 * @method     ChildVgArticleQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildVgArticleQuery orderBySubtitle($order = Criteria::ASC) Order by the subtitle column
 * @method     ChildVgArticleQuery orderBySource($order = Criteria::ASC) Order by the source column
 * @method     ChildVgArticleQuery orderByContent($order = Criteria::ASC) Order by the content column
 * @method     ChildVgArticleQuery orderByJson_translateRU($order = Criteria::ASC) Order by the json_translateRU column
 * @method     ChildVgArticleQuery orderByDatetime($order = Criteria::ASC) Order by the datetime column
 * @method     ChildVgArticleQuery orderByUrl($order = Criteria::ASC) Order by the url column
 * @method     ChildVgArticleQuery orderByTranslated($order = Criteria::ASC) Order by the translated column
 *
 * @method     ChildVgArticleQuery groupById() Group by the id column
 * @method     ChildVgArticleQuery groupBySlug() Group by the slug column
 * @method     ChildVgArticleQuery groupByTitle() Group by the title column
 * @method     ChildVgArticleQuery groupBySubtitle() Group by the subtitle column
 * @method     ChildVgArticleQuery groupBySource() Group by the source column
 * @method     ChildVgArticleQuery groupByContent() Group by the content column
 * @method     ChildVgArticleQuery groupByJson_translateRU() Group by the json_translateRU column
 * @method     ChildVgArticleQuery groupByDatetime() Group by the datetime column
 * @method     ChildVgArticleQuery groupByUrl() Group by the url column
 * @method     ChildVgArticleQuery groupByTranslated() Group by the translated column
 *
 * @method     ChildVgArticleQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildVgArticleQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildVgArticleQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildVgArticleQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildVgArticleQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildVgArticleQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildVgArticle findOne(ConnectionInterface $con = null) Return the first ChildVgArticle matching the query
 * @method     ChildVgArticle findOneOrCreate(ConnectionInterface $con = null) Return the first ChildVgArticle matching the query, or a new ChildVgArticle object populated from the query conditions when no match is found
 *
 * @method     ChildVgArticle findOneById(int $id) Return the first ChildVgArticle filtered by the id column
 * @method     ChildVgArticle findOneBySlug(string $slug) Return the first ChildVgArticle filtered by the slug column
 * @method     ChildVgArticle findOneByTitle(string $title) Return the first ChildVgArticle filtered by the title column
 * @method     ChildVgArticle findOneBySubtitle(string $subtitle) Return the first ChildVgArticle filtered by the subtitle column
 * @method     ChildVgArticle findOneBySource(string $source) Return the first ChildVgArticle filtered by the source column
 * @method     ChildVgArticle findOneByContent(string $content) Return the first ChildVgArticle filtered by the content column
 * @method     ChildVgArticle findOneByJson_translateRU(string $json_translateRU) Return the first ChildVgArticle filtered by the json_translateRU column
 * @method     ChildVgArticle findOneByDatetime(string $datetime) Return the first ChildVgArticle filtered by the datetime column
 * @method     ChildVgArticle findOneByUrl(string $url) Return the first ChildVgArticle filtered by the url column
 * @method     ChildVgArticle findOneByTranslated(boolean $translated) Return the first ChildVgArticle filtered by the translated column *

 * @method     ChildVgArticle requirePk($key, ConnectionInterface $con = null) Return the ChildVgArticle by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVgArticle requireOne(ConnectionInterface $con = null) Return the first ChildVgArticle matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildVgArticle requireOneById(int $id) Return the first ChildVgArticle filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVgArticle requireOneBySlug(string $slug) Return the first ChildVgArticle filtered by the slug column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVgArticle requireOneByTitle(string $title) Return the first ChildVgArticle filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVgArticle requireOneBySubtitle(string $subtitle) Return the first ChildVgArticle filtered by the subtitle column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVgArticle requireOneBySource(string $source) Return the first ChildVgArticle filtered by the source column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVgArticle requireOneByContent(string $content) Return the first ChildVgArticle filtered by the content column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVgArticle requireOneByJson_translateRU(string $json_translateRU) Return the first ChildVgArticle filtered by the json_translateRU column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVgArticle requireOneByDatetime(string $datetime) Return the first ChildVgArticle filtered by the datetime column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVgArticle requireOneByUrl(string $url) Return the first ChildVgArticle filtered by the url column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildVgArticle requireOneByTranslated(boolean $translated) Return the first ChildVgArticle filtered by the translated column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildVgArticle[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildVgArticle objects based on current ModelCriteria
 * @method     ChildVgArticle[]|ObjectCollection findById(int $id) Return ChildVgArticle objects filtered by the id column
 * @method     ChildVgArticle[]|ObjectCollection findBySlug(string $slug) Return ChildVgArticle objects filtered by the slug column
 * @method     ChildVgArticle[]|ObjectCollection findByTitle(string $title) Return ChildVgArticle objects filtered by the title column
 * @method     ChildVgArticle[]|ObjectCollection findBySubtitle(string $subtitle) Return ChildVgArticle objects filtered by the subtitle column
 * @method     ChildVgArticle[]|ObjectCollection findBySource(string $source) Return ChildVgArticle objects filtered by the source column
 * @method     ChildVgArticle[]|ObjectCollection findByContent(string $content) Return ChildVgArticle objects filtered by the content column
 * @method     ChildVgArticle[]|ObjectCollection findByJson_translateRU(string $json_translateRU) Return ChildVgArticle objects filtered by the json_translateRU column
 * @method     ChildVgArticle[]|ObjectCollection findByDatetime(string $datetime) Return ChildVgArticle objects filtered by the datetime column
 * @method     ChildVgArticle[]|ObjectCollection findByUrl(string $url) Return ChildVgArticle objects filtered by the url column
 * @method     ChildVgArticle[]|ObjectCollection findByTranslated(boolean $translated) Return ChildVgArticle objects filtered by the translated column
 * @method     ChildVgArticle[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class VgArticleQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \orm\orm\Base\VgArticleQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\orm\\orm\\VgArticle', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildVgArticleQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildVgArticleQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildVgArticleQuery) {
            return $criteria;
        }
        $query = new ChildVgArticleQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildVgArticle|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(VgArticleTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = VgArticleTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildVgArticle A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, slug, title, subtitle, source, content, json_translateRU, datetime, url, translated FROM vg_article WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildVgArticle $obj */
            $obj = new ChildVgArticle();
            $obj->hydrate($row);
            VgArticleTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildVgArticle|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildVgArticleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(VgArticleTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildVgArticleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(VgArticleTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVgArticleQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(VgArticleTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(VgArticleTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VgArticleTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the slug column
     *
     * Example usage:
     * <code>
     * $query->filterBySlug('fooValue');   // WHERE slug = 'fooValue'
     * $query->filterBySlug('%fooValue%', Criteria::LIKE); // WHERE slug LIKE '%fooValue%'
     * </code>
     *
     * @param     string $slug The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVgArticleQuery The current query, for fluid interface
     */
    public function filterBySlug($slug = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($slug)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VgArticleTableMap::COL_SLUG, $slug, $comparison);
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%', Criteria::LIKE); // WHERE title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $title The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVgArticleQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VgArticleTableMap::COL_TITLE, $title, $comparison);
    }

    /**
     * Filter the query on the subtitle column
     *
     * Example usage:
     * <code>
     * $query->filterBySubtitle('fooValue');   // WHERE subtitle = 'fooValue'
     * $query->filterBySubtitle('%fooValue%', Criteria::LIKE); // WHERE subtitle LIKE '%fooValue%'
     * </code>
     *
     * @param     string $subtitle The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVgArticleQuery The current query, for fluid interface
     */
    public function filterBySubtitle($subtitle = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($subtitle)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VgArticleTableMap::COL_SUBTITLE, $subtitle, $comparison);
    }

    /**
     * Filter the query on the source column
     *
     * Example usage:
     * <code>
     * $query->filterBySource('fooValue');   // WHERE source = 'fooValue'
     * $query->filterBySource('%fooValue%', Criteria::LIKE); // WHERE source LIKE '%fooValue%'
     * </code>
     *
     * @param     string $source The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVgArticleQuery The current query, for fluid interface
     */
    public function filterBySource($source = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($source)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VgArticleTableMap::COL_SOURCE, $source, $comparison);
    }

    /**
     * Filter the query on the content column
     *
     * Example usage:
     * <code>
     * $query->filterByContent('fooValue');   // WHERE content = 'fooValue'
     * $query->filterByContent('%fooValue%', Criteria::LIKE); // WHERE content LIKE '%fooValue%'
     * </code>
     *
     * @param     string $content The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVgArticleQuery The current query, for fluid interface
     */
    public function filterByContent($content = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($content)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VgArticleTableMap::COL_CONTENT, $content, $comparison);
    }

    /**
     * Filter the query on the json_translateRU column
     *
     * Example usage:
     * <code>
     * $query->filterByJson_translateRU('fooValue');   // WHERE json_translateRU = 'fooValue'
     * $query->filterByJson_translateRU('%fooValue%', Criteria::LIKE); // WHERE json_translateRU LIKE '%fooValue%'
     * </code>
     *
     * @param     string $json_translateRU The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVgArticleQuery The current query, for fluid interface
     */
    public function filterByJson_translateRU($json_translateRU = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($json_translateRU)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VgArticleTableMap::COL_JSON_TRANSLATERU, $json_translateRU, $comparison);
    }

    /**
     * Filter the query on the datetime column
     *
     * Example usage:
     * <code>
     * $query->filterByDatetime('fooValue');   // WHERE datetime = 'fooValue'
     * $query->filterByDatetime('%fooValue%', Criteria::LIKE); // WHERE datetime LIKE '%fooValue%'
     * </code>
     *
     * @param     string $datetime The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVgArticleQuery The current query, for fluid interface
     */
    public function filterByDatetime($datetime = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($datetime)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VgArticleTableMap::COL_DATETIME, $datetime, $comparison);
    }

    /**
     * Filter the query on the url column
     *
     * Example usage:
     * <code>
     * $query->filterByUrl('fooValue');   // WHERE url = 'fooValue'
     * $query->filterByUrl('%fooValue%', Criteria::LIKE); // WHERE url LIKE '%fooValue%'
     * </code>
     *
     * @param     string $url The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVgArticleQuery The current query, for fluid interface
     */
    public function filterByUrl($url = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($url)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VgArticleTableMap::COL_URL, $url, $comparison);
    }

    /**
     * Filter the query on the translated column
     *
     * Example usage:
     * <code>
     * $query->filterByTranslated(true); // WHERE translated = true
     * $query->filterByTranslated('yes'); // WHERE translated = true
     * </code>
     *
     * @param     boolean|string $translated The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildVgArticleQuery The current query, for fluid interface
     */
    public function filterByTranslated($translated = null, $comparison = null)
    {
        if (is_string($translated)) {
            $translated = in_array(strtolower($translated), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(VgArticleTableMap::COL_TRANSLATED, $translated, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildVgArticle $vgArticle Object to remove from the list of results
     *
     * @return $this|ChildVgArticleQuery The current query, for fluid interface
     */
    public function prune($vgArticle = null)
    {
        if ($vgArticle) {
            $this->addUsingAlias(VgArticleTableMap::COL_ID, $vgArticle->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the vg_article table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(VgArticleTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            VgArticleTableMap::clearInstancePool();
            VgArticleTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(VgArticleTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(VgArticleTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            VgArticleTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            VgArticleTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // VgArticleQuery
