(function ($) {
    $.fn.pagination = function (option) {
        var defaults = {pagesize: 5, count: 5};
        var options = $.extend(defaults, option);
        var d = "";
        var i = 0;
        if (options.count > options.pagesize) {
            d += '<tr><td colspan="2"><nav aria-label="Page navigation example">' + '<ul class="pagination" style="float: right">' + '<li class="page-item"><a class="page-link" href="javaScript:void(0);" id="paging-begin" style="display: none"><<</a></li>' + '<li class="page-item"><a class="page-link" href="javaScript:void(0);" id="paging-truoc" style="display: none">Trang trước <</a></li>' + '<li class="page-item"><a href="javaScript:void(0);" class="paging-a actived" value="1" id="a-1">1</a></li>';
            if (options.count % options.pagesize === 0) {
                for (i = 2; i <= Math.floor(options.count / options.pagesize); i++) {
                    if (i <= 5) d += '<li class="page-item"><a href="javaScript:void(0);" class="paging-a" value="' + i + '" id="a-' + i + '">' + i + '</a></li>'; else
                        d += '<li class="page-item"><a href="javaScript:void(0);" class="paging-a" value="' + i + '" id="a-' + i + '" style="display:none">' + i + '</a></li>';
                }
            } else {
                for (i = 2; i <= Math.floor(options.count / options.pagesize + 1); i++) {
                    if (i <= 5) d += '<li class="page-item"><a href="javaScript:void(0);" class="paging-a" value="' + i + '" id="a-' + i + '">' + i + '</a></li>'; else
                        d += '<li class="page-item"><a href="javaScript:void(0);" class="paging-a" value="' + i + '" id="a-' + i + '" style="display:none">' + i + '</a></li>';
                }
            }
            d += '<li class="page-item"><a class="page-link" href="javaScript:void(0);" id="paging-sau">> Trang sau</a></li>' + '<li class="page-item"><a class="page-link" href="javaScript:void(0);" id="paging-end">>></a></li>' + '</ul></nav></td></tr>';
        }
        $(this).after(d);
        return this.each(function () {
            var numItems = $('a.paging-a').length;
            $(document).on('click', '.paging-a', function () {
                var thiss = $(this);
                var now = thiss.attr('value');
                if (now * 1 != 1) {
                    $('#paging-truoc').show();
                    $('#paging-begin').show();
                } else {
                    $('#paging-truoc').hide();
                    $('#paging-begin').hide();
                }
                if (now * 1 != numItems) {
                    $('#paging-sau').show();
                    $('#paging-end').show();
                } else {
                    $('#paging-sau').hide();
                    $('#paging-end').hide();
                }
                if (now * 1 >= 3) {
                    $('.paging-a').hide();
                    for (var tsss = now * 1 - 2; tsss <= now * 1 + 2; tsss++) {
                        $("#a-" + tsss).show();
                    }
                }
                var actived = $('.actived');
                actived.removeAttr('class').attr('class', 'paging-a');
                var t = actived.attr('value');
                var begin = t * options.pagesize - (options.pagesize - 1);
                var end = t * options.pagesize;
                var i;
                for (i = begin; i <= end; i++) {
                    $("#pagination-" + i).hide();
                }
                thiss.removeAttr('class').attr('class', 'paging-a actived');
                var ts = thiss.attr('value');
                var begin2 = ts * options.pagesize - (options.pagesize - 1);
                var end2 = ts * options.pagesize;
                for (i = begin2; i <= end2; i++) {
                    $("#pagination-" + i).fadeIn("slow");
                }
            });
            $(document).on('click', '#paging-truoc', function () {
                var actived = $('.actived');
                var t = actived.attr('value');
                $('#a-' + (t * 1 - 1)).click();
            });
            $(document).on('click', '#paging-sau', function () {
                var actived = $('.actived');
                var t = actived.attr('value');
                $('#a-' + (t * 1 + 1)).click();
            });
            $(document).on('click', '#paging-begin', function () {
                var actived = $('.actived');
                var t = actived.attr('value');
                $('#a-1').click();
                $('.paging-a').hide();
                for (var tsss = 1; tsss <= options.pagesize; tsss++) {
                    $("#a-" + tsss).show();
                }
            });
            $(document).on('click', '#paging-end', function () {
                var actived = $('.actived');
                var t = actived.attr('value');
                $('#a-' + numItems).click();
                $('.paging-a').hide();
                for (var tsss = (numItems - (options.pagesize - 1)); tsss <= numItems; tsss++) {
                    $("#a-" + tsss).show();
                }
            });
        });
    }
}(jQuery));