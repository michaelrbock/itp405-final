<?php namespace App\Services;

class Readability {

    public static function get($content_url)
    {
        $content_url = urlencode($content_url);

        if (\Cache::has("read-$content_url")) {
            $json_string = \Cache::get("read-$content_url");
        } else {
            $url = "https://readability.com/api/content/v1/parser?url=$content_url&token=597d56493d003c3439dc82faa8348c863de8945c";
            $json_string = file_get_contents($url);

            \Cache::put("read-$content_url", $json_string, 60);
        }

        $read_data = json_decode($json_string);
        return $read_data;
    }

}
