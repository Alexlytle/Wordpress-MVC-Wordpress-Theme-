

// // fd.append('userID', e.target.parentElement.querySelector('#userId').value);
// axios({
//     method: "post",
//     url:'http://localhost/pizza/wp-admin/admin-ajax.php',
//     data: fd,
//     headers: { 
//         "Content-Type": "multipart/form-data" 
//     },
//     })
//     .then(function (response) {
//         //handle success
//         console.log(response)


//     })
//     .catch(function (response) {
//         //handle error
//         console.log(response);
//     });

// barba.init({})

// addCart.addEventListener('click',(e)=>{
//     e.preventDefault()
//     let data = {
//         'test':207
//     }
//     fetch(pizzascripts.root_url + '/wp-json/routerAddToCart/v1/cart', {
//       method: 'POST', // or 'PUT'
//       headers: {
//         'Content-Type': 'application/json',
//         'X-WP-Nonce' :  pizzascripts.nonce
//       },
//       body: JSON.stringify(data),
//     })
//     .then(response => response.json())
//     .then(data => {
//       console.log('Success:', data);
//     })
//     .catch((error) => {
//       console.error('Error:', error);
//     });
// })
// let addCart = document.querySelector('#add-to-cart-test')
// addCart.addEventListener('click',(e)=>{
//     e.preventDefault()
// let fd = new FormData();
// fd.append('action', 'wp_ajax_myajax'); 
//  axios({
//     method: "post",
//     url:'http://localhost/routertheme/wp-admin/admin-ajax.php',
//     data: fd,
//     // headers: { 
//     //     "Content-Type": "multipart/form-data" 
//     // },
//     })
//     .then(function (response) {
//         //handle success
      

//         // var event = document.createEvent('wc_fragment_refresh');
//         // document.dispatchEvent(new Event("wc_force_reload_fragments"));
//         console.log('Yes')

//     })
//     .catch(function (response) {
//         //handle error
//         console.log(response);
//     });

// })