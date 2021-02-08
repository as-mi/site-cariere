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

let directory = {
    "name": "Cariere",
    "type": "directory",
    "sub": [
        {
            "name": "Cariere.exe",
            "type": "executable",
            "action": cariereExe
        },
        {
            "name": "ASMI",
            "type": "application",
            "action": openAsmi
        },
        {
            "name": "FMI",
            "type": "application",
            "action": openFmi
        },
        {
            "name": "companii",
            "type": "directory",
            "sub": [
                "Amazon",
                "P&G"
            ]
        },
        {
            "name": "bin",
            "type": "directory",
            "sub": [
                "ls",
                "open",
                "cd",
                "clear",
                "help"
            ]
        },
        {
            "name": ".donotopen",
            "type": "directory",
            "sub": [
                {
                    "name": "spoiler",
                    "type": "directory",
                    "sub": [
                        {
                            "name": "stagii_pe_bune",
                            "type": "application",
                            "action": openStagii
                        },
                        {
                            "name": "credits",
                            "type": "directory",
                            "sub": [
                                "Darius Buhai"
                            ]
                        }
                    ]
                }
            ]
        }
    ]
};
let currentDir = directory;

function execCommand(input){
    $('#history').append($('#path')[0].innerHTML+input+'<br>');
    let out = manageTerminalOutput(input);
    if(out!==false && out!==undefined)
        $('#history').append(out+'<br>');
    $('#input').val('');
}

function cariereExe(){
    return "CARIERE v10 Loading... [##########__________] 50%";
}

function openAsmi(){
    document.location = "https://asmi.ro";
}

function openFmi(){
    document.location = "https://fmi.unibuc.ro/";
}

function openStagii(){
    document.location = "https://stagiipebune.ro/";
}

function manageTerminalOutput(input){
    let input_low = input.toLocaleString().toLowerCase();
    for(let i=0;i<currentDir.sub.length;++i){
        if(typeof(currentDir.sub[i])!=="string" && currentDir.sub[i].type==="executable" && currentDir.sub[i].name===input)
            return currentDir.sub[i].action();
    }
    if(input_low.substring(0, 4)==="open"){
        let app = input.substring(5);
        for(let i=0;i<currentDir.sub.length;++i){
            if(typeof(currentDir.sub[i])!=="string" && currentDir.sub[i].type==="application" && currentDir.sub[i].name===app){
                currentDir.sub[i].action();
                return "Opening...";
            }
        }
    }
    if(input_low==="help")
        return "ls -> list files" +
            "<br>cd -> change directory" +
            "<br>clear -> clear terminal" +
            "<br>open -> opens applications" +
            "<br>help -> list commands";
    if(input_low==="clear"){
        $('#history')[0].innerHTML = "";
        return false;
    }
    if(input_low.substring(0,2)==="ls"){
        let out = "";
        for(let i=0;i<currentDir.sub.length;++i){
            if(typeof(currentDir.sub[i])==="string")
                out += currentDir.sub[i];
            else
                out += currentDir.sub[i].name;
            out += "&nbsp;&nbsp;";
            if((i+1)%4===0) out+="<br>";
        }
        return out;
    }
    if(input_low.substring(0, 2)==='cd'){
        let folder = input.substring(3);
        if(folder===".." || folder==="../" || folder==="/" || folder==="/Cariere"){
            /* Must be fixed for bigger cases */
            currentDir = directory;
            $("#path").html(currentDir.name+">&nbsp;");
            /* Must be fixed for bigger cases */
            return false;
        }
        for(let i=0;i<currentDir.sub.length;++i){
            if(typeof(currentDir.sub[i])!=="string"){
                if(currentDir.sub[i].name===folder){
                    if(currentDir.sub[i].type==="directory") {
                        currentDir = currentDir.sub[i];
                        $("#path").html(folder+">&nbsp;");
                        return false;
                    }else{
                        let out = folder+" is an "+currentDir.sub[i].type;
                        if(currentDir.sub[i].type==="executable")
                            out+="<br>Maybe try running: '"+folder+"'";
                        if(currentDir.sub[i].type==="application")
                            out+="<br>Maybe try running: 'open "+folder+"'";
                        return out;
                    }

                }
            }else if(currentDir.sub[i]===folder)
                return folder+" is not a directory";
        }
        return "cd: no such file or directory: "+folder;
    }
    return "command not found: "+input;
}