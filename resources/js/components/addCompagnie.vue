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
                    @input="change('name')"
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
                    @input="change('type')"
                  />
                  <small id="typeError" style="color: red"></small>
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
                    @input="change('date')"
                  />
                  <small id="dateError" style="color: red"></small>
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
                    @input="change('employes')"
                  />
                  <small id="employesError" style="color: red"></small>
                </div>
                <div class="form-group">
                  <input type="file" v-on:change="onImageChange" />
                  <div id="preview">
                    <img v-if="url" :src="url"  />
                  </div>
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
      image: "",
      url: "",
    };
  },
  mounted() {
    console.log("Component mounted.");
  },
  methods: {
    onImageChange(e) {
      console.log(e.target.files[0]);
      this.image = e.target.files[0];
      this.url = URL.createObjectURL(this.image);
    },
    validate() {
      if (this.name == "") {
        $("#name").addClass("error");
        document.getElementById("type").style.border = "1px solid #ced4da";
        document.getElementById("date").style.border = "1px solid #ced4da";
        document.getElementById("employes").style.border = "1px solid #ced4da";

        this.$swal({
          icon: "error",
          title: "Name is required!",
          text: "Please fill it!",
        });
        document.getElementById("nameError").innerText = "Name is required.";
        return false;
      } else if (this.type == "") {
        $("#type").addClass("error");
        document.getElementById("name").style.border = "1px solid #ced4da";
        document.getElementById("date").style.border = "1px solid #ced4da";
        document.getElementById("employes").style.border = "1px solid #ced4da";
        this.$swal({
          icon: "error",
          title: "Type is required!",
          text: "Please fill it!",
        });
        document.getElementById("typeError").innerText = "type is required.";

        return false;
      } else if (this.date == "") {
        $("#date").addClass("error");
        document.getElementById("type").style.border = "1px solid #ced4da";
        document.getElementById("name").style.border = "1px solid #ced4da";
        document.getElementById("employes").style.border = "1px solid #ced4da";
        this.$swal({
          icon: "error",
          title: "Date is required!",
          text: "Please fill it!",
        });
        document.getElementById("dateError").innerText = "date is required.";
        return false;
      } else if (this.employes == "") {
        $("#employes").addClass("error");
        document.getElementById("type").style.border = "1px solid #ced4da";
        document.getElementById("date").style.border = "1px solid #ced4da";
        document.getElementById("name").style.border = "1px solid #ced4da";
        this.$swal({
          icon: "error",
          title: "Employes is required!",
          text: "Please fill it!",
        });
        document.getElementById("employesError").innerText =
          "employes is required.";
        return false;
      } else {
        document.getElementById("employes").style.border = "1px solid #ced4da";
        document.getElementById("type").style.border = "1px solid #ced4da";
        document.getElementById("date").style.border = "1px solid #ced4da";
        document.getElementById("name").style.border = "1px solid #ced4da";
        return true;
      }
    },
    change(tar) {
      $("#" + tar).removeClass("error");
      document.getElementById(tar + "Error").innerText = "";
    },
    storeCompagnie() {
      if (this.validate()) {
        let currentObj = this;

        const config = {
          headers: { "content-type": "multipart/form-data" },
        };

        let formData = new FormData();
        formData.append("name", this.name);
        formData.append("type", this.type);
        formData.append("date", this.date);
        formData.append("employes", this.employes);
        formData.append("image", this.image);
        axios
          .post("api/compagnieStore", formData, config)
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
            (this.employes = ""),
             (this.image = ""),
              (this.url = "")
          );
      }
    },
  },
};
</script>
<style>
@keyframes blink {
  50% {
    border-color: #ff0000;
  }
}
.error {
  animation: blink 0.5s step-end infinite alternate;
}
#preview {
  display: flex;
  justify-content: center;
  align-items: center;
}

#preview img {
  max-width: 100%;
  max-height: 500px;
}
</style>
