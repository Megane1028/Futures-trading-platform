import App from './App'

// #ifdef VUE2
import Vue from 'vue'

import './uni.promisify.adaptor'
Vue.config.productionTip = false

import store from './store';
Vue.prototype.$store = store;

import * as echarts from 'echarts';
Vue.prototype.$echarts = echarts;

import utils from './utils/util';
Vue.prototype.$imgUrl = utils.imgUrl;
Vue.prototype.$utils = utils;

import i18n from './i18n';

App.mpType = 'app'

const app = new Vue({
	i18n,
	store,
	...App
})

app.$mount()

// #endif

// #ifdef VUE3
import {
	createSSRApp
} from 'vue'
export function createApp() {
	const app = createSSRApp(App)
	return {
		app
	}
}
// #endif