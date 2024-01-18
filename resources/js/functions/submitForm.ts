import axios from 'axios';
import router from '@/router'
import route from 'ziggy-js';
import { DataSchema } from '@/classes/jsonApi/DataSchema';
import { ErrorSchema } from '@/classes/jsonApi/ErrorSchema';
import sendNotification from './sendNotification';

export default async function submitForm(submitData:DataSchema) {
  let redirectTo:string, url:string, method:string, isNewRecord:boolean, errors:ErrorSchema[] =  [];
  let data:object = {
    data:submitData
  }
  
  const currentRoute = router.currentRoute.value.path
  const action = currentRoute.substring(currentRoute.lastIndexOf('/') + 1);
  let vari:[][] = []
  switch(action) {
    case 'login':
      redirectTo = 'home'
      url = route('login');
      method = 'post';
      isNewRecord = true;
      break;

    case 'create':
      redirectTo = submitData.type
      url = route(submitData.type + '.store');
      method = 'post';
      isNewRecord = true;
      break;

    case 'edit':
      redirectTo = submitData.type
      url = route(submitData.type + '.update', { id: router.currentRoute.value.params.id });
      method = 'patch'
      isNewRecord = false;
      break;

    default:
      redirectTo = 'home'
      url = route('home');
      isNewRecord = false;
      method = 'get';
      break;
  }

  await axios.get('sanctum/csrf-cookie')
  await axios({
    method: method,
    url: url,
    data: data
  })
  .then(res => {
    if(redirectTo !== 'home'){
      console.log('send Notification')
    }
    router.push({ name: redirectTo })
  })
  .catch(err => {
    console.log(err.response.data)

    for(let error in err.response.data.errors){
    //  vari.push([err.response.data.errors[error][1],err.response.data.errors[error][3]])
    //  console.log(err.response.data.errors[error][1])

      let result = new ErrorSchema(
        err.response.data.errors[error][0],
        err.response.data.errors[error][1],
        err.response.data.errors[error][2],
        err.response.data.errors[error][3]
      );
      errors.push(result);
    }
  });
  console.log(vari)
  return errors;
}