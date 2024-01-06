import axios from 'axios';
export default async function search(routeName:string, sortBy:string, filterBy:{[key: string] : string}, perPage:number) {
  type responseType = {
    data:{[key: string] : string},
    meta:{[key: string] : string},
  }
  let response:any = {}
  await axios.get(routeName,
    {
      params:
      {
        'sort': sortBy,
        'filter': filterBy,
        'perPage': perPage
      }
    })
    .then(res => {
      response.data = res.data.data
      response.pagination = res.data.meta

    }).catch(err => {
      response = err
    })
  return response
}