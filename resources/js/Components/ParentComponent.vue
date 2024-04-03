<template>
  <div>
    <h1>This is the Parent Component</h1>
    
    <!-- Form -->
    <form @submit.prevent="submitForm">
      <label for="name">Name:</label>
      <input type="text" id="name" v-model="formData.name" required>
      
      <label for="email">Email:</label>
      <input type="email" id="email" v-model="formData.email" required>
      
      <button type="submit">Submit</button>
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

<style scoped>
/* Styles for the ParentComponent */
</style>
