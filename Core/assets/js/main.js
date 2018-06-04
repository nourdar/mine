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