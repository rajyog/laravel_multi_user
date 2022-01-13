
/** */
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$(function () {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        "ajax": {
            "url": base_url + '/ajax_userlist',
            "type": "POST"
        },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'created_at', name: 'created_at'},
            {data: 'updated_at', name: 'updated_at'},
        ]
    });

});

var page_show = $("#page_show").val();
var search = $("#search").val();

var order = $('.order_active').attr("data-id");
var column = $('.order_active').attr("data-column");

var page_id = 1;

var select_id = $('.page-link').parent().attr("id");

function load_data(page_show, search, page_id, order, column) {
    $.ajax({
        url: base_url + '/custome_ajax_userlist',
        type: "POST",
        dataType: "JSON",
        data: {'page_show': page_show, search: search, page_id: page_id, order: order, column: column},
        success: function (response) {
            if (response.status == true) {


                $("#pagination-data").css('display', 'block');
                $("#users-table-ajax tbody").html(response.data);
                $("#pagination-data").html(response.pagination_link);
                $(".pageitem").removeClass("active");
                $("#" + select_id).addClass("active");
                if (response.total_page_link == 1) {
                    $("#pagination-data").css('display', 'none');
                }

            } else {
                $("#users-table-ajax tbody").html('<h4><center>' + response.data + "</center></h4>");
                $("#pagination-data").css('display', 'none');
            }
        }

    });
}

load_data(page_show, search, page_id, order, column);
$(document).on("change", "#page_show", function () {
    var page_show = $(this).val();
    var search = $("#search").val();
    var page_id = $('.page-link').attr("data-id");
    var select_id = $('.page-link').parent().attr("id");
    var order = $('.order_active').attr("data-id");
    var column = $('.order_active').attr("data-column");


    load_data(page_show, search, page_id, order, column);
});

$(document).on("keyup", "#search", function () {
    var page_show = $("#page_show").val();
    var search = $(this).val();
    var page_id = $('.page-link').attr("data-id");
    var select_id = $('.page-link').parent().attr("id");
    var order = $('.order_active').attr("data-id");
    var column = $('.order_active').attr("data-column");


    load_data(page_show, search, page_id, order, column);
});

$(document).on("click", ".page-link", function (e) {
    e.preventDefault();
//    alert($(this).attr("data-id"));
    var page_show = $("#page_show").val();
    var search = $('#search').val();
    var page_id = $(this).attr("data-id");
    var select_id = $(this).parent().attr("id");
    var order = $('.order_active').attr("data-id");
    var column = $('.order_active').attr("data-column");


    load_data(page_show, search, page_id, order, column);
});

$(document).on("click", ".sortdata", function (e) {
    e.preventDefault();
    $(".sortdata").removeClass("order_active");
    var order = $(this).attr("data-id");
    var column = $(this).attr("data-column");

    if (order == "desc") {
        $(this).attr("data-id", "asc");
        $(this).addClass("order_active");

    } else {
        $(this).attr("data-id", "desc");
        $(this).addClass("order_active");
    }
    var page_show = $("#page_show").val();
    var search = $('#search').val();
    var page_id = $('.page-link').attr("data-id");
    var select_id = $('.page-link').parent().attr("id");
    load_data(page_show, search, page_id, order, column);

});

$(document).on('click', '.prevButton', function () {
    var page_show = $("#page_show").val();
    var search = $('#search').val();
     var order = $('.order_active').attr("data-id");
    var column = $('.order_active').attr("data-column");
    var prev_id = parseInt($('.activepageitem').attr('id'));
    if (prev_id == 1) {
        var page_id = prev_id;
    } else {
        var page_id = prev_id - 1;
    }
    load_data(page_show, search, page_id, order, column);
});

$(document).on('click', '.nextButton', function () {
    var page_show = $("#page_show").val();
    var search = $('#search').val();
     var order = $('.order_active').attr("data-id");
    var column = $('.order_active').attr("data-column");
    var next_id = parseInt($('.activepageitem').attr('id'));
    var page_id = (next_id + 1);
    load_data(page_show, search, page_id, order, column);
});


