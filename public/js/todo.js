import CRUD from "./abst.js";

$(document).ready(function ($) {
    //----- Open model CREATE -----//
    const crud = new CRUD("/todos/all");
    // crud.loadData('/todos/all');

    $("#btn-add").click(function () {
        $("#btn-save").val("add");
        $("#myForm").trigger("reset");
        $("#formModal").modal("show");
    });
    // CREATE
    $("#btn-save").click(function (e) {
        e.preventDefault();

        let title = crud.checkInputIfEmpty($("#title_add"),$("#title_add_err"),'title cannot be empty')

        var formData = {
            title: $("#title_add").val(),
            desc: $("#desc_add").val(),
        };
        if(title != ''){
            return false;
        }else{
            crud.addData("/todos/store", formData);
        }

    });
    $(document).on("click", ".btn-edit", function (e) {
        e.preventDefault();
        const id = $(this).attr("data-id");
        let select = crud.select('/todos/'+id+'/json',id);
        $("#editModal").modal("show");
        $('#title_edit').val(select.data.title)
        $('#desc_edit').val(select.data.desc)
        $('#todo_id').val(select.data.id)

    });
    $(document).on("click","#btn-update",function (e){
        e.preventDefault();
        const id = $('#todo_id').val();
        let title = crud.checkInputIfEmpty($("#title_edit"),$("#title_edit_err"),'title cannot be empty')

        var formData = {
            id:id,
            title: $("#title_edit").val(),
            desc: $("#desc_edit").val(),
        };
        if(title != ''){
            return false;
        }else{
            crud.updateData("/todos/"+id, formData);
        }
    });

    $(document).on("click", ".btn-delete", function (e) {
        e.preventDefault();
        const id = $(this).attr("data-id");
        crud.deleteData('/todos/' + id, id);
    });
});
