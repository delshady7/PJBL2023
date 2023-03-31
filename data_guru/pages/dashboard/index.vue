<template>
    <div>
        <div class="dashboard" style="font-family: 'Poppins', sans-serif;">
            <div class="appbar">
                <v-app-bar
      color="#539165"
      dense
      dark
    >
      <img src="~assets/image 2.png" style="width: 50px;" alt="">
      <div class="judul" style="font-weight: 700;">
          <v-toolbar-title>DATA GURU REKAYASA PERANGKAT LUNAK</v-toolbar-title>
      </div>

      <v-spacer></v-spacer>

      <div class="icon" >
          <img src="~assets/mdi_user_white.png" style="width: 50px; margin-right: 70px; margin-top: 6px;" alt="">
      </div>
      <div class="info-user">
        <!-- <div class="nama-user">
            Admin
        </div> -->
        <div class="info-logout">
            <v-menu
              transition="slide-y-transition"
              bottom 
              offset-y
            >
              <template v-slot:activator="{ on, attrs }" >
                <v-btn
                flat
                  v-bind="attrs"
                  v-on="on"
                >
                  Admin
                </v-btn>
              </template>
              <v-list>
                <v-list-item
                  v-for="(item, index) in actions"
                  :key="index"
                  @click="item.to" 
                >
                  <v-list-item-title class="white--text">
                    {{item.title}}
                  </v-list-item-title>
                </v-list-item>
              </v-list>
            </v-menu>
        </div>
      </div>
    </v-app-bar>
            </div>
        </div>
    </div>
</template>
<script>
export default{
    data: () => ({
        actions: [
      {
        title: 'Print',
        to: 'print()'
      },
      {
        title: 'Download',
        to: 'download()'
      }       
    ]
    }),

    methods: {
      print() {
       //some code    
      },
      download() {
       //some code    
      }
    }
}
</script>