import Vue from 'vue';
import VueI18n from 'vue-i18n';

import zhCN from './zh-CN';
import zhTW from './zh-TW';
import enUS from './en-US';
import jaJP from './ja-JP';
import thTH from './th-TH';
import viVN from './vi-VN';
import idID from './id-ID';
import koKR from './ko-KR';
import frFR from './fr-FR';
import deDE from './de-DE';

// 组合语言包
const messages = {
	'zh-CN': zhCN,
	'zh-TW': zhTW,
	'en-US': enUS,
	'ja-JP': jaJP,
	'th-TH': thTH,
	'vi-VN': viVN,
	'id-ID': idID,
	'ko-KR': koKR,
	'fr-FR': frFR,
	'de-DE': deDE,
};
if (!localStorage.getItem('i18nLang')) {
	localStorage.setItem('i18nLang', 'zh-CN')
}
const locale = uni.getStorageSync('i18nLang');
let i18nConfig = {
	locale, // 获取已设置的语言
	messages
}

Vue.use(VueI18n)
const i18n = new VueI18n(i18nConfig)

// 导出
export default i18n;