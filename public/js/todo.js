import CRUD from "./abst.js";

jQuery(document).ready(function ($) {
    //----- Open model CREATE -----//
    const crud = new CRUD("/todos/all");
    // crud.loadData('/todos/all');

    jQuery("#btn-add").click(function () {
        jQuery("#btn-save").val("add");
        jQuery("#myForm").trigger("reset");
        jQuery("#formModal").modal("show");
    });
    // CREATE
    $("#btn-save").click(function (e) {
        e.preventDefault();
        var formData = {
            title: jQuery("#title").val(),
            desc: jQuery("#description").val(),
        };

        crud.addData("/todos/store", formData);
    });

    $(document).on("click", ".btn-delete", function (e) {
        const id = $(this).attr("data-id");

            e.preventDefault();

            var formData = {
                id:id
            };

            // swal.fire('Hel')
            crud.deleteData("/todos/destroy", id);
    });
});
