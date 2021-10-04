$(document).ready(function() {
    $('#allSecrets').click(getAllSecret);
})


function getAllSecret() {
    let fetchOptions = {
        method: 'GET',
        mode: 'cors',
        cashe: 'no-cashe',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            'Accept': 'application/json',
        }
    }

    fetch('http://veresi66.rf.gd/public/api/v1/secret', fetchOptions).then(
        response => console.log(response),
        error => console.error(error)
    ).then(
        response => $('#valasz').html(response)
    )
}

function getFetch(url) {
    let fetchOptions = {
        method: 'GET',
        mode: 'cors',
        cashe: 'no-cashe',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            'Accept': 'application/json',
        },

    }

    return fetch(url, fetchOptions).then(
        response => response.json(),
        error => console.error(error)
    )
}