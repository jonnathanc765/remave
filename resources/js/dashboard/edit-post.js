'use strict';
const axios = require('axios');

//Axios Petition for delete images from storage
var token = document.head.querySelector('meta[name="csfr-token]');
window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;

// send contact form data.
axios.post('/images/delete/'+id).then((response) => {
    console.log(response)
}).catch((error) => {
    console.log(error.response.data)
});
