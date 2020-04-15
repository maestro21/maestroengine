<?php


class ModelField
{

    /**
     * @var string
     */
    private $var;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     * annotation @dbtype
     * possible values: int, string, boo
     */
    private $dbType;

    /**
     * @var bool
     */
    private $nullable;

    /**
     * @var mixed
     */
    private $default;

    /**
     * @var string
     */
    private $widget;

    /**
     * @var bool
     */
    private $search;

    /**
     * @var bool
     */
    private $inTable;

    /**
     * ModelField constructor.
     * @param string $name
     * @param string $dbType
     * @param bool $nullable
     * @param mixed $default
     * @param string $widget
     * @param $search
     * @param bool $inTable
     */
    public function __construct($name = '', $var = DATA_STRING, $dbType = DATA_STRING, $nullable = true, $default = null, $widget = WIDGET_TEXT, $search = false, $inTable = true)
    {
        /* Backend */
        $this->name = (string)$name;
        $this->dbType = $dbType;
        $this->var = $var;
        $this->nullable = (bool)$nullable;
        $this->default = $default;
        /* Frontend */
        $this->widget = $widget;
        $this->search = (bool)$search;
        $this->inTable = (bool)$inTable;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDbType()
    {
        return $this->dbType ?? $this->var;
    }

    /**
     * @return bool
     */
    public function isNullable()
    {
        return $this->nullable;
    }

    /**
     * @return mixed
     */
    public function getDefault()
    {
        return $this->default;
    }


    /**
     * @return string
     */
    public function getWidget()
    {
        return $this->widget;
    }

    /**
     * @return bool
     */
    public function getSearch()
    {
        return $this->search;
    }

    /**
     * @return bool
     */
    public function isInTable()
    {
        return $this->inTable;
    }

    /**
     * @param string $name
     * @return $this;
     */
    public function setName($name)
    {
        $this->name = trim($name);
        return $this;
    }

    /**
     * @param string $dbType
     * @return $this;
     */
    public function setDbType($dbType)
    {
        $this->dbType = trim($dbType);
        return $this;
    }

    /**
     * @param bool $nullable
     * @return $this;
     */
    public function setNullable($nullable)
    {
        $this->nullable = $nullable;
        return $this;
    }

    /**
     * @param mixed $default
     * @return $this;
     */
    public function setDefault($default)
    {
        $this->default = $default;
        return $this;
    }

    /**
     * @param string $widget
     * @return $this;
     */
    public function setWidget($widget)
    {
        $this->widget = trim($widget);
        return $this;
    }

    /**
     * @param mixed $search
     * @return $this;
     */
    public function setSearch($search)
    {
        $this->search = $search;
        return $this;
    }

    /**
     * @param bool $inTable
     * @return $this;
     */
    public function setInTable($inTable)
    {
        $this->inTable = $inTable;
        return $this;
    }

    /**
     * @return string
     */
    public function getVar()
    {
        return $this->var;
    }

    /**
     * @param string $var
     * @return $this
     */
    public function setVar($var)
    {
        $this->var = $var;
        return $this;
    }


}