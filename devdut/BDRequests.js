document.addEventListener("DOMContentLoaded", () => {
    simpleRequest();
})

async function simpleRequest(){
    await $.ajax({
        type:'post',
        url: 'bdcall.php',
        dataType: 'json',
        success: function(response){
            console.log(response);
            $("#myId").html(JSON.stringify(response));
        },
        error: function(response){
            console.log("err :", response);
        }
    })
}