# [PHP版]在线制作 `sorry 为所欲为` 等其他 GIF 图片

> 思路参考 [sorry](https://github.com/xtyxtyx/sorry)
>
> GIF 生成核心：[ffmpeg](https://www.ffmpeg.org/)

> #### 稳定版下载地址：[点击查看稳定版（Bug 少）](https://github.com/PrintNow/php-sorry-gif/releases)
> #### 开发版下载地址：[点击下载开发版（Bug 多）](https://github.com/PrintNow/php-sorry-gif/archive/master.zip)
> 如果你愿意分享出你做的模板，欢迎通过以下方式提交，欢迎 issues、Pull requests 或发送素材到邮箱 wenzhouchan#gmail.com (#换成@)
> 模板如何制作？请往下看

---

# 更新日志
- #### 2018-04-10
 1. 添加 `切割拉瓦-删库跑路` 模板

- #### 2018-04-10
 1. 解决程序放在二级目录下运行，无法下载&预览问题
 2. 添加 `曾小贤答题` 模板

- #### 2018-04-05
 1. 添加上传到 `搜狗图片` 并生成外链，如果需要，请修改 `config.php`

- #### 2018-04-04
 1. 添加 `在座的各位都是垃圾` 模板

- #### 2018-04-03
 1. 修复字幕过小问题，我把 Fontsize 改成了 38 ，在我的站点：[gifs.ga](https://gifs.ga)，这个大小刚刚好，如果发现在你的服务器中生成的字幕过大，请修改 `templates/<template_name>/template.ass` 里的 Fontsize，改成适合自己的大小 ![TIM截图20180403133716.png](https://i.loli.net/2018/04/03/5ac3131fabec7.png)
 2. 真的修复了 GIF 小图片 无法生成问题...

---


## 点击查看 [使用方法](https://github.com/PrintNow/php-sorry-gif/blob/master/Usage.md)，点击查看 [添加 GIF 模板](https://github.com/PrintNow/php-sorry-gif/blob/master/Add_Template.md)

---

# 目前已有的模板

1. `为所欲为`。好啊，就算你是一流工程师，就算你出报告再完美，我叫你改报告你就要改，毕竟我是客户，客户了不起啊，sorry 客户真的了不起，以后叫他天天改报告，天天改 天天改

2. `王境泽`。我就算是饿死，死外边 从这跳下去，也不会吃你们一点东西，真香

3. `金坷垃`。金坷垃好处都有啥，谁说对了就给他，肥料掺了金坷垃，不流失 不蒸发 零浪费，肥料掺了金坷垃，能吸收两米下的氮磷钾

4. `土拔鼠`。金坷垃好处都有啥，谁说对了就给他

5. `窃格瓦拉`。没有钱啊 肯定要做的啊，不做的话没有钱用，那你不会去打工啊，有手有脚的，打工是不可能打工的，这辈子是不可能打工的

6. `在座的各位都是垃圾`。问得好，如果各位有兴趣的话，可以加入我们空手道部门，不过要经过选拔，因为我只会训练精英，绝对不会接收垃圾，看我干嘛？你把我当垃圾？，不是...不要误会，我不是针对你，我是说在座的各位都是垃圾

7. `曾小贤答题`。平时你打电子游戏吗，偶尔，星际还是魔兽，连连看

8. `诸葛孔明`。没想到，竟说出如此粗鄙之语

---

# 目录结构

```
├── cache                   # .gif、.ass（图片生成后自动删除） 缓存路径
├── templates               # 模板目录
│    └──<template name>     # 视频、字幕 模板
│    └──index.php           # 模板索引
├── README.md               # 说明文件
├── api.php                 # 图片生成核心、API
└──
```

---

# 常用特效代码
出现在句子中的特效代码会对其后的字符产生影响
```
咕咕{\i1}{\fs40}咕咕咕{\r}咕

\n 折行
\h 空格

{\i1} 斜体
{\i0} 取消斜体

{\b1} 粗体
{\b0} 取消粗体

{\u1} 下划线
{\u0} 取消下划线

{\fs60} 调整字号

{\fad(100,200)} 100ms淡入，200ms淡出

{\r} 重置所有特效
```

---

# LICENSE
The MIT License (MIT). Please see [LICENSE](https://github.com/PrintNow/php-sorry-gif/LICENSE) for more information.

百度百科：[MIT 许可证](https://baike.baidu.com/item/MIT%E8%AE%B8%E5%8F%AF%E8%AF%81)
