'use strict'

$(document).ready(function() {

    function selectedUser(){
        $('#user').on('change', function(){
            var selected = $(this).val();
            console.log(selected);
        });
    };
selectedUser();
});







