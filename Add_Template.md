# 添加 GIF 模板

1. 添加模板需要 `加入 & 修改` 以下文件（加了 `*` 都是必须要做的）

```
templates/<template_name>/template.mp4        # *视频模板
templates/<template_name>/template-small.mp4  # [兼容微信小尺寸]视频模板
templates/<template_name>/template.ass        # *字幕模板(制作方法请往下看)
```

2. [必须]修改 `templates/index.php` 文件，该文件里有注释

```
templates/index.php   # 模板索引
```

# 制作字幕模板 `template.ass`
1. 首先使用 [aegisub](http://rj.baidu.com/soft/detail/17278.html) 为模板视频创建字幕，保存为 `template.ass`（aegisub 教程可以看这个 https://tieba.baidu.com/p/1360405931 ）

![图片](https://dn-coding-net-production-pp.qbox.me/56a213df-9ff7-41e0-9b6c-96b1f0fe2cb6.png)

2. 然后把文本替换成模板字符串 `<?=[n]=?>`

![图片](https://i.loli.net/2018/04/02/5ac1fb7ec0102.png)

# 提交模板
### 如果你愿意分享出你做的模板，欢迎通过以下方式提交：
- 发送 E-mail 到：wenzhouchan#gamil.com (# 换 @，邮件标题写 `提交 GIF模板`)
- 提交 Issues
- Pull requests
- 加入 QQ 群：
