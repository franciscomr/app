import axios from 'axios';
import routerIndex from '@/router'
import route from 'ziggy-js';
import sendNotification from './sendNotification';

type resource = {
  resource:string;
  action:string;
  data:{[key: string] : string}
}

export default async function submitForm(form:resource) {
  let redirectTo:string, url:string, formMethod:string, isNewRecord:boolean
  let errors = {};
  

  let data:any = {
    data:{
      type:form.resource,
      attributes:form.data.attributes,
      relationships:form.data.relationships
      
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
      formMethod = 'post';
      isNewRecord = true;
      break;
    case 'edit':
      redirectTo = form.resource
      url = route(form.resource + '.update', { id: routerIndex.currentRoute.value.params.id });
      formMethod = 'patch'
      isNewRecord = false;
      break;
  
    default:
      url = route('login');
      isNewRecord = false;
      formMethod = 'post';
      break;
  }


  await axios.get('sanctum/csrf-cookie')
  await axios({
    method: formMethod,
    url: url,
    data: data
  })
  //await axios.post(url, data)
  .then(res => {

    if (redirectTo !== 'home') {
      sendNotification(isNewRecord, res.data.data);
      
      //console.log(res.data.data)
    }

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