var libFileExtensionImage = function(extension){
    switch(extension) {
        case 'doc':
            return 'fa fa-file-word-o';
        case 'docx':
            return 'fa fa-file-word-o';
        case 'xls':
            return 'fa fa-file-excel-o';
        case 'xlsx':
            return 'fa fa-file-excel-o';
        case 'pdf':
            return 'fa fa-file-pdf-o';
        default:
        // code block
    }
};



$(document).on('click', '.tab-seo', function () {

    $(".seo-content").toggle();
});

$(document).on('click', '.radio-img', function () {
    var id = $(this).attr('id');
    $.ajax({
        url: 'defaultimg',
        data: {id: id},
        type: 'post',
        dataType: 'json',
        success: function (data) {
        }
    })
});
$(document).on('click', '.close-img-dele', function () {
    var id = $(this).attr('id');
    $.ajax({
        url: 'xoaanh',
        data: {id: id},
        type: 'post',
        dataType: 'json',
        success: function (data) {
            $("#hinhanh-" + id).fadeOut('slow');
        }
    })
});

$(document).on('change', '.update-user', function () {

    var t = $(this);

    $.ajax({

        url: t.attr('control') + "/updateuser",

        data: {

            id: t.attr('vals'),

            value: t.val()

        },

        type: 'post',

        beforeSend: function () {

            block({target: "#crud-datatable-container"});

        },

        success: function () {

            $.pjax.reload({container: "#crud-datatable-pjax"});

        },

        complete: function () {

            unblock("#crud-datatable-container");

        }

    });

});

$(document).on('click', '.home-change', function () {
    var t = $(this);

    $.ajax({
        url: t.attr('control') + "/updatehome",
        data: {
            id: t.attr('vals')
        },
        type: 'post',
        beforeSend: function () {
            block({target: "#crud-datatable-container"});
        },
        success: function () {

        },
        complete: function () {
            if (t.attr('class') === 'home-change glyphicon glyphicon-ok text-success')
                t.removeAttr('class').attr('class', 'home-change glyphicon glyphicon-remove text-danger');
            else
                t.removeAttr('class').attr('class', 'home-change glyphicon glyphicon-ok text-success');
            unblock("#crud-datatable-container");
        }
    });

});
$(document).on('click', '.active-change', function () {
    var t = $(this);

    $.ajax({
        url: t.attr('control') + "/updateactive",
        data: {
            id: t.attr('vals')
        },
        type: 'post',
        beforeSend: function () {
            block({target: "#crud-datatable-container"});
        },
        success: function () {

        },
        complete: function () {
            if (t.attr('class') === 'active-change glyphicon glyphicon-ok text-success')
                t.removeAttr('class').attr('class', 'active-change glyphicon glyphicon-remove text-danger');
            else
                t.removeAttr('class').attr('class', 'active-change glyphicon glyphicon-ok text-success');
            unblock("#crud-datatable-container");
        }
    });
});
$(document).on('change', '.update-parent', function () {
    var t = $(this);
    $.ajax({
        url: t.attr('control') + "/updateparent",
        data: {
            id: t.attr('vals'),
            value: t.val()
        },
        type: 'post',
        beforeSend: function () {
            block({target: "#crud-datatable-container"});
        },
        success: function () {
            $.pjax.reload({container: "#crud-datatable-pjax"});
        },
        complete: function () {
            unblock("#crud-datatable-container");
        }
    });
});
$(document).on('change', '.update-foreign', function () {
    var t = $(this);
    $.ajax({
        url: t.attr('control') + "/updateforeign",
        data: {
            id: t.attr('vals'),
            value: t.val(),
            foreign: t.attr('foreign')
        },
        type: 'post',
        beforeSend: function () {
            block({target: "#crud-datatable-container"});
        },
        success: function () {

        },
        complete: function () {
            unblock("#crud-datatable-container");
        }
    });
});

