<template>
  <div id="app">
    <IdeaForm></IdeaForm>
  </div>
</template>

<script>
import IdeaForm from './components/IdeaForm.vue'

export default {
  name: 'App',
  components: {
    IdeaForm
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
