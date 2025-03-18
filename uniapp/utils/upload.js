import store from '@/store/index.js'
const token = store.state.token;
export default function updateFile(imageUrl, Type) {
	return new Promise((resolve, reject) => {
		uni.uploadFile({
			url: 'https://43.132.156.95:41927/api/user/uploadimg',
			method: "POST",
			header: {
				'Token': token,
			},
			filePath: imageUrl,
			name: 'file',
			success: (response) => {
				let result = JSON.parse(response.data)
				resolve(result)
			},
			fail() {
				reject()
			}
		})
	})

}