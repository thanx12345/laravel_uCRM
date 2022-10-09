<script setup>
import Label from '@/components/Label.vue'
import Input from '@/components/Input.vue'
import GuestLayout from '@/Layouts/Guest.vue'

const emitTest = e => console.log(e)

</script>

<template>
    <GuestLayout>
    <Label>タイトル</Label>
    <Input 
      modelValue="初期値です"
      @update:modelValue="emitTest"
      ></Input>
    </GuestLayout>
</template>