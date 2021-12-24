<template>
  <form @submit.prevent="savePost">
      <h3 class="font-weight-light">Nuevo Post</h3>
      <div class="input-group input-group-lg mt-4">
          <input type="text" name="title" id="title" placeholder="Título" class="form-control" required v-model="title">
      </div>
      <div class="input-group mt-4 input-group-lg">
          <textarea name="body" id="body" cols="30" rows="12" class="form-control" placeholder="Escribe aquí..." required v-model="body"></textarea>
      </div>
      <div class="form-group mt-4 text-center">
          <button class="btn btn-success col-12" type="submit">Guardar</button>
      </div>
  </form>
</template>

<script>
export default {
    data(){
        return{
            title: null,
            body:  null
        }
    },
    methods:{
        savePost(){
            axios.post('/post',{
                title: this.title,
                body: this.body
            })
            .then((res) => {                
                console.log(res.data.message);                
                window.location.href = '/post/'+res.data.post_id;
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