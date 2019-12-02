import * as $ from 'jquery';
import collect from 'collect.js'

export default (function () {
    $('#addNewUserModal').on('show.bs.modal', function (e) {
        $.each($('input, select ,radio', '#addNewUserForm'),function(k){
            $("#addNewUserForm [name*='"+$(this).attr('name')+"']").removeClass('is-invalid');
        });
    })

    $("#addNewUserForm").submit(function(e) {
        e.preventDefault();
        var form = $(this);
        var url = form.attr('action');
        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(),
            success: function(data)
            {
                window.location.reload();
            },
            error: function (data) {
                $.each($('input, select ,radio', '#addNewUserForm'),function(k){
                    $("#addNewUserForm [name*='"+$(this).attr('name')+"']").removeClass('is-invalid');
                });

                var response = $.parseJSON(data.responseText);
                if(response.errors){
                    $.each(response.errors, function(i, item) {
                        $("#addNewUserForm [name*='"+i+"']").addClass('is-invalid');
                        $('#addNewUserForm .error_' + i).html(item)
                    });
                }
            }
        });
    });

    $('.editUserBtn').click(function(){
        window.$('#editUserModal').modal('show');

        $.each($('input, select ,radio', '#editUserForm'),function(k){
            $("#editUserForm [name*='"+$(this).attr('name')+"']").removeClass('is-invalid');
        });

        $.ajax({
            type: "GET",
            url: '/users/' + $(this).attr('item') + '/edit',
            success: function(data)
            {
                $("#editUserForm").attr('action','/users/' + data.id);
                $("#editUserForm [name*='name']").val(data.name);
                $("#editUserForm [name*='email']").val(data.email);
                $("#editUserForm [name*='password']").val(data.password);
                $("#editUserForm [name*='role']").val(collect(data.roles).first().id);
                $("#editUserForm [name*='status']").attr('checked',data.status == 0);
            },
            error: function (data) {
            }
        });
    });

    $("#editUserForm").submit(function(e) {
        e.preventDefault();
        var form = $(this);
        var url = form.attr('action');
        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(),
            success: function(data)
            {
                window.location.reload();
            },
            error: function (data) {
                $.each($('input, select ,radio', '#editUserForm'),function(k){
                    $("#editUserForm [name*='"+$(this).attr('name')+"']").removeClass('is-invalid');
                });

                var response = $.parseJSON(data.responseText);
                if(response.errors){
                    $.each(response.errors, function(i, item) {
                        $("#editUserForm [name*='"+i+"']").addClass('is-invalid');
                        $('#editUserForm .error_' + i).html(item)
                    });
                }
            }
        });
    });
}())