$(document).on('change', '.position-change', function () {
    var t = $(this);
    $.ajax({
        url: t.attr('control') + "/updateposition",
        data: {
            id: t.attr('vals'),
            value: t.val()
        },
        type: 'post',
        beforeSend: function () {
            block({target: "#crud-datatable-container"});
        },
        success: function () {
        },
        complete: function () {
            unblock("#crud-datatable-container");
        }
    })
})
$(document).on('change', '.update-position', function () {

    var t = $(this);

    $.ajax({

        url: t.attr('control') + "/updateposition",

        data: {

            id: t.attr('vals'),

            value: t.val()

        },

        type: 'post',

        beforeSend: function () {

            block({target: "#crud-datatable-container"});

        },

        success: function () {

            $.pjax.reload({container: "#crud-datatable-pjax"});

        },

        complete: function () {

            unblock("#crud-datatable-container");

        }

    });

});
$(document).on('change', '.ord-change', function () {
    var t = $(this);
    $.ajax({
        url: t.attr('control') + "/updateord",
        data: {
            id: t.attr('vals'),
            value: t.val()
        },
        type: 'post',
        beforeSend: function () {
            block({target: "#crud-datatable-container"});
        },
        success: function () {
        },
        complete: function () {
            unblock("#crud-datatable-container");
        }
    })
});
$(document).on('change', '.position-change', function () {

    var t = $(this);

    $.ajax({

        url: t.attr('control') + "/updateposition",

        data: {

            id: t.attr('vals'),

            value: t.val()

        },
        type: 'post',

        beforeSend: function () {

            block({target: "#crud-datatable-container"});
        },
        success: function () {
        },

        complete: function () {

            unblock("#crud-datatable-container");

        }

    })

});
$(document).on('click', '.hott-change', function () {
    var t = $(this);
    $.ajax({
        url: t.attr('control') + "/updatehot",
        data: {
            id: t.attr('vals'),
            value: t.val()
        },
        type: 'post',
        beforeSend: function () {
            block({target: "#crud-datatable-container"});
        },
        success: function () {
        },
        complete: function () {
            if (t.attr('class') === 'active-change glyphicon glyphicon-ok text-success')
                t.removeAttr('class').attr('class', 'active-change glyphicon glyphicon-remove text-danger');
            else
                t.removeAttr('class').attr('class', 'active-change glyphicon glyphicon-ok text-success');
            unblock("#crud-datatable-container");
        }
    })
});
$(document).on('click', '.new-change', function () {
    var t = $(this);
    $.ajax({
        url: t.attr('control') + "/updatenew",
        data: {
            id: t.attr('vals'),
            value: t.val()
        },
        type: 'post',
        beforeSend: function () {
            block({target: "#crud-datatable-container"});
        },
        success: function () {
        },
        complete: function () {

            if (t.attr('class') === 'active-change glyphicon glyphicon-ok text-success')
                t.removeAttr('class').attr('class', 'active-change glyphicon glyphicon-remove text-danger');
            else
                t.removeAttr('class').attr('class', 'active-change glyphicon glyphicon-ok text-success');
            unblock("#crud-datatable-container");
        }
    })
});

//editor
var imageTypes = ['jpeg', 'jpg', 'png']; //Validate the images to show
function showImage(src, target) {
    var fr = new FileReader();
    fr.onload = function (e) {
        target.src = this.result;
    };
    fr.readAsDataURL(src.files[0]);

}

var uploadImage = function (obj) {
    var val = obj.value;
    var lastInd = val.lastIndexOf('.');
    var ext = val.slice(lastInd + 1, val.length);
    console.log(imageTypes.indexOf(ext))
    if (imageTypes.indexOf(ext) !== -1) {
        var id = $(obj).data('target');
        var src = obj;
        var target = $(id)[0];
        showImage(src, target);

    } else {

    }

};

