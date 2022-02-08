
$(function () {
    //ajax setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //delete action
    $(document).on("click", "#delete", function (e) {
        e.preventDefault();
        let link = $(this).attr("href");
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: link,
                    type: 'DELETE',
                    data: {
                        _method: "DELETE"
                    },
                    success: function (data) {
                        location.reload();
                    }
                })
            }
        })
    });
})
