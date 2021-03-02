 

<template>
  
  <div>

 <div class="row">
  <router-link to="/patient" class="btn btn-primary">All Patient </router-link>
   
 </div>



    <div class="row justify-content-center">
      <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Add Patient</h1>
                  </div>

      <form class="user" @submit.prevent="supplierInsert" enctype="multipart/form-data">

        <div class="form-group">
          <div class="form-row">
            <div class="col-md-4">
         <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter Your Full Name" v-model="form.pname">
       <small class="text-danger" v-if="errors.pname"> {{ errors.pname[0] }} </small>
            </div>
            <div class="col-md-4">
         <input type="number" class="form-control" id="exampleInputFirstName" placeholder="Enter Your Age" v-model="form.age">
       <small class="text-danger" v-if="errors.age"> {{ errors.age[0] }} </small>
            </div>

             <div class="col-md-4">
    <select class="form-control" id="exampleFormControlSelect1" v-model="form.doctor_id">
    <option :value="employee.id" v-for="employee in employees">{{ employee.name }}</option>
    </select>   
    </div>
          </div>
        </div>

        <div class="form-group">
          <div class="form-row">
            <div class="col-md-6">
         <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter Your Full Address" v-model="form.address">
       <small class="text-danger" v-if="errors.address"> {{ errors.address[0] }} </small>
            </div>
            <div class="col-md-6">
         <input type="phone" class="form-control" id="exampleInputFirstName" placeholder="Enter Your Phone" v-model="form.phone">
       <small class="text-danger" v-if="errors.phone"> {{ errors.phone[0] }} </small>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="form-row">
            <div class="col-md-4">
         <input type="Date" class="form-control" id="exampleInputFirstName" placeholder="Enter Last Visit Date" v-model="form.visit">
       <small class="text-danger" v-if="errors.visit"> {{ errors.visit[0] }} </small>
            </div>
            <div class="col-md-4">
         <input type="number" class="form-control" id="exampleInputFirstName" placeholder="Enter Your Paid" v-model="form.paid">
       <small class="text-danger" v-if="errors.paid"> {{ errors.paid[0] }} </small>
            </div>
            <div class="col-md-4">
    <select class="form-control form-control-lg  mb-3"  v-model="form.status">
    <option value="Paid">Paid</option>
    <option value="NotPaid">Not Paid</option>
    <option value="Pending">Pending</option>
    </select>
    <small class="text-danger" v-if="errors.status">{{errors.status[0]}}</small>
    </div>
          </div>
        </div>
       
         <div class="form-group">

          <div class="form-row">
            <div class="col-md-11">
   <input type="file" class="custom-file-input" id="customFile" @change="onFileSelected">

  <small class="text-danger" v-if="errors.photo"> {{ errors.photo[0] }} </small>
       <label class="custom-file-label" for="customFile">Choose file</label>
            </div>


     <div class="col-md-1">
        <img :src="form.photo" style="height: 40px; width: 40px;">
            </div>     
            
          </div>
        </div>

 


        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </div>
        
      </form>
                  <hr>
                  <div class="text-center">
  
  
                  </div>
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
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
    return {
      form:{
        pname: null,
        age:null,
        address:null,
        phone:null,
        visit: null,
        paid: null,
        status: null,
        photo: null,
        doctor_id: null
      },
      errors:{},
      employees:{},
    }
  },

  methods:{
    onFileSelected(event){
     let file = event.target.files[0];
     if (file.size > 1048770) {
     Toast.fire({
        icon: 'warning',
        title: 'Image Should be less then 1MB'
        })
     }else{
      let reader = new FileReader();
      reader.onload = event =>{
        this.form.photo = event.target.result
        console.log(event.target.result);
      };
      reader.readAsDataURL(file);
     }

    },
  supplierInsert(){
       axios.post('/api/patient',this.form)
       
        this.$router.push({ name: 'patient'})
       .then(() => {
        Toast.fire({
        icon: 'success',
        title: 'Successfully Done'
        }) 
       })
       .catch(error =>this.errors = error.response.data.errors)
     },
  },
  created(){
     axios.get('/api/doctor/')
    .then(({data}) => (this.employees = data))

    } 


  }
   
</script>


<style type="text/css">
  
</style>