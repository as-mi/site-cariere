$('.js-tilt').tilt({
    scale: 1.1
})

$(function() {
    $('.terminal').on('click', function(){
        $('#input').focus();
    });
    $('#input').on('keydown',function search(e) {
        if(e.keyCode === 13) {
            execCommand($(this).val())
        }
    });
    setTimeout(function(){
        execCommand("Cariere.exe");
        $('#input').val("help");
    }, 100);
});

function execCommand(input){
    $('#history').append($('#path')[0].innerHTML+input+'<br>');
    let out = manageTerminalOutput(input);
    if(out!==false)
        $('#history').append(out+'<br>');
    $('#input').val('');
}

function manageTerminalOutput(input){
    let input_low = input.toLocaleString().toLowerCase();
    if(input.substring(0, 3)==='cd '){
        $('#path').html(input.substring(3) + '>&nbsp;');
        return false;
    }
    if(input==="Cariere.exe"){
        return "CARIERE v10 Loading... [##########__________] 50%";
    }
    if(input_low==="h" || input_low==="help")
        return "ls -> list files" +
            "<br>cd -> change directory" +
            "<br>clear -> clear terminal" +
            "<br>help -> list commands";
    if(input_low==="clear"){
        $('#history')[0].innerHTML = "";
        return false;
    }
    if(input_low==="ls" || input_low==="l")
        return "Cariere.exe";
    return "command not found: "+input;
}