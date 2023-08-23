export default class CRUD {
    constructor(routeName) {
        this.routeName = routeName;
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
        });
        this.loadData(this.routeName);
    }

    loadData(param) {
        $.ajax({
            url: `${param}`,
            method: "POST",
            success: function (data) {
                // console.log("data=" + data);
                $("#result").html(data); // table content
            },
        });
    }
    checkInputIfEmpty(para, paraErr, message = "") {
        let varFields = "";
        if ($.trim(para.val()).length == 0) {
            if (message != "") {
                varFields = message;
            } else {
                varFields = "Required field";
            }
            paraErr.text(varFields);
            return varFields;
        } else {
            varFields = "";
            paraErr.text(varFields);
            return varFields;
        }
    }

    select(route,id) {

        return $.ajax({
            url: route,
            method: "POST",
            data: { id: id },
            async: false,
            dataType: "json",
        }).responseJSON;
    }

    updateData(route,form_data,resetForm='#formUpdate',hideMoel = '#editModal') {
        $.ajax({
            url: route,
            method: "PUT",
            data: form_data,
            success: function (data) {
                if (data.status == "success") {
                    swal.fire(data.message, data.message, "success");
                } else if (data.status == "failed") {
                    swal.fire(data.message, data.message, "info");
                }
                $(resetForm)[0].reset();
                $(hideMoel).modal("hide");
                this.loadData(this.routeName);
            }.bind(this),
        });
    }

    addData(route,form_data) {
        $.ajax({
            url: route,
            method: "POST",
            data: form_data,
            success: function (data) {
                if (data.status == "success") {
                    swal.fire(data.message, data.message, "success");
                } else if (data.status == "failed") {
                    swal.fire(data.message, data.message, "info");
                }
                $("#myForm")[0].reset();
                $("#formModal").modal("hide");
                this.loadData(this.routeName);
            }.bind(this),
        });
    }

    // usage         crud.deleteData('/route/{id}', id);
    deleteData(route,id) {
        swal.fire({
            title: "Are you sure?",
            showDenyButton: true,
            confirmButtonText: "Yes",
            denyButtonText: "No",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: route,
                    method: "DELETE",
                    data: { id: id },
                    success: function (data) {
                        if (data.status == "success") {
                            swal.fire(data.message, data.message, "success");
                        } else if (data.status == "failed") {
                            swal.fire(data.message, data.message, "info");
                        }
                        this.loadData(this.routeName);
                    }.bind(this),
                });
            }
        });
    }
}
