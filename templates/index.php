<?php
/**
  * 索引文件
  * @author: NowTime <wenzhouchan@gmail.com>
  * @link: https://github.com/PrintNow/php-sorry-gif
  * 注释可能不规范，欢迎指正
  * @param string   template_name：模板文件名，唯一标识，不能够有重复
  * @param string   name：中文名，用于网站展示
  * @param boolean  small：是否有小视频文件（这样在微信才能发出去，需要自行转换视频大小），有则 true，无则 false
  * @param int      input_num：对话数，如 “为所欲为” 有 9 句话，就填 9;如 王境泽 有 4 句话，就填 4
  * @param array    input_placeholder：默认字幕，按照例子加吧
*/

return [
  [
    'template_name' => 'weisuoyuwei',
    'name' => '为所欲为',
    'small' => true,
    'input_num' => 9,
    'input_placeholder' => ['好啊','就算你是一流工程师','就算你出报告再完美','我叫你改报告你就要改','毕竟我是客户','客户了不起啊','sorry 客户真的了不起','以后叫他天天改报告','天天改 天天改']
  ],
  [
    'template_name' => 'wangjingze',
    'name' => '王境泽',
    'small' => true,
    'input_num' => 4,
    'input_placeholder' => ['我就算是饿死','死外边 从这跳下去','也不会吃你们一点东西','真好吃']
  ],
  [
    'template_name' => 'jinkela',
    'name' => '金坷垃',
    'small' => true,
    'input_num' => 6,
    'input_placeholder' => ['金坷垃好处都有啥','谁说对了就给他','肥料掺了金坷垃','不流失 不蒸发 零浪费','肥料掺了金坷垃','能吸收两米下的氮磷钾']
  ],
  [
    'template_name' => 'marmot',
    'name' => '土拔鼠',
    'small' => true,
    'input_num' => 2,
    'input_placeholder' => ['金坷垃好处都有啥','谁说对了就给他']
  ],
  [
    'template_name' => 'dagong',
    'name' => '窃格瓦拉',
    'small' => true,
    'input_num' => 6,
    'input_placeholder' => ['没有钱啊 肯定要做的啊','不做的话没有钱用','那你不会去打工啊','有手有脚的','打工是不可能打工的','这辈子不可能打工的']
  ],
  [
    'template_name' => 'kongming',
    'name' => '诸葛孔明beta',
    'small' => true,
    'input_num' => 2,
    'input_placeholder' => ['没想到','竟说出如此粗鄙之语']
  ],

];
