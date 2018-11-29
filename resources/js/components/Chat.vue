<style scoped>
    .panel-block {
        flex-direction: column;
        border: none;
    }
    .chat {
        width: 100%;
        padding: 20px;
        box-shadow: inset 0 0 5px 0 grey;
        margin-bottom: 20px;
        border: 1px solid grey;
        max-height: 600px;
        overflow-x: auto;
    }

    .chat-right, .chat .chat-left {
    border: 2px solid #dedede;
    background-color: lightgreen;
    border-color: lightgreen;
    border-radius: 5px;
    padding: 10px;
    margin: 10px 0;
    }
    .chat-right {
        float: right;
         border-color: lightblue;
         background-color: lightblue;
    }
    .chat-left {
        float: left;
        background-color: blue;
    }
    .no-message {
        height: 200px;
        display: flex;
        align-items: center;
    }
</style>

<template>
    <div class="panel-block">
        <div class="chat" v-if="chats.length != 0">
            <div v-for="chat in chats" style="overflow: auto;">
                <div class="chat-right" v-if="chat.user_id == userid">
                    {{ chat.chat }}
                </div>
                <div class="chat-left" v-else>
                    {{ chat.chat }}
                </div>
            </div>
        </div>
        <div v-else class="no-message">
            Der Chat ist leer...
        </div>
        <chat-composer v-bind:userid="userid" v-bind:chats="chats" v-bind:friendid="friendid"></chat-composer>
    </div>
</template>

<script>
    export default {
        props: ['chats', 'userid', 'friendid']
    }
</script>