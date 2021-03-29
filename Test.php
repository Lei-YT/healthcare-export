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
    // <?php

    // $query = '?token=ae4999b494dabec8a98cf6aa046c45faee3868bf&user_id=3&senior_id=35';
    // $initData = curl_get("http://app.newpinehealthcare.com/api/app/initialMesDetail$query");
    // $initData = json_decode($initData, true);
    // $initData = $initData['data'];

    // $data = curl_get("http://app.newpinehealthcare.com/api/app/liveSignDetail$query");
    // $data = json_decode($data, true);
    // $data = $data['data'];

    // $con = file_get_contents('./3(1).xml');
    // $con = str_replace('{{name}}', $initData['name'], $con);
    // $con = checkbox_replace($con, $initData, 'sex', ['', '男', '女']);
    // $con = str_replace('{{age}}', $initData['age'], $con);
    // $con = str_replace('{{address}}', $initData['address'], $con);

    // $con = str_replace('{{contact_name}}', $initData['contact_name'], $con);
    // $con = str_replace('{{contact_mobile}}', $initData['contact_mobile'], $con);
    // $con = str_replace('{{mobile}}', $initData['mobile'], $con);
    // $con = str_replace('{{sin}}', $initData['sin'], $con);
    // $con = str_replace('{{idcard}}', $initData['idcard'], $con);
    // $con = str_replace('{{birthday}}', $initData['birthday'], $con);

    // // 长者信息:
    // // ? 复印件; 邮箱
    // $con = str_replace('{{wechat_number}}', $data['wechat_number'], $con);
    // $con = str_replace('{{email}}', isset($data['email']) ? $data['email'] : '', $con);

    // $con = str_replace('{{serial_num}}', $data['serial_num'], $con);
    // // 监护人
    // // ? 缺少字段 监护人住址
    // $con = str_replace('{{guardian}}', $data['guardian'], $con);
    // $con = str_replace('{{relation}}', $data['relation'], $con);
    // $con = str_replace('{{guardian_mobile}}', $data['guardian_mobile'], $con);
    // $con = str_replace('{{guardian_email}}', $data['guardian_email'], $con);
    // $con = str_replace('{{guardian_idcard}}', $data['guardian_idcard'], $con);
    // $con = str_replace('{{guardian_wechat_number}}', $data['guardian_wechat_number'], $con);
    // // 入住
    // // ? 缺少字段 contract_period 合同期限
    // $con = str_replace('{{start_time_year}}', date('Y', strtotime($data['start_time'])), $con);
    // $con = str_replace('{{start_time_month}}', date('m', strtotime($data['start_time'])), $con);
    // $con = str_replace('{{start_time_day}}', date('d', strtotime($data['start_time'])), $con);
    // $con = str_replace('{{end_time_year}}', date('Y', strtotime($data['end_time'])), $con);
    // $con = str_replace('{{end_time_month}}', date('m', strtotime($data['end_time'])), $con);
    // $con = str_replace('{{end_time_day}}', date('d', strtotime($data['end_time'])), $con);
    // $con = str_replace('{{live_room_type}}', $data['room_type'], $con);
    // $con = str_replace('{{room_num}}', $data['room_num'], $con);
    // $con = str_replace('{{service_fee_month}}', isset($data['service_fee_month']), $con);
    // $con = checkbox_replace($con, $data, 'pay_method', ['', '现金', '银行卡', '支付宝', '微信']);
    // if (isset($data['service_year_method']))
    //     $con = checkbox_replace($con, $data, 'service_year_method', ['', '一年 ', '二年 ', '三年 ', '四年 ', '五年']);
    // if (isset($data['pay_method_1']))
    //     $con = checkbox_replace($con, $data, 'pay_method_1', ['', '现金', '银行卡', '支付宝', '微信']);
    // $con = str_replace('{{service_totle_fee}}', isset($data['service_totle_fee']), $con);
    // $con = str_replace('{{discount_month_fee}}', isset($data['discount_month_fee']), $con);
    // $con = str_replace('{{service_discount_month}}', isset($data['service_discount_month']), $con);
    // $con = checkbox_replace($con, $data, 'is_contract', ['', '签署的《养老服务合同》']);
    // // 护理员
    // $con = str_replace('{{nursing_name}}', $data['nursing_name'], $con);
    // $con = str_replace('{{nursing_mobile}}', $data['nursing_mobile'], $con);
    // $con = str_replace('{{nursing_relation}}', $data['nursing_relation'], $con);
    // $con = str_replace('{{nursing_idcard}}', $data['nursing_idcard'], $con);
    // $con = str_replace('{{nursing_address}}', $data['nursing_address'], $con);
    // $con = str_replace('{{month_money}}', $data['month_money'], $con);
    // $con = checkbox_replace($con, $data, 'nursing_sex', ['', '男', '女']);
    // $con = checkbox_replace($con, $data, 'files', ['', '体检报告书   ', '身份证  ', '签署的《私人护理员协议》 ']);
    // if (isset($data['pay_method_2']))
    //     $con = checkbox_replace($con, $data, 'pay_method_2', ['', '现金', '银行卡', '支付宝', '微信']);
    // $con = str_replace('{{take_effect_date_year}}', date('Y', strtotime($data['take_effect_date'])), $con);
    // $con = str_replace('{{take_effect_date_month}}', date('m', strtotime($data['take_effect_date'])), $con);
    // $con = str_replace('{{take_effect_date_day}}', date('d', strtotime($data['take_effect_date'])), $con);

    // // 社会信息
    // // ? 政治面貌
    // // ? 常住地址
    // if ($data['religion'] == '无') {
    //     $con = str_replace('{{religion}}', '☑无    □有', $con);
    // } else {
    //     $con = str_replace('{{religion}}', '□无    ☑有 ' . $data['religion'], $con);
    // }
    // $con = str_replace('{{status}}', $data['status'], $con);
    // $con = str_replace('{{zodiac}}', $data['zodiac'], $con);
    // $con = str_replace('{{work_unit}}', $data['work_unit'], $con);
    // $con = checkbox_replace($con, $data, 'stranger_sex', ['', '男', '女']);
    // $con = checkbox_replace($con, $data, 'education_level', ['', '文盲及半文盲', '小学', '初中', '高中/技校/中专', '大学专科及以上', '不详']);
    // $con = checkbox_replace($con, $data, 'profession', ['', '国家机关/党群组织/企业/事业单位负责人', '专业技术人员', '办事人员和有关人员', '商业、服务业人员', ' 农、林、牧、渔、水利业生产人员', '生产、运输设备操作人员及有关人员', '军人', '不便分类的其他从业人员']);
    // $con = checkbox_replace($con, $data, 'marital_status', ['', '未婚', '已婚', '丧偶', '离婚', '未说明的婚姻状况']);
    // $con = checkbox_replace($con, $data, 'medical_pay_method', ['', '城镇职工基本医疗保险', '城镇居民基本医疗保险 ', '新型农村合作医疗 ', '贫困救助 ', '商业医疗保险 ', '全公费 ', '全自费', '其他']);
    // $con = checkbox_replace($con, $data, 'live_status', ['', '独居', '与配偶/伴侣居住', '与子女居住', '与父母居住', '与兄弟姐妹居住', '与其他亲属居住', '与非亲属关系的人居住', '养老机构']);
    // $con = checkbox_replace($con, $data, 'money_source', ['', '退休金/养老金', '子女补贴', '亲友资助']);
    // // 家庭成员
    // $spouse_member = '';
    // $other_member = '';
    // $member_cnt = count($data['family_member']);
    // foreach ($data['family_member'] as $key => $member) {
    //     $spouse_member .= '<Row ss:AutoFitHeight="0" ss:Height="21.9375">';
    //     $spouse_member .= '<Cell ss:Index="4" ss:MergeAcross="1" ss:StyleID="m2020663449520"><Data ss:Type="String">' . $member['spouse_name'] . '</Data></Cell>';
    //     $spouse_member .= '<Cell ss:MergeAcross="1" ss:StyleID="m2020663449620"><Data ss:Type="String">' . $member['spouse_relation'] . '</Data></Cell>';
    //     $spouse_member .= '<Cell ss:MergeAcross="1" ss:StyleID="m2020663449620"><Data ss:Type="String">' . $member['spouse_address'] . '</Data></Cell>';
    //     $spouse_member .= '<Cell ss:MergeAcross="1" ss:StyleID="m2020663449620"><Data ss:Type="String">' . $member['spouse_phone'] . '</Data></Cell>';
    //     $spouse_member .= '<Cell ss:MergeAcross="1" ss:StyleID="m2020663449600"><Data ss:Type="String">' . $member['spouse_work'] . '</Data></Cell>';
    //     $spouse_member .= '</Row>';

    //     $other_member .= '<Row ss:AutoFitHeight="0" ss:Height="21.9375">';
    //     $other_member .= '<Cell ss:Index="4" ss:MergeAcross="1" ss:StyleID="m2020663446816"><Data ss:Type="String">' . $member['other_name'] . '</Data></Cell>';
    //     $other_member .= '<Cell ss:MergeAcross="1" ss:StyleID="m2020663446836"><Data ss:Type="String">' . $member['other_relation'] . '</Data></Cell>';
    //     $other_member .= '<Cell ss:MergeAcross="1" ss:StyleID="m2020663446836"><Data ss:Type="String">' . $member['other_address'] . '</Data></Cell>';
    //     $other_member .= '<Cell ss:MergeAcross="3" ss:StyleID="m2020663446876"><Data ss:Type="String">' . $member['other_phone'] . '</Data></Cell>';
    //     $other_member .= '</Row>';
    // }
    // $con = str_replace('{{member_cnt}}', $member_cnt, $con);
    // $con = str_replace('{{spouse_member}}', $spouse_member, $con);
    // $con = str_replace('{{other_member}}', $other_member, $con);
    // // 生活信息
    // // todo: drinking_other 是哪个
    // $life_mes_setting = [
    //     ['', '良好', '早醒', '易醒', '难入睡', '其他 ' . $data['other_life']['sleep_other']],
    //     ['', '良好', '瘙痒', '皮损', '褥疮'],
    //     ['', '低钠 ', '高蛋白 ', '糖尿病餐',  '硬饭',  '软饭',  '粥',   '素餐',  '其他 ' . $data['other_life']['diet_other']],
    //     ['', '鼻饲匀浆膳食 ', '无形软食 ', '流质软食 ', '半流质饮食 ', '浓稠液体食物  ', '糊状食物'],
    //     ['', '正常 ', '需喂食', '鼻饲'],
    //     ['', '良好    ', '无牙    ', '脱落     ', '无假牙    ', '有假牙（', '上 ', '下 ', '全部  ', ' ' . $data['other_life']['tooth_other'] . ' 只）'],
    //     ['', '正常    ', '失禁    ', '尿管'],
    //     ['', '正常', '失禁', '粪袋'],
    //     ['', '无      ', '有, 部位 ' . $data['other_life']['pain_other']],
    //     ['', '良好    ', '模糊        ', '失明（', '左 ,', '右）  ', '辅助器：' . $data['other_life']['vision_other']],
    //     ['', '良好    ', '要大声      ', '失听（', '左 ,', '右）  ', '辅助器：'],
    //     ['', '良好    ', '只能说简单句语    ', '不能通过过言语进行沟通'],
    //     ['', '良好    ', '只能理解简单语句  ', '不能理解'],
    //     ['', '卧床    ', '不需要辅助用具    ', '需要辅助用具 ', '手杖 ', '四脚杖  ', '助行器  ', '轮子助行器  ', '轮椅 ', '其他 ' . $data['other_life']['activity_other']],
    //     ['', '无      ', '有 ' . $data['other_life']['fall_down_other'] . '次'],
    //     ['', '无      ', '有 ' . $data['other_life']['smoking_other']],
    //     ['', '无      ', '有'],
    // ];
    // foreach ($data['life_mes'] as $key => $life) {
    //     $con = checkbox_replace_value($con, $life, 'life' . $key, $life_mes_setting[$key]);
    // }
    // $con = str_replace('{{allergy}}', $data['allergy'], $con);
    // $con = str_replace('{{hobby}}', $data['hobby'], $con);
    // $con = str_replace('{{living_habit}}', $data['living_habit'], $con);
    // $con = str_replace('{{other_note}}', $data['other_note'], $con);



    // if ($data['nation'] == '汉族' || $data['nation'] == '汉') {
    //     $con = str_replace('□汉族', '☑汉族', $con);
    //     $con = str_replace('{{nation}}', '    ', $con);
    // } else {
    //     $con = str_replace('□少数民族', '☑少数民族', $con);
    //     $con = str_replace('{{nation}}', $data['nation'], $con);
    // }

    // $con = str_replace('{{door_card}}', $data['door_card'] == 1 ? '☑门卡' : '□门卡', $con);
    // $con = str_replace('{{wristband}}', $data['wristband'] == 1 ? '☑手环' : '□手环', $con);
    // $con = str_replace('{{other}}', $data['other'], $con);


    // echo $con;
}

//替换选择框
function checkbox_replace3($con, $data, $param, $options)
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
function checkbox_replace_value2($con, $value, $param, $options)
{
    $text = '';
    foreach ($options as $k => $v) {
        if ($v == '') continue;
        $text .= $k == $value ? '☑' : '□';
        $text .= $v;
    }
    return str_replace('{{' . $param . '}}', $text, $con);
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
