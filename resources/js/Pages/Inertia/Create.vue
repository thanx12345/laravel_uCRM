<script setup>
    import { reactive } from 'vue' // reactiveをimport
    import { Inertia } from '@inertiajs/inertia' // Inertiaをimport
    const form = reactive({
      title: null, //初期値
      content: null //初期値
    })
    const submitFunction = () => { // 変数の中に関数を記述できる
     Inertia.post('/inertia', form) // クリックしたタイミングでポスト通信する
    }
</script>
<template>
    <form @submit.prevent="submitFunction"> <!-- formタグでページ読み込みを防ぐ -->
      <input type="text" name="title" v-model="form.title"><br>
      <input type="text" name="content" v-model="form.content">
      <button>送信</button>
    </form>
</template>