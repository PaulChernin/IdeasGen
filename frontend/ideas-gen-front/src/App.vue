<template>
  <div id="app">
    <h1 style="color: white;">Привет! Хочешь основать стартап?</h1>
    <h1 style="color: white;"> Этот сайт поможет тебе определиться с идеей для него!</h1>
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
  font-family: 'Jost', serif;
}

</style>