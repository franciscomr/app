<template>
<div class="w-full h-full bg-neutral-900 bg-opacity-50 py-8">
  <div class="max-w-md mx-auto">
    <div class="flex flex-col bg-white p-6 space-y-4 rounded-t-md">
      <Header />
      <FormInput /> 
      <FormInput />
      <FormInput />
    </div>
    <div class="flex flex-col bg-neutral-100 p-6 rounded-b-md">
      <div class="inline-flex items-center justify-between">
        <FormButton />
        <FormButton :default-button="false" />

      </div>
    </div>
  </div>
</div>
</template>

<script lang="ts">
import FormInput from '@/components/FormInput.vue';
import FormButton from '@/components/FormButton.vue';
import Header from '@/components/Header.vue';
export default {
  name:'Formdata',
  components:{
    Header,
    FormInput,
    FormButton
  }
}
</script>