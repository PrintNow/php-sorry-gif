<?php
$INDEX = require_once __DIR__.'/templates/index.php';
?>
<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta name="renderer" content="webkit">
		<meta name="theme-color" content="#607d8b" />
		<title>Sorry! 在线生成 - 现在工具网</title>
		<link href="https://cdn.bootcss.com/mdui/0.4.0/css/mdui.min.css" rel="stylesheet">
	</head>
	<body class="mdui-drawer-body-left mdui-appbar-with-toolbar mdui-theme-primary-blue-grey mdui-theme-accent-pink">
		<header class="mdui-appbar mdui-appbar-fixed">
			<div class="mdui-toolbar mdui-color-theme">
				<span class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white" mdui-drawer="{target: '#main-drawer', swipe: true}"><i class="mdui-icon material-icons">menu</i></span>
				<a href="https://nowtool.cn" target="_blank" class="mdui-typo-headline mdui-hidden-xs">现在工具网</a>
				<a href="./" class="mdui-typo-title">首页</a>
			</div>
		</header>

		<div class="mdui-drawer" id="main-drawer">
			<div class="mdui-list" mdui-collapse="{accordion: true}" style="margin-bottom: 76px;">
				<li class="mdui-list-item mdui-ripple">
					<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-blue">home</i>
					<div class="mdui-list-item-content">
						<a href="./" class="mdui-ripple">首页</a>
					</div>
				</li>

				<!--<li class="mdui-list-item mdui-ripple">
					<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-blue">home</i>
					<div class="mdui-list-item-content">
						<a href="https://sorry.nowtime.cc/#weisuoyuwei" class="mdui-ripple"> 为所欲为</a>
					</div>
				</li>-->

			</div>
		</div>


		<div class="mdui-tab mdui-color-blue-grey" mdui-tab>
			<a href="#home" class="mdui-ripple get_value_class" onclick="window.location.hash='home'">
				<label>首页</label>
			</a>
			<?php foreach ($INDEX as $value) : ?>
				<a href="#<?php echo $value['template_name']; ?>" class="mdui-ripple get_value_class" onclick="window.location.hash='<?php echo $value['template_name']; ?>'">
					<label><?php echo $value['name']; ?></label>
				</a>
			<?php endforeach; ?>

		</div>

		<div id="home" class="mdui-p-a-2">
			<div class="mdui-panel" mdui-panel>
				<div class="mdui-panel-item mdui-panel-item-open">
					<div class="mdui-panel-item-body">
						<p></p>
						<div class="mdui-typo">
							<h3>[PHP版] 为所欲为 <small><a href="https://github.com/PrintNow/php-sorry-gif" target="_blank">GitHub</a></small></h3>
							<h4>更多动图尽情期待！</h4>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php foreach ($INDEX as $value) : ?>
			<div id="<?php echo $value['template_name']; ?>" class="mdui-p-a-2">
				<div class="mdui-panel" mdui-panel>

					<div class="mdui-row">
						<div class="mdui-col-md-4">
							<?php if ($value['preview_image'] == 'false') : ?>
								<div class="mdui-card">
								  <div class="mdui-card-content"><h3>没有预览图哦</h4>子曰：「学而时习之，不亦说乎？有朋自远方来，不亦乐乎？人不知，而不愠，不亦君子乎？」</div>
								</div>
							<?php else : ?>
								<div class="mdui-card">
									<div class="mdui-card-media">
										<img src="<?php echo $value['preview_image']; ?>"/>
									</div>
									<!-- <div class="mdui-card-actions">
										<button class="mdui-btn mdui-ripple">点这儿加载动态图片</button>
									</div> -->
								</div>
							<?php endif; ?>
						</div>

						<div class="mdui-col-md-8">
							<?php for($i=0; $i<$value['input_num']; $i++) : ?>
								<div class="mdui-textfield">
									<label class="mdui-textfield-label">第 <?php echo $i+1; ?> 句</label>
									<input class="mdui-textfield-input" type="text" name="<?php echo $value['template_name']; ?>_value" placeholder="<?php echo $value['input_placeholder'][$i]; ?>"/>
								</div>
							<?php endfor; ?>

							<?php if($value['small']  == true): ?>
								<label class="mdui-checkbox">
									<input id="<?php echo $value['template_name']; ?>-small-size" type="checkbox" value="true" checked/>
									<i class="mdui-checkbox-icon"></i>
									是否生成 [微信兼容小尺寸] GIF 图片
								</label>
							<?php else : ?>
								<label class="mdui-checkbox mdui-hidden">
									<input id="<?php echo $value['template_name']; ?>-small-size" type="checkbox" value="false"/>
									<i class="mdui-checkbox-icon"></i>
									是否生成 [微信兼容小尺寸] GIF 图片
								</label>
							<?php endif; ?>
						</div>
					</div>

					<div class="mdui-col">
						<hr class="mdui-invisible"/><button class="mdui-btn mdui-btn-block mdui-color-theme-accent mdui-ripple" onclick="creat_gif()">生成</button>
					</div>
				</div>
			</div>
		<?php endforeach; ?>

	</body>
	<script src="https://cdn.bootcss.com/mdui/0.4.0/js/mdui.min.js"></script>
  <script src="./script.js?version=10050"></script>
</html>
