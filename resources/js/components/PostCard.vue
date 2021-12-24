<template>
    <div>
        <div class="row mb-4" v-for="post in posts" v-bind:key="post">
            <div class="col">
                <div class="card">
                <div class="card-body">
                    <p class="lead">{{post.title}}</p>
                    Por: {{post.author}}
                </div>
                <div class="card-footer">
                    <a :href="'/post/'+post.id">Ver más...</a> 
                </div>
            </div>
        </div>      
  </div>
    </div>  
</template>

<script>
export default {
    data(){
        return{
            posts: null
        }
    },
    mounted(){
        this.getPosts();
    },
    methods:{
        getPosts(){
            axios.get('/posts')
            .then((res) => {
                this.posts = res.data.posts;
                this.author = res.data.author;
            })
            .catch((err) => {
                console.log(err);
            })
        }
    }
}
</script>

<style>

</style>