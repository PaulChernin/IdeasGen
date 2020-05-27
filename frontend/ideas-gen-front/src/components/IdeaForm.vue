
<template>

    <form @submit.prevent="submit">
      
        <div class="form-group">
            <label for="idea">Ваша идея</label>
            <input type="text" class="form-control" name="idea" id="idea" v-model="fields.name" />
            <div v-if="errors && errors.name" class="text-danger">{{ errors.name[0] }}</div>
        </div>
        
        <button type="submit" class="btn btn-primary">Отправить идею!</button>
        <button @click="get">Получить идеи</button>
        <div>{{ideas}}</div>
    </form>
</template>


<script>
import axios from 'axios'

export default {

  data() {
    return {
      fields: {},
      errors: {},
      ideas: {}
    }
  },
  methods: {
    submit() {
      this.errors = {};
      axios.post('api/idea/add', this.fields).then(() => {
        alert('Идея отправлена!');
      }).catch(error => {
        if (error.response.status === 422) {
          this.errors = error.response.data.errors || {};
        }
      });
    },
    get() {
      axios.get('/api/idea/all')
      .then((response) => {
        console.log('get')
        this.ideas = response.data
      })
    }
  },
}
</script>