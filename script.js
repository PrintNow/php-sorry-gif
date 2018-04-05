var $$ = mdui.JQ;

function creat_gif() {
  var type = location.hash.substring(1);
  var small = $$("#"+type+"-small-size").is(":checked");
  var get_input_data = $$("input[name='"+type+"_value']").get();
  var input_data = [];

  for (var i=0;i<get_input_data.length;i++) {
    if(get_input_data[i].value == '' || get_input_data[i].value == false) {
      input_data[i] = get_input_data[i].placeholder;
    }else{
      input_data[i] = get_input_data[i].value;
    }
  }

  //console.log(input_data);

  $$("button[onclick='creat_gif()']").attr("disabled","");//添加禁止操作属性
  $$("button[onclick='creat_gif()']").html("正在生成中，请稍等一会儿...");

  $$.ajax({
    method: 'POST',
    url: 'api.php',
    data: {
      type: type,
      data: input_data,
      small: small,
    },
    dataType: 'json',
    success: function (data) {
      if(data.code == 200){
        if(data.upload_status == 'success') {
          var result = '<h4>生成成功！</h4><p>点击下载：<a class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent" href="'+data.path+'" download="'+type+'.gif">下载</a></p><p>点击预览：<a class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent" href="'+data.path+'" target="_blank">预览</a></p>';
        }else{
          var result = '<h4>生成成功！</h4><p>点击下载：<a class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent" href=".'+data.path+'" download="'+type+'.gif">下载</a></p><p>点击预览：<a class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent" href="'+data.path+'" target="_blank">预览</a></p>';
        }
      }else{
        	var result = '<h4>生成失败！</h4><p>error code：'+data.code+'</p><br/><p>error msg：'+data.msg+'</p>';
      }
      mdui.alert(result);
      $$("button[onclick='creat_gif()']").removeAttr("disabled","");//添加禁止操作属性
      $$("button[onclick='creat_gif()']").html("生成");
    }
  });
}
