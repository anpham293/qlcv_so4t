var imageTypes = ['jpeg', 'jpg', 'png']; //Validate the images to show
function showImage(src, target)
{
    var fr = new FileReader();
    fr.onload = function(e)
    {
        target.src = this.result;
    };
    fr.readAsDataURL(src.files[0]);

}
var uploadImage = function(obj)
{
    $('#img-view').html('<img id="aImgShow" src="" style="width: 150px; margin-top:20px" class="hidden"/><a data-toggle="collapse" data-target="#aImgShow" aria-expanded="true">Hiện/ẩn ảnh</a>');
    var val = obj.value;
    var lastInd = val.lastIndexOf('.');
    var ext = val.slice(lastInd + 1, val.length);
    console.log(imageTypes.indexOf(ext))
    if (imageTypes.indexOf(ext) !== -1)
    {
        var id = $(obj).data('target');
        var src = obj;
        var target = $(id)[0];
        showImage(src, target);

    }
    else
    {
        $('#img-view').html("");
    }
    $("#aImgShow").removeAttr('class').attr('class','colapse collapse in');
};

function showDocumentFileuploadThumbnail(obj,target,filetype){
    var val = obj.value;
    var lastInd = val.lastIndexOf('.');
    var ext = val.slice(lastInd + 1, val.length);
    var checkfiletype=false;
    $.each(filetype,function(index,value){
        if(ext==value){
            checkfiletype=true;
            return 1;
        }
    });
    if(checkfiletype){
        $(target).html('<p class="alert alert-success">Valid file extension</p>');
        return true;
    }else{
        $(target).html('<p class="alert alert-danger">Invalid file extension</p>');
        return false;
    }
}

