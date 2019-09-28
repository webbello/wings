<template>
  <div>
    <gallery :images="images" :index="index" @close="index = null"></gallery>
    
    <div class="card-columns">
        <div class="card" v-for="(image, imageIndex) in images"
        :key="imageIndex"
        @click="index = imageIndex">
            <img :src="image" class="card-img-top" alt="...">
        </div>
    </div>
  </div>
</template>
 
<script>
  import VueGallery from 'vue-gallery';
  
  export default {
    data: function () {
      return {
        images: [
          'https://source.unsplash.com/random',
          'https://source.unsplash.com/weekly?fruit',
          'https://source.unsplash.com/weekly?water',
          'https://source.unsplash.com/weekly?education',
          'https://source.unsplash.com/weekly?books',
          'https://source.unsplash.com/weekly?school',
          'https://source.unsplash.com/weekly?help',
          'https://source.unsplash.com/daily',
          'https://source.unsplash.com/collection/190727/1600x900',
          'https://source.unsplash.com/weekly?fruit',
          'https://source.unsplash.com/weekly?water',
          'https://source.unsplash.com/weekly?education',
          'https://source.unsplash.com/weekly?books',
          'https://source.unsplash.com/weekly?school',
          'https://source.unsplash.com/weekly?help',
          'https://source.unsplash.com/daily',
          'https://source.unsplash.com/collection/190727/1600x900',
          'https://source.unsplash.com/weekly?fruit',
          'https://source.unsplash.com/weekly?water',
          'https://source.unsplash.com/weekly?education',
          'https://source.unsplash.com/weekly?books',
          'https://source.unsplash.com/weekly?school',
          'https://source.unsplash.com/weekly?help',
          'https://source.unsplash.com/daily',
          'https://source.unsplash.com/collection/190727/1600x900',
          'https://source.unsplash.com/weekly?fruit',
          'https://source.unsplash.com/weekly?water',
          'https://source.unsplash.com/weekly?education',
          'https://source.unsplash.com/weekly?school',
          'https://source.unsplash.com/weekly?help',
          'https://source.unsplash.com/daily',
          'https://source.unsplash.com/collection/190727/1600x900',
          'https://source.unsplash.com/weekly?fruit',
          'https://source.unsplash.com/weekly?water',
          'https://source.unsplash.com/weekly?books',
          'https://source.unsplash.com/weekly?school',
          'https://source.unsplash.com/weekly?help',
          'https://source.unsplash.com/daily',
          'https://source.unsplash.com/collection/190727/1600x900',
        ],
        index: null
      };
    },
 
    components: {
      'gallery': VueGallery
    },
  }
</script> 
 
<style scoped>
  .image {
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
    border: 1px solid #ebebeb;
    margin: 5px;
  }
</style> 