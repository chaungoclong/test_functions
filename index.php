<?php

require_once 'crawl.php';

//crawlOneChapter('https://toptruyen.net/truyen-tranh/trong-sinh-ta-la-dai-thien-than/chapter-198/573069');
//var_dump(getListChapterUrl('https://toptruyen.net/truyen-tranh/dinh-cap-khi-van-lang-le-tu-luyen-ngan-nam/9236'));
//crawlOneComic('https://toptruyen.net/truyen-tranh/dinh-cap-khi-van-lang-le-tu-luyen-ngan-nam/9236');
//var_dump(getListComicUrl('https://www.toptruyen.net/?page=2'));
//crawlOnePage('https://www.toptruyen.net/?page=2');
$crawler = new Crawler('/home/long/Documents/data_truyen');
$crawler->crawlAllPage(100);