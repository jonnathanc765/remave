  
  
  import Vue from 'vue';


  Vue.component('product', require('./product.vue').default);
  
  const app = new Vue({
      el: '#app'
  });