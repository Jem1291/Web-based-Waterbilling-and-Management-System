
    $(document).ready(function(){
        $(".delete").click(function(){
            var id = $(this).val();
            $("#delete-confirm-btn").val(id);
            $("#delete").find(".modal-body").html("<p>Are you sure you want to delete this record with ID " + id + "?</p>");
            $("#delete a.btn-danger").attr("href", "delete/"+id);
            $("#delete").addClass("show-modal");
        })

        $(document).ready(function () {
            $(".bill").click(function(){
            $("#bill").addClass("show-modal");
            }) 
        });
 
        $(".close").click(function(){
            $(".modal").removeClass("show-modal");
        })

    });



