function showlaravelerrors($response){
    var error = JSON.parse($response);
    var count = 0;
    $.each(error.errors, function (i, error) {
        $.each(error,function(x,err){
            setTimeout(
                function() 
                { 
                    showtoast(err, 'now', 'tdanger', 3500); 
                }, 500*count++
            );
            
        })
    });
}
function is_alpha(name)
{
    return (/^[A-Za-z ]*$/).test(name);
}
function showtoast($title,$subtitle,$class,$duration){

    $animationstyle = 'pulse';
    if($class == 'tsuccess'){
        $animationstyle = 'bounceInRight';
    }

    $('#toast-place').append(`
        <div class="toast `+$animationstyle+` animated" role="alert" aria-live="assertive" aria-atomic="true" data-delay="`+$duration+`">
        <div class="toast-header `+$class+`">
            <strong class="mr-auto mr-5px"><img class="toast-logo" src=""> `+$title+`</strong>
            <small>`+$subtitle+`</small>
            <button type="button" class="ml-2 mb-1 close toast-close float-right" data-dismiss="toast" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        </div>
    `);

    $('.toast').toast('show');

    $('.toast').on('hidden.bs.toast', e => {
        $(e.currentTarget).remove();
    });
}

function capitalize(str){
    return str.substr(0,1).toUpperCase()+str.substr(1);
}
