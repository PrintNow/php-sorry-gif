var $$ = mdui.JQ;

function creat_gif() {
  var type = location.hash.substring(1);
  var small = $$("#small-size").is(":checked");
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
       		var result = '<h4>生成成功！</h4><p>点击下载：<a class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent" href=".'+data.path+'" download="weisuoyuwei.gif">下载</a></p>';
      }else{
        	var result = '<h4>生成失败！</h4><p>error code：'+data.code+'</p><br/><p>error msg：'+data.msg+'</p>';
      }

      mdui.alert(result);

    }
  });
}
