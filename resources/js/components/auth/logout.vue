<template>

</template>


<script type="text/javascript">
 export default{
  created(){
  
     localStorage.removeItem('token')
     localStorage.removeItem('user')
     Toast.fire({
        icon: 'success',
        title: 'Loggout  successfully'
        })
     this.$router.push({name: 'home'})
    }
}

</script>




<style type="text/css"></style>