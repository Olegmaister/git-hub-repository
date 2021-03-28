$( document ).ready(function() {
    $('.js-add-favorites').on('click', function() {
        let id = $(this).data('id');


        $.ajax({
            method: "post",
            data: {
                id : id
            },
            url: 'user/add-favorite',
            dataType: 'json',
            'success': function (data) {
                    if(data['success']){
                        alert(data['message']);
                        $('.add-favorites-'+id).addClass('hidden');
                        $('.remove-favorites-'+id).removeClass('hidden');
                    }else{
                        alert(data['message']);
                    }

            },
            'error': function (response) {
            }
        });

    });

    $('.js-remove-favorites').on('click',function(){
        let id = $(this).data('id');

        $.ajax({
            method: "post",
            data: {
                id : id
            },
            url: 'user/remove-favorite',
            dataType: 'json',
            'success': function (data) {
                $('.add-favorites-'+id).removeClass('hidden');
                $('.remove-favorites-'+id).addClass('hidden');
            },
            'error': function (response) {
            }
        });

    });


});