<template>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Ieraksta {{id}} labošana </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form>
                        <div class="form-group">
                            <label for="title" class="col-form-label">Ieraksta virsraksts :</label>
                            <input
                                    id="title"
                                    class="form-control"
                                    type="text"
                                    name="title"
                                    v-model="article.title"

                            >

                                <ul >
                                    <li v-for="item in error_msg.title" class="has-error">
                                        {{ item }}
                                    </li>
                                </ul>

                        </div>

                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Tavs komentārs:</label>
                            <textarea class="form-control" id="message-text" v-model="article.text"></textarea>

                                <ul >
                                    <li v-for="item in error_msg.text" class="has-error">
                                        {{ item }}
                                    </li>
                                </ul>

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Aizvērt</button>
                    <button type="button" class="btn btn-primary"  v-on:click="putToDatabase">Izveidot</button>
                </div>
            </div>
        </div>
    </div>

</template>

<script>


    export default {
        props: ['postData', 'connectData'],
        mounted() {
            this.id = this.postData.id;
            this.connect = this.connectData;
            this.article.title = this.postData.title;
            this.article.text = this.postData.text;

        },
        data() {
            return {
                error_msg: {
                    title: '',
                    text: ''
                },
                id: '',
                connect: '',
                article: {
                    title: '',
                    text: ''
                }
            }
        },
        methods: {
            putToDatabase: function()  {

                let  url = 'http://localhost:8000/post/' + this.id;
                let data = this.article;
                let token = this.connect;

                fetch(url, {
                    method: 'PUT', // or 'PUT'
                    body: JSON.stringify(data), // data can be `string` or {object}!
                    headers:{
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token
                    }
                }).then(res => res.json())
                    .then(response => {
                        if(response.errors) {
                            this.errors = true;
                            this.error_msg.title = response.errors.title;
                            this.error_msg.text = response.errors.text;

                        } else {
                            $('#exampleModal').modal('hide');
                            this.$emit('gotResponse', response);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error)}
                        );
            }
        }
    }
</script>
