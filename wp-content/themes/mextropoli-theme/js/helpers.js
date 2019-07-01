function removeParam(sParam)
{
    sParam = encodeURI(sParam);

    var url = window.location.href.split('?')[0]+'?';
    var sURLVariables = decodeURIComponent(window.location.search.substring(1)).split('&').filter(item => item != ""),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam) {
            sURLVariables.splice(i, 1);
        }
    }

    return url + sURLVariables.join('&');
}

function insertParam(sParam, value)
{
    sParam = encodeURI(sParam); value = encodeURI(value);

    var url = window.location.href.split('?')[0]+'?';
    var sURLVariables = decodeURIComponent(window.location.search.substr(1)).split('&').filter(item => item != ""),
        sParameterName,
        exists = false,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] == sParam){
            exists = true;
            sParameterName[1] = value;
        }

        sURLVariables[i] = sParameterName[0] + '=' + sParameterName[1];
    }

    // If not exists we add it.
    if(!exists){
        sURLVariables.push(sParam + '=' + value);
    }

    return url + sURLVariables.join('&');
}
