<template>
  <button class="flex items-center p-2 rounded text-white hover:bg-white/10">
    <Icons :icon-name="iconName" :icon-fill="iconFill" />
  </button>
</template>

<script lang="ts">
import Icons from '@/components/Icons.vue'
export default {
  name:'NavBarButton',
  props:{
    label:{
      type:String,
      default:'New Button'
    },
    iconName:{
      type:String,
      default:'settings'
    },
    iconFill:{
        type:Boolean,
        default:false
      }
  },
  components:{
    Icons
  }
}
</script>