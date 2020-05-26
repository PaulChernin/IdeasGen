
<template>

    <form @submit.prevent="submit">
      
        <div class="form-group">
            <label for="idea">Ваша идея</label>
            <input type="text" class="form-control" name="idea" id="idea" v-model="fields.name" />
            <div v-if="errors && errors.name" class="text-danger">{{ errors.name[0] }}</div>
        </div>
        
        <button type="submit" class="btn btn-primary">Отправить идею!</button>
    </form>
</template>


<script>
export default {
  data() {
    return {
      fields: {},
      errors: {},
    }
  },
  methods: {
    submit() {
      this.errors = {};
      this.$axios.post('/submit', this.fields).then(response => {
        alert('Идея отправлена!');
      }).catch(error => {
        if (error.response.status === 422) {
          this.errors = error.response.data.errors || {};
        }
      });
    },
  },
}
</script>