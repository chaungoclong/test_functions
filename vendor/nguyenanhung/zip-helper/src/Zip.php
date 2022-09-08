<?php
/**
 * Project zip-helpper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 09/23/2021
 * Time: 12:58
 */

namespace nguyenanhung\Libraries\Zip;

use Alchemy\Zippy\Zippy;
use Alchemy\Zippy\Archive\ArchiveInterface;

/**
 * Class Zip
 *
 * @package   nguyenanhung\Libraries\Zip
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
class Zip
{
    /** @var bool Status of Process */
    protected $status;

    /** @var string Response Message */
    protected $message;

    /**
     * @var string Zip or compress file
     */
    protected $filename;

    /**
     * @var string Folder to Extract file
     */
    protected $extractFolder;

    /**
     * @var array list Data to compress
     */
    protected $dataList;

    /**
     * Function setup
     *
     * @return \Alchemy\Zippy\Zippy
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/23/2021 00:45
     */
    public static function setup(): Zippy
    {
        return Zippy::load();
    }

    /**
     * Function isStatus
     *
     * @return bool
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/23/2021 18:55
     */
    public function isStatus(): bool
    {
        return $this->status;
    }

    /**
     * Function getMessage
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/23/2021 18:48
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * Function setFilename
     *
     * @param string $filename
     *
     * @return $this
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/23/2021 02:56
     */
    public function setFilename(string $filename = ''): Zip
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * Function getFilename
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/23/2021 03:06
     */
    public function getFilename(): string
    {
        return $this->filename;
    }

    /**
     * Function setExtractFolder
     *
     * @param string $extractFolder
     *
     * @return $this
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/23/2021 03:24
     */
    public function setExtractFolder(string $extractFolder = ''): Zip
    {
        $this->extractFolder = $extractFolder;

        return $this;
    }

    /**
     * Function getExtractFolder
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/23/2021 04:33
     */
    public function getExtractFolder(): string
    {
        return $this->extractFolder;
    }

    /**
     * Function getExtractFolderData
     *
     * @return array|bool
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/23/2021 11:06
     */
    public function getExtractFolderData()
    {
        return directory_map($this->extractFolder);
    }

    /**
     * Function setDataList
     *
     * @param array|string $dataList
     *
     * @return $this
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/23/2021 04:11
     */
    public function setDataList($dataList = array()): Zip
    {
        if (is_string($dataList)) {
            $dataList = array($dataList);
        }
        $this->dataList = $dataList;

        return $this;
    }

    /**
     * Function getDataList
     *
     * @return array
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/23/2021 04:37
     */
    public function getDataList(): array
    {
        return $this->dataList;
    }

    /**
     * Function zip
     *
     * @return \Alchemy\Zippy\Archive\ArchiveInterface
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/23/2021 15:09
     */
    public function zip(): ArchiveInterface
    {
        $zip = static::setup();

        return $zip->create($this->filename, $this->dataList);
    }

    /**
     * Function unzip
     *
     * @return \Alchemy\Zippy\Archive\ArchiveInterface
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/23/2021 16:15
     */
    public function unzip(): ArchiveInterface
    {
        $zip  = static::setup();
        $open = $zip->open($this->filename);

        return $open->extract($this->extractFolder);
    }
}
