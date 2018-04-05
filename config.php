<?php
/**
  * 是否将图片到上传到 sogouimg 并生成外链，是填 true，否则填 false
  * 如果你服务器的带宽小建议开启！
*/
define('UPLOAD_TO_SOGOU_IMG',false);

/**
  * 是否默认生成小图，是填 true，否则填 false
  * 因为我发现取消勾选“是否生成 [微信兼容小尺寸] GIF 图片”生成的一些图片非常大
  * 如 {王境泽} 的，取消勾选了，生成的图片接近 20+M，对于带宽小的服务器，下载文件就显得十分吃力了，强烈建议开启！
  * 并开启 {将图片到上传到 sogouimg 并生成外链}
*/
define('DEFAULT_CREATE_SMALL_GIF',true);
