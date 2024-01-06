import axios from 'axios';
import routerIndex from '@/router'
import route from 'ziggy-js';

type resource = {
  resource:string;
  action:string;
  data:{[key: string] : string}
}

export default async function submitForm(form:resource) {
  let redirectTo:string, url:string, formMethod:string;
  let errors = {};

  let data:any = {
    data:{
      type:'user',
      attributes:form.data
      
  }}
  
  switch (form.action) {
    case 'login':
      redirectTo = 'home';
      url = route('login')
      formMethod = 'post'
      break;
    case 'create':
      redirectTo = form.resource
      url = route(form.resource + '.store');
      formMethod = 'post'
      break;
    case 'edit':
      redirectTo = form.resource
      url = route(form.resource + '.update', { id: routerIndex.currentRoute.value.params.id });
      formMethod = 'patch'
      break;
  
    default:
      break;
  }

  url = route(form.resource)

  await axios.get('sanctum/csrf-cookie')
  await axios.post(url, data)
  .then(res => {
    routerIndex.push({ name: redirectTo })
  })
  .catch(err => {
    if (err.response) {
      errors = err.response.data.errors
      console.log(err)
    }
    else if (err.request) {
      console.log(err.request)
    }
  })
 return errors

}