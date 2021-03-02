    <template>
    <div>
    <div class="row"> 
    <router-link to="/doctor" class="btn btn-primary">All Employee</router-link>

    </div>
    <div class="row justify-content-center">
    <div class="col-xl-12 col-lg-12 col-md-12">
    <div class="card shadow-sm my-5">
    <div class="card-body p-0">
    <div class="row">
    <div class="col-lg-12">
    <div class="login-form">
    <div class="text-center">
    <h1 class="h4 text-gray-900 mb-4">Add Employee</h1>
    </div>
    <form @submit.prevent="employeeInsert" enctype="multipart/from-data">
    <div class="form-group">
    <div class="form-row">
    <div class="col-md-6">
    <input type="text" class="form-control" v-model="form.name"  placeholder="Enter First Name">
    <small class="text-danger" v-if="errors.name">{{errors.name[0]}}</small>
    </div>

    <!-- speciality here -->
    <div class="col-md-6">
    <select class="form-control" id="exampleFormControlSelect1" v-model="form.supplier_id">
    <option :value="supplier.id" v-for="supplier in suppliers">{{ supplier.sname }}</option>
    </select>    
    </div> 



    </div>
    </div>

    <div class="form-group">
    <div class="form-row">
    <div class="col-md-6">
    <select class="form-control form-control-lg  mb-3"  v-model="form.status">
    <option value="Active">Active</option>
    <option value="UnActive">UnActive</option>
    </select>
    <small class="text-danger" v-if="errors.status">{{errors.status[0]}}</small>
    </div>

    <div class="col-md-6">
    <input type="number" class="form-control" v-model="form.earned"  placeholder="Enter Earned Amount">
    <small class="text-danger" v-if="errors.earned">{{errors.earned[0]}}</small>
    </div>
    </div>
    </div>

    <div class="form-group">
    <div class="form-row">
    <div class="col-md-6">
    <input type="date" class="form-control" v-model="form.date"  placeholder="Enter Joining Date">
    <small class="text-danger" v-if="errors.date">{{errors.date[0]}}</small>
    </div>
     <div class="col-md-6">
    <input type="text" class="form-control" v-model="form.address"  placeholder="Enter Address">
    <small class="text-danger" v-if="errors.address">{{errors.address[0]}}</small>
    </div>
    </div>
    </div>

     <div class="form-group">
    <div class="form-row">
    <div class="col-md-4">
    <input type="text" class="form-control" v-model="form.school"  placeholder="Enter School Name">
    <small class="text-danger" v-if="errors.school">{{errors.school[0]}}</small>
    </div>
     <div class="col-md-4">
    <input type="date" class="form-control" v-model="form.sstartd"  placeholder="Enter School Joining Date">
    <small class="text-danger" v-if="errors.sstartd">{{errors.sstartd[0]}}</small>
    </div>
 <div class="col-md-4">
    <input type="date" class="form-control" v-model="form.sendd"  placeholder="Enter School End Date">
    <small class="text-danger" v-if="errors.sendd">{{errors.sendd[0]}}</small>
    </div>

    </div>
    </div>

      <div class="form-group">
    <div class="form-row">
    <div class="col-md-3">
    <input type="text" class="form-control" v-model="form.university"  placeholder="Enter University Name">
    <small class="text-danger" v-if="errors.university">{{errors.university[0]}}</small>
    </div>
     <div class="col-md-3">
    <input type="text" class="form-control" v-model="form.course"  placeholder="Enter Course Name">
    <small class="text-danger" v-if="errors.course">{{errors.course[0]}}</small>
    </div>
     <div class="col-md-3">
    <input type="date" class="form-control" v-model="form.startd"  placeholder="Enter University Joining Date">
    <small class="text-danger" v-if="errors.startd">{{errors.startd[0]}}</small>
    </div>
 <div class="col-md-3">
    <input type="date" class="form-control" v-model="form.endd"  placeholder="Enter University End Date">
    <small class="text-danger" v-if="errors.endd">{{errors.endd[0]}}</small>
    </div>

    </div>
    </div>

      <div class="form-group">
    <div class="form-row">
    <div class="col-md-4">
    <input type="text" class="form-control" v-model="form.cname"  placeholder="Enter Company Name">
    <small class="text-danger" v-if="errors.cname">{{errors.cname[0]}}</small>
    </div>
     <div class="col-md-4">
    <input type="date" class="form-control" v-model="form.workd"  placeholder="Enter Work Joining Date">
    <small class="text-danger" v-if="errors.workd">{{errors.workd[0]}}</small>
    </div>
 <div class="col-md-4">
    <input type="date" class="form-control" v-model="form.workdd"  placeholder="Enter Work End Date">
    <small class="text-danger" v-if="errors.workdd">{{errors.workdd[0]}}</small>
    </div>

    </div>
    </div>




    <div class="form-group">
    <div class="form-row">
    <div class="col-md-6">
    <input type="text" class="form-control" v-model="form.bio"  placeholder="Enter Your Bio">
    <small class="text-danger" v-if="errors.bio">{{errors.bio[0]}}</small>
    </div>
     <div class="col-md-6">
    <input type="text" class="form-control" v-model="form.description"  placeholder="Enter Your Work Experience ">
    <small class="text-danger" v-if="errors.address">{{errors.description[0]}}</small>
    </div>

    </div>
    </div>



    <div class="form-group">
    <div class="form-row">
    <div class="col-md-11">
    <input type="file" class="custom-file-input"  id="customFile" @change="onFileSelected">
    <small class="text-danger" v-if="errors.photo">{{errors.photo[0]}}</small>
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
    <hr>

    </form>


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
    </div>

    </template>



    <script type="text/javascript">
    export default {
    created() {
    if (!User.loggedIn()) {
    this.$router.push({ name: "/" });
    }
    },


    data() {
    return {
    form: {
    name: null,
    status:null,
    date: null,
    photo: null,
    earned: null,
    address:null,
    bio:null,
    description: null,
    school: null,
    sstartd: null,
    sendd: null,
    university: null,
    course: null,
    startd: null,
    endd: null,
    cname: null,
    workd: null,
    workdd: null,


    supplier_id: null
    },
    errors: {},
    suppliers:{},
    }
    },


    methods: {

    onFileSelected(event){
    let file  = event.target.files[0];
    if(file.size > 1048770){
    Notification.image_validation();
    }else{
    let reader  = new FileReader();
    reader.onload  = event =>{
    this.form.photo  = event.target.result;
    console.log(event.target.result);
    };
    reader.readAsDataURL(file);
    }
    },

    employeeInsert(){
    axios.post('/api/doctor',this.form)
    .then(() => {
    this.$router.push({ name: 'doctor'})
    Notification.success()
    })
    .catch(error =>this.errors = error.response.data.errors)
    },
    },
    created(){
     axios.get('/api/speciality/')
    .then(({data}) => (this.suppliers = data))

    } 




    }

    </script>





    <style type="text/css"></style>