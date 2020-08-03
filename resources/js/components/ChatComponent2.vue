<template>
  <div class="chat-app">
    <conversation :contact="selectedContact" :messages="messages" @new="saveNewMessage" />
    <contactsList :contacts="contacts" @selected="startConversationWith" />
  </div>
</template>
<script>
export default {
  props: {
    user: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {
      selectedContact: null,
      messages: [],
      contacts: [],
    };
  },
  mounted() {
    console.log(this.user);

    console.log("Component mounted.");
    axios.get("/contacts").then((response) => {
      console.log(response.data);

      this.contacts = response.data;
    });
  },
  methods: {
    startConversationWith(contact) {
      axios.get(`/conversation/${contact.id}`).then((response) => {
        this.messages = response.data;
        this.selectedContact = contact;
      });
    },
    saveNewMessage(text) {
      this.messages.push(text);
    },
  },
};
</script>
<style lang="scss" scoped>
.chat-app {
  display: flex;
}
</style>
