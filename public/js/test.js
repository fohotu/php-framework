$(function(){
    $('#send').click(function(){
        $.ajax({
            url: '/main/test',
            type: 'post',
            data: {'id':2},
            success: function(res){
                console.log(res);
            },
            error:function(){
                alert('error');
            }
        })
    })

    function send(){
        alert('send');
    }
})