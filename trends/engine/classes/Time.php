<?php


class Time
{

    private $dateTime;


    public function __construct($src = 'now')
    {
        $this->dateTime = new DateTime();
        $this->set($src);
    }


    /**
     * @param mixed $src
     * @return $this
     */
    public function set($src = 'now') {

        if($src instanceof DateTime) {
            $this->dateTime = $src;
        }

        if(is_string($src)) {
            try {
                $dateTime = new DateTime($src);
                $this->dateTime = $dateTime;
                return $this;
            } catch (Exception $e) {}
        }


        if(isValidTimeStamp($src)) {
            $this->dateTime->setTimestamp($src);
            return $this;
        }

        return $this;
    }

    public function getTimestamp() {
        return $this->dateTime->getTimestamp();
    }

    public function getTimezone() {
        return $this->dateTime->getTimezone();
    }

    public function setTimezone($timezone) {
        $this->dateTime->setTimezone(timezone_open($timezone));
        return $this;
    }

    public function getTime() {
        return $this->dateTime->format('G:i');
    }

    public function getDate() {
        return $this->dateTime->format('d M Y, D');
    }

    public function getDateTime(){
        return $this->dateTime->format('d M Y, D G:i P');
    }

    public function setUTC() {
        $this->setTimezone("UTC");
        return $this;
    }

    public function setMyTimeZone() {

    }

    public function getSqlFormat() {
        $this->setUTC();
        return $this->dateTime->format('Y-m-d H:i:s');
    }
}


function oTime($t = 'now') {
    return new Time($t);
}