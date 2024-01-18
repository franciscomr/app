<template>
  <div class="w-full relative">
    <div v-show="store.state.notification.isActive" class="absolute w-full">
      <div  class="w-full p-3  border-l-4  dark:bg-neutral-700"
      :class="notificationStyle[store.state.notification.type] || 'bg-green-100 border-green-600'">
        <div class="flex items-center space-x-3 ">
          <Icons :icon-name="iconType[store.state.notification.type] || 'check_circle'" :icon-size="'sm'" :class="iconColor[store.state.notification.type] || 'text-green-600'"/>
          <div class="flex w-full">
            <span :class="textColor[store.state.notification.type] || 'dark:text-green-500'"> {{store.state.notification.message}} &nbsp;</span>
            <span class="font-medium" :class="textColor[store.state.notification.type] || 'dark:text-green-500'">{{ store.state.notification.resource.name || 'RESOURCE' }}&nbsp;</span>
            <span :class="textColor[store.state.notification.type] || 'dark:text-green-500'"> con ID: &nbsp;</span>
            <span class="font-medium" :class="textColor[store.state.notification.type] || 'dark:text-green-500'">{{ store.state.notification.resource.id || 'ID' }}</span>
          </div>
          <div @click="closeNotification" class=" p-1 rounded-lg cursor-pointer">
            <Icons :icon-name="'close'" :icon-size="'xs'" class="text-neutral-600 dark:text-neutral-300"/>
          </div>
        </div>
    </div>
    </div>
  </div>
</template>

<script lang="ts">
import { ref, onMounted } from 'vue';
import store from '../store';
import Icons from './Icons.vue';
export default {
  name: 'Notification',
  props: {
    time: {
      type: Number,
      default: 4000
    },
  },
  components:{
    Icons
  },
  setup(props) {
    onMounted(() => {
      fade(props.time)
    });

    const fade = (timevar:number) => {
      setTimeout(function () {
        closeNotification()

      }, timevar);
    }

    const closeNotification = () => {
      store.dispatch('hideNotification')
    }

    const notificationStyle:any = {
      success: 'bg-green-100 border-green-600',
      info: 'bg-blue-100 border-blue-600',
      warning: 'bg-yellow-100 border-yellow-600',
      danger: 'bg-red-100 border-red-600',
    }

    const iconType:any = {
      success: 'check_circle',
      info: 'info',
      warning: 'warning',
      danger: 'dangerous',
    }

    const iconColor:any = {
      success: 'text-green-600',
      info: 'text-blue-600',
      warning: 'text-yellow-600',
      danger: 'text-red-600',
    }

    const textColor:any = {
      success: 'dark:text-green-500',
      info: 'dark:text-blue-500',
      warning: 'dark:text-yellow-500',
      danger: 'dark:text-red-500',
    }

    return { notificationStyle,iconType,iconColor,textColor, closeNotification, store}
  }
}
</script>