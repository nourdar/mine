$(".dropzone").dropzone({
    dictDefaultMessage: "Drop Image To Upload",
    url:"Admin/EditMe/UploadImage",
    success : function(file, response) {
       changeSrc("uploadMyImage","Store/Images/" + response.name)
    },
    acceptedFiles: "image/jpeg,image/png,image/gif",
    maxFiles: 1,
});



<!--@datetime($dateObj)-->

let tag , src ;

function changeSrc( tag, src)
{
    $('#' + tag ).attr('src',src);
}

$('.accordion-sidebar')
    .accordion()
;
$('.ui.checkbox').checkbox('slider');


$('#addNewsLetter').on('click',function(e){
    let url =  'addEmailNewsLetter';
    let data = $('#newLetterForm').serializeArray();
    let input = $('.news-letter');

    $.post(url, data, function(e){
            $('#newsLettreResponse').html('You have join my news lettre');
            $('#addNewsLetter').html("thank you <i class='fa fa-smile'></i> ");
            input.css({
                border : "2px solid green",
                background : "lightgreen",
                color:"blue"
            });
    });
    e.preventDefault();
});


$('#skillsTextarea').keyup(function(){
    val = $(this).val();
    $('#skillsPreview').text(val);
    Prism.highlightAll();

});
$(".showSkill").click(function(){
    let id = $(this).data('id');
    let div = $('#skill-preview');
    let xhr = new XMLHttpRequest();
    let url = "Admin/EditMe/Skills/Select/" + id;
    xhr.open('GET',url);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            div.text(xhr.response);
            Prism.highlightAll();
        }
    }
    xhr.send();
});


$('*[data-help]').hover(function () {
    let value = $(this).data('help');
    let child = ' <span id="decsSpan">' + value + '</span>';
    $('body').mousemove(function (e) {
        let span = $('#decsSpan');
        let left = e.pageX + 20 +"px";
        let top = e.pageY;
        console.log(left);
        span.css({top:top,left:left});
    });
    $('body').append(child);



    }, function() {
   $("#decsSpan").remove();
});
