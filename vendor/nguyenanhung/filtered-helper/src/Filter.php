<?php
/**
 * Project filtered-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 08/07/2022
 * Time: 15:49
 */

namespace nguyenanhung\Libraries\Filtered;

use nguyenanhung\Libraries\DateAndTime\DateAndTime;

/**
 * Class Filter
 *
 * @package   nguyenanhung\Libraries\Filtered
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
class Filter
{
    /**
     * Function filterInputDataIsArray
     *
     * @param array $inputData
     * @param array $requireData
     *
     * @return bool
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 2018-12-18 22:37
     *
     */
    public static function filterInputDataIsArray(array $inputData = array(), array $requireData = array()): bool
    {
        if (empty($inputData) || empty($requireData)) {
            return false;
        }
        if (count($requireData) <= 0 || count($inputData) <= 0) {
            return false;
        }
        if (!is_array($requireData) || !is_array($inputData)) {
            return false;
        }
        foreach ($requireData as $params) {
            if (!array_key_exists($params, $inputData)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Function filterRequireInputDataIsNull
     *
     * @param array $inputData
     * @param array $requireData
     *
     * @return bool
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 2/11/20 22:06
     */
    public static function filterRequireInputDataIsNull(array $inputData = array(), array $requireData = array()): bool
    {
        if (empty($inputData) || empty($requireData)) {
            return false;
        }
        if (count($requireData) <= 0 || count($inputData) <= 0) {
            return false;
        }
        if (!is_array($requireData) || !is_array($inputData)) {
            return false;
        }
        foreach ($requireData as $params) {
            if (!array_key_exists($params, $inputData)) {
                return false;
            }

            if ($inputData[$params] === null) {
                return false;
            }
        }

        return true;
    }

    /**
     * Function filterRequireInputDataIsEmpty
     *
     * @param array $inputData
     * @param array $requireData
     *
     * @return bool
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 2/11/20 22:28
     */
    public static function filterRequireInputDataIsEmpty(array $inputData = array(), array $requireData = array()): bool
    {
        if (empty($inputData) || empty($requireData)) {
            return false;
        }
        if (count($requireData) <= 0 || count($inputData) <= 0) {
            return false;
        }
        if (!is_array($requireData) || !is_array($inputData)) {
            return false;
        }
        foreach ($requireData as $params) {
            if (!array_key_exists($params, $inputData)) {
                return false;
            }

            if (empty($inputData[$params])) {
                return false;
            }
        }

        return true;
    }

    /**
     * Function filterInputDataIsNull
     *
     * @param array $inputData
     *
     * @return bool
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 2019-07-11 10:27
     *
     */
    public static function filterInputDataIsNull(array $inputData = array()): bool
    {
        foreach ($inputData as $item) {
            if ($item === null) {
                return true;
            }
        }

        return false;
    }

    /**
     * Function filterDate
     *
     * @param string $inputDate
     *
     * @return array
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 2018-12-18 23:39
     *
     */
    public static function filterDate(string $inputDate = ''): array
    {
        return DateAndTime::filterDate($inputDate);
    }
}
