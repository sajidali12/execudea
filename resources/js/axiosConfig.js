// resources/js/axiosConfig.js
import axios from 'axios';

// Get the CSRF token from the meta tag
const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

// Set up axios to include the CSRF token in requests
axios.defaults.headers.common['X-CSRF-TOKEN'] = token;

export default axios;
