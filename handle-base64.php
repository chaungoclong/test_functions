<?php


$html = file_get_contents('html.txt');

var_dump(uploadImagesContainedInHtmlString($html, '/home/long/Documents/test2/img'));

/**
 * @param $html
 * @param $path
 *
 * @return string
 */
function uploadImagesContainedInHtmlString($html, $path)
{
    $doc = new DOMDocument();
    $doc->loadHTML($html);
    $tags = $doc->getElementsByTagName('img');

    $filePaths = [];
    $newHtml   = '';
    foreach ($tags as $tag) {
        $base64       = $tag->getAttribute('src');
        $imagePath    = $path . '/' . md5(time());
        $createResult = base64ToImage($base64, $imagePath);
        if ($createResult !== false) {
//            $filePaths[] = $createResult;
            $tag->setAttribute('src', $createResult);
        }
    }

    preg_match("/<body[^>]*>(.*?)<\/body>/is", $doc->saveHTML(), $matches);

    return $matches[1];
}

/**
 * @param $base64
 * @param $imagePath
 *
 * @return bool|string
 */
function base64ToImage($base64, $imagePath)
{
    $data = explode(',', $base64);
    // Get image extension
    $mediaType      = explode(';', $data[0])[0];
    $imageExtension = explode('/', $mediaType)[1];
    $imagePath      .= '.' . $imageExtension;
    // Create directory if not exist
    $imagePathExploded = explode(DIRECTORY_SEPARATOR, $imagePath);
    array_pop($imagePathExploded);
    $directoryPathOnly = implode(DIRECTORY_SEPARATOR, $imagePathExploded);
    if (!is_dir($directoryPathOnly)) {
        $isMakeSuccess = mkdir($directoryPathOnly, 0755, true);
        if (!$isMakeSuccess) {
            return false;
        }
    }
    // Create new image
    file_put_contents($imagePath, base64_decode($data[1]));

    return $imagePath;
}
