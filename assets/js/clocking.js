function clockIn(){
    var base_url = $('#base_url').val();

    $.ajax({
        url: base_url + 'clocking/clockInUser/',
        type: 'post',
        //data: {folderPath : $folderPath},
        dataType: 'json',
        success:function(response) {
            console.log("Hello")
            location.reload();
        }
    });
}

function clockOut(){
    var base_url = $('#base_url').val();

    $.ajax({
        url: base_url + 'clocking/clockOutUser/',
        type: 'post',
        //data: {folderPath : $folderPath},
        dataType: 'json',
        success:function(response) {
            console.log("Hello")
            location.reload();
        }
    });
}