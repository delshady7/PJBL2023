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
        <div class="container">                    
          <div class="addBtn" style="color: #ffffff; margin-top: 21px;">
            <!-- <v-btn style="background: #539165" rounded outlined dark>Tambah Data</v-btn> -->
            <v-dialog
      v-model="dialog"
      persistent
      max-width="600px"
    >
      <template v-slot:activator="{ on, attrs }">
        <v-btn
        style="background: #539165"
          rounded
          outlined
          dark
          v-bind="attrs"
          v-on="on"
        >
          Tambah Data
        </v-btn>
      </template>
    </v-dialog>
          </div>
          <div class="search" style="margin-left:1180px; margin-top: -18px; width: 600px">
            <v-toolbar flat >
              <v-text-field
                v-model="cari"
                flat
                placeholder="Cari"
                style="border-radius: 56px"
              ></v-text-field>
              <v-btn @click="searchData(cari)" icon>
                <v-icon>mdi-magnify</v-icon>
              </v-btn>
            </v-toolbar>
          </div>
          <div class="tabel">
            <v-simple-table 
              fixed-header 
              height="500px" 
              data-app

              >
              <template v-slot:top>
                <v-dialog 
                v-model="dialog"
                ref="dialog">
                  <template v-slot:activator="{ on, attrs }">                    
                  </template>
                  <v-card>
                    <v-card-title>
                      <span class="text-h5">DMS</span>
                    </v-card-title>
      
                    <v-card-text>
                      <v-container>
                        <v-row>
                          <v-col cols="12" sm="6" md="4">
                            <v-text-field
                              label="Nama"
                              v-model="nama"
                            ></v-text-field>
                          </v-col>
                          <v-col cols="12" sm="6" md="4">
                            <v-text-field
                              v-model="jenis_kelamin"
                              label="Jenis Kelamin"
                            ></v-text-field>
                          </v-col>
                          <v-col cols="12" sm="6" md="4">
                            <v-text-field
                              v-model="jabatan"
                              label="Jabatan"
                            ></v-text-field>
                          </v-col>
                          <v-col>
                            <v-textarea 
                            clearable 
                            label="Alamat"
                            v-model="alamat"
                            ></v-textarea>
                          </v-col>
                          <v-col cols="12" sm="6" md="4">
                            <v-text-field
                            v-model="telepon"
                              label="No. Telepon"
                            ></v-text-field>
                          </v-col>
                        </v-row>
                      </v-container>
                    </v-card-text>
      
                    <v-card-actions>
                      <v-spacer></v-spacer>
                      <v-btn color="blue darken-1" text @click.prevent="closeAdd">
                        Cancel
                      </v-btn>
                      <v-btn color="blue darken-1" text @click.prevent="save"> Save </v-btn>
                    </v-card-actions>
                  </v-card>
                </v-dialog>
              </template>
              <thead>
                <tr>
                  <!-- <th class="text-left">Id</th> -->
                  <th class="text-center">Nama</th>
                  <th class="text-center">Jenis Kelamin</th>
                  <th class="text-center">Jabatan</th>
                  <th class="text-center">Alamat</th>
                  <th class="text-center">No. Telepon</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(item, index) in data_guru" :key="item.id">
                  <td class="text-center">{{ item.nama }}</td>
                  <td class="text-center">{{ item.jenis_kelamin }}</td>
                  <td class="text-center">{{ item.jabatan }}</td>
                  <td class="text-center">{{ item.alamat }}</td>                
                  <td class="text-center">{{ item.telepon }}</td>
                  <td class="text-center">
                    <tr>
                      <v-row>
                        <v-col>
                          <v-btn
                            @click.prevent="edit(item)"
                            color="primary"
                            fab
                            small
                            dark
                            ><v-icon>mdi-pencil</v-icon></v-btn
                          >
                        </v-col>
                        <v-col>
                          <v-btn
                            @click.prevent="remove(item.id, index)"
                            color="danger"
                            fab
                            small
                            dark
                            ><v-icon>mdi-delete</v-icon></v-btn
                          >
                        </v-col>
                      </v-row>
                    </tr>
                  </td>
                </tr>
              </tbody>
            </v-simple-table>
          </div>
        </div>
    </div>
</template>
<script>
export default{
  created() {
    console.log("ok")
    const endpoint = "http://localhost/PJBL2023/api_pjbl/public/data_guru"
    // const endpoint = "http://localhost:8080/Data/barang"

    fetch(endpoint,
      {
        // mode: 'no-cors',
        // method: 'GET',
        headers: {
          // 'Content-Type': 'application/json',
          // 'Access-Control-Allow-Origin' : 'http://localhost:3000/',
          // "Access-Control-Allow-Credentials" : true ,
          // 'Access-Control-Allow-Headers' : '*',
          // 'Access-Control-Allow-Methods' : 'index,create,update,delete',
          // 'Content-Type': 'application/x-www-form-urlencoded',
          
        },
      })
      .then(result => result.json())
      // .then(result => console.log(result))

    .then(result => {
      this.data_guru=result.data
      console.log(result.data)
    })
  },

    data: () => ({
     data_guru : [],
     cari: null,
     dialog: false,
     editIndex: -1,
     editGuru: {
      nama: '',
      gender: '',
      jabatan: '',
      alamat: '',
      nomer:''
     },
     defaultGuru: {
      nama: '',
      gender: '',
      jabatan: '',
      alamat: '',
      nomer:''
     }
    }),

    methods: {
      closeAdd(){
        this.dialog = false;
        this.$nextTick(() => {
          this.editGuru = Object.assign({}, this.defaultGuru);
          this.editIndex = -1;
        })
      },
      save(){
        var data_guru = {
          nama : this.nama,
          jenis_kelamin : this.jenis_kelamin,
          jabatan : this.jabatan,
          alamat : this.alamat,
          telepon : this.telepon
        }
        this.$axios.post("http://localhost/PJBL2023/api_pjbl/public/data_guru", data_guru)
        // .then(() => this.$router.push(-1))
        // e.preventDefault();
        // this.$router.push({path: '/', query:{key: value}})
        .then(() => this.$router.push("/dashboard")) ;
      //   .then(() => {
      //      this.$router.push({
      //            name: '/'
      //      });
      //  }).catch(error => {
      //      console.log(error.response);
      //  });
      },
      
      },
      methods: {
        remove(id, index)
        {
          this.$axios.delete(`http://localhost/PJBL2023/api_pjbl/public/data_guru/${id}`)
            .then(response => {
                this.aset.splice(index, 1);
                console.log(response);
              }).catch(error => {
                console.log(error.response);
          });
        }
        }
    }

</script>