var $$ = mdui.JQ;

function creat_gif() {
  var type = location.hash.substring(1);
  var small = $$("#small-size").is(":checked");
  var get_input_data = $$("input[name='first']").get();
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
      // $$("#search_music").removeAttr("disabled");
      // $$("#search_music").val("搜索");
    }
  });
}
