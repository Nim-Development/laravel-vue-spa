<template>
  <div class="dashboard">
    <h1 class="subheading grey--text">Dashboard</h1>
    <v-container class="my-5">

      <!-- Sorting button -->
      <v-layout row class="mb-3">

        <v-tooltip top>
          <v-btn 
            slot="activator"
            small flat color="grey" @click="sortBy('title')">
            <v-icon left small>folder</v-icon>
            <span class="caption text-lowercase">Order By Title</span>
          </v-btn>
          <span>Sort The Projects By Title</span>
        </v-tooltip>

        <v-tooltip top>
          <v-btn 
            slot="activator"
            small flat color="grey" @click="sortBy('member_id')">
            <v-icon left small>person</v-icon>
            <span class="caption text-lowercase">Order By Person</span>
          </v-btn>
          <span>Sort Projects By Person Name</span>
        </v-tooltip>


      </v-layout>

      <!-- Projects Loop -->
      <v-card flat class=""  v-for="(project, index) in projects" :key="index">
        <v-layout row wrap :class="`pa-3 project ${project.status}`">
          <v-flex xs12 md6>
            <div class="caption grey--text">Title</div>
            <div>{{ project.title }}</div>
          </v-flex>
          <v-flex xs6 sm4 md2>
            <div class="caption grey--text">Person</div>
            <div>{{ project.person }}</div>
          </v-flex>
          <v-flex xs6 sm4 md2>
            <div class="caption grey--text">Due by</div>
            <div>{{ project.due }}</div>
          </v-flex>
          <v-flex xs2 sm4 md2>
            <!-- <div class="caption grey--text">Status</div> -->
            <div class="right">
              <v-chip :class="`${project.status} white--text caption my-2 font-weight-bold`">{{ project.status }}</v-chip>
            </div>
          </v-flex>
        </v-layout>
        <v-divider></v-divider>
      </v-card>
    </v-container>
  </div>
</template>

<script>

export default {
  name: 'Dashboard',
  props: ["projects"],
  methods: {
    sortBy(x){
      this.projects.sort((a,b) => a[x] < b[x] ? -1 : 1);
    }
  }
}
</script>

<style scoped>
  .project.Unfinished{
    border-left: 4px solid #3cd1c2;
  }
  .project.Finished{
    border-left: 4px solid orange;
  }
  .project.Overdue{
    border-left: 4px solid tomato;
  }

  .v-chip.Unfinished{
    background:#3cd1c2;
  }

  .v-chip.Finished{
    background:orange;
  }

  .v-chip.Overdue{
    background:tomato;
  }
</style>

