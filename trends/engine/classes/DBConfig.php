<?php


class DBConfig
{

    private $dbHost;

    private $dbUsername;

    private $dbPass;

    private $dbName;

    private $dbType;

    private $dbPath;

    private $dbDumpPath;

    public function __construct($dbHost, $dbUsername, $dbPass, $dbName, $dbType, $dbPath = null, $dbDumpPath = null)
    {
        $this->dbHost = $dbHost;
        $this->dbUsername = $dbUsername;
        $this->dbPass = $dbPass;
        $this->dbName = $dbName;
        $this->dbType = $dbType;
        $this->dbPath = $dbPath;
        $this->dbDumpPath = $dbDumpPath;
    }

    /**
     * @return mixed
     */
    public function getDbHost()
    {
        return $this->dbHost;
    }

    /**
     * @return mixed
     */
    public function getDbUsername()
    {
        return $this->dbUsername;
    }

    /**
     * @return mixed
     */
    public function getDbPass()
    {
        return $this->dbPass;
    }

    /**
     * @return mixed
     */
    public function getDbName()
    {
        return $this->dbName;
    }

    /**
     * @return mixed
     */
    public function getDbType()
    {
        return $this->dbType;
    }

    /**
     * @return mixed
     */
    public function getDbPath()
    {
        return $this->dbPath;
    }

    /**
     * @return mixed
     */
    public function getDbDumpPath()
    {
        return $this->dbDumpPath;
    }

}


function dbc($dbHost, $dbUsername, $dbPass, $dbName, $dbType = '', $dbPath = null, $dbDumpPath = null) {
    return new DBConfig($dbHost, $dbUsername, $dbPass, $dbName, $dbType, $dbPath, $dbDumpPath);
}