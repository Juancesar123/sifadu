
const create = (x,y,z) => {
  $("#createSave").click(function(){
    var form = $('#createForm')[0];
    fd = new FormData(form);

    $("#createForm").validate({
        ignore: '*:not([name])', 
        debug: true,
        submitHandler: function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: x,
                method: 'POST',
                data: fd,
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {
                    $(y).modal('hide')
                    $('#createForm').trigger("reset");
                    table.ajax.reload();
                    swal('',{
                        title: z,
                        icon: 'success',
                        buttons: false,
                        timer: 1000,
                    });
                },
                error: function (response){
                    swal('',{
                        title: response.statusText,
                        icon: 'error',
                        text: 'Silahkan hubungi Administrator!',
                        timer: 5000,
                    });
                }

            });
        }
    });
});
}