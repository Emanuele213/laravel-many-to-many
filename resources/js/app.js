/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });


const eleOverlay = document.querySelector('.overlay');
if (eleOverlay) {
    const btnsDelete = document.querySelectorAll('.btn-delete-me');
    btnsDelete.forEach(btn => {
        btn.addEventListener('click', function () {
            eleOverlay.classList.remove('d-none');
            let url = 'http://localhost:8000/admin/';
            if(eleOverlay.querySelector('form').classList.contains('post')) {
                url += 'posts/';
            }else if (eleOverlay.querySelector('form').classList.contains('category')) {
                url += 'categories/';
            }
            eleOverlay.querySelector('form').setAttribute('action', url + this.dataset.id)
        })
    })

    const eleBtnClose = eleOverlay.querySelector('.btn-close-me');

    eleBtnClose.addEventListener('click', function() {
        eleOverlay.classList.add('d-none');
    })
}

