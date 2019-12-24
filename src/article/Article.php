<?php

/**
 * Created by PhpStorm.
 * User: pavelkurskiy
 * Date: 09/11/2019
 * Time: 13:43
 */


namespace article;

use Exception;
use orm\orm\VgArticle;
use orm\orm\VgArticleRu;

class Article
{
    public $source;
    public $title;
    public $subtitle;
    public $content;
    public $datetime;
    public $url;
    public $exceptions;

    function __construct($url)
    {
        $this->url = $url;
        $this->exceptions = ["We use cookies", "By choosing I Accept", "FILED UNDER", "Filed under", "/t.co/"];
    }


    private function validateText($text)
    {
        $foundException = false;

        foreach ($this->exceptions as $exception) {
            if (strstr($text, $exception) != false || $text == "") {
                $foundException = true;
            }
        }

        return $foundException;
    }



    public function scrape($domName, $domTitle, $domSubtitle, $domDatetime, $domContent)
    {
        // create HTML DOM
        $html = file_get_html($this->url);

        $this->source = $html->find($domName, 0)->getAllAttributes()['content'];
        $this->title = $html->find($domTitle, 0)->innertext;
        $this->subtitle = $html->find($domSubtitle, 0)->innertext;
        try {
            if ($html->find($domDatetime, 0) == null) {
                throw new Exception();
            } else {
                $this->datetime = $html->find($domDatetime, 0)->getAllAttributes()['datetime'];
            }
        } catch (Exception $e) {
            error_log("Cant find datetime for $this->url");
            $this->datetime = "";
        }

        foreach ($html->find("p, img") as $element) {
            if (isset($element->src)) {
                $this->content[] .= $element;
            } elseif ($this->validateText($element->plaintext) == false) {
                $this->content[] = $element->plaintext;
            }
        }

        $this->content = serialize($this->content);;

        // clean up memory
        $html->clear();
        unset($html);
    }


    public function store()
    {
        $articleORM = new VgArticle();
        $articleORM->setTitle($this->title);
        $articleORM->setSubtitle($this->subtitle);


        $articleORM->setSource($this->source);
        $articleORM->setContent($this->content);
        $articleORM->setDatetime($this->datetime);
        $articleORM->setUrl($this->url);

        $articleORM->save();
    }

    public function storeRU()
    {
        $articleORM = new VgArticleRu();
        $articleORM->setTitle($this->title);
        $articleORM->setSubtitle($this->subtitle);


        $articleORM->setSource($this->source);
        $articleORM->setContent($this->content);
        $articleORM->setDatetime($this->datetime);
        $articleORM->setUrl($this->url);

        $articleORM->save();
    }
}