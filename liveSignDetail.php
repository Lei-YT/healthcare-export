<?php

$query = '?token=4ae1c6cb336596c0e3d5242ce10b0682a15a3ac3&user_id=21&senior_id=65';
$initData = curl_get("http://test.app.newpinehealthcare.com/api/app/initialMesDetail$query");
$initData = json_decode($initData, true);
$initData = $initData['data'];

$data = curl_get("http://test.app.newpinehealthcare.com/api/app/liveSignDetail$query");
$data = json_decode($data, true);
$data = $data['data'];

$con = file_get_contents('./3(1).xml');
$con = str_replace('{{name}}', $initData['name'], $con);
$con = checkbox_replace($con, $initData, 'sex', ['', '男', '女']);
$con = str_replace('{{age}}', $initData['age'], $con);
$con = str_replace('{{address}}', $initData['address'], $con);

$con = str_replace('{{contact_name}}', $initData['contact_name'], $con);
$con = str_replace('{{contact_mobile}}', $initData['contact_mobile'], $con);
$con = str_replace('{{mobile}}', $initData['mobile'], $con);
$con = str_replace('{{sin}}', $initData['sin'], $con);
$con = str_replace('{{idcard}}', $initData['idcard'], $con);
$con = str_replace('{{birthday}}', $initData['birthday'], $con);

$con = str_replace('{{wechat_number}}', $data['wechat_number'], $con);
$con = str_replace('{{email}}', $data['email'], $con);

$con = str_replace('{{serial_num}}', $data['serial_num'], $con);
// 监护人
// ? 缺少字段 监护人住址
$con = str_replace('{{guardian}}', $data['guardian'], $con);
$con = str_replace('{{relation}}', $data['relation'], $con);
$con = str_replace('{{guardian_mobile}}', $data['guardian_mobile'], $con);
$con = str_replace('{{guardian_email}}', $data['guardian_email'], $con);
$con = str_replace('{{guardian_idcard}}', $data['guardian_idcard'], $con);
$con = str_replace('{{guardian_wechat_number}}', $data['guardian_wechat_number'], $con);
// 入住
// ? 缺少字段 contract_period 合同期限
$con = str_replace('{{start_time_year}}', date('Y', strtotime($data['start_time'])), $con);
$con = str_replace('{{start_time_month}}', date('m', strtotime($data['start_time'])), $con);
$con = str_replace('{{start_time_day}}', date('d', strtotime($data['start_time'])), $con);
$con = str_replace('{{end_time_year}}', date('Y', strtotime($data['end_time'])), $con);
$con = str_replace('{{end_time_month}}', date('m', strtotime($data['end_time'])), $con);
$con = str_replace('{{end_time_day}}', date('d', strtotime($data['end_time'])), $con);
$con = str_replace('{{live_room_type}}', $data['room_type'], $con);
$con = str_replace('{{room_num}}', $data['room_num'], $con);
$con = str_replace('{{service_fee_month}}', $data['service_fee_month'], $con);
$con = checkbox_replace($con, $data, 'pey_method', ['','现金','银行卡','支付宝','微信']);
$con = checkbox_replace($con, $data, 'service_year_method', ['','一年 ','二年 ','三年 ','四年 ','五年']);
$con = checkbox_replace($con, $data, 'pay_method_1', ['','现金','银行卡','支付宝','微信']);
$con = str_replace('{{service_totle_fee}}', $data['service_totle_fee'], $con);
$con = str_replace('{{discount_month_fee}}', $data['discount_month_fee'], $con);
$con = str_replace('{{service_discount_month}}', $data['service_discount_month'], $con);
$con = checkbox_replace($con, $data, 'is_contract', ['','签署的《养老服务合同》']);
// 护理员
$con = str_replace('{{nursing_name}}', $data['nursing_name'], $con);
$con = str_replace('{{nursing_mobile}}', $data['nursing_mobile'], $con);
$con = str_replace('{{nursing_relation}}', $data['nursing_relation'], $con);
$con = str_replace('{{nursing_idcard}}', $data['nursing_idcard'], $con);
$con = str_replace('{{nursing_address}}', $data['nursing_address'], $con);
$con = str_replace('{{month_money}}', $data['month_money'], $con);
$con = checkbox_replace($con, $data, 'nursing_sex', ['', '男', '女']);
$con = checkbox_replace($con, $data, 'file', ['','体检报告书   ','身份证  ','签署的《私人护理员协议》 ']);
$con = checkbox_replace($con, $data, 'pay_method_2', ['','现金','银行卡','支付宝','微信']);
$con = str_replace('{{take_effect_date_year}}', date('Y', strtotime($data['take_effect_date'])), $con);
$con = str_replace('{{take_effect_date_month}}', date('m', strtotime($data['take_effect_date'])), $con);
$con = str_replace('{{take_effect_date_day}}', date('d', strtotime($data['take_effect_date'])), $con);

