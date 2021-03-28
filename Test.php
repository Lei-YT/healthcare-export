<?php

excel();

function excel()
{
    $filename = date('YmdHis');
    header('Content-Disposition: attachment; filename*=UTF-8\'\'' . urlencode($filename . '.xls'));


    $api_part = 'liveSignDetail';
    $query = '?token=ae4999b494dabec8a98cf6aa046c45faee3868bf&user_id=3&senior_id=35';
    $initData = curl_get("http://app.newpinehealthcare.com/api/app/initialMesDetail$query");
    $initData = json_decode($initData, true);
    $initData = $initData['data'];

    $data = curl_get("http://app.newpinehealthcare.com/api/app/$api_part$query");
    $data = json_decode($data, true);
    $data = $data['data'];

    include("$api_part.php");

}

//替换选择框
function checkbox_replace2($con, $data, $param, $options)
{
    $text = '';
    $arr = explode(',', $data[$param]);
    foreach ($options as $k => $v) {
        if ($v == '') continue;
        $text .= in_array($k, $arr) ? '☑' : '□';
        $text .= $v;
    }
    return str_replace('{{' . $param . '}}', $text, $con);
}

function curl_get($url)
{

    $header = array(
        'Accept: application/json',
    );
    $curl = curl_init();
    //设置抓取的url
    curl_setopt($curl, CURLOPT_URL, $url);
    //设置头文件的信息作为数据流输出
    curl_setopt($curl, CURLOPT_HEADER, 0);
    // 超时设置,以秒为单位
    curl_setopt($curl, CURLOPT_TIMEOUT, 1);

    // 超时设置，以毫秒为单位
    // curl_setopt($curl, CURLOPT_TIMEOUT_MS, 500);

    // 设置请求头
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
    //设置获取的信息以文件流的形式返回，而不是直接输出。
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    //执行命令
    $data = curl_exec($curl);

    // 显示错误信息
    if (curl_error($curl)) {
        // print "Error: " . curl_error($curl);
        return curl_error($curl);
    } else {
        // 打印返回的内容
        // var_dump($data);
        curl_close($curl);
        return $data;
    }
}
