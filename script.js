var _tweet;
NewTweet();

db.collection('labelledTweets').doc('00000000').onSnapshot(function(document) {
    $('#compteur').html('<b>'+document.data()['counter']+'</b> tweets analysés');
});

$('#neutre').change(()=>{
    $('input[type=checkbox]').each(function () {
        $(this).prop('disabled', $('#neutre').is(':checked'));
        if($(this)[0].id!='neutre' && $('#neutre').is(':checked')){
            $(this).prop('checked', false);
        }
    });
    $('#neutre').prop('disabled',false);
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