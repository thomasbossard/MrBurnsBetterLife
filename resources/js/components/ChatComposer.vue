<template lang="html">
    <div class="panel-block field">

        <div class="row text-left">
            <div class="col-md-10">
            <div class="abc" style="margin-bottom: 10px;">    
                    <input type="text" class="form-control" v-on:keyup.enter="sendChat" v-model="chat">
                </div>    
            </div>

            <div class="col-md-2 text-right">
                <div class="control auto-width"  style="margin-bottom: 10px;">
                    <input type="button" class="btn btn-primary" value="Senden" v-on:click="sendChat">
                </div>
            </div>

        </div>        
    </div>
</template>

<script>
    export default {
        props: ['chats', 'userid', 'friendid'],
        data() {
            return {
                chat: ''
            }
        },
        methods: {
            sendChat: function(e) {
                if (this.chat != '') {
                    var data = {
                        chat: this.chat,
                        friend_id: this.friendid,
                        user_id: this.userid
                    }
                    this.chat = '';
                    axios.post('/chat/sendChat', data).then((response) => {
                        this.chats.push(data)
                    })
                }
            }
        }
    }
</script>

<style scoped>
    .panel-block {
        flex-direction: row;
        width: 100%;
        border: none;
        padding: 0;
    }
    input {
         border-radius: 0;
        
        margin: 2px;
      
        }

    .test {
        border-radius: 0;
        width: 100%;
        margin: 2px;
    }
        
   
    .auto-width {
        width: auto;
        
    }
</style>