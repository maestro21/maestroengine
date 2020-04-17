<?php


class TrendsController extends Controller
{

    /**
     * @return TrendsRepository
     */
    public function repo()
    {
        return parent::repo();
    }

    public function getCountries() {
        return [
            'RU' => 'MSK',
            'US' => 'MST',
            'GB' => 'GMT',
            'DE' => 'CEST',
        ];
    }

    public function markAsReadAction() {
        $this->repo()->markAsRead();
        echo 'done';
    }

    public function listAction() {
        $country = get('c', 'RU');
        echo $this->tpl('list', ['data' => $this->repo()->list($country), 'country' => $country, 'countries' => $this->getCountries()]);
    }

    public function importAction() {
        foreach($this->getCountries() as $country => $tz) {
            $feeds = array(
                "https://trends.google.com/trends/trendingsearches/daily/rss?geo=$country",
            );

            //Read each feed's items
            $entries = array();
            foreach ($feeds as $feed) {
                $xml = simplexml_load_string(str_replace('ht:', '', file_get_contents($feed)));
                $entries = array_merge($entries, $xml->xpath("//item"));
            }


            foreach ($entries as $entry) {
                $entry = (array)$entry;
                /** @var TrendsModel $oEntry */
                $oEntry = $this->repo()->findExisting($entry['title'], $entry['pubDate'],$country);
                $traffic = $this->processTraffic($entry['approx_traffic']);
                $time = oTime($entry['pubDate']);

                if (!$oEntry) {
                    $oEntry = new TrendsModel();
                    $oEntry
                        ->setName($entry['title'])
                        ->setPicture($entry['picture'])
                        ->setNews($this->processNews($entry['news_item']))
                        ->setTraffic($traffic)
                        ->addHistory($time->getTimestamp(), $traffic)
                        ->setLink($entry['link'])
                        ->setTime($time)
                        ->setCountry($country)
                        ->setNew(true);
                    $this->repo()->save($oEntry);
                } else {
                    $update = false;
                    if ($oEntry->getTraffic() != $traffic) {
                        if(empty($oEntry->getTrafficHistory())) {
                            $oEntry->addHistory($oEntry->getTime()->getTimestamp(),$oEntry->getTraffic());
                        }
                        $time = date("H:00");
                        $date = strtotime($time);
                        $time = oTime($date);
                        $oEntry->addHistory($time->getTimestamp(), $traffic);
                        $oEntry->setTraffic($traffic);
                        $update = true;
                    }

                    $newslist = $this->processNews($entry['news_item']);
                    $oNewslist = $oEntry->getNews();
                    if($oNewslist && is_array($newslist)) {
                        foreach ($newslist as $news) {
                            if (!$this->findNews($oNewslist, $news)) {
                                $oNewslist[] = $news;
                                $update = true;
                            }
                        }
                    }
                    if($oEntry->getPicture() != $entry['picture']) {
                        $oEntry->setPicture($entry['picture']);
                        $update = true;
                    }

                    if ($update) {
                       $oEntry->setNew(true);
                       $this->repo()->save($oEntry);
                    }
                }
            }
        }
    }


    private function processTraffic($string) {
        return str_replace([',', '+'],'', $string);
    }

    function findNews(array $data, TrendNewsModel $news){
        /** @var $row TrendNewsModel */
        foreach($data as $row) {
            if($news->getUrl() == $row->getUrl()) {
                return true;
            }
        }
    }

    function processNews($data) {
        if(!is_array($data)) return null;
        $return = [];
        foreach($data as $row) {
            $row = (array)$row;
            $return[] = new TrendNewsModel(
                $row['news_item_url'],
                $row['news_item_title'],
                $row['news_item_snippet'],
                $row['news_item_source']
            );
        }
        return $return;
    }
}