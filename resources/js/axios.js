import axios from 'axios';

axios.defaults.baseURL = import.meta.env.VITE_API_URL || 'http://127.0.0.1:8000/';
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

export default axios;