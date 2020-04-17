<?php


class Config
{

    /**
     * @var DBConfig|null
     */
    private $dbc;

    /**
     * @var string
     */
    private $baseUrl;

    /**
     * @var string
     */
    private $defLang;

    /**
     * @var string
     */
    private $defController;

    /**
     * @var string
     */
    private $defTheme;

    /**
     * Config constructor.
     * @param DBConfig|null $dbc
     * @param $baseUrl
     */
    public function __construct(
        $baseUrl,
        $dbc = null,
        $defLang = 'en',
        $defController = 'pages',
        $defTheme = 'default'
    )
    {
        $this->dbc = $dbc;
        $this->baseUrl = $baseUrl;
        $this->defLang = $defLang;
        $this->defController = $defController;
        $this->defTheme = $defTheme;
    }


    /**
     * @return DBConfig
     */
    public function getDbc()
    {
        return $this->dbc;
    }

    /**
     * @return string
     */
    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

    /**
     * @return string
     */
    public function getDefLang()
    {
        return $this->defLang ?? 'en';
    }

    /**
     * @return string
     */
    public function getDefController()
    {
        return $this->defController;
    }

    /**
     * @return string
     */
    public function getDefTheme()
    {
        return $this->defTheme;
    }
}