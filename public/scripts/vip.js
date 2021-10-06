$(document).ready(function() {
    document.querySelector('#allSecrets').addEventListener('click', getAllSecrets);
    document.querySelector('#postSecret').addEventListener('click', postSecret);
    document.querySelector('#getSecretHash').addEventListener('click', getSecret);
})

function getAllSecrets() {
    let reqType = document.querySelector('select#reqTypePost').value;
    let fetchOptions = {
        method: 'GET',
        mode: 'cors',
        cashe: 'no-cashe',
        headers: {
            'Accept': headerAcceptType(reqType),
        }
    }

    fetchMethod('https://veresi66.alwaysdata.net/secret/api/v1/secret', fetchOptions, reqType);
}

function postSecret() {
    let reqType = document.querySelector('select#reqTypePost').value;
    let data = getPostData(document.querySelector('#postForm'));

    let fetchOptions = {
        method: 'POST',
        mode: 'cors',
        cashe: 'no-cashe',
        headers: {
            'Accept': headerAcceptType(reqType),
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data)
    }

    fetchMethod('https://veresi66.alwaysdata.net/secret/api/v1/secret', fetchOptions, reqType);
}

function getSecret() {
    let reqType = document.querySelector('select#reqTypeGet').value;
    let hash = document.querySelector('#hash').value;
    let fetchOptions = {
        method: 'GET',
        mode: 'cors',
        cashe: 'no-cashe',
        headers: {
            'Accept': headerAcceptType(reqType),
        }
    }

    fetchMethod(`https://veresi66.alwaysdata.net/secret/api/v1/secret/${hash}`, fetchOptions, reqType);
}

function fetchMethod(url, fetchOptions, reqType) {
    fetch(url, fetchOptions).then(
        response => {
            if (response.status !== 200) {
                return response.text();
            } else {
                if (reqType != 'JSON') {
                    return response.text();
                } else {
                    return response.json();
                }
            }
        },
        error => document.querySelector('#valasz').innerHTML = error
    ).then(
        data => {
            writeResponse(data);
        }
    )
}

function writeResponse(data) {
    let html = '';
    let hova = document.querySelector('#valasz');

    if (typeof(data) != "string") {
        for (let index in data) {
            html += index + ': ' + data[index] + '<br />';
        }
    } else {
        data = data.replace(/</g, "&lt;").replace(/>/g, "&gt;<br />").replace(/&lt;\//g, "<br />&lt;\/");
        html = data;
    }

    hova.innerHTML = html;
}

function getPostData(form) {
    let inputs = form.querySelectorAll('input.form-control');
    let data = {};

    for (let input of inputs) {
        data[input.name] = input.value;
    }

    return data;
}

function headerAcceptType(reqType) {
    if (reqType == 'JSON') {
        return 'application/json';
    } else if (reqType == 'XML') {
        return 'application/xml';
    }

    return 'text/html';
}