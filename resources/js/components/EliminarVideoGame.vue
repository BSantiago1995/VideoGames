<template>
    <input type="submit" class="btn btn-danger" value="Eliminar" v-on:click="EliminarVideoGame">
</template>
<script>

export default ({
      props:['videogamesId'],
     methods:{
            EliminarVideoGame(){
                this.$swal({
                title: 'Desea eliminar el video juego',
                text: "Una vez eliminada no se puede recuperar!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Deseo eliminar!',
                cancelButtonText:'Cancelar'
                }).then((result) => {
                if (result.isConfirmed) {
                    //siempre con axios se envia parametros constantes 
                    const params={
                        id:this.videogamesId
                    }                    
                    //axios envia una petición a la ruta, las comillas son invetidas por que es string // el params y methos son del web
                    axios.post(`/VideoGames/${this.videogamesId}`,{params,_method:'delete'})
                    //axios maneja exepciones por lo que se debe definir al igual que un try-catch a diferencia que es then
                    .then(respuesta=>{
                         this.$swal(
                        'Eliminado!',
                        'El Video juego fue eliminado con exito!.',
                        'success'
                        ),
                        //$el selecciona el elemento y el parent es las etiquetas siempre llegar al padre
                        this.$el.parentElement.parentElement.parentElement.parentElement.parentElement.removeChild(
                            this.$el.parentElement.parentElement.parentElement.parentElement
                        );
                    })
                    .catch(error=>{
                        console.log(error);
                    })
                    
                }
                })
            }
        }
})
</script>
