<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */


if ( ! function_exists('video_type'))
{
    // Checks if a video is youtube, vimeo or any other
    function video_type($url) {
        if (strpos($url, 'youtube') > 0) {
            return 'youtube';
        } elseif (strpos($url, 'vimeo') > 0) {
            return 'vimeo';
        } else {
            return 'unknown';
        }
    }
}

if ( ! function_exists('get_vimeo_video_id'))
{
    // Checks if a video is youtube, vimeo or any other
    function get_vimeo_video_id($url) {
        return (int) substr(parse_url($url, PHP_URL_PATH), 1);
    }
}

if ( ! function_exists('get_video_extension'))
{
    // Checks if a video is youtube, vimeo or any other
    function get_video_extension($url) {
        if (strpos($url, '.mp4') > 0) {
            return 'mp4';
        } elseif (strpos($url, '.webm') > 0) {
            return 'webm';
        } else {
            return 'unknown';
        }
    }
}


// ------------------------------------------------------------------------
/* End of file common_helper.php */
/* Location: ./system/helpers/common_helper.php */
