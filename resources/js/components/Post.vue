<template>
    <div>
        <div v-if="!e">
            <h3 class="font-weight-light">{{post.title}}</h3>
            <p class="lead">Autor: {{post.author}}</p>
            <p v-if="ep == 1"><a @click="e = true" class="text-info btn">Editar</a> | <a @click="deletePost" class="text-danger btn">Eliminar</a></p>
            <p>{{post.body}}</p>
        </div>
        <form v-else @submit.prevent="savePost">            
            <h3 class="font-weight-light">Editar Post<span><a @click="e = false" class="text-danger btn">Cancelar edición</a></span></h3>                    
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
    </div>    
</template>

<script>
export default {
    data(){
        return{
            e: false,            
            title: this.post.title,
            body: this.post.body,            
        }
    },
    props:{
        post:{
            type: Object,
            default: () => {}
        },
        ep:{
            type: Number,
            default: () => 0
        }
    },
    methods:{
        savePost(){
            axios.put('/post',{
                id: this.post.id,
                title: this.title,
                body: this.body
            })
            .then((res) => {                
                console.log(res.data.message);                
                alert(res.data.message);
                window.location.reload();
            })
            .catch((err) => {
                console.log(err);
            })
        },
        deletePost(){
            if(confirm('¿Seguro que lo quieres eliminar?')){
                axios.delete('/post/'+ this.post.id)
                .then((res) => {
                    alert(res.data.message);
                    window.location.reload();
                })
                .catch((err) => {
                    console.log(err);
                })
            }
        }
    }
}
</script>

<style>
    p{
        white-space: pre-wrap;
    }
</style>