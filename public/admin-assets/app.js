$('body').on('click', '.modal-show', function(event){
    event.preventDefault();
    var me = $(this),
        url = me.attr('href'),
        title = me.attr('title');

    $('#modal-title').text(title);
    $('#modal-btn-save').removeClass('hide').text(me.hasClass('edit') ? 'Simpan' : 'Tambah' );

    $.ajax({
        url: url,
        dataType: 'html',
        success: function(response) {
            $('#modal-body').html(response);
        }
    });

    $('#modal').modal('show');
});

$('#modal-btn-save').click(function(event){
    event.preventDefault();

    var form = $('#modal-body form'),
        url = form.attr('action'),
        method = 'POST';   

    form.find('.help-block').remove();
    form.find('.form-group').removeClass('has-error');

    $.ajax({
        url: url,
        method: method,
        data: form.serialize(),
        success: function(response){
            form.trigger('reset');
            $('#modal').modal('hide');
            $('#tagihan-table').DataTable().ajax.reload();

            swal({
                icon: "success",
                title: "Sukses!",
                text: "Data Berhasil Dimasukan.."
            });
        },
        error: function(xhr){
            var res = xhr.responseJSON;
            if($.isEmptyObject(res) == false){
                $.each(res.errors, function(key, value){
                    $('#' + key)
                    .closest('.form-group')
                    .addClass('has-error')
                    .append('<span class="help-block"><strong>'+ value +'</strong></span>')
                })
            }
        }
    })
});

$('body').on('click', '.btn-delete', function(event){
    event.preventDefault();

    var me = $(this),
        url = me.attr('href'),
        title = me.attr('title'),
        csrf_token = $('meta[name="csrf-token"]').attr('content');

    swal({
        title: 'yakin hapus ' + title + ' ?',
        text: 'Data yang dihapus tidak bisa dikembalikan.',
        dangerMode: true,
        buttons: {
            cancel: {
              text: 'Batal',
              value: null,
              visible: true
            },
            confirm: {
              text: 'Hapus',
              value: true,
              visible: true
            }
        }
    }).then((willDelete) => {
        if(willDelete){
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    '_method' : 'DELETE',
                    '_token': csrf_token
                },
                success: function (response){
                    $('#tagihan-table').DataTable().ajax.reload();
                    swal({
                        icon: "success",
                        title: "Sukses!",
                        text: "Data Berhasil dihapus.."
                    });
                },
                error: function(xhr){
                    swal({
                        icon: "error",
                        title: "Oops...",
                        text: "Terjadi kesalahan saat penghapusan data"
                    });
                }
            });
        }
        else {
            swal("Info!", "Terjadi Kesalahan", "warning");
        }
    })
});

$('body').on('click', '.btn-show', function(event){
    event.preventDefault();
    var me = $(this),
        url = me.attr('href'),
        title = me.attr('title');

    $('#modal-title').text(title);
    $('#modal-btn-save').addClass('hide');

    $.ajax({
        url : url,
        dataType : 'html',
        success: function(response){
            $('#modal-body').html(response);
        }
    });

    $('#modal').modal('show');
})