Vue.component('main-component', {
   template: '<div><slot></slot></div>',
});

Vue.component('sub-component', {
  template: '<p>I am the sub component!</p>'
});

new Vue({
  el: '#app'
});