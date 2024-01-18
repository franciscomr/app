
import axios from 'axios';
import route from 'ziggy-js';
export default async function getIdAndNameFromResource(resource:string) {
  let response = {}
  await axios.get('sanctum/csrf-cookie')
  let routeName = route('select')
  await axios.get(routeName,
    {
      params:
      {
        'resource': resource,
      }
    }
  )
    .then(res => {
      response = res.data
    }).catch(err => {
      response = {
        0: 'No se encontraron resultados'
      }
    })
  return response
}