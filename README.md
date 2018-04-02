# [PHP版]在线制作 `sorry 为所欲为` 等其他8种的gif
> `为所欲为` sorry，有钱真的可以为所欲为
>
> `王境泽` 我就算是饿死，死外边 从这跳下去，也不会吃你们一点东西，真好吃
>
> `金坷垃` 金坷垃好处都有啥，谁说对了就给他，肥料掺了金坷垃，不流失 不蒸发 零浪费，肥料掺了金坷垃，能吸收两米下的氮磷钾
>
> `土拔鼠` 金坷垃好处都有啥，谁说对了就给他
>
> `窃格瓦拉` 没有钱啊 肯定要做的啊，不做的话没有钱用，那你不会去打工啊，有手有脚的，打工是不可能打工的，这辈子是不可能打工的
>
> `诸葛孔明beta` 没想到，竟说出如此粗鄙之语

# 说明
思路参考 [sorry](https://github.com/xtyxtyx/sorry)，。
目前已有：
1. [Ruby](https://github.com/xtyxtyx/sorry)
2. [Python](https://github.com/East196/sorrypy)
3. [Java](https://github.com/li24361/sorryJava)
4. [Node.JS](https://github.com/q809198545/node-sorry)
5. PHP 当然也不能少！🐶🐶🐶🐶🐶

GIF 生成核心：[ffmpeg](https://www.ffmpeg.org/)

## 常用特效代码
出现在句子中的特效代码会对其后的字符产生影响
```
咕咕{\i1}{\fs40}咕咕咕{\r}咕
```
![示例](https://dn-coding-net-production-pp.qbox.me/2d664d1c-c691-42ae-a02c-0687f6fa17d2.png)
```
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

## 目录结构
```
├── cache                   # .gif、.ass（图片生成后自动删除） 缓存路径
├── templates               # 模板目录
│    └──<template name>     # 视频、字幕 模板
│    └──index.php           # 模板索引
├── README.md               # 说明文件
├── api.php                 # 图片生成核心、API
└── index.php               # 网站首页
```

# 准备
## 1. 安装 `ffmpeg` 依赖命令
> 我是参照网上的一些教程写的，写的可能并不全面，你可以去 Goolge、Baidu。配置时，一定要加上 `--enable-libass` 选项
### Ubuntu 下安装 `ffmpeg`（包管理是 apt 的 Linux 可使用该命令）
```
#需要用到x264库
sudo apt-get install libx264-dev

#安装依赖库
sudo apt-get install libfaac-dev
sudo apt-get install libmp3lame-dev
sudo apt-get install libtheora-dev
sudo apt-get install libvorbis-dev
sudo apt-get install libxvidcore-dev
sudo apt-get install libxext-dev
sudo apt-get install libxfixes-dev

#下载源码
wget https://ffmpeg.org/releases/ffmpeg-3.4.2.tar.bz2
tar -xf ffmpeg-3.4.2.tar.bz2
cd ffmpeg-3.4.2

#配置 ffmpeg
./configure --enable-gpl --enable-version3 --enable-nonfree --enable-postproc  --enable-pthreads --enable-libfaac  --enable-libmp3lame --enable-libtheora --enable-libx264 --enable-libxvid --enable-x11grab --enable-libvorbis --enable-libass

#编译安装
make && make install

#安装完成后执行
ffmpeg -version
#看是否安装成功

#本安装命令参考：http://www.cnblogs.com/arccosxy/p/3440210.html
```
`Ubuntu` [安装中文字体](http://www.it266.com/blog/2017/243.html)
注意：如果你安装了可以不用安装；其他系统安装中文字体请自行 Google、Baidu

### CentOS 下安装 `ffmpeg`（包管理是 yum 的 Linux 可使用该命令）
```
wget https://ffmpeg.org/releases/ffmpeg-3.4.2.tar.bz2
yum -y install bzip2
yum -y install yasm
yum -y install libass libass-devel
tar -xf ffmpeg-3.4.2.tar.bz2
cd ffmpeg-3.4.2
./configure --enable-libass

make && make install

#安装完成后执行
ffmpeg version
#看是否安装成功

#本安装命令摘自：https://github.com/q809198545/node-sorry
```
特别注意：此时生成的gif文字会乱码，因为 CentOS 7 缺少中文字体 [安装字体](https://blog.csdn.net/wlwlwlwl015/article/details/51482065)


## 使用
> 因为配置 PHP 环境比较复杂，所以你是初识 PHP 的话，建议使用这个 [Node.JS](https://github.com/q809198545/node-sorry) 版本的，相对来说比较简单。
1. 开启 PHP `system` 函数（一般是禁用了的），可以参照这篇文章 [php开启exec等函数](http://blog.51cto.com/pencild/1412023)
2. 将源码上传到网站根目录
3. 敬请享用！
4. DEMO：[点我](https://nowtool.cn/sorry/)

# 添加 GIF 模板
添加模板需要加入以下文件
```
templates/<template_name>/template.mp4        # 视频模板
templates/<template_name>/template-small.mp4  # [兼容微信小尺寸]视频模板
templates/<template_name>/template.ass        # 字幕模板
```
和修改 `templates/index.php` 文件，有注释
```
templates/index.php                           # 模板索引
```

## 制作字幕模板 template.ass
首先使用 [aegisub](http://rj.baidu.com/soft/detail/17278.html) 为模板视频创建字幕，保存为 `template.ass`（aegisub 教程可以看这个 https://tieba.baidu.com/p/1360405931 ）
![图片](https://dn-coding-net-production-pp.qbox.me/56a213df-9ff7-41e0-9b6c-96b1f0fe2cb6.png)

然后把文本替换成模板字符串 <?=[n]=?>
![图片](https://i.loli.net/2018/04/02/5ac1fb7ec0102.png)

# LICENSE
The MIT License (MIT). Please see [LICENSE](https://github.com/PrintNow/php-sorry-gif/LICENSE) for more information.
