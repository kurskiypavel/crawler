//get slug
var id = 27;
$.post("http://host-5:8888/sandbox_files/getContent.php", {
    "id": id
}, function (data, textStatus) {
    //data contains the JSON object
    //textStatus contains the status: success, error, etc
    var resArr = [];
    console.log(JSON.parse(data.Json_translateRU));
    $.each(JSON.parse(data.Json_translateRU), function (index, value) {
        resArr[index] = value;
        
    });
    resArr['Datetime'] = data.Datetime;
    setHTML(resArr);
}, "json");

function setHTML(res) {
    console.log(res);
    $('.c-page-title,title').text(res['titleRU']);
    $('.c-entry-summary.p-dek').text(res['subtitleRU']);
    $('time').attr('datetime',res['Datetime']).text(res['Datetime']);
    
    $.each(res['contentRU'], function (index, value) {
        let privateName = ID();
        $('.c-entry-content').append("<p id='"+ privateName + id + "i" + index + "in'>" + value + "</p>");
    });
}