<template>
  <div>
    <!-- Button trigger modal -->
    <button
      type="button"
      class="btn btn-primary"
      data-toggle="modal"
      data-target="#exampleModal"
    >Add</button>

    <!-- Modal -->
    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <label for="name">Name:</label>
              <input type="text" name="name" id="name" v-model="name" required >
              <label for="type">Type:</label>
              <input type="text" name="type" id="type" v-model="type" required >
              <label for="date">Date:</label>
              <input type="date" name="date" id="date" v-model="date" required >
              <label for="employes">employes:</label>
              <input type="number" name="employes" id="employes" v-model="employes" required >
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" @click="storeCompagnie">Create</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      name: "",
      type: "",
      date: "",
      employes: "",
    };
  },
  mounted() {
    console.log("Component mounted.");
  },
  methods: {
    storeCompagnie() {
      axios
        .post("api/compagnieStore", {
          name: this.name,
          type: this.type,
          date: this.date,
          employes: this.employes,
        })
        .then((response) =>  window.location.href = "/index")
        .catch((error) => console.log(error));
    },
  },
};
</script>
