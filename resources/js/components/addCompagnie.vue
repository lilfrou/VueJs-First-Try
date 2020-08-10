<template>
  <div>
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div
      class="modal fade"
      id="hhhhhh"
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
                    @input="changeName()"
                  />
                  <small id="nameError" style="color: red"></small>
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
    validate() {
      if (this.name == "") {
        $('#name').addClass('error');
        document.getElementById("type").style.border = "1px solid #ced4da";
        document.getElementById("date").style.border = "1px solid #ced4da";
        document.getElementById("employes").style.border = "1px solid #ced4da";

        this.$swal({
          icon: "error",
          title: "Name is required!",
          text: "Please fill it!",
        });
        document.getElementById("nameError").innerText = "You should fill the name."
        return false;
      } else if (this.type == "") {
        document.getElementById("type").style.border = "1px solid #ff0835";
        document.getElementById("name").style.border = "1px solid #ced4da";
        document.getElementById("date").style.border = "1px solid #ced4da";
        document.getElementById("employes").style.border = "1px solid #ced4da";
        this.$swal({
          icon: "error",
          title: "Type is required!",
          text: "Please fill it!",
        });
        return false;
      } else if (this.date == "") {
        document.getElementById("date").style.border = "1px solid #ff0835";
        document.getElementById("type").style.border = "1px solid #ced4da";
        document.getElementById("name").style.border = "1px solid #ced4da";
        document.getElementById("employes").style.border = "1px solid #ced4da";
        this.$swal({
          icon: "error",
          title: "Date is required!",
          text: "Please fill it!",
        });
        return false;
      } else if (this.employes == "") {
        document.getElementById("employes").style.border = "1px solid #ff0835";
        document.getElementById("type").style.border = "1px solid #ced4da";
        document.getElementById("date").style.border = "1px solid #ced4da";
        document.getElementById("name").style.border = "1px solid #ced4da";
        this.$swal({
          icon: "error",
          title: "Employes is required!",
          text: "Please fill it!",
        });
        return false;
      } else {
         document.getElementById("employes").style.border = "1px solid #ced4da";
        document.getElementById("type").style.border = "1px solid #ced4da";
        document.getElementById("date").style.border = "1px solid #ced4da";
        document.getElementById("name").style.border = "1px solid #ced4da";
        return true;
      }
    },
    changeName() {
        $('#name').removeClass('error');
        document.getElementById("nameError").innerText = ""
    },
    storeCompagnie() {
      if (this.validate()) {
        axios
          .post("api/compagnieStore", {
            name: this.name,
            type: this.type,
            date: this.date,
            employes: this.employes,
          })
          .then(
            (response) =>
              this.$emit(
                "added",
                response,
                this.flashSuccess("Added", {
                  timeout: 2000,
                })
              ),
            $("#hhhhhh").modal("hide")
          )
          .catch((error) =>
            this.flashError(error, {
              timeout: 2000,
            })
          )
          .finally(
            () => (this.name = ""),
            (this.type = ""),
            (this.date = ""),
            (this.employes = "")
          );
      }
    },
  },
};
</script>
<style>
.error {
    border: 1px solid #ff0835;
}
</style>
