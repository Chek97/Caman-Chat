var inputBox = document.getElementById('message');
var userBox = document.getElementById('user-id');
var conversationBox = document.getElementById('conversation-id');
document.getElementById('send-message').onclick = function(e){
    if(inputBox.value === ''){
        e.preventDefault();
    }else{
        var message = { data: inputBox.value, user: +userBox.value, conversation: +conversationBox.value };
        conn.send(JSON.stringify(message));
    }

}