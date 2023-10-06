<?php
function curPage($page)
{
    $uri = explode('/', $_SERVER['REQUEST_URI']);
    return (bool) in_array($page, $uri);
}

function currentPath()
{
    return basename($_SERVER['REQUEST_URI']);
}

function imgtrans($imgurl, $trans)
{
    $imgurl = explode('upload', $imgurl);
    $imgurl[0] .= 'upload/s--6wvZmQAJ--/t_' . $trans;
    return implode('', $imgurl);
}

function genColor()
{
    return '#' . substr(md5(mt_rand()), 0, 6);
}

function readable($str, $insert = '-')
{
    return implode($insert, str_split($str, 3));
}

function short_date($date)
{
    return date('M d', strtotime($date));
}

function long_date($date)
{
    return date('M d, Y', strtotime($date));
}

function truncate($val, $len = 30)
{
    return strlen($val) <= $len ?  substr($val, 0, $len) : substr($val, 0, $len) . '...';
}

function revertext($txt)
{
    $txt = htmlspecialchars_decode($txt, ENT_QUOTES);
    return $txt;
}

function sanitize_text($text)
{
    $text = preg_replace('/<[^>]*>/', '', $text);
    $text = preg_replace('/["\']/', '', $text);
    $text = trim($text);
    $text = preg_replace('/\s+/', ' ', $text);
    return $text;
}

function truncate_url($url)
{
    $url_parts = parse_url($url); // parse URL to get host and path
    $host = $url_parts['host'];
    $path = $url_parts['path'];
    $path_parts = explode('/', $path); // split path by '/'
    $last_path_part = end($path_parts); // get last part of path
    $truncated_url = substr($host, -11) . '...' . substr($last_path_part, -15); // combine host and truncated path
    return $truncated_url;
}

function convert_date_format($date_string)
{
    $timestamp = strtotime($date_string); // convert date string to Unix timestamp
    $day = date('d', $timestamp); // get day of month (zero-padded)
    $weekday = date('D', $timestamp); // get weekday (short name)
    $month = date('M', $timestamp); // get month (short name)
    $year = date('Y', $timestamp); // get year (4 digits)
    $formatted_date = $day . ' ' . $weekday . ' ' . $month . ', ' . $year; // combine date parts into formatted date
    return $formatted_date;
}

function generate_short_code($name, $url)
{
    $hash = sha1($name . $url . microtime() . rand(0, 100));
    $encoded = base64_encode($hash);
    $stripped = preg_replace("/[^a-zA-Z]/", "", $encoded);
    $short_code = strtolower(substr($stripped, 0, 6));
    return $short_code;
}


function to_slug($title)
{
    $slug = strtolower($title);
    $slug = str_replace(' ', '-', $slug);
    $slug = preg_replace('/[^a-z0-9\-]/', '', $slug);
    return $slug;
}


function rand_color()
{
    $arrColor = ['success', 'danger', 'primary', 'warning', 'secondary', 'dark'];
    $randIndex = array_rand($arrColor);
    return $arrColor[$randIndex];
}

function rem_char($str)
{
    $res = str_replace(array(
        '\'', '"',
        ',', ';', '<', '>', '&'
    ), ' ', $str);
    return $res;
}

function time_elapsed_string($datetime, $full = false)
{
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

function minutesToHumanReadableTime($minutes)
{
    $hours = floor($minutes / 60);
    $remainingMinutes = $minutes % 60;

    $timeString = '';

    if ($hours > 0) {
        $timeString .= $hours . 'h';
    }

    if ($remainingMinutes > 0) {
        if ($timeString !== '') {
            $timeString .= ' ';
        }
        $timeString .= $remainingMinutes . 'm';
    }

    return $timeString;
}

function fetchAll($result)
{
    $data = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
    return $data;
}


function generateRandomString($length = 24)
{
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $randomString = 'dm_';

    for ($i = 0; $i < $length - 3; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $randomString;
}
