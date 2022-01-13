/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
//function get_roledata(search = "", page = "") {
//    //alert(search)
//    $.ajax({
//        url: base_url + "/listroledata",
//        method: "POST",
//        dataType: "JSON",
//        data: {search: search, page: page},
//        success: function (response) {
//            if (response.status == true) {
//                console.log(response.data);
//                var html = '';
//                var c = 1;
//                $.each(response.data, function (index, value) {
//                    html += '<tr>';
//                    html += '<td>' + value.id + '</td>';
//                    html += '<td>' + value.role_name + '</td>';
//                    html += '<td>' + value.description + '</td>';
//                    html += '<td>Action</td>';
//                    html += '</tr>';
//                });
//                $('#table_data tbody').html(html);
//            } else {
//                 //console.log(response.data);
//                $('#table_data tbody').html("no data");
//            }
//
//        }
//
//    });
//}
//$(function () {
//      get_roledata()
//});
//$(document).on("keyup", "#search_data", function () {
//    var search_data = $(this).val();
//    var page = $('nav .active').attr('id');
//    //alert(page);
//    get_roledata(search = search_data, page = page)
//});
//
//$(document).on("click", ".page-link", function () {
//   // var page_link = $(this).attr('data-id');
//    var search_data = $("#search_data").val();
//    get_roledata(search_data = search_data)
//});
//
//
//$(document).on('click', 'nav a', function (event) {
//    event.preventDefault();
//    var page_link = $(this).attr('href').split('page=')[1];
////    $('nav a').prevAll('.active:first').removeClass('active');
////    $(this).addClass("active");
////    var page = $.trim($('.active').text());
////    $(this).attr("id", page);
////    var search_data = $("#search_data").val();
//    get_roledata(search_data = "", page = page_link)
//});

function fetch_data(page = "", query)
{
    $.ajax({
        url: "/listroledata?page=" + page + "&query=" + query,
        success: function (response)
        {
            $('#table_data tbody').html(response);
        }
    })
}
//fetch_data(page = "" ,query="");

$(document).on('keyup', '#serach', function () {
    var query = $('#serach').val();
    var page = $('#hidden_page').val();
    fetch_data(page , query);
});

$(document).on('click', 'nav a', function (event) {
    event.preventDefault();
    var page = $(this).attr('href').split('page=')[1];
    $('#hidden_page').val(page);
    var query = $('#serach').val();

//    $('li').removeClass('active');
    $(this).parent().addClass('active');
    fetch_data(page, query);
});

