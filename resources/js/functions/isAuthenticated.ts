import axios from 'axios';
import router from '@/router'
import route from 'ziggy-js';
import store from '../store';
const isAuthenticated = async () => {
  await axios.get(route('get.user'))
    .then(res => {
      store.dispatch('storeUser', res.data)
    })
    .catch(err => {
      console.log(err.response.data)
      if (err.response.status === 401) {
        router.push({ name: 'login' })
      }
    })
}
export default isAuthenticated