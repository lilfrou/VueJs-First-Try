<template>
  <div>
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div
      class="modal fade"
      id="deleteModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <p>Are you sure you want to delete {{compagnieToEdit.name}}?</p>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button
              type="submit"
              class="btn btn-danger"
              @click="deleteCompagnie"
            >Delete</button>
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
    deleteCompagnie() {
        axios.post("api/compagnie/delete/" + this.compagnieToEdit.id)
       .then((response) => this.$emit('compagnieDeleted',response,this.flashSuccess("Deleted", {
              timeout: 2000,
            })),
            $("#deleteModal").modal("hide"),
          )
        .catch((error) => this.flashError(error, {
              timeout: 2000,
            })
          );
    },
  },
};
</script>
