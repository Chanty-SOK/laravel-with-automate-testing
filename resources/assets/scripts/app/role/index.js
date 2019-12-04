import * as $ from 'jquery';

export default (function () {
    $("#addNewRoleForm").submit(function(e) {
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
                    var response = $.parseJSON(data.responseText);
                    if(response.errors){
                        $.each(response.errors, function(i, item) {
                            $("#addNewRoleForm [name*='"+i+"']").addClass('is-invalid');
                            $('#addNewRoleForm .error_' + i).html(item)
                        });
                    }
                }
             });
    });
}())
