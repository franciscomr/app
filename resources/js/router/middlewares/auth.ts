import store from '@/store';
import isAuthenticated from '@/functions/isAuthenticated';
export default (to:any, from:any, next:any) => {

  if (!store.state.user.isAuthenticated) {
    isAuthenticated()
  }

  return next();
};