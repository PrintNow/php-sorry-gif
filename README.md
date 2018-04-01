# [PHP版]在线制作 `sorry 为所欲为` 的gif
`sorry有钱真的可以为所欲为`

# 说明
思路参考 [sorry](https://github.com/xtyxtyx/sorry)。
目前已有：
1. [Ruby](https://github.com/xtyxtyx/sorry)
2. [Python](https://github.com/East196/sorrypy)
3. [Java](https://github.com/li24361/sorryJava)
4. [Node.JS](https://github.com/q809198545/node-sorry)

~~世界上最好的语言 PHP~~ 当然也不能少！🐶🐶🐶🐶🐶

# 使用到的技术：
1. GIF 生成核心：[ffmpeg](https://www.ffmpeg.org/)

## 准备

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

#配置 ffmpeg，主要是打开 x11grab
./configure --enable-gpl --enable-version3 --enable-nonfree --enable-postproc  --enable-pthreads --enable-libfaac  --enable-libmp3lame --enable-libtheora --enable-libx264 --enable-libxvid --enable-x11grab --enable-libvorbis

#编译安装
make && make install

#安装完成后执行
ffmpeg version
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
1. 开启 PHP `system` 函数，可以参照这篇文章 [php开启exec等函数](http://blog.51cto.com/pencild/1412023)
2. 敬请享用！