// 社会信息
// ? 政治面貌
// ? 常住地址
if ($data['religion'] == '无' ) {
    $con = str_replace('{{religion}}', '☑无    □有', $con);
} else {
    $con = str_replace('{{religion}}', '□无    ☑有 ' . $data['religion'], $con);
}
// $con = str_replace('{{birthday}}', $data['birthday'], $con);
// $con = str_replace('{{sin}}', $data['sin'], $con);
$con = str_replace('{{status}}', $data['status'], $con);
$con = str_replace('{{zodiac}}', $data['zodiac'], $con);
$con = str_replace('{{work_unit}}', $data['work_unit'], $con);
$con = checkbox_replace($con, $data, 'stranger_sex', ['', '男', '女']);
$con = checkbox_replace($con, $data, 'education_level', ['', '文盲及半文盲', '小学', '初中', '高中/技校/中专', '大学专科及以上', '不详']);
$con = checkbox_replace($con, $data, 'profession', ['', '国家机关/党群组织/企业/事业单位负责人', '专业技术人员', '办事人员和有关人员', '商业、服务业人员', ' 农、林、牧、渔、水利业生产人员', '生产、运输设备操作人员及有关人员', '军人', '不便分类的其他从业人员']);
$con = checkbox_replace($con, $data, 'marital_status', ['', '未婚', '已婚', '丧偶', '离婚', '未说明的婚姻状况']);
$con = checkbox_replace($con, $data, 'medical_pay_method', ['', '城镇职工基本医疗保险', '城镇居民基本医疗保险 ', '新型农村合作医疗 ', '贫困救助 ', '商业医疗保险 ', '全公费 ', '全自费', '其他']);
$con = checkbox_replace($con, $data, 'live_status', ['', '独居', '与配偶/伴侣居住', '与子女居住', '与父母居住', '与兄弟姐妹居住', '与其他亲属居住', '与非亲属关系的人居住', '养老机构']);
$con = checkbox_replace($con, $data, 'money_source', ['', '退休金/养老金', '子女补贴', '亲友资助']);

// 生活信息
// todo: drinking_other 是哪个
$life_mes_setting = [
    ['', '良好', '早醒', '易醒', '难入睡', '其他 '.$data['other_life']['sleep_other']],
    ['', '良好', '瘙痒', '皮损', '褥疮'],
    ['', '低钠 ', '高蛋白 ', '糖尿病餐',  '硬饭',  '软饭',  '粥',   '素餐',  '其他 '.$data['other_life']['diet_other']],
    ['', '鼻饲匀浆膳食 ', '无形软食 ', '流质软食 ', '半流质饮食 ', '浓稠液体食物  ', '糊状食物'],
    ['', '正常 ', '需喂食', '鼻饲'],
    ['', '良好    ', '无牙    ', '脱落     ', '无假牙    ', '有假牙（', '上 ', '下 ', '全部  ', ' '.$data['other_life']['tooth_other'].' 只）'],
    ['', '正常    ', '失禁    ', '尿管'],
    ['', '正常', '失禁', '粪袋'],
    ['', '无      ', '有, 部位 ' . $data['other_life']['pain_other']],
    ['', '良好    ', '模糊        ', '失明（','左 ,','右）  ', '辅助器：'.$data['other_life']['vision_other']],
    ['', '良好    ', '要大声      ', '失听（','左 ,','右）  ', '辅助器：'],
    ['', '良好    ', '只能说简单句语    ', '不能通过过言语进行沟通'],
    ['', '良好    ', '只能理解简单语句  ', '不能理解'],
    ['', '卧床    ', '不需要辅助用具    ', '需要辅助用具 ', '手杖 ', '四脚杖  ', '助行器  ', '轮子助行器  ', '轮椅 ', '其他 '.$data['other_life']['activity_other']],
    ['', '无      ', '有 '.$data['other_life']['fall_down_other'] . '次'],
    ['', '无      ', '有 '.$data['other_life']['smoking_other']],
    ['', '无      ', '有'],
];
foreach ($data['life_mes'] as $key => $life) {
    $con = checkbox_replace_value($con, $life, 'life' . $key, $life_mes_setting[$key]);
}
$con = str_replace('{{allergy}}', $data['allergy'], $con);
$con = str_replace('{{hobby}}', $data['hobby'], $con);
$con = str_replace('{{living_habit}}', $data['living_habit'], $con);
$con = str_replace('{{other_note}}', $data['other_note'], $con);



if ($data['nation'] == '汉族' || $data['nation'] == '汉') {
    $con = str_replace('□汉族', '☑汉族', $con);
    $con = str_replace('{{nation}}', '    ', $con);
} else {
    $con = str_replace('□少数民族', '☑少数民族', $con);
    $con = str_replace('{{nation}}', $data['nation'], $con);
}

$con = str_replace('{{door_card}}', $data['door_card']==1?'☑门卡':'□门卡', $con);
$con = str_replace('{{wristband}}', $data['wristband']==1?'☑手环':'□手环', $con);
$con = str_replace('{{other}}', $data['other'], $con);


echo $con;

//替换选择框
function checkbox_replace($con, $data, $param, $options)
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
function checkbox_replace_value($con, $value, $param, $options)
{
    $text = '';
    // $arr = explode(',', $data[$param]);
    foreach ($options as $k => $v) {
        if ($v == '') continue;
        $text .= $k == $value ? '☑' : '□';
        $text .= $v;
    }
    return str_replace('{{' . $param . '}}', $text, $con);
}
