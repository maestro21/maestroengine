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
     * News previews. Not to mess with real news
     * @var TrendNewsModel[]
     * @dbtype array
     */
    private $news;

    /**
     * @var string
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

}