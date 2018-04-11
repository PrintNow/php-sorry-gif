# 食用说明

## 1. 安装 `ffmpeg` 依赖命令
> 我不保证以下方法适用于所有 `Linux`，如果无法安装，请 [Google](https://www.google.com)、[Baidu](https://www.baidu.com)、[Bing](https://www.bing.com) 等其他搜索引擎或使用其他途径寻找安装 `ffmpeg` 的办法

### Ubuntu 下安装 `ffmpeg`
```
###########一键安装###########
#添加源。
sudo add-apt-repository ppa:kirillshkrogalev/ffmpeg-next

#更新源。
sudo apt-get update

#下载安装
sudo apt-get install ffmpeg
###########一键安装###########

--------我是分割线--------

##########编译安装（一键安装不可用时可以尝试此方法安装）##########
#需要用到x264库
sudo apt-get install libx264-dev

#安装依赖库
sudo apt-get install libfaac-dev libmp3lame-dev libtheora-dev libvorbis-dev libxvidcore-dev libxext-dev libxfixes-dev

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
##########编译安装（一键安装不可用时可以尝试此方法安装）##########
```

### CentOS 下安装 `ffmpeg`
```
# 安装 epel 库，如果以前装过可以不用
yum install -y epel-release

# 引入 nux.ro 的库
rpm --import http://li.nux.ro/download/nux/RPM-GPG-KEY-nux.ro  
rpm -Uvh http://li.nux.ro/download/nux/dextop/el7/x86_64/nux-dextop-release-0-5.el7.nux.noarch.rpm

# 执行安装
yum install ffmpeg

摘抄自：https://sendya.me/centos-yum-install-ffmpeg-lib/
```

### Windows 下安装 `ffmpeg` 命令
> #### 请参考此篇文章：[在Windows 上安装 FFmpeg 程序](http://blog.51cto.com/helloway/1642247)

---

## 2. Linux 下安装中文字体
- ### 2-1. 下载字体
 - 从你的 `Windows` 下的 `‪C:\Windows\Fonts\` 拷贝出中文字体...
 - 免费可用于商用中文字体：[点击查看](http://www.fonts.net.cn/album/free-chinese-fonts-1.html)
 - 更多中文字体：[点击查看](http://www.fonts.net.cn/fonts-zh-1.html)

- ### 2-2. 安装字体
> 我不保证以下方法适用于所有 Linux，如果无法 `安装字体`，请 [Google](https://www.google.com)、[Baidu](https://www.baidu.com)、[Bing](https://www.bing.com) 等其他搜索引擎或使用其他途径寻找 `Linux 安装字体` 的办法

 - `Ubuntu` [安装字体](http://www.it266.com/blog/2017/243.html)
 - `CentOS`  [安装字体](https://blog.csdn.net/wlwlwlwl015/article/details/51482065)
 - `Windows` 一般不用...

---

## 3. 一切准备就绪，食用方法
1. 开启 PHP 的 `system` 函数（一般是禁用了的），可以参照这篇文章 [php开启exec等函数](http://blog.51cto.com/pencild/1412023)
2. 将源码上传到网站根目录
3. 敬请享用！
4. DEMO：[点我](https://gifs.ga/)


# 注意
### 此程序建议：
- 有搭建过 PHP 程序
- 有一定的 Linux 基础（如输入完命令要按回车执行、知道 `vi`、`vim` 等命令的简单使用）
- 我是比较懒，懒得再写怎么搭建 `PHP 环境` 了，望谅解
