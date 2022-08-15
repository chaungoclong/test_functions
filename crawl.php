<?php

class Crawler
{
    public string $rootFolder;

    public function __construct(string $rootFolder)
    {
        $this->rootFolder = $rootFolder;
    }

    public function crawlOneChapter($chapterUrl): bool
    {
        $chapterUrlExploded = explode('/', $chapterUrl);
        $comicCategory      = array_slice($chapterUrlExploded, -4, 1)[0];
        $comicName          = array_slice($chapterUrlExploded, -3, 1)[0];
        $chapterName        = array_slice($chapterUrlExploded, -2, 1)[0];

        $baseUrl = $this->rootFolder . DIRECTORY_SEPARATOR . $comicCategory . DIRECTORY_SEPARATOR . $comicName
                   . DIRECTORY_SEPARATOR . $chapterName;
        if (!is_dir($baseUrl)) {
            $created = mkdir($baseUrl, 0755, true);
            if (!$created) {
                return false;
            }
        }

        $ch = curl_init();
        // set url
        curl_setopt($ch, CURLOPT_URL, $chapterUrl);

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $html = curl_exec($ch);

        // close curl resource to free up system resources
        curl_close($ch);

        $dom = new DOMDocument();

        @$dom->loadHTML($html);

        $xpath = new DOMXPath($dom);

        $tags = $xpath->query("//div[@class='page-chapter']/img");
        foreach ($tags as $key => $tag) {
            $url       = $tag->getAttribute('src');
            $extension = explode('?', pathinfo($url)['extension'])[0];
            $fileName  = 'img_' . time() . $key . '.' . $extension;
            $filePath  = $baseUrl . DIRECTORY_SEPARATOR . $fileName;
            echo $filePath . '\n';

            $ch = curl_init($url);
            $fp = fopen($filePath, 'wb');
            curl_setopt($ch, CURLOPT_FILE, $fp);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_exec($ch);
            curl_close($ch);
            fclose($fp);
        }

        return true;
    }

    public function crawlOneComic($comicUrl): void
    {
        $urlChapters = $this->getListChapterUrl($comicUrl);
        foreach ($urlChapters as $urlChapter) {
            $this->crawlOneChapter($urlChapter);
        }
    }

    public function getListChapterUrl($comicUrl): array
    {
        $ch = curl_init();
        // set url
        curl_setopt($ch, CURLOPT_URL, $comicUrl);

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $html = curl_exec($ch);

        // close curl resource to free up system resources
        curl_close($ch);

        $dom = new DOMDocument();

        @$dom->loadHTML($html);

        $xpath = new DOMXPath($dom);

        $tags = $xpath->query("//*[@id='list-chapter-dt']/nav/ul/li/div[1]/a");

        $urlChapters = [];
        foreach ($tags as $tag) {
            $urlChapters[] = $tag->getAttribute('href');
        }

        return $urlChapters;
    }

    public function crawlOnePage($pageUrl)
    {
        $urlComics = $this->getListComicUrl($pageUrl);
        foreach ($urlComics as $urlComic) {
            $this->crawlOneComic($urlComic);
        }
    }

    public function getListComicUrl($pageUrl): array
    {
        $ch = curl_init();
        // set url
        curl_setopt($ch, CURLOPT_URL, $pageUrl);

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $html = curl_exec($ch);

        // close curl resource to free up system resources
        curl_close($ch);

        $dom = new DOMDocument();

        @$dom->loadHTML($html);

        $xpath = new DOMXPath($dom);

        $tags = $xpath->query("//div[@class='item-manga']//div[@class='item']//div[@class='image-item']/a");

        $urlComics = [];
        foreach ($tags as $tag) {
            $urlComics[] = $tag->getAttribute('href');
        }

        return $urlComics;
    }

    public function crawlAllPage(int $pageNumber = 1): void
    {
        for ($i = 1; $i <= $pageNumber; $i++) {
            $pageUrl = "https://www.toptruyen.net/?page=$i";
            $this->crawlOnePage($pageUrl);
        }
    }
}