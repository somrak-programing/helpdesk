<?php
define('LINE_API',"https://notify-api.line.me/api/notify");
 
$token = "vEjENoyQF5QSmQ8NoHH5WTk8tbX4ucLkAEXkigvnlvj"; //ใส่Token ที่copy เอาไว้
$str = $_POST['mytxt']; //"Hello World! "; //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร
 
$res = notify_message($str,$token);
print_r($res);
function notify_message($message, $token) {
        $url = "https://notify-api.line.me/api/notify";
        $data = array('message' => $message);
    
        $headers = array(
            "Content-Type: application/x-www-form-urlencoded; charset=UTF-8",
            "Authorization: Bearer " . $token
        );
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
        $result = curl_exec($ch);
    
        if ($result === false) {
            return "Error: " . curl_error($ch);
        } else {
            return json_decode($result);
        }
    
        curl_close($ch);
    }
    
//https://havespirit.blogspot.com/2017/02/line-notify-php.html
//https://medium.com/@nattaponsirikamonnet/%E0%B8%A1%E0%B8%B2%E0%B8%A5%E0%B8%AD%E0%B8%87-line-notify-%E0%B8%81%E0%B8%B1%E0%B8%99%E0%B9%80%E0%B8%96%E0%B8%AD%E0%B8%B0-%E0%B8%9E%E0%B8%B7%E0%B9%89%E0%B8%99%E0%B8%90%E0%B8%B2%E0%B8%99-65a7fc83d97f
?>