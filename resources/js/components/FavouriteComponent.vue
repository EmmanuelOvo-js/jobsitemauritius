<template>
    <div class="container">
        
            <button v-if="show" @click.prevent="unsave()" class="btn btn-dark unsave">Unsave Job <i class="fa fa-times" aria-hidden="true"></i></button>

            <button v-else @click.prevent="save()" class="btn btn-info save">Save Job <i class="fa fa-bookmark iconcolor" aria-hidden="true"></i></button>

    </div>
</template>

<script>
    export default {
        props:['jobid','favourited'],
       
         data(){
            return{
                show:true
            }
        },

        mounted(){
           this.show = this.jobFavourited ? true:false;

        },

        computed:{
            jobFavourited(){
                return this.favourited
            }
        },

        methods:{
            save(){
                axios.post('/save/'+this.jobid).then(response=>this.show=true).catch(error=>alert('error'))

            },
            unsave(){

                axios.post('/unsave/'+this.jobid).then(response=>this.show=false).catch(error=>alert('error'))

            },
        }
    }
</script>
