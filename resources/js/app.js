/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from "vue/dist/vue.esm-bundler";

const app = createApp({});

import ExportComponent from './components/ExportComponent.vue';
app.component('export-component', ExportComponent);

app.mount('#app');
