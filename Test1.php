<?php



function excel()
{
    $filename = date('YmdHis');
    header('Content-Disposition: attachment; filename*=UTF-8\'\'' . urlencode($filename . '.xls'));

    $con = file_get_contents('./1.xml');

    $data = curl_get('http://test.app.newpinehealthcare.com/api/app/initialMesDetail?token=0aeda5304cd4e555e4d7e328b87366f356b8fe7d&user_id=32&senior_id=15');

    $data = json_decode($data, true);
    $data = $data['data'];

    $con = str_replace('{{name}}', $data['name'], $con);
    if ($data['sex'] == 2)
        $con = str_replace('□女', '☑女', $con);
    else
        $con = str_replace('□男', '☑男', $con);
    $con = str_replace('{{age}}', $data['age'], $con);
    $con = str_replace('{{address}}', $data['address'], $con);

    $con = str_replace('{{contact_name}}', $data['contact_name'], $con);
    $con = str_replace('{{contact_mobile}}', $data['contact_mobile'], $con);
    $con = str_replace('{{mobile}}', $data['mobile'], $con);
    $con = str_replace('{{sin}}', $data['sin'], $con);
    $con = str_replace('{{idcard}}', $data['idcard'], $con);


    $con = str_replace('{{birthday_year}}', date('Y', strtotime($data['birthday'])), $con);
    $con = str_replace('{{birthday_month}}', date('m', strtotime($data['birthday'])), $con);
    $con = str_replace('{{birthday_day}}', date('d', strtotime($data['birthday'])), $con);

    if ($data['nation'] == '汉族' || $data['nation'] == '汉') {
        $con = str_replace('□汉族', '☑汉族', $con);
        $con = str_replace('{{nation}}', '    ', $con);
    } else {
        $con = str_replace('□少数民族', '☑少数民族', $con);
        $con = str_replace('{{nation}}', $data['nation'], $con);
    }

    switch ($data['education_level']) {
        case 1:
            $con = str_replace('{{education_level}}', '☑文盲及半文盲□小学□初中□高中/技校/中专□大学专科及以上□不详', $con);
            break;
        case 2:
            $con = str_replace('{{education_level}}', '□文盲及半文盲☑小学□初中□高中/技校/中专□大学专科及以上□不详', $con);
            break;
        case 3:
            $con = str_replace('{{education_level}}', '□文盲及半文盲□小学☑初中□高中/技校/中专□大学专科及以上□不详', $con);
            break;
        case 4:
            $con = str_replace('{{education_level}}', '□文盲及半文盲□小学□初中☑高中/技校/中专□大学专科及以上□不详', $con);
            break;
        case 5:
            $con = str_replace('{{education_level}}', '□文盲及半文盲□小学□初中□高中/技校/中专☑大学专科及以上□不详', $con);
            break;
        case 6:
            $con = str_replace('{{education_level}}', '□文盲及半文盲□小学□初中□高中/技校/中专□大学专科及以上☑不详', $con);
            break;
        default:
            $con = str_replace('{{education_level}}', '□文盲及半文盲□小学□初中□高中/技校/中专□大学专科及以上□不详', $con);
            break;
    }

    switch ($data['profession']) {
        case 1:
            $con = str_replace('{{profession}}', '☑国家机关/党群组织/企业/事业单位负责人□专业技术人员□办事人员和有关人员□商业、服务业人员□ 农、林、牧、渔、水利业生产人员□生产、运输设备操作人员及有关人员□军人□不便分类的其他从业人员', $con);
            break;
        case 2:
            $con = str_replace('{{profession}}', '□国家机关/党群组织/企业/事业单位负责人☑专业技术人员□办事人员和有关人员□商业、服务业人员□ 农、林、牧、渔、水利业生产人员□生产、运输设备操作人员及有关人员□军人□不便分类的其他从业人员', $con);
            break;
        case 3:
            $con = str_replace('{{profession}}', '□国家机关/党群组织/企业/事业单位负责人□专业技术人员☑办事人员和有关人员□商业、服务业人员□ 农、林、牧、渔、水利业生产人员□生产、运输设备操作人员及有关人员□军人□不便分类的其他从业人员', $con);
            break;
        case 4:
            $con = str_replace('{{profession}}', '□国家机关/党群组织/企业/事业单位负责人□专业技术人员□办事人员和有关人员☑商业、服务业人员□ 农、林、牧、渔、水利业生产人员□生产、运输设备操作人员及有关人员□军人□不便分类的其他从业人员', $con);
            break;
        case 5:
            $con = str_replace('{{profession}}', '□国家机关/党群组织/企业/事业单位负责人□专业技术人员□办事人员和有关人员□商业、服务业人员☑ 农、林、牧、渔、水利业生产人员□生产、运输设备操作人员及有关人员□军人□不便分类的其他从业人员', $con);
            break;
        case 6:
            $con = str_replace('{{profession}}', '□国家机关/党群组织/企业/事业单位负责人□专业技术人员□办事人员和有关人员□商业、服务业人员□ 农、林、牧、渔、水利业生产人员☑生产、运输设备操作人员及有关人员□军人□不便分类的其他从业人员', $con);
            break;
        case 7:
            $con = str_replace('{{profession}}', '□国家机关/党群组织/企业/事业单位负责人□专业技术人员□办事人员和有关人员□商业、服务业人员□ 农、林、牧、渔、水利业生产人员□生产、运输设备操作人员及有关人员☑军人□不便分类的其他从业人员', $con);
            break;
        case 8:
            $con = str_replace('{{profession}}', '□国家机关/党群组织/企业/事业单位负责人□专业技术人员□办事人员和有关人员□商业、服务业人员□ 农、林、牧、渔、水利业生产人员□生产、运输设备操作人员及有关人员□军人☑不便分类的其他从业人员', $con);
            break;
        default:
            $con = str_replace('{{profession}}', '□国家机关/党群组织/企业/事业单位负责人□专业技术人员□办事人员和有关人员□商业、服务业人员□ 农、林、牧、渔、水利业生产人员□生产、运输设备操作人员及有关人员□军人□不便分类的其他从业人员', $con);
            break;
    }

    switch ($data['marital_status']) {
        case 1:
            $con = str_replace('{{marital_status}}', '☑未婚□已婚□丧偶□离婚□未说明的婚姻状况', $con);
            break;
        case 2:
            $con = str_replace('{{marital_status}}', '□未婚☑已婚□丧偶□离婚□未说明的婚姻状况', $con);
            break;
        case 3:
            $con = str_replace('{{marital_status}}', '□未婚□已婚☑丧偶□离婚□未说明的婚姻状况', $con);
            break;
        case 4:
            $con = str_replace('{{marital_status}}', '□未婚□已婚□丧偶☑离婚□未说明的婚姻状况', $con);
            break;
        case 5:
            $con = str_replace('{{marital_status}}', '□未婚□已婚□丧偶□离婚☑未说明的婚姻状况', $con);
            break;
        default:
            $con = str_replace('{{marital_status}}', '□未婚□已婚□丧偶□离婚□未说明的婚姻状况', $con);
            break;
    }

    switch ($data['pay_method']) {
        case 1:
            $con = str_replace('{{pay_method}}', '☑未婚□已婚□丧偶□离婚□未说明的婚姻状况', $con);
            break;
        case 2:
            $con = str_replace('{{pay_method}}', '□未婚☑已婚□丧偶□离婚□未说明的婚姻状况', $con);
            break;
        case 3:
            $con = str_replace('{{pay_method}}', '□未婚□已婚☑丧偶□离婚□未说明的婚姻状况', $con);
            break;
        case 4:
            $con = str_replace('{{pay_method}}', '□未婚□已婚□丧偶☑离婚□未说明的婚姻状况', $con);
            break;
        case 5:
            $con = str_replace('{{pay_method}}', '□未婚□已婚□丧偶□离婚☑未说明的婚姻状况', $con);
            break;
        default:
            $con = str_replace('{{pay_method}}', '□未婚□已婚□丧偶□离婚□未说明的婚姻状况', $con);
            break;
    }


    switch ($data['live_status']) {
        case 1:
            $con = str_replace('{{live_status}}', '☑独居□与配偶/伴侣居住□与子女居住□与父母居住□与兄弟姐妹居住□与其他亲属居住□与非亲属关系的人居住□养老机构', $con);
            break;
        case 2:
            $con = str_replace('{{live_status}}', '□独居□与配偶/伴侣居住☑与子女居住□与父母居住□与兄弟姐妹居住□与其他亲属居住□与非亲属关系的人居住□养老机构', $con);
            break;
        case 3:
            $con = str_replace('{{live_status}}', '□独居□与配偶/伴侣居住□与子女居住□与父母居住☑与兄弟姐妹居住□与其他亲属居住□与非亲属关系的人居住□养老机构', $con);
            break;
        case 4:
            $con = str_replace('{{live_status}}', '□独居□与配偶/伴侣居住□与子女居住□与父母居住□与兄弟姐妹居住☑与其他亲属居住□与非亲属关系的人居住□养老机构', $con);
            break;
        case 5:
            $con = str_replace('{{live_status}}', '□独居□与配偶/伴侣居住□与子女居住□与父母居住□与兄弟姐妹居住□与其他亲属居住☑与非亲属关系的人居住□养老机构', $con);
            break;
        case 6:
            $con = str_replace('{{live_status}}', '□独居□与配偶/伴侣居住□与子女居住□与父母居住□与兄弟姐妹居住□与其他亲属居住□与非亲属关系的人居住☑养老机构', $con);
            break;
        default:
            $con = str_replace('{{live_status}}', '□独居□与配偶/伴侣居住□与子女居住□与父母居住□与兄弟姐妹居住□与其他亲属居住□与非亲属关系的人居住□养老机构', $con);
            break;
    }

    $informant = $data['informant'];
    if (isset($informant[0])) {
        $data['informant'] = $informant[0]['informant'];
        $data['informant_relation'] = $informant[0]['informant_relation'];
        $data['informant_mobile'] = $informant[0]['informant_mobile'];
    } else {
        $data['informant'] = '';
        $data['informant_relation'] = '';
        $data['informant_mobile'] = '';
    }
    if (isset($informant[1])) {
        $data['informant_1'] = $informant[1]['informant'];
        $data['informant_relation_1'] = $informant[1]['informant_relation'];
        $data['informant_mobile_1'] = $informant[1]['informant_mobile'];
    } else {
        $data['informant_1'] = '';
        $data['informant_relation_1'] = '';
        $data['informant_mobile_1'] = '';
    }

    $con = str_replace('{{informant}}', $data['informant'], $con);
    $con = str_replace('{{informant_relation}}', $data['informant_relation'], $con);
    $con = str_replace('{{informant_mobile}}', $data['informant_mobile'], $con);
    $con = str_replace('{{informant_1}}', $data['informant_1'], $con);
    $con = str_replace('{{informant_relation_1}}', $data['informant_relation_1'], $con);
    $con = str_replace('{{informant_mobile_1}}', $data['informant_mobile_1'], $con);
    $con = str_replace('{{consulting_remark}}', $data['consulting_remark'], $con);



    echo $con;
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
