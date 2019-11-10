<?php

/**
 * Created by PhpStorm.
 * User: pavelkurskiy
 * Date: 09/11/2019
 * Time: 13:43
 */


namespace article;

class Article
{
    public $source;
    public $title;
    public $subtitle;
    public $content;
    public $datetime;
    public $url;

    function __construct($url)
    {
        $this->url = $url;
    }

    public function scrape()
    {
        // create HTML DOM
        $html = file_get_html($this->url);

        $this->source = $html->find("meta[property='og:site_name']",0)->getAllAttributes()['content'];
        $this->title = $html->find('body h1', 0)->innertext;
        $this->subtitle = $html->find('.c-entry-summary.p-dek', 0)->innertext;
        $this->datetime = $html->find(".c-byline__item time",0)->getAllAttributes()['datetime'];

        foreach ($html->find('p') as $element) {
            if ($element->plaintext != "") {
                $this->content[] .= $element->plaintext;
            }
        }
        $this->content = json_encode($this->content);

        // clean up memory
        $html->clear();
        unset($html);
    }

    public function store(){

    }
}