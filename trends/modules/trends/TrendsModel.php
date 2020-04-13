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
    private $title;


    /**
     * News previews. Not to mess with real news
     * @var array
     * @dbtype text
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
     * @var \DateTime
     * @dbtype time
     */
    private $time;

    /**
     * @var bool
     * @dbtype bool
     */
    private $new;

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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return $this;
     */
    public function setTitle($title)
    {
        $this->title = $title;
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
     * @param array $news
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
     * @return DateTime
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param DateTime $time
     */
    public function setTime($time)
    {
        $this->time = $time;
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
     */
    public function setNew($new)
    {
        $this->new = $new;
    }

}