var uploadImage2 = function (obj) {

    var val = obj.value;
    var lastInd = val.lastIndexOf('.');
    var ext = val.slice(lastInd + 1, val.length);
    console.log(imageTypes.indexOf(ext))
    if (imageTypes.indexOf(ext) !== -1) {
        var id = $(obj).data('target');
        var src = obj;
        var target = $(id)[0];
        showImage(src, target);

    } else {
        $('#img-view').html("");
    }
    $("#aImgShow").removeAttr('class').attr('class', 'colapse collapse in');
};
// Replace the <textarea id="editor1"> with a CKEditor
// instance, using default configuration.
CKEDITOR.config.width = "100%";
CKEDITOR.plugins.registered['save'] =
    {
        init: function (editor) {
            var command = editor.addCommand('save',
                {
                    modes: {wysiwyg: 1, source: 1},
                    exec: function (editor) {
                        var fo = editor.element.$.form;
                        editor.updateElement();
                        rxsubmit(fo);
                    }
                }
            );
            editor.ui.addButton('Save', {label: 'My Save', command: 'save'});
        }
    };
/*-------------------------------------------------------------------------------*/
$(document).on('click', '.btn-view-cthd', function () {
    var iddonhang = $(this).attr('id');
    $.pjax.reload({container: '#grid-CTDDH', data: {iddonhang: iddonhang}, method: 'post'});
    $("#modal-chitet-donhang").modal("show");

});
/*them thuoc tinh cho san pham*/
$(document).on('click', '.click-thongso', function (e) {
    e.preventDefault();
    var id = $(this).attr('id');
    var giatri = $(this).attr('giatri');
    var types = $(this).attr('types');

    var table = "#table-them-" + giatri + " tbody";
    var emptyRow = $(table + " .emptyRow").length;

    var indexsanpham = parseInt($("#index-sanpham-" + giatri).val(), 10);

    $.ajax({
        url: 'addnewrow',
        data: {
            indexsanpham: indexsanpham,
            giatri: giatri,
            types: types
        },
        type: 'post',
        dataType: 'json',
        beforeSend: function () {
        },
        success: function (data) {

            if (emptyRow > 0) {
                $(table).html(data.newRow);
            } else
                $(table).append(data.newRow);
            indexsanpham++;
            $("#index-sanpham-" + giatri).val(indexsanpham);
        },
        error: function (r1, r2) {
            alert(r2.responseText)
        }
    })
});
$(document).on('click', '.btn-remove-row', function (e) {
    e.preventDefault();
    var id = $(this).attr('id');
    var giatri = $(this).attr('xoa');
    var table = "#table-them-" + giatri + " tbody";
    $("#" + id).parent().parent().remove();
    var sodongconlai = $(table + " tr").length;
    if (sodongconlai == 0)
        $(table).html('<tr class="emptyRow"><td colspan="6"><p>chưa nhập thông tin</p></td></tr>')
});

function selectchange(e) {
    $.ajax({
        url: 'bindproperties',
        data: {idcatproduct: e},
        type: 'post',
        dataType: 'json',
        beforeSend: function () {
        },
        success: function (data) {
            $('#tab2').html(data.property)
        }
    })
}

$(document).on('change', '.btn-trangthai', function () {
    var id = $(this).attr('id');
    var val = $(this).val();
    if (confirm("bạn có muốn lưu không")) {
        $.ajax({
            url: 'bill/updatetrangthai',
            data: {id: id, value: val},
            type: 'post',
            dataType: 'json',
            beforeSend: function () {
            },
            success: function (data) {

                $.pjax.reload({
                    container: '#crud-datatable',
                });

            }
        })
    }
});


(function ($) {
    $.fn.hasAttr = function (name) {
        return this.attr(name) !== undefined;
    };
}(jQuery));

