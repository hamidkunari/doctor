

<template>

<div>

<div class="row">
<router-link to="/doctor" class="btn btn-primary">All Employee </router-link>

</div>

<div class="row justify-content-center">
<div class="col-xl-12 col-lg-12 col-md-12">
<div class="card shadow-sm my-5">
<div class="card-body p-0">
<div class="row">
<div class="col-lg-12">
<div class="login-form">
<div class="text-center">
<h1 class="h4 text-gray-900 mb-4"> View Doctor Info</h1>
</div>
<div class="col-lg-12">
<div class="row">
<div class="col-lg-2"><img src="https://via.placeholder.com/150" />
</div>
<div class="col-lg-7">
<div class="doc-info-cont">
<h4 class="doc-name">Dr {{form.name}}</h4>
<p class="doc-speciality":value="supplier.id" v-for="supplier in suppliers">Speciality: {{ supplier.sname }}</p>

<div class="clinic-details">
<p class="doc-location"><i class="fas fa-map-marker-alt"></i> {{form.address}} <a href="javascript:void(0);">Get Directions</a></p>

</div>

</div>
</div>
<div class="col-lg-3"><div class="doc-info-right">
<div class="clini-infos">
<ul>
<li><i class="far fa-thumbs-up"></i> 99%</li>
<li><i class="far fa-comment"></i> 35 Feedback</li>
<li><i class="fas fa-map-marker-alt"></i> {{form.address}}</li>
<li><i class="far fa-money-bill-alt"></i> ${{form.earned}} Fees </li>
</ul>
</div>
<div class="doctor-action">
<a href="javascript:void(0)" class="btn btn-white fav-btn">
<i class="far fa-bookmark"></i>
</a>
<a href="chat.html" class="btn btn-white msg-btn">
<i class="far fa-comment-alt"></i>
</a>
<a href="javascript:void(0)" class="btn btn-white call-btn" data-toggle="modal" data-target="#voice_call">
<i class="fas fa-phone"></i>
</a>
<a href="javascript:void(0)" class="btn btn-white call-btn" data-toggle="modal" data-target="#video_call">
<i class="fas fa-video"></i>
</a>
</div>

</div></div>

</div>
</div>
<hr>
<div class="col-lg-12">
<div class="card">
<div class="card-body pt-0">

<!-- Tab Menu -->
<nav class="user-tabs mb-4">
<ul class="nav nav-tabs nav-tabs-bottom nav-justified">
<li class="nav-item">
<a style="font-size: 20px; color:black" class="nav-link active" href="#doc_overview" data-toggle="tab">Overview</a>
</li>

</ul>
</nav>
<!-- /Tab Menu -->

<!-- Tab Content -->
<div class="tab-content pt-0">

<!-- Overview Content -->
<div role="tabpanel" id="doc_overview" class="tab-pane fade active show">
<div class="row">
<div class="col-md-12 col-lg-9">

<!-- About Details -->
<div class="widget about-widget">
<h4 class="widget-title">About Me</h4>
<p>Dr {{form.name}} {{form.bio}}</p>
</div>
<!-- /About Details -->

<!-- School details -->
<div class="widget education-widget">
<h4 class="widget-title">High School</h4>
<div class="experience-box">
<ul class="experience-list">
<li>
<div class="experience-user">
<div class="before-circle"></div>
</div>
<div class="experience-content">
<div class="timeline-content">
<a href="#/" class="name">{{form.school}}::</a>
<span class="time">{{form.sstartd}} To {{form.sendd}}</span>
</div>
</div>
</li>

</ul>
</div>
</div>
<!--High Education Details -->
<div class="widget education-widget">
<h4 class="widget-title">Education</h4>
<div class="experience-box">
<ul class="experience-list">
<li>
<div class="experience-user">
<div class="before-circle"></div>
</div>
<div class="experience-content">
<div class="timeline-content">
<a href="#/" class="name">{{form.university}}</a>
<div>{{form.course}}</div>
<span class="time">{{form.startd}} To {{form.endd}}</span>
</div>
</div>
</li>

</ul>
</div>
</div>
<!-- /Education Details -->

<!-- Experience Details -->
<div class="widget experience-widget">
<h4 class="widget-title">Work &amp; Experience</h4>
<div class="experience-box">
<ul class="experience-list">
<li>
<div class="experience-user">
<div class="before-circle"></div>
</div>
<div class="experience-content">
<div class="timeline-content">
<a href="#/" class="name">{{form.cname}}</a>
<span class="time">{{form.workd}} To {{form.workdd}}</span>
</div>
</div>
</li>
</ul>
<p>{{form.description}}</p>
</div>
</div>
<!-- /Experience Details -->







</div>
</div>
</div>
<!-- /Overview Content -->





</div>
</div>
</div>

</div>
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
        name: '',
        supplier_id: '',
        earned: '',
        status: '',
        date: '',
        photo: '',
        address: '',
        description:''
       
      },
      errors:{},
          suppliers:{},
    }
  },
  created(){
    let id = this.$route.params.id
    axios.get('/api/doctor/'+id)
    .then(({data}) => (this.form = data))
    .catch(console.log('error'))

     axios.get('/api/speciality/')
    .then(({data}) => (this.suppliers = data))
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
        this.form.newphoto = event.target.result
       
      };
      reader.readAsDataURL(file);
     }

    },
  employeeUpdate(){
      let id = this.$route.params.id
       axios.patch('/api/doctor/'+id,this.form)
       .then(() => {
        this.$router.push({ name: 'doctor'})
       Toast.fire({
        icon: 'success',
        title: 'Done Update Successfully'
        })
       })
       .catch(error =>this.errors = error.response.data.errors)
     },
  } 
};
</script>


<style type="text/css">
body{
color:black;
}
</style>