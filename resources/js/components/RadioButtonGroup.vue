<template>
  <label v-for="list in listData">
    <input type="radio"  class="peer hidden"  :value="list[1]" @change="$emit('update:modelValue', ($event.target as HTMLSelectElement).value)"  :name="id">
    <div class="hover:bg-neutral-100 hover:dark:bg-neutral-700 flex items-center justify-between p-1 border border-transparent rounded cursor-pointer text-sm group">
      <span class="dark:text-neutral-200 ">{{list[0]}}</span>
      <Icons :icon-name="'check'" :icon-size="'xs'" class="text-primary dark:text-neutral-200 invisible group-[.peer:checked+&]:visible"/>
    </div>
 
  </label>
</template>

<script lang="ts">
import Icons from './Icons.vue';

export default {
  name:'RadioButtonGroup',
  props:{
    id: {
      type: String,
      default: 'id'
    },
    listData:{
      default:()=>[
        ['uno','1'],
        ['dos','2'],
      ]
    },
    modelValue: {
      type: String,
      default: ''
    },
  },
  components:{
    Icons
  },
  setup(){

  }
  
}
</script>