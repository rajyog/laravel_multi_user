
$.validator.addMethod("letters", function (value, element) {
    return this.optional(element) || value == value.match(/^[a-zA-Z\s]*$/);
});
$.validator.addMethod("pwcheck", function (value) {
    return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
            && /[a-z]/.test(value) // has a lowercase letter
            && /\d/.test(value) // has a digit
});
$('#userValidate').validate({
    errorClass: "invalid-feedback",
    rules: {
        name: {
            required: true,
            minlength: 3,
            letters: true
        },
        // lastname: {
        //     required: true,
        //     minlength: 3,
        //     letters: true
        // },
        email: {
            required: true,
            email: true
        },
        password: {
            required: true,
            pwcheck: true,
            maxlength: 8,
        },
        password_confirmation: {
            required: true,
            equalTo: "#password"
        },
        gender: {
            required: true
        },
        roles: {
            required: true
        },
        city: {
            required: true
        },
        state: {
            required: true
        },
        country: {
            required: true
        },
        file: {
            required: true,
        }
    },
    messages: {
        name: {
            required: "Please enter first name ",
            minlength: "Please enter at least 3 characters.",
            letters: "Please enter only characters"
        },
        // lastname: {
        //     required: "Please enter last name ",
        //     minlength: "Please enter at least 3 characters.",
        //     letters: "Please enter only characters"
        // },
        email: {
            required: "Please enter email ",
            email: "Please enter valid email",
        },
        password: {
            required: "Please enter password",
            pwcheck: "1] Min 1 uppercase letter.<br/> 2] Min 1 lowercase letter.<br/> 3] Min 1 special character.<br/>4] Min 1 number.",
            maxlength: "Please enter more than 8 characters."
        },
        password_confirmation: {
            required: "Please enter confirm password",
            equalTo: "confirm password can not be match"
        },
        gender: {
            required: "Please checked gender"
        },
        roles: {
            required: "Please select roles"
        },
        city: {
            required: "Please select city"
        },
        state: {
            required: "Please select state"
        },
        country: {
            required: "Please select country"
        },
        file: {
            required: "Please select file"
        },
    }
});

/** */
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).on("change", "#country", function () {
    var _token = $("input[name='_token']").val();
    var id = $(this).val();
    alert(id);
    $.ajax({
        url: base_url + "/getstatedata",
        method: "post",
        dataType: "JSON",
        data: {id: id},
        success: function (response) {
            if (response.status == true) {
                html = "<option value=''>Select state</option>";
                $.each(response.data, function (key, val) {
                    html += "<option value='" + val.id + "'>" + val.name + "</option>";
                });
                $('#state').html(html);
            }
        }
    });
});
$(document).on("change", "#state", function () {
    var id = $(this).val();
    //alert(id);
    $.ajax({
        url: base_url + "/getcitydata",
        method: "post",
        dataType: "JSON",
        data: {id: id},
        success: function (response) {
            if (response.status == true) {
                html = "<option value=''>Select city</option>";
                $.each(response.data, function (key, val) {
                    html += "<option value='" + val.id + "'>" + val.name + "</option>";
                });
                $('#city').html(html);
            }
        }
    });
});

var loadFile = function (event) {
    var reader = new FileReader();
    reader.onload = function () {
        var output = document.getElementById('output');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
    $('#output').css({'height': '200px', 'width': '200px'});
};

$(document).ready(function () {
    var country = $('#country').val();
    if (country != "") {

    }
});

$(function () {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        "ajax": {
            "url": base_url + '/userdata',
            "type": "POST"
        },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'created_at', name: 'created_at'},
            {data: 'updated_at', name: 'updated_at'},
            {data: 'image'},
            {data: 'action'},
        ]
    });
    $(document).on("click", ".deleteData", function () {
        if (confirm('Are you sure you went to remove')) {
            var id = $(this).attr('data-id');
            $.ajax({
                url: base_url + "/deleteuserdata",
                method: "post",
                dataType: "JSON",
                data: {id: id},
                success: function (response) {
                if (response.status == true) {
                   $('#users-table').DataTable().clear().draw();                }
                }
            });
        }
    });
});


