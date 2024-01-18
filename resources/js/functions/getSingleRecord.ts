
import axios from 'axios';
export default async function getSingleRecord(routeName:string) {
  let response:any = {}
  await axios.get('sanctum/csrf-cookie')
  await axios.get(routeName)
    .then(res => {
      response.data = res.data.data
    }).catch(err => {
      response = err
    })
  return response
}