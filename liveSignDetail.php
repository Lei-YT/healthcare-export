<?php

$con = file_get_contents('./3(1).xml');
$con = str_replace('{{name}}', $initData['name'], $con);
// if ($initData['sex'] == 2)
//     $con = str_replace('□女', '☑女', $con);
// else
//     $con = str_replace('□男', '☑男', $con);
$con = checkbox_replace($con, $initData, 'sex', ['', '男', '女']);
$con = str_replace('{{age}}', $initData['age'], $con);
$con = str_replace('{{address}}', $initData['address'], $con);

$con = str_replace('{{contact_name}}', $initData['contact_name'], $con);
$con = str_replace('{{contact_mobile}}', $initData['contact_mobile'], $con);
$con = str_replace('{{mobile}}', $initData['mobile'], $con);
$con = str_replace('{{sin}}', $initData['sin'], $con);
$con = str_replace('{{idcard}}', $initData['idcard'], $con);

$con = str_replace('{{wechat_number}}', $data['wechat_number'], $con);
$con = str_replace('{{email}}', $data['email'], $con);
// 监护人
$con = str_replace('{{guardian}}', $data['guardian'], $con);
$con = str_replace('{{relation}}', $data['relation'], $con);
$con = str_replace('{{guardian_mobile}}', $data['guardian_mobile'], $con);
$con = str_replace('{{guardian_email}}', $data['guardian_email'], $con);
$con = str_replace('{{guardian_idcard}}', $data['guardian_idcard'], $con);
$con = str_replace('{{guardian_wechat_number}}', $data['guardian_wechat_number'], $con);
// 入住
// $con = str_replace('{{live_room_type}}', $data['live_room_type'], $con);
$con = str_replace('{{live_room_type}}', $data['room_type'], $con);
$con = str_replace('{{room_num}}', $data['room_num'], $con);
$con = str_replace('{{service_fee_month}}', $data['service_fee_month'], $con);
// 护理员
$con = str_replace('{{nursing_name}}', $data['nursing_name'], $con);
$con = str_replace('{{nursing_mobile}}', $data['nursing_mobile'], $con);
$con = str_replace('{{nursing_relation}}', $data['nursing_relation'], $con);
$con = str_replace('{{nursing_idcard}}', $data['nursing_idcard'], $con);
$con = str_replace('{{nursing_address}}', $data['nursing_address'], $con);
$con = checkbox_replace($con, $data, 'nursing_sex', ['', '男', '女']);

// 社会信息
$con = str_replace('{{zodiac}}', $data['zodiac'], $con);
$con = checkbox_replace($con, $data, 'stranger_sex', ['', '男', '女']);
$con = checkbox_replace($con, $data, 'education_level', ['', '文盲及半文盲', '小学', '初中', '高中/技校/中专', '大学专科及以上', '不详']);
$con = checkbox_replace($con, $data, 'profession', ['', '国家机关/党群组织/企业/事业单位负责人', '专业技术人员', '办事人员和有关人员', '商业、服务业人员', ' 农、林、牧、渔、水利业生产人员', '生产、运输设备操作人员及有关人员', '军人', '不便分类的其他从业人员']);
$con = checkbox_replace($con, $data, 'marital_status', ['', '未婚', '已婚', '丧偶', '离婚', '未说明的婚姻状况']);
$con = checkbox_replace($con, $data, 'medical_pay_method', ['', '城镇职工基本医疗保险', '城镇居民基本医疗保险 ', '新型农村合作医疗 ', '贫困救助 ', '商业医疗保险 ', '全公费 ', '全自费', '其他']);
$con = checkbox_replace($con, $data, 'live_status', ['', '独居', '与配偶/伴侣居住', '与子女居住', '与父母居住', '与兄弟姐妹居住', '与其他亲属居住', '与非亲属关系的人居住', '养老机构']);
$con = checkbox_replace($con, $data, 'money_source', ['', '退休金/养老金', '子女补贴', '亲友资助']);

// 生活信息
$life_mes_setting = [
    ['', '良好', '早醒', '易醒', '难入睡', '其他'],
    ['', '良好', '瘙痒', '皮损', '褥疮'],
    // ['', '良好', '瘙痒', '皮损', '褥疮'],
    ['', '低钠 ', '高蛋白 ', '糖尿病餐',  '硬饭',  '软饭',  '粥',   '素餐',  '其他'],
    ['', '鼻饲匀浆膳食 ', '无形软食 ', '流质软食 ', '半流质饮食 ', '浓稠液体食物  ', '糊状食物'],
    ['', '正常 ', '需喂食', '鼻饲'],
    ['', '良好    ', '无牙    ', '脱落     ', '无假牙    ', '有假牙（','上 ','下 ','全部  ','    只）'],
    ['', '正常    ', '失禁    ', '尿管'],
    ['', '正常', '失禁', '粪袋'],
    ['', '无      ', '有'],
    ['', '良好    ', '模糊        ', '失明（□左 ,□右）  ', '辅助器：'],
    ['', '良好    ', '要大声      ', '失听（□左 ,□右）  ', '辅助器：'],
    ['', '良好    ', '只能说简单句语    ', '不能通过过言语进行沟通'],
    ['', '良好    ', '只能理解简单语句  ', '不能理解'],
    ['', '卧床    ', '不需要辅助用具    ', '需要辅助用具 ', '手杖 ', '四脚杖  ', '助行器  ', '轮子助行器  ', '轮椅 ', '其他'],
    ['','无      ','有'],
    ['','无      ','有'],
    ['','无      ','有'],
];
foreach ($data['life_mes'] as $key => $life) {
    $con = checkbox_replace_value($con, $life, 'life'.$key, $life_mes_setting[$key]);
}
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

// $con = checkbox_replace($con, $data, 'power_assess', ['', '无肢体障碍、无认知障碍', '下肢功能障碍', '轻度认知障碍', '下肢功能障碍、轻度认知障碍', '中度失能（上肢可活动、下肢失能）', '重度失能（四肢失能）', '失能失智（癌末/安宁）', '中度失智（非精神类疾病）']);

// $con = checkbox_replace($con, $data, 'hobby', ['', '活动健身', '音乐舞蹈', '手工才艺', '书画阅读', '复合型']);

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
        $text .= $k==$value ? '☑' : '□';
        $text .= $v;
    }
    return str_replace('{{' . $param . '}}', $text, $con);
}
/**
 * life_mes。从上到下每一项对应一项生活信息 1 代表选择第一个
 * life_mes。[
            "1",
            "1",
            "1",
            "1",
            "1",
            "2",
            "1",
            "2",
            "1",
            "2",
            "1",
            "1",
            "1",
            "1",
            "1",
            "1"
        ]
 */
