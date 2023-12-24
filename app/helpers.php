<?php

if (!function_exists('admin_photo_url')) {

    function admin_photo_url(string $path): string
    {
        $url = asset("storage/images/user.png");

        if (!empty($path) && is_file(asset("storage/images/$path"))) {
            $url = asset("storage/images/$path");
        }
        return $url;
    }

}

if(!function_exists("images_path")){
    function images_path($img_src): string
    {
        return asset("storage/images/$img_src");
    }
}

if(!function_exists("store_image")){
    function store_image($image_request, $image_path = null, $image_name = null): string
    {
        if(empty($image_name)){
            $image_name = str_replace(".".$image_request->extension(), "", $image_request->getClientOriginalName());
        }
        $image_name .= '.'.$image_request->extension();
        $full_path = "public/images";
        if(!empty($image_path)){
            $full_path .= "/$image_path";
        }
        $image_request->storeAs($full_path, $image_name);
        return !empty($image_path) ? "$image_path/$image_name" : $image_name;
    }
}

if(!function_exists("get_image_name_from_string")){
    function get_image_name_from_string($image_name): string
    {
        $replace_name = str_replace("\\", "/", trim($image_name));
        $image_name_path_array = explode("/", $replace_name);
        $name_array = explode(".", end($image_name_path_array));
        return $name_array[0];
    }
}

if (!function_exists('system_encryption')) {

    function system_encryption(string $string): string
    {
        $cost = config("app.crypt_cost");
        $first = $string;
        for ($i = 0; $i < $cost; $i++) {
            $first = md5($i . $first);
        }
        $second = password_hash($first, PASSWORD_DEFAULT);
        $third = base64_encode($second);
        $fourth = str_replace("=", "", $third);
        return config("app.hash_pref") . $fourth;
    }

}

if (!function_exists('system_encryption_verify')) {

    function system_encryption_verify(string $original, string $hash): bool
    {
        $original_hash = base64_decode(str_replace(config("app.hash_pref"), "", $hash));
        $cost = config("app.crypt_cost");
        $first = $original;
        for ($i = 0; $i < $cost; $i++) {
            $first = md5($i . $first);
        }
        return password_verify($first, $original_hash);
    }

}

if (!function_exists('get_lang_from_json')) {

    function get_lang_from_json(?string $json, string $lang = ""): ?string
    {
        if (empty($lang)) {
            $lang = app()->getLocale();
        }
        $return = $json;
        if (!empty($json)) {
            $string = json_decode($json, true);
            if (!empty($string[strtolower($lang)])) {
                $return = $string[strtolower($lang)];
            } elseif (!empty($string["en"])) {
                $return = $string["en"];
            }
        }
        return $return;
    }

}

if (!function_exists('str_startWith_array_elem')) {

    function str_startWith_array_elem($string, $array): bool
    {
        foreach ($array as $elem) {
            if (str_starts_with($string, $elem)) {
                return true;
            }
        }
        return false;
    }
}
if (!function_exists('create_slug')) {

    function create_slug($string, $separator = "-"): string
    {
        $string_1 = trim($string);
        $string_2 = mb_strtolower($string_1, "UTF-8");
        $string_3 = preg_replace("/[^a-z0-9_\s\-ءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]#u/", "", $string_2);
        $string_4 = preg_replace("/[\s-]+/", " ", $string_3);
        return preg_replace("/[\s_]/", $separator, $string_4);
    }
}

if (!function_exists('get_random_string')) {

    function get_random_string($n = 8): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*';
        $randomString = '';

        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }
}

