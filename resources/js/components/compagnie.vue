<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="form-row">
          <div class="col-row">
            <input
              type="text"
              class="form-control"
              @keyup="search"
              v-model="q"
              placeholder="search...."
            />
          </div>
        </div>
        <div class="card">
          <div class="card-header">compagnie</div>

          <addCompagnie></addCompagnie>

          <div class="table-responsive">
            <table class="table table-bordered table-striped table-vcenter table-hover">
              <thead>
                <tr>
                  <th>{{('maker.name')}}</th>
                  <th>{{('maker.romaji')}}</th>
                  <th>{{('maker.model')}}</th>
                  <th>{{('maker.part')}}</th>
                  <th>{{('maker.action')}}</th>
                </tr>
              </thead>
              <tbody>
                <td v-if="!compagnies.data" colspan="5" class="text-center">No item in inventory</td>
                <tr v-for="compagnie in compagnies.data" :key="compagnie.id">
                  <td>{{compagnie.name}}</td>
                  <td>{{compagnie.type}}</td>
                  <td>{{compagnie.date}}</td>
                  <td>{{compagnie.employes}}</td>
                  <td>
                    <button
                      type="button"
                      class="btn btn-secondary"
                      data-toggle="modal"
                      data-target="#editModal"
                      @click="getCompagnie(compagnie.id)"
                    >edit</button>

                    <button
                      type="button"
                      class="btn btn-danger"
                      data-toggle="modal"
                      data-target="#deleteModal"
                      @click="getCompagnie(compagnie.id)"
                    >delete</button>
                    <editCompagnie
                      v-bind:compagnieToEdit="compagnieToEdit"
                      @compagnieUpdated="refresh"
                    ></editCompagnie>

                    <deleteCompagnie
                      v-bind:compagnieToEdit="compagnieToEdit"
                      @compagnieDeleted="refresh"
                    ></deleteCompagnie>
                  </td>
                </tr>
              </tbody>
            </table>
            <pagination :data="compagnies" @pagination-change-page="getResults"></pagination>
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
      compagnies: {},
      compagnieToEdit: "",
      q: "",
    };
  },
  created() {
    axios
      .get("api/compagnie")
      .then((response) => (this.compagnies = response.data))
      .catch((error) => console.log(error));
  },
  mounted() {
    console.log("Component mounted.");
  },
  methods: {
    // Our method to GET results from a Laravel endpoint
    getResults(page = 1) {
      axios.get("api/compagnie?page=" + page).then((response) => {
        this.compagnies = response.data;
      });
    },
    getCompagnie(id) {
      axios
        .get("api/compagnie/Edit/" + id)
        .then((response) => (this.compagnieToEdit = response.data))
        .catch((error) => console.log(console.error()));
    },
    refresh(compagnies) {
      this.compagnies = compagnies.data;
    },
    search() {
      if (this.q.length > 3) {
        axios
          .get("api/compagnie/" + this.q)
          .then((response) => (this.compagnies = response.data))
          .catch((error) => console.log(error));
      } else {
        axios
          .get("api/compagnie")
          .then((response) => (this.compagnies = response.data))
          .catch((error) => console.log(error));
      }
    },
  },
};
</script>
