<template>
  <v-app class="ger lighten-4">
    <Navbar />
    <v-content class="mx-4 mb-4">
      <!-- All page content should be inside here! -->
      <router-view @projectAdded="console.log('Project ADDED APPVUE')" :projects="projects" :team="team"></router-view>
    </v-content>
  </v-app>
</template>

<script>
import Navbar from "./components/Navbar.vue";

export default {
  name: 'App',
  components: {
    Navbar,
  },
  data () {
    return {
      //
      team: [{}],
      projects: [{}],
      fetched: false
    }
  },
  mounted(){      
      if(!this.fetched){
        //set loader
        this.loading = true;
        this.fetch_team();
        this.fetch_projects();
      }
    },
    methods:{
      fetch_team(){
        axios
        .get('http://127.0.0.1:8000/api/team')
        .then(response => {
            this.team = response.data
            this.fetched = true;
        })
        .catch(error => {
            this.fetched = false;
        }).finally(() => this.loading = false)
      },
      fetch_projects(){
        console.log('App.vue -> projectAdded() !');
        axios
          .get('http://127.0.0.1:8000/api/projects/all')
          .then(response => {
              this.projects = response.data
              this.fetched = true;
          })
          .catch(error => {
              this.fetched = false;
          }).finally(() => this.loading = false)
      }
    }
}
</script>
