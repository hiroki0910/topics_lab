import axios from 'axios'
import axiosCookiejarSupport from 'axios-cookiejar-support'

// Axiosにプラグイン注入
axiosCookiejarSupport(axios)
axios.defaults.baseURL = 'http://localhost:8000/'
axios.defaults.withCredentials = true
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

export default axios.create({
  jar: true // cookiejarを有効化する
})
