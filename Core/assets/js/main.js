$(".dropzone").dropzone({
    url: "Admin/EditMe/uploadImage",
    success : function (file,response) {
        alert(response);
        changeSrc("uploadMyImage", response);
    }
});

function changeSrc(var tag,var src)
{
    $('#' + tag ).src(src);
}