function ModalRemote(modalId) {
    this.defaults = {okLabel: "OK", executeLabel: "Execute", cancelLabel: "Cancel", loadingTitle: "Loading"};
    this.modal = $(modalId);
    this.dialog = $(modalId).find('.modal-dialog');
    this.header = $(modalId).find('.modal-header');
    this.content = $(modalId).find('.modal-body');
    this.footer = $(modalId).find('.modal-footer');
    this.loadingContent = '<div class="progress progress-striped active" style="margin-bottom:0;"><div class="progress-bar" style="width: 100%"></div></div>';
    this.show = function () {
        this.clear();
        $(this.modal).modal('show');
    };
    this.hide = function () {
        $(this.modal).modal('hide');
    };
    this.toggle = function () {
        $(this.modal).modal('toggle');
    };
    this.clear = function () {
        $(this.modal).find('.modal-title').remove();
        $(this.content).html("");
        $(this.footer).html("");
    };
    this.setSize = function (size) {
        $(this.dialog).removeClass('modal-lg');
        $(this.dialog).removeClass('modal-sm');
        if (size == 'large') $(this.dialog).addClass('modal-lg'); else if (size == 'small') $(this.dialog).addClass('modal-sm'); else if (size !== 'normal') console.warn("Undefined size " + size);
    };
    this.setHeader = function (content) {
        $(this.header).html(content);
    };
    this.setContent = function (content) {
        $(this.content).html(content);
    };
    this.setFooter = function (content) {
        $(this.footer).html(content);
    };
    this.setTitle = function (title) {
        $(this.header).find('h4.modal-title').remove();
        $(this.header).append('<h4 class="modal-title">' + title + '</h4>');
    };
    this.hidenCloseButton = function () {
        $(this.header).find('button.close').hide();
    };
    this.showCloseButton = function () {
        $(this.header).find('button.close').show();
    };
    this.displayLoading = function () {
        this.setContent(this.loadingContent);
        this.setTitle(this.defaults.loadingTitle);
    };
    this.addFooterButton = function (label, type, classes, callback) {
        buttonElm = document.createElement('button');
        buttonElm.setAttribute('type', type === null ? 'button' : type);
        buttonElm.setAttribute('class', classes === null ? 'btn btn-primary' : classes);
        buttonElm.innerHTML = label;
        var instance = this;
        $(this.footer).append(buttonElm);
        if (callback !== null) {
            $(buttonElm).click(function (event) {
                callback.call(instance, this, event);
            });
        }
    };
    this.doRemote = function (url, method, data) {
        var instance = this;
        $.ajax({
            url: url, method: method, data: data, async: false, beforeSend: function () {
                beforeRemoteRequest.call(instance);
            }, error: function (response) {
                errorRemoteResponse.call(instance, response);
            }, success: function (response) {
                successRemoteResponse.call(instance, response);
            }, contentType: false, cache: false, processData: false
        });
    };

    function beforeRemoteRequest() {
        this.show();
        this.displayLoading();
    }

    function errorRemoteResponse(response) {
        this.setTitle(response.status + response.statusText);
        this.setContent(response.responseText);
        this.addFooterButton('Close', 'button', 'btn btn-default', function (button, event) {
            this.hide();
        })
    }

    function successRemoteResponse(response) {
        if (response.forceReload !== undefined && response.forceReload) {
            if (response.forceReload == 'true') {
                $.pjax.reload({container: '#crud-datatable-pjax'});
            } else {
                $.pjax.reload({container: response.forceReload});
            }
        }
        if (response.forceClose !== undefined && response.forceClose) {
            this.hide();
            return;
        }
        if (response.size !== undefined) this.setSize(response.size);
        if (response.title !== undefined) this.setTitle(response.title);
        if (response.content !== undefined) this.setContent(response.content);
        if (response.footer !== undefined) this.setFooter(response.footer);
        if ($(this.content).find("form")[0] !== undefined) {
            this.setupFormSubmit($(this.content).find("form")[0], $(this.footer).find('[type="submit"]')[0]);
        }
    }

    this.setupFormSubmit = function (modalForm, modalFormSubmitBtn) {
        if (modalFormSubmitBtn === undefined) {
            console.warn('Modal has form but does not have a submit button');
        } else {
            var instance = this;
            $(modalFormSubmitBtn).click(function (e) {
                var data;
                if (window.FormData) {
                    data = new FormData($(modalForm)[0]);
                } else {
                    data = $(modalForm).serializeArray();
                }
                instance.doRemote($(modalForm).attr('action'), $(modalForm).hasAttr('method') ? $(modalForm).attr('method') : 'GET', data);
            });
        }
    };
    this.confirmModal = function (title, message, okLabel, cancelLabel, size, dataUrl, dataRequestMethod, selectedIds) {
        this.show();
        this.setSize(size);
        if (title !== undefined) {
            this.setTitle(title);
        }
        this.setContent('<form id="ModalRemoteConfirmForm">' + message);
        var instance = this;
        if (okLabel !== false) {
            this.addFooterButton(okLabel === undefined ? this.defaults.okLabel : okLabel, 'submit', 'btn btn-primary', function (e) {
                var data;
                if (window.FormData) {
                    data = new FormData($('#ModalRemoteConfirmForm')[0]);
                    if (typeof selectedIds !== 'undefined' && selectedIds) data.append('pks', selectedIds.join());
                } else {
                    data = $('#ModalRemoteConfirmForm');
                    if (typeof selectedIds !== 'undefined' && selectedIds) data.pks = selectedIds;
                    data = data.serializeArray();
                }
                instance.doRemote(dataUrl, dataRequestMethod, data);
            });
        }
        this.addFooterButton(cancelLabel === undefined ? this.defaults.cancelLabel : cancelLabel, 'button', 'btn btn-default pull-left', function (e) {
            this.hide();
        });
    }
    this.open = function (elm, bulkData) {
        if ($(elm).hasAttr('data-confirm-title') || $(elm).hasAttr('data-confirm-message')) {
            this.confirmModal($(elm).attr('data-confirm-title'), $(elm).attr('data-confirm-message'), $(elm).attr('data-confirm-alert') ? false : $(elm).attr('data-confirm-ok'), $(elm).attr('data-confirm-cancel'), $(elm).hasAttr('data-modal-size') ? $(elm).attr('data-modal-size') : 'normal', $(elm).hasAttr('href') ? $(elm).attr('href') : $(elm).attr('data-url'), $(elm).hasAttr('data-request-method') ? $(elm).attr('data-request-method') : 'GET', bulkData)
        } else {
            this.doRemote($(elm).hasAttr('href') ? $(elm).attr('href') : $(elm).attr('data-url'), $(elm).hasAttr('data-request-method') ? $(elm).attr('data-request-method') : 'GET', bulkData);
        }
    }
}

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
    if(val==""){
        $(target).html('<img src="/images/add-file-pngrepo-com.png" style="width: 50px">');
        return false;
    }else{
        var lastInd = val.lastIndexOf('.');
        var ext = val.slice(lastInd + 1, val.length);
        var checkfiletype=false;
        $.each(filetype,function(index,value){
            if(ext==value){
                checkfiletype=true;
                return 1;
            }
        });if(filetype.length==0){
            checkfiletype=true;
        }
        var splitArr=val.split("\\");
        if(checkfiletype){
            $(target).html('<span class="" style="line-height: 30px; vertical-align: middle"><i style="font-size: 30px" class="'+libFileExtensionImage(ext)+'"></i>     '+splitArr[splitArr.length-1]+'</span>');
            return true;
        }else{
            $(target).html('<img src="/images/add-file-pngrepo-com.png" style="width: 50px"><p class="alert alert-danger">Invalid file extension</p>');
            return false;
        }
    }
}

function renderPDF(s, canvasContainer, options) {
    canvasContainer.html("<h3>Nội dung Hồ sơ sức khỏe</h3>");
    var options = options || { scale: 1 };

    function renderPage(page) {
        var viewport = page.getViewport(options.scale);
        var canvas = document.createElement('canvas');
        var ctx = canvas.getContext('2d');
        var renderContext = {
            canvasContext: ctx,
            viewport: viewport
        };

        canvas.height = viewport.height;
        canvas.width = viewport.width;

        canvasContainer.append(canvas);

        page.render(renderContext);
    }

    function renderPages(pdfDoc) {
        for(var num = 1; num <= pdfDoc.numPages; num++)
            pdfDoc.getPage(num).then(renderPage);
    }

    pdfjsLib.disableWorker = true;
    s.then(renderPages);

}