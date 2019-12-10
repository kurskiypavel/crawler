<?php
include_once('../../simple_html_dom.php');

function scraping_IMDB($url) {
    // create HTML DOM
    $html = file_get_html($url);

    // get title
//    $ret['p'] = $html->find('p', 0)->innertext;
    foreach ( $html->find('p') as $element ) {
        echo $element->plaintext . '<br>';
    }

    // get rating
//    $ret['Rating'] = $html->find('div[class="general rating"] b', 0)->innertext;

    // get overview
/*    foreach($html->find('div[class="info"]') as $div) {
        // skip user comments
        if($div->find('h5', 0)->innertext=='User Comments:')
            return $ret;

        $key = '';
        $val = '';

        foreach($div->find('*') as $node) {
            if ($node->tag=='h5')
                $key = $node->plaintext;

            if ($node->tag=='a' && $node->plaintext!='more')
                $val .= trim(str_replace("\n", '', $node->plaintext));

            if ($node->tag=='text')
                $val .= trim(str_replace("\n", '', $node->plaintext));
        }

        $ret[$key] = $val;
    }*/
    
    // clean up memory
    $html->clear();
    unset($html);

    return $ret;
}


// -----------------------------------------------------------------------------
// test it!
//$ret = scraping_IMDB('https://www.imdb.com/news/ni62679411?pf_rd_m=A2FGELUUNOQJNL&pf_rd_p=b688335a-3266-4b15-ab7b-ab8edbc4b1c4&pf_rd_r=GX3GHSJEEKP547JXZ78T&pf_rd_s=center-6&pf_rd_t=15061&pf_rd_i=homepage&ref_=hm_nw_tp1');
$ret = scraping_IMDB('https://www.theverge.com/2019/10/28/20936315/nasa-mars-insight-lander-heat-probe-mole-digging-failure');
foreach($ret as $k=>$v)
    echo '<strong>'.$k.' </strong>'.$v.'<br>';
?>