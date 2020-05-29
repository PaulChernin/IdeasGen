
<template>
   <form @submit.prevent="submit" class="myform">
     <div class="button_cont" @click="get()" align="center"><a class="mybutton" target="_blank" rel="nofollow noopener">Получить идеи!</a></div>
     <div  v-if="click" style="margin-bottom: 200px; color: white; font-weight: bold;">{{ideas[Math.floor(Math.random() * ideas.length)].text}} </div>
     <h2 style="color: white;">Уже есть хорошая идея, и ты хочешь ею поделиться?</h2>
        <div class="form-group">
            <label for="idea" style="color: white; margin-right: 25px;">Ваша идея     </label>
            <input type="text" class="form-control" name="idea" id="idea" v-model="fields.name" />
            <div v-if="errors && errors.name" class="text-danger">{{ errors.name[0] }}</div>
        </div>
    
        <div @click="submit" class="button_cont" align="center"><a class="mybutton2" target="_blank" rel="nofollow"><span>Отправить идею!</span></a></div>
    </form >
</template>


<script>
import axios from 'axios'

export default {

  data() {
    return {
      fields: {},
      errors: {},
      ideas: {},
      click: false
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
        this.click = true
      })
    }
  },
}
</script>

<style>
  .myform {
  padding-bottom: 100px;
}
  .mybutton {
  color: #fff !important;
  text-transform: uppercase;
  text-decoration: none;
  background: #fa983a;
  padding: 20px;
  border-radius: 50px;
  display: inline-block;
  border: none;
  transition: all 0.4s ease 0s;
  margin-bottom: 50px;
}
.mybutton:hover {
  text-shadow: 0px 0px 6px rgba(255, 255, 255, 1);
  box-shadow: 0px 5px 40px -10px rgba(0,0,0,0.57);
  -webkit-box-shadow: 0px 5px 40px -10px rgba(0,0,0,0.57);
  -moz-box-shadow: 0px 5px 40px -10px rgba(0,0,0,0.57);
  transition: all 0.4s ease 0s;
}

 .mybutton2 span {
   color: #27ae60;
   font-weight: bold;
   font-size: 20px;
   cursor: pointer;
   display: inline-block;
   position: relative;
   transition: 0.4s;
 }
 .mybutton2 span:after {
   content: '\00bb';
   position: absolute;
   opacity: 0;
   top: 0;
   right: -20px;
   transition: 0.5s;
 }
 .mybutton2:hover span {
   padding-right: 25px;
 }
 .mybutton2:hover span:after {
   opacity: 1;
   right: 0;
 }
</style>
