window._ = require('lodash');

window.Vue = require('vue');
require('vue-resource');

Vue.http.interceptors.push((request, next) => {
  request.headers.set('X-CSRF-TOKEN', window.Laravel.csfr_token);

  next();
});

Vue.prototype.trans = (key) => {
  return _.get(window.trans, key, key);
};

Vue.component('teacher',require('./components/CalcTeacherLoad.vue'));

// Calculate teacher load
var calc_load = new Vue({
  el: '#calc_load',
  data: {
    gridColumns: [window.Laravel.name, 'EAP'],
    gridSupervisors: window.Laravel.supervisors,
    gridCosupervisors: window.Laravel.cosupervisors,
    totalPoints: window.Laravel.totalPoints,
    limitPerOne: window.Laravel.limitPerOne,
    projectID: window.Laravel.project_id,
  }
})


