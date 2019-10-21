<template>
  <div>
    <gallery :images="photos" :index="index" :options="fullscreenOptions" @close="index = null"></gallery>
    
    <div class="card-columns">
        <div class="card" v-for="(image, imageIndex) in photos"
        :key="imageIndex"
        @click="index = imageIndex">
        <!-- {{image.image}} -->
            <img :src="'/storage/uploads/album/'+image.album_id+'/'+image.image" class="card-img-top" alt="...">
        </div>
    </div>
  </div>
</template>
 
<script>
  import VueGallery from 'vue-gallery';
  
  export default {
    props: ['photos'],
    data: function () {
      return {
        
        fullscreenOptions: {
          // Defines if the gallery should open in fullscreen mode:
          fullScreen: false
        },
        index: null
      };
    },
    mounted() {
      // console.log('photos', photos);
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