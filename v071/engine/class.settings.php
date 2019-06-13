<?php


class settings {

    /**
     * Text labels
     * @var array
     */
    protected $labels = [];

    /**
     * System settings
     * @var array
     */
    protected $settings = [];

    /**
     * Default data
     * @var array
     */
    protected $defdata = [];


    /**
     * @return array
     */
    public function getLabels()
    {
        return $this->labels;
    }

    /**
     * @return array
     */
    public function getSettings()
    {
        return $this->settings;
    }

    /**
     * @return array
     */
    public function getDefdata()
    {
        return $this->defdata;
    }




}