<template>
  <div>
    <Background>
      <template #content>   
        <div class="bg-red-300">
          <h1>hola</h1>
        </div>     
      </template>
    </Background>
  </div>
</template>

<script lang="ts">
import Background from './Background.vue';
export default {
  name:'Test',
  components:{
    Background
  }
}
</script>