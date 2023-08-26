(function ($) {
  var updateOutput = function (e) {
    var list = e.length ? e : $(e.target), output = list.data('output')
    if (window.JSON) {
      if(list[0].size!=20)
        output.val(window.JSON.stringify(list.nestable('serialize'))) //, null, 2));
    } else {
      output.val('JSON browser support required for this demo.')
    }
  }
  $.fn.dragDropMenu = function (target, output, link) {
    // activate Nestable for list 1

    $('#' + target).nestable({
      group: 1,
      maxDepth: 10,
      dropCallback: function () {
        var list = $('#' + target).length ? $('#' + target) : $($('#' + target).target)

        $.ajax({
          // url: 'menu/updateord',
          url: link,
          type: 'post',
          dataType: 'json',
          data: {data: window.JSON.stringify(list.nestable('serialize'))}
        })
      }
    })
      .on('change', updateOutput)

    // activate Nestable for list 2

    // output initial serialised data nestable_list_1 nestable_list_1_output
    updateOutput($('#' + target).data('output', $('#' + output)))

    $('#nestable_list_menu').on('click', function (e) {
      var target = $(e.target),
        action = target.data('action')
      if (action === 'expand-all') {
        $('.dd').nestable('expandAll')
      }
      if (action === 'collapse-all') {
        $('.dd').nestable('collapseAll')
      }
    })
  }

})(jQuery)


// (function ($) {
//   var updateOutput = function (e) {
//     var list = e.length ? e : $(e.target), output = list.data('output')
//     if (window.JSON) {
//       output.val(window.JSON.stringify(list.nestable('serialize'))) //, null, 2));
//     } else {
//       output.val('JSON browser support required for this demo.')
//     }
//   }
//   $.fn.dragDropCatMenu = function (target, output) {
//     // activate Nestable for list 1
//
//     $('#' + target).nestable({
//       group: 1,
//       maxDepth: 10,
//       dropCallback: function () {
//         var list = $('#' + target).length ? $('#' + target) : $($('#' + target).target)
//
//         $.ajax({
//           url: link,
//           type: 'post',
//           dataType: 'json',
//           data: {data: window.JSON.stringify(list.nestable('serialize'))}
//         })
//       }
//     })
//       .on('change', updateOutput)
//
//     // activate Nestable for list 2
//
//     // output initial serialised data nestable_list_1 nestable_list_1_output
//     updateOutput($('#' + target).data('output', $('#' + output)))
//
//     $('#nestable_list_menu').on('click', function (e) {
//       var target = $(e.target),
//         action = target.data('action')
//       if (action === 'expand-all') {
//         $('.dd').nestable('expandAll')
//       }
//       if (action === 'collapse-all') {
//         $('.dd').nestable('collapseAll')
//       }
//     })
//   }
//
// })(jQuery)
