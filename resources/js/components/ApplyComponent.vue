<template>
    <div class="container">
        <form @submit="formSubmit">
            <button v-if="show" class="btn btn-success" id="bodybtn">Apply Now 
                <i class="fa fa-angle-double-right" aria-hidden="true"></i></button>

            <div v-else class="alert alert-success">
                Sent, Welldone!
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        props:["jobid"],
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return{'show':true}
        },
        methods:{
            formSubmit(e){
                e.preventDefault();
                axios.post('/applications/'+ this.jobid,{

                }).then((response)=>{
                    this.show=false
                });
            }
        }
    }
</script>
