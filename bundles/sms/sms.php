<?php
/**
 * sms_lib.php
 * @author   Mfawa Alfred Onen <muffycompoqm@gmail.com>
 * @link     http://maomuffy.com
 */
class Sms {

    private static $uri_data = array();
    private static $host;
    private static $path;
    private static $url;
    private static $result = '';

    public static function send($message, $destination, $sender = ''){
        $access_data = array(
            'UN' => Config::get('sms::config.username'),
            'p' => Config::get('sms::config.password'),
            'SA' => (!empty($sender))? $sender : Config::get('sms::config.sender'),
            'DA' => static::prep_gsm_number($destination),
            'L' => Config::get('sms::config.long_sms'),
            'M' => urlencode($message)
        );
        static::sms_api_call(Config::get('sms::config.api_host_url'), $access_data);
    }

    private static function sms_api_call($_url, $_data){
        // convert variables array to string:
        while(list($n,$v) = each($_data)){
            static::$uri_data[] = "$n=$v";
        }

        // Recreate GET URI
        $data = implode('&', static::$uri_data);

        // parse the given URL
        static::$url = parse_url($_url);
        if (static::$url['scheme'] != 'http') {
            die('Only HTTP request are supported !');
        }

       // Call curl_prep() method and make API calls to SMS server
        $curl = static::curl_prep($data);
        return $curl;
    }

    private static function curl_prep($curl_data){
        // extract host and path:
        static::$host = static::$url['host'];
        static::$path = static::$url['path'];

        // open a socket connection on port 80
        $fp = fsockopen(static::$host, 80);

        // send the request headers:
        fputs($fp, "POST " . static::$path. " HTTP/1.1\r\n");
        fputs($fp, "Host: " . static::$host . "\r\n");
        fputs($fp, "Content-type: application/x-www-form-urlencoded\r\n");
        fputs($fp, "Content-length: ". strlen($curl_data) ."\r\n");
        fputs($fp, "Connection: close\r\n\r\n");
        fputs($fp, $curl_data);

        while(!feof($fp)) {
            // receive the results of the request
            static::$result .= fgets($fp, 128);
        }

        // close the socket connection:
        fclose($fp);

        // split the result header from the content
        static::$result = explode("\r\n\r\n", static::$result, 2);

        $header = isset(static::$result[0]) ? static::$result[0] : '';
        $content = isset(static::$result[1]) ? static::$result[1] : '';

        // return as array:
        return array($header, $content);
    }

    private static function prep_gsm_number($gsm_number){
        // Format Destination Number to 234xxx
        $length = strlen((string) $gsm_number);

        // Check GSM number length
        if($length == 11){
            return '234' . substr($gsm_number, 1);
        } elseif($length == 13){
            return $gsm_number;
        } else {
            return '';
        }
    }

}