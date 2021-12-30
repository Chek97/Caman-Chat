var inputBox = document.getElementById('message');
document.getElementById('send-message').onclick = function(e){
    if(inputBox.value === ''){
        e.preventDefault();
    }else{
        var message = { data: inputBox.value };
        conn.send(JSON.stringify(message));
    }

}