<template>
  <button @click="showItems = !showItems" class="px-1 rounded">
    <div class="flex items-center py-1 space-x-1">
      <Icons :icon-name="iconName" :icon-size="'md'" class="dark:text-neutral-200" />
      <div class="w-full font-medium text-left text-sm dark:text-neutral-200 leading-tight">{{ label }}</div>
      <div class="transition-transform transform duration-200 dark:text-neutral-200" :class="showItems ? 'rotate-90' : '' "><Icons icon-name="chevron_right" :icon-size="'sm'" :icon-fill="true" /></div>
    </div>
  </button>
    
  <div v-show="showItems">
    <slot name="content" />
  </div>
</template>

<script lang="ts">
import {ref} from 'vue';
import Icons from './Icons.vue';
export default {
  name:'DropdownMenu',
  props: {
    label: {
      type: String,
      default: 'New Title'
    },
    iconName: {
      type: String,
      default: 'settings'
    }
  },
  components:{
    Icons
  },
  setup() {
    let showItems = ref(false);
    return {showItems}
  }
}
</script>