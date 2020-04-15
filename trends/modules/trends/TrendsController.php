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


    public function markAsReadAction() {
        $this->repo()->markAsRead();
        echo 'done';
    }

    public function listAction() {
        echo $this->tpl('list', ['data' => $this->repo()->list()]);
    }

    public function importAction() {
        $feeds = array(
            "https://trends.google.com/trends/trendingsearches/daily/rss?geo=US",
        );

        //Read each feed's items
        $entries = array();
        foreach($feeds as $feed) {
            $xml = simplexml_load_string(str_replace('ht:','',file_get_contents($feed)));
            $entries = array_merge($entries, $xml->xpath("//item"));
        }


        foreach($entries as $entry) {
            $entry = (array)$entry;
            /** @var TrendsModel $oEntry */
            $oEntry = $this->repo()->findByNameAndTime($entry['title'], $entry['pubDate']);
            if(!$oEntry) {
                $oEntry = new TrendsModel();
                $oEntry
                    ->setName($entry['title'])
                    ->setPicture($entry['picture'])
                    ->setNews($this->processNews($entry['news_item']))
                    ->setTraffic($entry['approx_traffic'])
                    ->setLink($entry['link'])
                    ->setTime(oTime($entry['pubDate']))
                    ->setNew(true);
                $this->repo()->save($oEntry);
            } else {
               $update = false;
               if($oEntry->getTraffic() != $entry['approx_traffic']) {
                   $update = true;
                   $oEntry->setTraffic($entry['approx_traffic']);
               }

               $newslist = $this->processNews($entry['news_item']);
               $oNewslist = $oEntry->getNews();
               foreach($newslist as $news) {
                   if(!$this->findNews($oNewslist, $news)) {
                       $oNewslist[] = $news;
                       $update = true;
                   }
               }

               if($update) {
                   $oEntry->setNew(true);
                   //$this->repo()->save($oEntry);
               }
            }
        }
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