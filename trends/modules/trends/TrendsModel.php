<?php

/**
 * Class TrendsModel
 * @pk ai
 */
class TrendsModel extends Model
{

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $country;

    /**
     * News previews. Not to mess with real news
     * @var TrendNewsModel[]
     * @dbtype array
     */
    private $news;

    /**
     * @var int
     */
    private $traffic;

    /**
     * @var string
     */
    private $picture;

    /**
     * @var Time
     */
    private $time;

    /**
     * @var bool
     * @dbtype bool
     */
    private $new;

    /**
     * @var string
     */
    private $link;

    /**
     * @var array
     */
    private $trafficHistory;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this;
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }


    /**
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param string $link
     * @return $this;
     */
    public function setLink($link)
    {
        $this->link = $link;
        return $this;
    }

    /**
     * @return array
     */
    public function getNews()
    {
        return $this->news;
    }

    /**
     * @param array|null $news
     * @return $this;
     */
    public function setNews($news)
    {
        $this->news = $news;
        return $this;
    }

    /**
     * @return string
     */
    public function getTraffic()
    {
        return $this->traffic;
    }

    /**
     * @param string $traffic
     * @return $this;
     */
    public function setTraffic($traffic)
    {
        $this->traffic = $traffic;
        return $this;
    }

    /**
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @param string $picture
     * @return $this
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
        return $this;
    }

    /**
     * @return Time
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param Time $time
     * @return $this;
     */
    public function setTime($time)
    {
        $this->time = $time;
        return $this;
    }

    /**
     * @return bool
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * @param bool $new
     * @return $this;
     */
    public function setNew($new)
    {
        $this->new = $new;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     * @return $this
     */
    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return array
     */
    public function getTrafficHistory()
    {
        return $this->trafficHistory;
    }

    /**
     * @param array $trafficHistory
     * @return $this
     */
    public function setTrafficHistory($trafficHistory)
    {
        $this->trafficHistory = $trafficHistory;
        return $this;
    }

    /**
     * @param $key
     * @param $value
     * @return $this
     */
    public function addHistory($key, $value) { echo $key . ' ' . $value;
        if(!$this->trafficHistory) $this->trafficHistory = [];
        if(!is_array($this->trafficHistory)) $this->trafficHistory = unserialize($this->trafficHistory);
        $this->trafficHistory[$key] = $value;
        return $this;
    }

    /**
     * @param string $d
     * @return string
     */
    public function getTrafficHistoryFormatted($d = "\n") {
        $return = [];
        if(is_array($this->trafficHistory)) {
            foreach($this->trafficHistory as $k => $v) {
                //if($v == $this->getTraffic()) continue;
                $k = oTime($k)->getTime();
                $v = fnum($v) . "+";
                $return[] .= "$k : $v";
            }
        }
        $return = implode($d, $return);
        return $return;
    }

}