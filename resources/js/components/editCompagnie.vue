<template>
  <div>
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div
      class="modal fade"
      id="editModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update</h5>
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
                    v-model="compagnieToEdit.name"
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
                    v-model="compagnieToEdit.type"
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
                    v-model="compagnieToEdit.date"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="employes">employes:</label>
                  <input
                    type="number"
                    name="employes"
                    id="employes"
                    v-model="compagnieToEdit.employes"
                    class="form-control"
                    required
                  />
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" @click="updateCompagnie">Save changes</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["compagnieToEdit"],
  methods: {
    updateCompagnie() {
      axios
        .post("api/compagnie/Edit/" + this.compagnieToEdit.id, {
          name: this.compagnieToEdit.name,
          type: this.compagnieToEdit.type,
          date: this.compagnieToEdit.date,
          employes: this.compagnieToEdit.employes,
        })
        .then((response) =>
          this.$emit(
            "compagnieUpdated",
            response,
            this.flashSuccess("Edited", {
              timeout: 2000,
            }),
            $("#editModal").modal("hide")
          )
        )
        .catch((error) =>
          this.flashError(error, {
            timeout: 2000,
          }), $("#editModal").modal("hide")
        );
    },
  },
};
</script>
