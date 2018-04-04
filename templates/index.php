<?php
/**
  * 索引文件
  * @author: NowTime <wenzhouchan@gmail.com>
  * @link: https://github.com/PrintNow/php-sorry-gif
  * 注释可能不规范，欢迎指正
  * @param string   name：中文名，用于网站展示
  * @param boolean  small：是否有小视频文件（文件名命名为：template-small.mp4，需要自行转换视频大小），有则 true，无则 false
  * @param int      input_num：对话数，如 “为所欲为” 有 9 句话，就填 9;如 王境泽 有 4 句话，就填 4
  * @param string   preview_image：预览图，有则填图片链接,无则填 false，注意是 string 形，也就是要用引号引起来 'false' 不是直接写 false !!!
  * @param string   template_name：模板文件名，唯一标识，不能够有重复
  * @param array    input_placeholder：默认字幕，按照例子加吧
*/

return [
  [
    'name' => '为所欲为',
    'small' => true,
    'input_num' => 9,
    'preview_image' => 'https://i.loli.net/2018/04/04/5ac4b3236516b.jpg',
    'template_name' => 'weisuoyuwei',
    'input_placeholder' => ['好啊','就算你是一流工程师','就算你出报告再完美','我叫你改报告你就要改','毕竟我是客户','客户了不起啊','sorry 客户真的了不起','以后叫他天天改报告','天天改 天天改']
  ],
  [
    'name' => '王境泽',
    'small' => true,
    'input_num' => 4,
    'preview_image' => 'https://i.loli.net/2018/04/04/5ac4b32378084.jpg',
    'template_name' => 'wangjingze',
    'input_placeholder' => ['我就算是饿死','死外边 从这跳下去','也不会吃你们一点东西','真好吃']
  ],
  [
    'name' => '金坷垃',
    'small' => true,
    'input_num' => 6,
    'preview_image' => 'https://i.loli.net/2018/04/04/5ac4b3df3ce42.png',
    'template_name' => 'jinkela',
    'input_placeholder' => ['金坷垃好处都有啥','谁说对了就给他','肥料掺了金坷垃','不流失 不蒸发 零浪费','肥料掺了金坷垃','能吸收两米下的氮磷钾']
  ],
  [
    'name' => '土拔鼠',
    'small' => true,
    'input_num' => 2,
    'preview_image' => 'https://i.loli.net/2018/04/04/5ac4b3df0f43e.png',
    'template_name' => 'marmot',
    'input_placeholder' => ['金坷垃好处都有啥','谁说对了就给他']
  ],
  [
    'name' => '窃格瓦拉',
    'small' => true,
    'input_num' => 6,
    'preview_image' => 'https://i.loli.net/2018/04/04/5ac4b3236ee6b.jpg',
    'template_name' => 'dagong',
    'input_placeholder' => ['没有钱啊 肯定要做的啊','不做的话没有钱用','那你不会去打工啊','有手有脚的','打工是不可能打工的','这辈子是不可能打工的']
  ],
  [
  'name' => '大师兄',
  'small' => true,
  'input_num' => 8,
  'preview_image' => 'https://i.loli.net/2018/04/04/5ac4b32378cf1.jpg',
  'template_name' => 'dashixiong',
  'input_placeholder' => ['问得好，如果各位有兴趣的话','可以加入我们空手道部门','不过要经过选拔','因为我只会训练精英','绝对不会接收垃圾','看我干嘛？你把我当垃圾？','不是...不要误会，我不是针对你','我是说在座的各位都是垃圾']
],
  [
    'name' => '诸葛孔明beta',
    'small' => true,
    'input_num' => 2,
    'preview_image' => 'https://i.loli.net/2018/04/04/5ac4b3df1baf4.png',
    'template_name' => 'kongming',
    'input_placeholder' => ['没想到','竟说出如此粗鄙之语']
  ],
  [
    'name' => 'pop子和pipi美的日常',
    'small' => false,
    'input_num' => 7,
    'preview_image' => 'false',
    'template_name' => 'popteamepic',
    'input_placeholder' => ['嘿嘿！','丢雷楼谋','大力D','嘿嘿！！','丢埋雷楼豆','再大力D','唔好丢我啊']
  ]

];
