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
                "Tremend",
                "American Greetings",
                "Essensys",
                "LSEG",
                "P&G",
                "Delloit Digital",
                "Cegeka",
                "Ericsson",
                "InfoSys",
                "Softbinator",
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
                    "name": "credits",
                    "type": "directory",
                    "sub": [
                        "Darius Buhai"
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
    $('.terminal').scrollTop($('.terminal')[0].scrollHeight);
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
        let selectedDir = currentDir;
        if(input_low.length>2){
            let found = false;
            for(let i=0;i<currentDir.sub.length;++i){
                if(typeof(currentDir.sub[i])==="object" && currentDir.sub[i].type === "directory" && currentDir.sub[i].name===input.substring(3)) {
                    selectedDir = currentDir.sub[i];
                    found = true;
                }
            }
            if(!found)
                return "ls: "+input.substring(3)+": No such directory";
        }
        let out = "";
        for(let i=0;i<selectedDir.sub.length;++i){
            if(typeof(selectedDir.sub[i])==="string")
                out += selectedDir.sub[i];
            else
                out += selectedDir.sub[i].name;
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