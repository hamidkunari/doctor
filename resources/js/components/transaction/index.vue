 

<template>
  
  <div>

   <input type="text" v-model="searchTerm" class="form-control" style="width: 300px;" placeholder="Search Here">


<br>

   <div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Transactions</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                      <th width="2%">ID</th>
                        <th>Patient Name</th>
                         <th>Photo</th>
                        
                        <th>Amount</th>
                        <th>Status</th>
                              
                        
                        
                        <th width="15%" class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="patient in filtersearch" :key="patient.id">
                       <td>#{{ patient.id }} </td>
                        <td> {{ patient.pname }} </td>
                        <td><img :src="patient.photo" id="em_photo"></td>
                        
                        <td> {{ patient.paid }} </td>
                        
                        <td style="width:60px;">
                            <span v-if="patient.status == 'Paid'" class="badge badge-pill bg-success inv-badge">Paid</span>
                            <span v-else-if="patient.status =='Pending'" class="badge badge-pill bg-warning inv-badge">Pending</span>
                            <span v-else class="badge badge-pill bg-danger inv-badge">Not Paid</span>
                          </td>
                        
                        
            <td class="text-center">
   

 <a @click="deleteSupplier(patient.id)" class="btn btn-sm btn-danger"><font color="#ffffff">Delete</font></a>
            </td>
                      </tr>
                    
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
          </div>
          <!--Row-->


   
  </div>


</template>



<script type="text/javascript">
  
  export default {
    created(){
      if (!User.loggedIn()) {
        this.$router.push({name: '/'})
      }
    },
    data(){
      return{
        patients:[],
        searchTerm:''
      }
    },
    computed:{
      filtersearch(){
      return this.patients.filter(patient => {
         return patient.pname.match(this.searchTerm)
      }) 
      }
    },
 
  methods:{
    allPatient(){
      axios.get('/api/patient/')
      .then(({data}) => (this.patients = data))
      .catch()
    },
  deleteSupplier(id){
             Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.value) {
                axios.delete('/api/patient/'+id)
               .then(() => {
                this.patients = this.patients.filter(patient => {
                  return patient.id != id
                })
               })
               .catch(() => {
                this.$router.push({name: 'patient'})
               })
                Swal.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                )
              }
            })

  } 

  },
  created(){
    this.allPatient();
  } 
  

  } 
</script>


<style type="text/css">
  #em_photo{
    height: 40px;
    width: 40px;
  }
</style>