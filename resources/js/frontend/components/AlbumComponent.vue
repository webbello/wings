<template>
<div>
    <nav>
    <section>
        <router-link :to="{ name: 'Gallery', params: { 'albumId': 2 } }">NEW POST In Album </router-link>
    </section>
    </nav>
    <article>
    <div>  </div>
    </article>
</div>
</template>


<script>
export default {
  mounted() {
    //this.getPosts();
  },
  data() {
    return {
      posts: {},
      next: null,
      prev: null
    };
  },
  methods: {
    getPosts(address) {
      axios.get(address ? address : "/api/posts").then(response => {
        this.posts = response.data.data;
        this.prev = response.data.links.prev;
        this.next = response.data.links.next;
      });
    },
    deletePost(id) {
      axios.delete("/api/posts/" + id).then(response => {
        console.log(response.data);
        this.getPosts();
      });
    },
    navigate(address) {
      this.getPosts(address);
    }
  }
};
</script>
