<?php
namespace FRD\FrdInlineRelationBug\UserFunc;


class EntityTitleUserFunc
{

    /**
     * logs the generated titles based on the submitted entity table
     *
     * @var int
     */
    static $titleLog = [];

    /**
     * counts method calls based on the submitted entity table
     *
     * @var int
     */
    static $callCount = [];

    /**
     * @param array $params
     */
    public function getStoreTitle(array &$params)
    {
        $table = $params['table'];

        $row = $params['row'];
        $uid = (int)$row['uid'];
        if ($uid) {
            $title = $row['title'];

            static::increaseMethodCallCount($table);
            static::storeTitleInLog($table, $uid, $title);

            self::writeLog();
        }

        $params['title'] = $title;
    }

    /**
     * @param string $table
     * @param int $uid
     * @param string $title
     */
    protected static function storeTitleInLog(string $table, int $uid, string $title)
    {
        if ($uid && $table) {
            if (isset(static::$titleLog[$table][$uid][$title])) {
                static::$titleLog[$table][$uid][$title]++;
            } else {
                static::$titleLog[$table][$uid][$title] = 1;
            }
        }
    }

    /**
     * @param string $table
     */
    protected static function increaseMethodCallCount(string $table)
    {
        if (!empty($table)) {
            if (isset(static::$callCount[$table])) {
                // increase callCount for this entity
                static::$callCount[$table]++;
            } else {
                // first call set callCount to 1
                static::$callCount[$table] = 1;
            }
        }
    }

    /**
     *
     */
    private static function writeLog()
    {
        $logData = print_r(static::$callCount, true);
        $logData .= "\n\n =====================\n\n";
        $logData .= print_r(static::$titleLog, true);

        file_put_contents(PATH_site . 'typo3temp' . '/log.txt', $logData);
    }
}
