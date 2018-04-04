<?php
$OS_TYPE=DIRECTORY_SEPARATOR=='\\'?'windows':'linux';

/**
  * 解决 ffmpeg 对 windows 系统的绝对路径“不友好问题”。
  * 好像解决的方法有点笨...
*/
if($OS_TYPE == 'windows') {
  define('ROOT','.');
}else{
  define('ROOT',__DIR__);
}

$type = isset($_POST['type']) ? $_POST['type'] : false;
$data = isset($_POST['data']) ? $_POST['data'] : false;
$small = isset($_POST['small']) ? $_POST['small'] : false;
$request_time = time(true);

if($type && $data && $small){
  $TEMP_ROOT = ROOT.'/templates/'.$type.'/';
  $TEMP_ASS = $TEMP_ROOT.'template.ass';
  $CACHE_ASS_PATH = ROOT.'/cache/'.$type.'_'.$request_time.'.ass';

  if($small == 'true'){
    $TEMP_VIDEO = $TEMP_ROOT.'template-small.mp4';
  }else{
    $TEMP_VIDEO = $TEMP_ROOT.'template.mp4';
  }

/**
  * 判断根目录是否存在 cache 目录，不存在则创建
*/
  if(!file_exists(ROOT.'/cache')){
    if(mkdir(ROOT.'/cache',0777) === false){
      $result['code'] = 500;
      $result['msg'] = '服务端 `cache` 目录不存在，尝试创建 `cache` 目录，但创建失败，请网站管理员在网站根目录手动创建 `cache` 目录';
      exit(json_encode($result));
    }
  }

  if(file_exists($TEMP_ROOT)){
    $ass_file = file_get_contents($TEMP_ASS);

    for($i=0;$i<count($data);$i++){
      $str_source[$i] = '<?=['.$i.']=?>';
    }

    $change_ass = str_replace($str_source,$data,$ass_file);

    $create_temporary_ass = fopen($CACHE_ASS_PATH, "w") or die('{"code":501,"msg":"临时字幕文件创建失败，请网站管理员检查 `cache` 目录是否具有读写权限或用户组设否设置正确！"}');
    fwrite($create_temporary_ass, $change_ass) or die('{"code":502,"msg":"临时字幕文件已创建，但写入失败，请网站管理员检查 `cache` 目录是否具有读写权限或用户组设否设置正确！"}');
    fclose($create_temporary_ass);

    $out_put_file=ROOT.'/cache/'.$request_time.'.gif';
    $command = 'ffmpeg -y -i '.$TEMP_VIDEO.' -vf "ass='.$CACHE_ASS_PATH.'" '.$out_put_file;
    system($command);
    unlink($CACHE_ASS_PATH);//删除临时生成的字幕文件

    $result['code'] = 200;
    $result['type'] = $type;
    $result['msg'] = '应该生成成功...';
    $result['path'] = '/cache/'.$request_time.'.gif';
  }else{
    $result['code'] = 404;
    $result['type'] = $type;
    $result['msg'] = '该模板文件不存在！';
  }
}else{
  $result['code'] = 400;
  $result['msg'] = '缺少必要参数，请检查！';
}

echo json_encode($result);
