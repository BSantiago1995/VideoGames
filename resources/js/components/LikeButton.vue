<template>
    <div>
        <span class="like-btn" @click="likeGame" :class="{'like-active':this.likes}"></span>
        <p>{{cantidadLikes}} Me encanta</p>
  
    </div>
</template>

<script>

export default {
    props:['usergame','likes','numLike'],
    data: function(){
            return{
                totalLikes:this.numLike
    }},
   methods: {
       likeGame(){
     
        axios.post('/VideoGames/'+this.usergame)
        .then(respuesta=>{
            if(respuesta.data.attached.length>0){
                this.$data.totalLikes++;
            }else{
                this.$data.totalLikes--;
            }
        })
        .catch(error=>{
             this.$swal({
                    icon: 'error',
                    iconcolor:'#3b080b',
                    title: 'Oops...',
                    text: 'Aún no eres un usuario para dar like!'+ error,
                    footer: '<a href="/register">>>Registarte aquí<<</a>'
                    })
        });
       }
       
       
   },
   computed:{
       cantidadLikes:function(){
           return this.totalLikes;
       }
   },
}
</script>
