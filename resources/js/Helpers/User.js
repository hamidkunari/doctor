
import Token from './Token'
import appstorage from './appstorage'

class User{

responseAfterLogin(res){
	const access_token  = res.data.access_token
	const  username  = res.data.name

	if(Token.isValid(access_token)){
     appstorage.store(access_token,username)
	}
}

hashToken(){
	const storeToken  = localStorage.getItem('token');
	if(storeToken){
      return Token.isValid(storeToken) ? true: false
	}
    false
}

loggedIn(){
	return this.hashToken()
}
name(){
	if(this.loggedIn){
     return localStorage.getItem('user');
	}
}
id(){
	if(this.loggedIn){
     const payload = Token.payload(localStorage.getItem('token'));
     return payload.sub
	}
	return false
}

}



export default User  = new User();