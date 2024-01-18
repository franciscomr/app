import store from '../store';
export default function sendNotification(isNewRecord:boolean, resource:any) {
  let message = 'Se creó el recurso: ';
  let notificationType = 'success'
  if (!isNewRecord) {
    message = 'Se actualizó el recurso: '
    notificationType = 'info'
  }
  let notification = {
    type: notificationType,
    id: resource.id,
    name: resource.attributes.name,
    message: message
  }
  store.dispatch('showNotification', notification)
}