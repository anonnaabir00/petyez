import './bootstrap';

var $ = require( "jquery" );

var data = 'Alhamdulillah. Ajax Response.'

$.ajax({
    type:'GET',
    url:'/test',
    data: { id: 1 },
    success:function(data) {
        console.log(data);
    //    $("#msg").html(data.msg);
    }
 });