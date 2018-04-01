<?php
define('ROOT',__DIR__);
$type = isset($_POST['type']) ? $_POST['type'] : false;
$data = isset($_POST['data']) ? $_POST['data'] : false;
$small = isset($_POST['small']) ? $_POST['small'] : false;
$request_time = time(true);
if($type && $data && $small){
  $TEMP_ROOT = ROOT.'/templates/'.$type.'/';
  $TEMP_ASS = $TEMP_ROOT.$type.'.ass';
  
  if($small == true){
    $TEMP_VIDEO = $TEMP_ROOT.'small-'.$type.'.mp4';
  }else{
    $TEMP_VIDEO = $TEMP_ROOT.$type.'.mp4';
  }
  
  $CACHE_ASS_PATH = ROOT.'/cache/'.$type.'_'.$request_time.'.ass';
  if(file_exists($TEMP_ROOT)){
    $ass_file = file_get_contents($TEMP_ASS);
    for($i=0;$i<count($data);$i++){
      $str_source[$i] = '<?_{'.$i.'}_?>';
    }
    $change_ass = str_replace($str_source,$data,$ass_file);
    file_put_contents($CACHE_ASS_PATH,$change_ass);
    $out_put_file=ROOT.'/cache/'.$request_time.'.gif';
    $command = 'ffmpeg -y -i '.$TEMP_VIDEO.' -vf "ass='.$CACHE_ASS_PATH.'" '.$out_put_file;
    system($command);
    $result['code'] = 200;
    $result['msg'] = '应该生成成功...';
    $result['path'] = '/cache/'.$request_time.'.gif';
    unlink($CACHE_ASS_PATH);
  }else{
    $result['code'] = 404;
    $result['msg'] = '模板文件不存在！';
  }
}else{
  $result['code'] = 400;
  $result['msg'] = '缺少必要参数，请检查！';
}
echo json_encode($result);
