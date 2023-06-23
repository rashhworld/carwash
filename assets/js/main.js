$(document).ready(function () {
    $("select#workers_name").selectize();

});

function showToastResponse(type, msg) {
    toast.show();
    $('.toast').removeClass('bg-success bg-danger');

    if (type == 1) {
        $('.modal').modal('hide');
        $('.toast').addClass('bg-success');
        setTimeout(function () {
            location.reload();
        }, 2000);
    } else {
        $('.toast').addClass('bg-danger');
    }

    $('.toast-body').html(msg);
}

//admin panel start
$('#validateAdminSignin').submit(function (event) {
    event.preventDefault();
    var form = $(this);
    $.ajax({
        type: form.attr('method'),
        url: form.attr('action'),
        data: form.serialize(),
        dataType: "JSON",
    }).done(function (res) {
        res.type == 1 ? location.href = res.url : showToastResponse(0, res.msg);
    })
});

$('#addWashingCenter form').submit(function (event) {
    event.preventDefault();
    var form = $(this);
    $.ajax({
        type: form.attr('method'),
        url: form.attr('action'),
        data: form.serialize(),
        dataType: "JSON",
    }).done(function (res) {
        res.type == 1 ? showToastResponse(1, res.msg) : showToastResponse(0, res.msg);
    })
});

function viewUpdateWashingCenter(modal, cid) {
    $.ajax({
        url: baseURL + "/AdminControl/viewUpdateWashingCenter",
        type: "POST",
        data: {
            cid: cid
        },
        dataType: "JSON",
        success: function (res) {
            $(modal).modal('show');
            $(modal + ' #cid').val(res.cid);
            $(modal + ' #center_name').val(res.center_name);
            $(modal + ' #center_address').val(res.center_address);
            $(modal + ' #phone_no').val(res.phone_no);
            $(modal + ' #washing_price').val(res.washing_price);
            $(modal + ' #workers_name').val(res.workers_name);
        },
    });
}

$('#updateWashingCenter form').submit(function (event) {
    event.preventDefault();
    var form = $(this);
    $.ajax({
        type: form.attr('method'),
        url: form.attr('action'),
        data: form.serialize(),
        dataType: "JSON",
    }).done(function (res) {
        res.type == 1 ? showToastResponse(1, res.msg) : showToastResponse(0, res.msg);
    })
});

function deleteWashingCenter(cid) {
    if (confirm('Are you sure want to delete this Washing Center?')) {
        $.ajax({
            url: baseURL + "/AdminControl/deleteWashingCenter",
            type: "POST",
            data: {
                cid: cid
            },
            dataType: "JSON",
            success: function (res) {
                res.type == 1 ? showToastResponse(1, res.msg) : showToastResponse(0, res.msg);
            },
        });
    }
}
//admin panel end

//user panel start
$("#showSignup").click(function () {
    $('#validateUserSignin').addClass('d-none');
    $('#validateUserSignup').removeClass('d-none');
    $('.card-header h5').html('User Registration');
});

$("#showSignin").click(function () {
    $('#validateUserSignin').removeClass('d-none');
    $('#validateUserSignup').addClass('d-none');
    $('.card-header h5').html('User Authentication');
});

$('#validateUserSignin').submit(function (event) {
    event.preventDefault();
    var form = $(this);
    $.ajax({
        type: form.attr('method'),
        url: form.attr('action'),
        data: form.serialize(),
        dataType: "JSON",
    }).done(function (res) {
        res.type == 1 ? location.href = res.url : showToastResponse(0, res.msg);
    })
});

$('#validateUserSignup').submit(function (event) {
    event.preventDefault();
    var form = $(this);
    $.ajax({
        type: form.attr('method'),
        url: form.attr('action'),
        data: form.serialize(),
        dataType: "JSON",
    }).done(function (res) {
        res.type == 1 ? showToastResponse(1, res.msg) : showToastResponse(0, res.msg);
    })
});

function fetchCenterDetails(modal, cid) {
    $.ajax({
        url: baseURL + "/UserControl/fetchCenterDetails",
        type: "POST",
        data: {
            cid: cid
        },
        dataType: "JSON",
        success: function (res) {
            $(modal).modal('show');
            $(modal + ' #cid').val(res.cid);
            $(modal + ' #center_name').html(res.center_name);
            $(modal + ' #center_address').html(res.center_address);
            $(modal + ' #phone_no').html(res.phone_no);
            $(modal + ' #washing_price').html(res.washing_price);

            var wn = res.workers_name.split(',');
            var workers = [];
            for (var i = 0; i < wn.length; i++) {
                var item = { id: wn[i], value: wn[i] };
                workers.push(item);
            }

            var $select = $(modal + ' #workers_name').selectize();
            var control = $select[0].selectize;
            control.clear()
            control.clearOptions();

            /* Fill options and item list*/
            var optionsList = [];
            var itemsList = [];
            $.each(workers, function () {
                optionsList.push({
                    value: this.id,
                    text: this.value
                });
                itemsList.push({
                    value: this.id,
                    text: this.value
                });
            });

            /* Add options and item and then refresh state*/
            control.addOption(optionsList)
            control.addItems(itemsList);
            control.refreshState();
        },
    });
}

$('#centerDetails form').submit(function (event) {
    event.preventDefault();
    var form = $(this);
    $.ajax({
        type: form.attr('method'),
        url: form.attr('action'),
        data: form.serialize(),
        dataType: "JSON",
    }).done(function (res) {
        res.type == 1 ? showToastResponse(1, res.msg) : showToastResponse(0, res.msg);
    })
});
//user panel end