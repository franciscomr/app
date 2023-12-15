<template>
  <button class="flex items-center py-1 space-x-1 rounded-md text-sm px-4 shadow-sm
    hover:shadow-md active:opacity-[0.85] active:shadow-none transition-all focus:shadow-none focus:opacity-[0.85]" 
  :class="defaultButton? 'text-black border hover:bg-neutral-100 dark:bg-neutral-800 dark:text-white dark:border-neutral-700 hover:dark:bg-neutral-700 dark:shadow-neutral-700 dark:hover:shadow-neutral-700/50':'text-white border-none bg-primary hover:shadow-primary/40 shadow-primary dark:hover:shadow-primary/50'"
 >
    <Icons :icon-name="iconName" :icon-size="'md'" :icon-fill="true" />
      <div class="hidden sm:block pr-1 tracking-wide font-medium">{{ label }}</div>
  </button>

</template>
<script lang="ts">
import Icons from './Icons.vue';
export default {
  name:'Button',
  props: {
    label: {
      type: String,
      default: 'New Title'
    },
    iconName: {
      type: String,
      default: 'settings'
    },
    defaultButton:{
      type:Boolean,
      default:true
    }
  },
  components:{
    Icons
  }
}
</script>