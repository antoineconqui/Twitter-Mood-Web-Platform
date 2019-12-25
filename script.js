var _tweet;
NewTweet();

db.collection('counters').doc('labelled').onSnapshot(function(document) {
    $('#compteur').html('<b>'+document.data()['counter']+'</b> tweets analysés');
});

$('.mood-button').click((e)=>{
    if($(e.target).hasClass('checked')){
        $(e.target).removeClass('checked');
    }
    else{
        if(!$('#neutre').hasClass('checked')){
            $(e.target).addClass('checked');
        }
    }
});

$('#neutre').click(()=>{
    $('.mood-button').each(function () {
        if($('#neutre').hasClass('checked')){
            $(this).addClass('disabled');
        }
        else{
            $(this).removeClass('disabled');
        }
        if($(this)[0].id!='neutre' && $('#neutre').hasClass('checked')){
            $(this).removeClass('checked');
        }
    });
    $('#neutre').removeClass('disabled');
});

$('#submit').click(()=>{
    SaveLabelledTweet(_tweet);
    $.cookie('lastLabelledTweet', _tweet['id'], { expires: 365 });
    NewTweet();
});

$('#next').click(()=>{
    $.cookie('lastLabelledTweet', _tweet['id'], { expires: 365 });
    NewTweet();
});

$('#projectButton').click(()=>{
    $('#projectModal').show();
});

$('.modal').click(()=>{
    $('#projectModal').hide();
});