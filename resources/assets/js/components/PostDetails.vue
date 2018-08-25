<template>

    <div>
        <h1>Dienasgrāmatas ieraksts {{id}}</h1>
       <h2>{{ title }}</h2>
           <p>{{ text }}</p>

        <p><a href="#exampleModal"  data-toggle="modal" >Labot šo ierakstu</a></p>


        <example :post-data="postDataVal" :connect-data="connectData" @gotResponse="setData($event)"></example>

    </div>


</template>

<script>
    export default {
        props: ['postDataVal', 'connectData'],
        name: 'PostDetails',
        mounted() {
            this.id = this.postDataVal.id;
            this.title = this.postDataVal.title;
            this.text = this.postDataVal.text;

        },
        data() {
            return {
                id: '',
                title: '',
                text: ''

            }
        },methods: {
            setData: function(event)  {
                this.id = event.id;
                this.title = event.title;
                this.text = event.text;
            }
        }
    }
</script>

<style scoped>

</style>