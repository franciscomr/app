import router from '@/router'
import axios from 'axios';
import route from 'ziggy-js';

const logout = async () => {
  await axios.post(route('logout'))
    .then((res) => {
      router.push({ name: 'login' })
    }).catch((err) => {
      console.log(err)
    })
}
export default logout