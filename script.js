$(document).ready(function(){
    var i = 1;

    var direction = $('.direction');

    var Disp = function(j, div_input){

        $.getJSON("json.json", function(data){
            var item = data[j];
            var output = "<p>Employee# "+item['userid']+": "+item['LastName']+", "+item['FirstName']+"</p><img src='"+item['Picture']+"' />";
            $(div_input).html(output);


        });
    };

    var bigDisp = function(j){
        Disp(j, "#main");
        Disp(j-1, ".placeholder-prev");
        Disp(j+1, ".placeholder-next");
    }
    $("#toggle").hide();
    direction.mouseenter(function(){
        $(this).addClass('highlight');
    });
    direction.mouseleave(function(){
        $(this).removeClass('highlight');
    });
    $('#main').click(function(){
        $('#toggle').slideToggle('fast');
    });

    $(".next").on('click', function(){
       i+=1;

            bigDisp(i) ;


    });
    $(".prev").on('click', function(){
        i-=1;
        bigDisp(i);

    });
    bigDisp(i);

});