require('./bootstrap');

import { createApp } from 'vue'
import ToDoList from './components/ToDoList.vue';
import ToDoDetail from './components/ToDoDetail.vue';
import SetDetail from './components/SetDetail.vue';

const app = createApp({});
app.component('to-do-list', ToDoList)
    .component('to-do-detail', ToDoDetail)
    .component('set-detail', SetDetail)
    .mount('#app');

