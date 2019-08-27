$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});

$('body').on('click', '.btn-show', function(event) {
    event.preventDefault();
    var me = $(this),
        url = me.attr('href'),
        title = me.attr('title');

    $('#modal-title').text(title);

    $.ajax({
        url : url,
        dataType : 'html',
        success: function(response){
            $('#modal-body').html(response);
        }
    });

    $('#modal').modal('show');
});

// $('body').on('click', '.btn-download', function(event){
//     event.preventDefault();

//     var me = $(this),
//         url = me.attr('href'),
//         title = me.attr('title'),
//         csrf_token = $('meta[name="csrf-token"]').attr('content');

//     swal({
//         title: 'Download ' + title + ' ?',
//         text: 'File akan disimpan di perangkat anda.',
//         buttons: {
//             cancel: {
//               text: 'Batal',
//               value: null,
//               visible: true
//             },
//             confirm: {
//               text: 'Download',
//               value: true,
//               visible: true
//             }
//         }
//     }).then((willDelete) => {
//         if(willDelete){
//             $.ajax({
//                 url: url,
//                 type: "POST",
//                 data: {
//                     '_method' : 'DELETE',
//                     '_token': csrf_token
//                 },
//                 success: function (response){
//                     $('#tagihan-table').DataTable().ajax.reload();
//                     swal({
//                         icon: "success",
//                         title: "Sukses!",
//                         text: "Data Berhasil dihapus.."
//                     });
//                 },
//                 error: function(xhr){
//                     swal({
//                         icon: "error",
//                         title: "Oops...",
//                         text: "Terjadi kesalahan saat penghapusan data"
//                     });
//                 }
//             });
//         }
//         else {
//             swal("Info!", "Terjadi Kesalahan", "warning");
//         }
//     })
// });

