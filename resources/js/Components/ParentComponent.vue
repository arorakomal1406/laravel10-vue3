<style scoped>
  /* Import Bootstrap styles */
  @import url('../../../node_modules/bootstrap/dist/css/bootstrap.min.css');
</style>


<template>
  <div>
    <h1>This is the Parent Component</h1>
    
    <!-- Form -->
    <form @submit.prevent="submitForm">
      <label for="name">Name:</label>
      <input type="text" id="name" class="form-control" v-model="formData.name" required>
      
      <label for="email">Email:</label>
      <input type="email" id="email" class="form-control" v-model="formData.email" required>
      
      <button type="submit" class="btn-primary">Submit</button>
    </form>
    
    <!-- Display form data -->
    <div v-if="submitted">
      <p>Submitted Data:</p>
      <p>Name: {{ formData.name }}</p>
      <p>Email: {{ formData.email }}</p>
    </div>
  </div>
</template>

<script>
import 'jquery';
import 'bootstrap';

import axios from 'axios'

export default {
  data() {
    return {
      formData: {
        name: '',
        email: ''
      },
      submitted: false
    };
  },
  methods: {
    submitForm() {
      axios.post('/submit-form', this.formData)
        .then(response => {
          console.log(response);
          this.submitted = true;
        })
        .catch(error => {
          console.error(error);
        });
      
    }
  }
}
</script>

