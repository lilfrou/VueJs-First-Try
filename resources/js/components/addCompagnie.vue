<template>
  <div>
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Create</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="block-content font-size-sm">
                <div class="form-group">
                  <label for="name">Name:</label>
                  <input
                    type="text"
                    name="name"
                    id="name"
                    class="form-control"
                    v-model="name"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="type">Type:</label>
                  <input
                    type="text"
                    name="type"
                    id="type"
                    class="form-control"
                    v-model="type"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="date">Date:</label>
                  <input
                    type="date"
                    name="date"
                    id="date"
                    class="form-control"
                    v-model="date"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="employes">employes:</label>
                  <input
                    type="number"
                    name="employes"
                    id="employes"
                    class="form-control"
                    v-model="employes"
                    required
                  />
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button
              type="submit"
              class="btn btn-primary"
              @click="storeCompagnie"
              data-dismiss="modal"
            >Create</button>
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
        .then((response) => this.$emit("added", response))
        .catch((error) => console.log(error))
        .finally(
          () => (this.name = ""),
          (this.type = ""),
          (this.date = ""),
          (this.employes = ""),
          this.flashSuccess("Data loaded", {
            timeout: 2000,
          })
        );
    },
  },
};
</script>
