<?php


class TrendsController extends Controller
{


    public function importAction() {

        $model = new TrendsModel();
        print_r($model->getFields());


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
            print_r($entry);
        }
    }
}