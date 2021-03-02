 

<template>
  
  <div>

 <div class="row">
  <router-link to="/supplier" class="btn btn-primary">All Supplier </router-link>
   
 </div>



    <div class="row justify-content-center">
      <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Add Supplier</h1>
                  </div>

      <form class="user" @submit.prevent="supplierInsert" enctype="multipart/form-data">

        <div class="form-group">

          <div class="form-row">
            <div class="col-md-12">
         <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter Your Full Name" v-model="form.sname">
       <small class="text-danger" v-if="errors.sname"> {{ errors.sname[0] }} </small>
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
        sname: null,
        photo: null
      },
      errors:{}
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
       axios.post('/api/speciality',this.form)
       
        this.$router.push({ name: 'speciality'})
       .then(() => {
        Toast.fire({
        icon: 'success',
        title: 'Successfully Done'
        }) 
       })
       .catch(error =>this.errors = error.response.data.errors)
     },
  } 


  }
   
</script>


<style type="text/css">
  
</style>